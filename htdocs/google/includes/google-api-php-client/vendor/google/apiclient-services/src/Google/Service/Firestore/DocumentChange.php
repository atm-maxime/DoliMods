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

class Google_Service_Firestore_DocumentChange extends Google_Collection
{
	protected $collection_key = 'targetIds';
	protected $documentType = 'Google_Service_Firestore_Document';
	protected $documentDataType = '';
	public $removedTargetIds;
	public $targetIds;

	/**
	 * @param Google_Service_Firestore_Document
	 */
	public function setDocument(Google_Service_Firestore_Document $document)
	{
		$this->document = $document;
	}
	/**
	 * @return Google_Service_Firestore_Document
	 */
	public function getDocument()
	{
		return $this->document;
	}
	public function setRemovedTargetIds($removedTargetIds)
	{
		$this->removedTargetIds = $removedTargetIds;
	}
	public function getRemovedTargetIds()
	{
		return $this->removedTargetIds;
	}
	public function setTargetIds($targetIds)
	{
		$this->targetIds = $targetIds;
	}
	public function getTargetIds()
	{
		return $this->targetIds;
	}
}
