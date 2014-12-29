<?php

namespace app\modules\v1\actions\user;

use Yii;
use yii\rest\Action;
use app\modules\v1\models\User;

class UpdateAction extends Action {

	public function run($id) {
		$params = Yii::$app->getRequest ()->getBodyParams ();
		$condition ['uid'] = intval ( $id );
		$params ['utime'] = time ();
		$res = User::modUser ( $condition, $params );
		if (! $res) {
			$return ['errno'] = 0;
			$return ['errmsg'] = 'failed or not found or mobile already exist';
		} else {
			$return ['errno'] = 1;
			$return ['errmsg'] = 'succ';
		}
		return $return;
	}
}