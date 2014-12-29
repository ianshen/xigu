<?php

namespace app\modules\v1\actions\user;

use Yii;
use yii\rest\Action;
use app\modules\v1\models\User;

class LogoutAction extends Action {

	public function run() {
		$params = Yii::$app->getRequest ()->getBodyParams ();
		$res = User::logout ( $params );
		if (! $res) {
			$return ['errno'] = 0;
			$return ['errmsg'] = 'failed';
		} else {
			$return ['errno'] = 1;
			$return ['errmsg'] = 'succ';
		}
		return $return;
	}
}