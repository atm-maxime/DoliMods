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

class Google_Service_AlertCenter_MaliciousEntity extends Google_Model
{
	public $displayName;
	protected $entityType = 'Google_Service_AlertCenter_User';
	protected $entityDataType = '';
	public $fromHeader;

	public function setDisplayName($displayName)
	{
		$this->displayName = $displayName;
	}
	public function getDisplayName()
	{
		return $this->displayName;
	}
	/**
	 * @param Google_Service_AlertCenter_User
	 */
	public function setEntity(Google_Service_AlertCenter_User $entity)
	{
		$this->entity = $entity;
	}
	/**
	 * @return Google_Service_AlertCenter_User
	 */
	public function getEntity()
	{
		return $this->entity;
	}
	public function setFromHeader($fromHeader)
	{
		$this->fromHeader = $fromHeader;
	}
	public function getFromHeader()
	{
		return $this->fromHeader;
	}
}
