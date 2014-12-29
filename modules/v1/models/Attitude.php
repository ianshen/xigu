<?php

namespace app\modules\v1\models;

use Yii;

class Attitude extends Base {

	public static function collectionName() {
		return 'attitude';
	}

	public static function addAttitude($title) {
		$id = self::genId ( self::collectionName () );
		if (empty ( $id )) {
			return false;
		}
		$res = self::collection ()->insert ( [ 
			'aid' => $id,
			'title' => $title 
		] );
		if (! $res) {
			return false;
		}
		return $id;
	}
}