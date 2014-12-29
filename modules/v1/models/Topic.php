<?php

namespace app\modules\v1\models;

use Yii;

class Topic extends Base {

	public static function collectionName() {
		return 'topic';
	}

	public static function addTopic($params) {
		$attitudes = [ ];
		foreach ( $params ['att_titles'] as $title ) {
			$attitudes [] = Attitude::addAttitude ( $title );
		}
		$id = self::genId ( self::collectionName () );
		if (empty ( $id )) {
			return false;
		}
		$res = self::collection ()->insert ( [ 
			'tid' => $id,
			'title' => $params ['name'],
			'media_type' => $params ['media_type'],
			'text' => $params ['text'],
			'image' => $params ['image'],
			'audio' => $params ['audio'],
			'video' => $params ['video'],
			'content' => $params ['content'],
			'attitudes' => $attitudes,
			'ctime' => time (),
			'utime' => time (),
			'expire_time' => $params ['expire_time'],
			'status' => 1 
		] );
		if (! $res) {
			return false;
		}
		return $params;
	}
}