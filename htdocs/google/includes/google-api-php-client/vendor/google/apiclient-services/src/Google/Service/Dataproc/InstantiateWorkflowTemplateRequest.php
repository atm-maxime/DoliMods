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

class Google_Service_Dataproc_InstantiateWorkflowTemplateRequest extends Google_Model
{
	public $parameters;
	public $requestId;
	public $version;

	public function setParameters($parameters)
	{
		$this->parameters = $parameters;
	}
	public function getParameters()
	{
		return $this->parameters;
	}
	public function setRequestId($requestId)
	{
		$this->requestId = $requestId;
	}
	public function getRequestId()
	{
		return $this->requestId;
	}
	public function setVersion($version)
	{
		$this->version = $version;
	}
	public function getVersion()
	{
		return $this->version;
	}
}
