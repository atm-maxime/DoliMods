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

class Google_Service_Docs_SuggestedBullet extends Google_Model
{
	protected $bulletType = 'Google_Service_Docs_Bullet';
	protected $bulletDataType = '';
	protected $bulletSuggestionStateType = 'Google_Service_Docs_BulletSuggestionState';
	protected $bulletSuggestionStateDataType = '';

	/**
	 * @param Google_Service_Docs_Bullet
	 */
	public function setBullet(Google_Service_Docs_Bullet $bullet)
	{
		$this->bullet = $bullet;
	}
	/**
	 * @return Google_Service_Docs_Bullet
	 */
	public function getBullet()
	{
		return $this->bullet;
	}
	/**
	 * @param Google_Service_Docs_BulletSuggestionState
	 */
	public function setBulletSuggestionState(Google_Service_Docs_BulletSuggestionState $bulletSuggestionState)
	{
		$this->bulletSuggestionState = $bulletSuggestionState;
	}
	/**
	 * @return Google_Service_Docs_BulletSuggestionState
	 */
	public function getBulletSuggestionState()
	{
		return $this->bulletSuggestionState;
	}
}
