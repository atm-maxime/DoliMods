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

class Google_Service_Fusiontables_Bucket extends Google_Model
{
	public $color;
	public $icon;
	public $max;
	public $min;
	public $opacity;
	public $weight;

	public function setColor($color)
	{
		$this->color = $color;
	}
	public function getColor()
	{
		return $this->color;
	}
	public function setIcon($icon)
	{
		$this->icon = $icon;
	}
	public function getIcon()
	{
		return $this->icon;
	}
	public function setMax($max)
	{
		$this->max = $max;
	}
	public function getMax()
	{
		return $this->max;
	}
	public function setMin($min)
	{
		$this->min = $min;
	}
	public function getMin()
	{
		return $this->min;
	}
	public function setOpacity($opacity)
	{
		$this->opacity = $opacity;
	}
	public function getOpacity()
	{
		return $this->opacity;
	}
	public function setWeight($weight)
	{
		$this->weight = $weight;
	}
	public function getWeight()
	{
		return $this->weight;
	}
}
