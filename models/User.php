<?php

namespace app\models;

class User extends Base {

	public static $_fields = [ 
		'id',
		'mobile',
		'email',
		'passwd',
		'name',
		'create_time',
		'update_time',
		'status' 
	];

	public static function collectionName() {
		return self::$userCN;
	}

	public static function addUser($data) {
		$res = self::insert ( $data );
		return $res;
	}

	public static function findUser($condition) {
		$res = self::findAll ( $condition );
		return $res;
	}

	public static function modUser($condition, $data) {
		$res = self::modify ( $condition, $data );
		return $res;
	}

	public static function register($data) {
		$res = self::addUser ( $data );
		return $res;
	}

	public static function login($data) {
	}

	public static function logout($data) {
	}
}
