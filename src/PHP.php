<?php

namespace SheetCMS;

/**
* Author: Donnie Ashok
* Email: donnie@legalify.in
* Date: 01-01-2015
* Description: PHP Library to access SheetCMS API
*/

class PHP
{
	private static $user_id = ''; # set user ID
	private static $key = ''; # set key
	private static $ssheet = ''; # set spreadsheet ID
	private static $endpoint = 'https://sheetcms.in';
	
	function __construct($user = null, $key = null)
	{
		# initialise SheetCMS with user and key
		if (isset($user)) {
			self::$user_id = $user;
		}
		if (isset($key)) {
			self::$key = $key;
		}
	}

	public function setSheet($ssheet)
	{
		self::$ssheet = $ssheet;
	}

	public function get($wsheet)
	{
		$getSheet = json_decode(
			file_get_contents(
				self::$endpoint.
				'/read/'.
				self::$user_id.'/'.
				self::$key.'/'.
				self::$ssheet.'/'.
				(is_array($wsheet)?implode(',', $wsheet):$wsheet).'/1/'
			), 
			true
		);
		if (isset($getSheet)) {
			return $getSheet;
		} else {
			$getSheet = json_decode(
				file_get_contents(
					self::$endpoint.
					'/read/'.
					self::$user_id.'/'.
					self::$key.'/'.
					self::$ssheet.'/'.
					(is_array($wsheet)?implode(',', $wsheet):$wsheet).'/1/'
				), 
				true
			);
			return $getSheet;
		}
	}


}
