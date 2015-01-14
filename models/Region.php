<?php

namespace app\models;

class Region extends Base {

	public static $_fields = [ 
		'id',
		'name',
		'code',
		'pid',
		'status' 
	];

	public static function addProvince($data) {
		$res = self::insert ( $data, self::$provinceCN );
		return $res;
	}

	public static function findProvince($condition) {
		$res = self::findAll ( $condition, self::$provinceCN );
		return $res;
	}

	public static function modProvince($condition, $data) {
		$res = self::modify ( $condition, $data, self::$provinceCN );
		return $res;
	}

	public static function addCity($data) {
		$res = self::insert ( $data, self::$cityCN );
		return $res;
	}

	public static function findCity($condition) {
		$res = self::findAll ( $condition, self::$cityCN );
		return $res;
	}

	public static function modCity($condition, $data) {
		$res = self::modify ( $condition, $data, self::$cityCN );
		return $res;
	}

	public static function addArea($data) {
		$res = self::insert ( $data, self::$areaCN );
		return $res;
	}

	public static function findArea($condition) {
		$res = self::findAll ( $condition, self::$areaCN );
		return $res;
	}

	public static function modArea($condition, $data) {
		$res = self::modify ( $condition, $data, self::$areaCN );
		return $res;
	}

	public static function addDistrict($data) {
		$res = self::insert ( $data, self::$districtCN );
		return $res;
	}

	public static function findDistrict($condition) {
		$res = self::findAll ( $condition, self::$districtCN );
		return $res;
	}

	public static function modDistrict($condition, $data) {
		$res = self::modify ( $condition, $data, self::$districtCN );
		return $res;
	}
}
