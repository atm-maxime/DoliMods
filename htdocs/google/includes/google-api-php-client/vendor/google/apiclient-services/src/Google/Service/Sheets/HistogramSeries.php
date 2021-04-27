<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_Sheets_HistogramSeries extends Google_Model
{
	protected $barColorType = 'Google_Service_Sheets_Color';
	protected $barColorDataType = '';
	protected $barColorStyleType = 'Google_Service_Sheets_ColorStyle';
	protected $barColorStyleDataType = '';
	protected $dataType = 'Google_Service_Sheets_ChartData';
	protected $dataDataType = '';

	/**
	 * @param Google_Service_Sheets_Color
	 */
	public function setBarColor(Google_Service_Sheets_Color $barColor)
	{
		$this->barColor = $barColor;
	}
	/**
	 * @return Google_Service_Sheets_Color
	 */
	public function getBarColor()
	{
		return $this->barColor;
	}
	/**
	 * @param Google_Service_Sheets_ColorStyle
	 */
	public function setBarColorStyle(Google_Service_Sheets_ColorStyle $barColorStyle)
	{
		$this->barColorStyle = $barColorStyle;
	}
	/**
	 * @return Google_Service_Sheets_ColorStyle
	 */
	public function getBarColorStyle()
	{
		return $this->barColorStyle;
	}
	/**
	 * @param Google_Service_Sheets_ChartData
	 */
	public function setData(Google_Service_Sheets_ChartData $data)
	{
		$this->data = $data;
	}
	/**
	 * @return Google_Service_Sheets_ChartData
	 */
	public function getData()
	{
		return $this->data;
	}
}
