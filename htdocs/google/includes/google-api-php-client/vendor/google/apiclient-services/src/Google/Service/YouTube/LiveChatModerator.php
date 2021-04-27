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

class Google_Service_YouTube_LiveChatModerator extends Google_Model
{
	public $etag;
	public $id;
	public $kind;
	protected $snippetType = 'Google_Service_YouTube_LiveChatModeratorSnippet';
	protected $snippetDataType = '';

	public function setEtag($etag)
	{
		$this->etag = $etag;
	}
	public function getEtag()
	{
		return $this->etag;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function getId()
	{
		return $this->id;
	}
	public function setKind($kind)
	{
		$this->kind = $kind;
	}
	public function getKind()
	{
		return $this->kind;
	}
	/**
	 * @param Google_Service_YouTube_LiveChatModeratorSnippet
	 */
	public function setSnippet(Google_Service_YouTube_LiveChatModeratorSnippet $snippet)
	{
		$this->snippet = $snippet;
	}
	/**
	 * @return Google_Service_YouTube_LiveChatModeratorSnippet
	 */
	public function getSnippet()
	{
		return $this->snippet;
	}
}
