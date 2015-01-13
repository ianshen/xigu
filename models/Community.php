<?php

namespace app\models;

class Community extends Base {

	public static $_fields = [ 
		'id',
		'name' 
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
}
