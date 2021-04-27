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

class Google_Service_Compute_Reservation extends Google_Model
{
	public $commitment;
	public $creationTimestamp;
	public $description;
	public $id;
	public $kind;
	public $name;
	public $selfLink;
	protected $specificReservationType = 'Google_Service_Compute_AllocationSpecificSKUReservation';
	protected $specificReservationDataType = '';
	public $specificReservationRequired;
	public $status;
	public $zone;

	public function setCommitment($commitment)
	{
		$this->commitment = $commitment;
	}
	public function getCommitment()
	{
		return $this->commitment;
	}
	public function setCreationTimestamp($creationTimestamp)
	{
		$this->creationTimestamp = $creationTimestamp;
	}
	public function getCreationTimestamp()
	{
		return $this->creationTimestamp;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}
	public function getDescription()
	{
		return $this->description;
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
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setSelfLink($selfLink)
	{
		$this->selfLink = $selfLink;
	}
	public function getSelfLink()
	{
		return $this->selfLink;
	}
	/**
	 * @param Google_Service_Compute_AllocationSpecificSKUReservation
	 */
	public function setSpecificReservation(Google_Service_Compute_AllocationSpecificSKUReservation $specificReservation)
	{
		$this->specificReservation = $specificReservation;
	}
	/**
	 * @return Google_Service_Compute_AllocationSpecificSKUReservation
	 */
	public function getSpecificReservation()
	{
		return $this->specificReservation;
	}
	public function setSpecificReservationRequired($specificReservationRequired)
	{
		$this->specificReservationRequired = $specificReservationRequired;
	}
	public function getSpecificReservationRequired()
	{
		return $this->specificReservationRequired;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}
	public function getStatus()
	{
		return $this->status;
	}
	public function setZone($zone)
	{
		$this->zone = $zone;
	}
	public function getZone()
	{
		return $this->zone;
	}
}
