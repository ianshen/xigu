<?php

namespace app\models;

class Service extends Base {

	public static function collectionName() {
		return self::$serviceCN;
	}

	public static function addService($data) {
		$res = self::insert ( $data );
		return $res;
	}

	public static function findService($condition) {
		$res = self::findAll ( $condition );
		return $res;
	}
}
