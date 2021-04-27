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

class Google_Service_Sheets_DeleteDuplicatesRequest extends Google_Collection
{
	protected $collection_key = 'comparisonColumns';
	protected $comparisonColumnsType = 'Google_Service_Sheets_DimensionRange';
	protected $comparisonColumnsDataType = 'array';
	protected $rangeType = 'Google_Service_Sheets_GridRange';
	protected $rangeDataType = '';

	/**
	 * @param Google_Service_Sheets_DimensionRange
	 */
	public function setComparisonColumns($comparisonColumns)
	{
		$this->comparisonColumns = $comparisonColumns;
	}
	/**
	 * @return Google_Service_Sheets_DimensionRange
	 */
	public function getComparisonColumns()
	{
		return $this->comparisonColumns;
	}
	/**
	 * @param Google_Service_Sheets_GridRange
	 */
	public function setRange(Google_Service_Sheets_GridRange $range)
	{
		$this->range = $range;
	}
	/**
	 * @return Google_Service_Sheets_GridRange
	 */
	public function getRange()
	{
		return $this->range;
	}
}
