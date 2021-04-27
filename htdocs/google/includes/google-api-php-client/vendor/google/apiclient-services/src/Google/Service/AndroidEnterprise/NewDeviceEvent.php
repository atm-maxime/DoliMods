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

class Google_Service_AndroidEnterprise_NewDeviceEvent extends Google_Model
{
	public $deviceId;
	public $dpcPackageName;
	public $managementType;
	public $userId;

	public function setDeviceId($deviceId)
	{
		$this->deviceId = $deviceId;
	}
	public function getDeviceId()
	{
		return $this->deviceId;
	}
	public function setDpcPackageName($dpcPackageName)
	{
		$this->dpcPackageName = $dpcPackageName;
	}
	public function getDpcPackageName()
	{
		return $this->dpcPackageName;
	}
	public function setManagementType($managementType)
	{
		$this->managementType = $managementType;
	}
	public function getManagementType()
	{
		return $this->managementType;
	}
	public function setUserId($userId)
	{
		$this->userId = $userId;
	}
	public function getUserId()
	{
		return $this->userId;
	}
}
