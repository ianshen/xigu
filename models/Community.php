<?php

namespace app\models;

class Community extends Base {

	public static function collectionName() {
		return self::$communityCN;
	}

	public static function addCommunity($data) {
		// (`id`, `name`, `code`, `pid`, `status`)
	}

	public static function findCommunity() {
	}
}
