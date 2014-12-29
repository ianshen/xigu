<?php

namespace app\modules\v1\actions\user;

use Yii;
use yii\rest\Action;
use app\modules\v1\models\User;

class LoginAction extends Action {

	public function run() {
		$params = Yii::$app->getRequest ()->getBodyParams ();
		$return = User::login ( $params );
		return $return;
	}
}