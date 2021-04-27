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

class Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2FileNode extends Google_Collection
{
	protected $collection_key = 'nodeProperties';
	protected $digestType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest';
	protected $digestDataType = '';
	public $isExecutable;
	public $name;
	protected $nodePropertiesType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2NodeProperty';
	protected $nodePropertiesDataType = 'array';

	/**
	 * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
	 */
	public function setDigest(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest $digest)
	{
		$this->digest = $digest;
	}
	/**
	 * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
	 */
	public function getDigest()
	{
		return $this->digest;
	}
	public function setIsExecutable($isExecutable)
	{
		$this->isExecutable = $isExecutable;
	}
	public function getIsExecutable()
	{
		return $this->isExecutable;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}
	/**
	 * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2NodeProperty
	 */
	public function setNodeProperties($nodeProperties)
	{
		$this->nodeProperties = $nodeProperties;
	}
	/**
	 * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2NodeProperty
	 */
	public function getNodeProperties()
	{
		return $this->nodeProperties;
	}
}
