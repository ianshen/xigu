<?php

namespace app\models;

class Community extends Base {

	public static $_fields = [ 
		'id',
		'name', // 名称
		'district_id', // 所属街道
		'address', // 详细地址
		'desc',
		'create_time',
		'create_time',
		'status' 
	];

	public static function collectionName() {
		return self::$communityCN;
	}

	public static function addCommunity($data) {
		$res = self::insert ( $data );
		return $res;
	}

	public static function findCommunity($condition) {
		$res = self::findAll ( $condition );
		return $res;
	}

	public static function modCommunity($condition, $data) {
		$res = self::modify ( $condition, $data );
		return $res;
	}
}
