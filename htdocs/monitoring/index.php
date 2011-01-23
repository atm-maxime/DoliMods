<?php
/* Copyright (C) 2008-2009 Laurent Destailleur  <eldy@users.sourceforge.net>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 */

/**
 *	    \file       htdocs/monitoring/index.php
 *      \ingroup    monitoring
 *      \brief      Page to setup module Monitoring
 *		\version    $Id: index.php,v 1.1 2011/01/23 12:50:05 eldy Exp $
 */

define('NOCSRFCHECK',1);

$res=0;
if (! $res && file_exists("../main.inc.php")) $res=@include("../main.inc.php");
if (! $res && file_exists("../../main.inc.php")) $res=@include("../../main.inc.php");
if (! $res && file_exists("../../../dolibarr/htdocs/main.inc.php")) $res=@include("../../../dolibarr/htdocs/main.inc.php");     // Used on dev env only
if (! $res && file_exists("../../../../dolibarr/htdocs/main.inc.php")) $res=@include("../../../../dolibarr/htdocs/main.inc.php");   // Used on dev env only
if (! $res && file_exists("../../../../../dolibarr/htdocs/main.inc.php")) $res=@include("../../../../../dolibarr/htdocs/main.inc.php");   // Used on dev env only
if (! $res) die("Include of main fails");
require_once(DOL_DOCUMENT_ROOT."/lib/admin.lib.php");
require_once(DOL_DOCUMENT_ROOT."/lib/files.lib.php");
require_once(DOL_DOCUMENT_ROOT.'/core/class/html.formadmin.class.php');
dol_include_once("/monitoring/lib/monitoring.lib.php");	// We still use old writing to be compatible with old version


if (!$user->admin)
accessforbidden();


$langs->load("admin");
$langs->load("monitoring@monitoring");
$langs->load("other");

$def = array();
$action=GETPOST("action");
$actionsave=GETPOST("save");
$code=GETPOST('code');

$fname = $conf->monitoring->dir_output."/".$code."/monitoring.rrd";
$fileimage[0]=$code.'/monitoring-1h.png';
$fileimage[1]=$code.'/monitoring-1d.png';
$fileimage[2]=$code.'/monitoring-1w.png';
$fileimage[3]=$code.'/monitoring-1m.png';
$fileimage[4]=$code.'/monitoring-1y.png';


/*
 * Actions
 */

// Save parameters
if ($actionsave)
{
	$error=0;
	$i=0;

	$db->begin();

	/*    if (! preg_match('|[\\\/]$|',$_POST["RRD_COMMANDLINE_TOOL"]))
	 {
	 $mesg="<div class=\"error\">".$langs->trans("ErrorRrdDataDirMustEndWithASlash")."</div>";
	 $error++;
	 }
	 */
	if (! $error)
	{
		if ($i >= 0) $i+=dolibarr_set_const($db,'MONITORING_COMMANDLINE_TOOL',trim($_POST["MONITORING_COMMANDLINE_TOOL"]),'chaine',0);

		if ($i >= 1)
		{
			$db->commit();
			$mesg = "<div class=\"ok\">".$langs->trans("SetupSaved")."</div>";
		}
		else
		{
			$db->rollback();
			$mesg=$db->lasterror();
			//header("Location: ".$_SERVER["PHP_SELF"]);
			//exit;
		}
	}
}

if ($action == 'create')
{
	$error=0;
	create_exdir($conf->monitoring->dir_output.'/'.$code);

	$step=5;
	$opts = array( "--step", $step,
           "DS:ds1:GAUGE:".($step*2).":0:100",
           "DS:ds2:GAUGE:".($step*2).":0:100",
           "RRA:AVERAGE:0.5:1:".(3600/$step),
	           "RRA:AVERAGE:0.5:".(60/$step).":1440",
	           "RRA:AVERAGE:0.5:".(3600/$step).":168",
	           "RRA:AVERAGE:0.5:".(3600/$step).":744",
	           "RRA:AVERAGE:0.5:".(86400/$step).":365",
           	   "RRA:MAX:0.5:1:".(3600/$step),
	           "RRA:MAX:0.5:".(60/$step).":1440",
	           "RRA:MAX:0.5:".(3600/$step).":168",
	           "RRA:MAX:0.5:".(3600/$step).":744",
	           "RRA:MAX:0.5:".(86400/$step).":365",
	           "RRA:MIN:0.5:1:".(3600/$step),
	           "RRA:MIN:0.5:".(60/$step).":1440",
	           "RRA:MIN:0.5:".(3600/$step).":168",
	           "RRA:MIN:0.5:".(3600/$step).":744",
	           "RRA:MIN:0.5:".(86400/$step).":365",
	);

	$ret = rrd_create($fname, $opts, count($opts));
	$resout=file_get_contents($fname.'.out');
	if (strlen($resout) < 10)
	{
		$mesg='<div class="ok">'.$langs->trans("File ".$fname.' created').'</div>';
		$action='graph';	// To rebuild graph
	}
	else
	{
		$error++;
		$err = rrd_error($fname);
		$mesg="Create error: $err\n";
	}
}

if ($action == 'update')
{
	$error=0;
	$val1=rand(0,100);
	$val2=25;
	$ret = rrd_update($fname, "N:$val1:$val2");

	if( $ret > 0)
	{
		$mesg='<div class="ok">'.$langs->trans("File ".$fname.' completed with random values '.$val1.' for graph 1 and '.$val2.' for graph 2').'</div>';
	}
	else
	{
		$error++;
		$err = rrd_error($fname);
		$mesg="Update error: $err\n";
	}
}

if ($action == 'graph')
{
	$error=0;
	$mesg='';

	$opts = array(
			'--start','-1h',
			"--vertical-label=ms",
           "DEF:ds1=".$fname.":ds1:AVERAGE",
           "DEF:ds2=".$fname.":ds2:AVERAGE",
			"LINE1:ds1#0000FF:Graph1",
			"LINE1:ds2#FF0000:Errors",
 			"CDEF:cdef1=ds1,1,*",
           "CDEF:cdef2=ds2,1,*",
	       'COMMENT:\\\n ',
	"GPRINT:cdef1:MIN:Minval1%8.2lf ",
	"GPRINT:cdef1:AVERAGE:Avgval1%8.2lf ",
		"GPRINT:cdef1:MAX:Maxval1%8.2lf ",
		'COMMENT:\\\n ',
		"GPRINT:cdef2:MIN:Minval2%8.2lf ",
	"GPRINT:cdef2:AVERAGE:Avgval2%8.2lf ",
		"GPRINT:cdef2:MAX:Maxval2%8.2lf ",
	       'COMMENT:\\\n '
	);
	$ret = rrd_graph($conf->monitoring->dir_output.'/'.$fileimage[0], $opts, count($opts));
	$resout=file_get_contents($conf->monitoring->dir_output.'/'.$fileimage[0].'.out');
	if (strlen($resout) < 10)
	{
		$mesg.='<div class="ok">'.$langs->trans("File ".$fileimage[0].' created').'</div>';
	}
	else
	{
		$error++;
		$err = rrd_error($conf->monitoring->dir_output.'/'.$fileimage[0]);
		$mesg.="Graph error: $err\n";
	}

	$opts = array(
			'--start','-1d',
			"--vertical-label=ms",
           "DEF:ds1=".$fname.":ds1:AVERAGE",
           "DEF:ds2=".$fname.":ds2:AVERAGE",
			"LINE1:ds1#0000FF:Graph1",
			"LINE1:ds2#FF0000:Errors",
 			"CDEF:cdef1=ds1,1,*",
           "CDEF:cdef2=ds2,1,*",
	       'COMMENT:\\\n ',
	"GPRINT:cdef1:MIN:Minval1%8.2lf ",
	"GPRINT:cdef1:AVERAGE:Avgval1%8.2lf ",
		"GPRINT:cdef1:MAX:Maxval1%8.2lf ",
		'COMMENT:\\\n ',
		"GPRINT:cdef2:MIN:Minval2%8.2lf ",
	"GPRINT:cdef2:AVERAGE:Avgval2%8.2lf ",
		"GPRINT:cdef2:MAX:Maxval2%8.2lf ",
	       'COMMENT:\\\n '
			);
			$ret = rrd_graph($conf->monitoring->dir_output.'/'.$fileimage[1], $opts, count($opts));
			$resout=file_get_contents($conf->monitoring->dir_output.'/'.$fileimage[1].'.out');
			if (strlen($resout) < 10)
			{
				$mesg.='<div class="ok">'.$langs->trans("File ".$fileimage[1].' created').'</div>';
			}
			else
			{
				$error++;
				$err = rrd_error($conf->monitoring->dir_output.'/'.$fileimage[1]);
				$mesg.="Graph error: $err\n";
			}

			$opts = array(
			'--start','-1w',
			"--vertical-label=ms",
           "DEF:ds1=".$fname.":ds1:AVERAGE",
           "DEF:ds2=".$fname.":ds2:AVERAGE",
			"LINE1:ds1#0000FF:Graph1",
			"LINE1:ds2#FF0000:Errors",
 			"CDEF:cdef1=ds1,1,*",
           "CDEF:cdef2=ds2,1,*",
	       'COMMENT:\\\n ',
	"GPRINT:cdef1:MIN:Minval1%8.2lf ",
	"GPRINT:cdef1:AVERAGE:Avgval1%8.2lf ",
		"GPRINT:cdef1:MAX:Maxval1%8.2lf ",
		'COMMENT:\\\n ',
		"GPRINT:cdef2:MIN:Minval2%8.2lf ",
	"GPRINT:cdef2:AVERAGE:Avgval2%8.2lf ",
		"GPRINT:cdef2:MAX:Maxval2%8.2lf ",
	       'COMMENT:\\\n '
	       		);
			$ret = rrd_graph($conf->monitoring->dir_output.'/'.$fileimage[2], $opts, count($opts));
			$resout=file_get_contents($conf->monitoring->dir_output.'/'.$fileimage[2].'.out');
			if (strlen($resout) < 10)
			{
				$mesg.='<div class="ok">'.$langs->trans("File ".$fileimage[2].' created').'</div>';
			}
			else
			{
				$error++;
				$err = rrd_error($conf->monitoring->dir_output.'/'.$fileimage[2]);
				$mesg.="Graph error: $err\n";
			}

			$opts = array(
			'--start','-1m',
			"--vertical-label=ms",
           "DEF:ds1=".$fname.":ds1:AVERAGE",
           "DEF:ds2=".$fname.":ds2:AVERAGE",
			"LINE1:ds1#0000FF:Graph1",
			"LINE1:ds2#FF0000:Errors",
 			"CDEF:cdef1=ds1,1,*",
           "CDEF:cdef2=ds2,1,*",
	       'COMMENT:\\\n ',
	"GPRINT:cdef1:MIN:Minval1%8.2lf ",
	"GPRINT:cdef1:AVERAGE:Avgval1%8.2lf ",
		"GPRINT:cdef1:MAX:Maxval1%8.2lf ",
		'COMMENT:\\\n ',
		"GPRINT:cdef2:MIN:Minval2%8.2lf ",
	"GPRINT:cdef2:AVERAGE:Avgval2%8.2lf ",
		"GPRINT:cdef2:MAX:Maxval2%8.2lf ",
	       'COMMENT:\\\n '
	       			);
			$ret = rrd_graph($conf->monitoring->dir_output.'/'.$fileimage[3], $opts, count($opts));
			$resout=file_get_contents($conf->monitoring->dir_output.'/'.$fileimage[3].'.out');
			if (strlen($resout) < 10)
			{
				$mesg.='<div class="ok">'.$langs->trans("File ".$fileimage[3].' created').'</div>';
			}
			else
			{
				$error++;
				$err = rrd_error($conf->monitoring->dir_output.'/'.$fileimage[3]);
				$mesg.="Graph error: $err\n";
			}

			$opts = array(
			'--start','-1y',
			"--vertical-label=ms",
           "DEF:ds1=".$fname.":ds1:AVERAGE",
           "DEF:ds2=".$fname.":ds2:AVERAGE",
			"LINE1:ds1#0000FF:Graph1",
			"LINE1:ds2#FF0000:Errors",
 			"CDEF:cdef1=ds1,1,*",
           "CDEF:cdef2=ds2,1,*",
	       'COMMENT:\\\n ',
	"GPRINT:cdef1:MIN:Minval1%8.2lf ",
	"GPRINT:cdef1:AVERAGE:Avgval1%8.2lf ",
		"GPRINT:cdef1:MAX:Maxval1%8.2lf ",
		'COMMENT:\\\n ',
		"GPRINT:cdef2:MIN:Minval2%8.2lf ",
	"GPRINT:cdef2:AVERAGE:Avgval2%8.2lf ",
		"GPRINT:cdef2:MAX:Maxval2%8.2lf ",
	       'COMMENT:\\\n '
			);
			$ret = rrd_graph($conf->monitoring->dir_output.'/'.$fileimage[4], $opts, count($opts));
			$resout=file_get_contents($conf->monitoring->dir_output.'/'.$fileimage[4].'.out');
			if (strlen($resout) < 10)
			{
				$mesg.='<div class="ok">'.$langs->trans("File ".$fileimage[4].' created').'</div>';
			}
			else
			{
				$error++;
				$err = rrd_error($conf->monitoring->dir_output.'/'.$fileimage[4]);
				$mesg.="Graph error: $err\n";
			}


			if (! $error) $mesg='';
}



/**
 * View
 */

llxHeader('','RRd',$linktohelp);

$linkback='<a href="'.DOL_URL_ROOT.'/admin/modules.php">'.$langs->trans("BackToModuleList").'</a>';
print_fiche_titre($langs->trans("RrdSetup"),$linkback,'setup');
print '<br>';

if ($mesg) print "<br>$mesg<br>";

if (empty($code))
{
	print $langs->trans("ErrorFieldRequired",'code');
}
else
{
	if ($conf->global->MONITORING_COMMANDLINE_TOOL)
	{
		print '<a class="butAction" href="'.$_SERVER["PHP_SELF"].'?action=graph&code='.GETPOST('code').'">'.$langs->trans("BuildGraph").'</a>';
	}
	else
	{
		print '<a class="butActionRefused" href="#">'.$langs->trans("BuildGraph").'</a>';
	}
	
	print '<br><br>';
	print $conf->monitoring->dir_output."/".$fileimage[0].'<br>';
	print $langs->trans("LastHour").'<br>';
	if (dol_is_file($conf->monitoring->dir_output."/".$fileimage[0]))
	print '<img src="'.DOL_URL_ROOT.'/viewimage.php?modulepart=monitoring&file='.$fileimage[0].'">';
	print '<br>';
	print $langs->trans("LastDay").'<br>';
	print '<img src="'.DOL_URL_ROOT.'/viewimage.php?modulepart=monitoring&file='.$fileimage[1].'">';
	print '<br>';
	print $langs->trans("LastWeek").'<br>';
	print '<img src="'.DOL_URL_ROOT.'/viewimage.php?modulepart=monitoring&file='.$fileimage[2].'">';
	print '<br>';
	print $langs->trans("LastMonth").'<br>';
	print '<img src="'.DOL_URL_ROOT.'/viewimage.php?modulepart=monitoring&file='.$fileimage[3].'">';
	print '<br>';
	print $langs->trans("LastYear").'<br>';
	print '<img src="'.DOL_URL_ROOT.'/viewimage.php?modulepart=monitoring&file='.$fileimage[4].'">';
}


$db->close();

llxFooter('$Date: 2011/01/23 12:50:05 $ - $Revision: 1.1 $');
?>
