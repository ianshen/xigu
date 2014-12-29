<?php

namespace app\modules\v1\actions\user;

use Yii;
use yii\rest\Action;
use app\modules\v1\models\User;

class CreateAction extends Action {

	public function run() {
		$params = Yii::$app->getRequest ()->getBodyParams ();
		$res = User::reg ( $params );
		if (! $res) {
			$return ['errno'] = 0;
			$return ['errmsg'] = 'failed or user already exist';
		} else {
			$return = $res;
			$return ['errno'] = 1;
			$return ['errmsg'] = 'succ';
		}
		return $return;
	}
}