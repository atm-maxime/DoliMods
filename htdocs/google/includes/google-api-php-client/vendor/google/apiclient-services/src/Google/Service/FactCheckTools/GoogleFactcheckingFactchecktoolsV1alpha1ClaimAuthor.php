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

class Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1ClaimAuthor extends Google_Model
{
	public $imageUrl;
	public $jobTitle;
	public $name;
	public $sameAs;

	public function setImageUrl($imageUrl)
	{
		$this->imageUrl = $imageUrl;
	}
	public function getImageUrl()
	{
		return $this->imageUrl;
	}
	public function setJobTitle($jobTitle)
	{
		$this->jobTitle = $jobTitle;
	}
	public function getJobTitle()
	{
		return $this->jobTitle;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setSameAs($sameAs)
	{
		$this->sameAs = $sameAs;
	}
	public function getSameAs()
	{
		return $this->sameAs;
	}
}
