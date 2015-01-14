<?php

namespace app\models;

class Service extends Base {

	public static $_fields = [ 
		'id',
		'ename', // 拼音名称,登录用
		'category_id', // 服务类型
		'name', // 服务(小店)名称
		'passwd',
		'mobile', // 联系电话,可用作登录
		'contact', // 联系人
		'address', // 详细地址
		'desc',
		'create_time',
		'update_time',
		'status' 
	];

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

	public static function modService($condition, $data) {
		$res = self::modify ( $condition, $data );
		return $res;
	}
}
