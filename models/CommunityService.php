<?php

namespace app\models;

class CommunityService extends Base {

	public static $_fields = [ 
		'community_id',
		'service_id',
		'status' 
	];

	public static function collectionName() {
		return self::$communityServiceCN;
	}

	public static function addCommunityService($data) {
		$res = self::insert ( $data );
		return $res;
	}

	public static function findCommunityService($condition) {
		$res = self::findAll ( $condition );
		return $res;
	}

	public static function modCommunityService($condition, $data) {
		$res = self::modify ( $condition, $data );
		return $res;
	}
}
