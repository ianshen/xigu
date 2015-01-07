<?php

namespace app\modules\v1\actions\user;

use Yii;
use yii\rest\Action;

class CreateAction extends Action {

	public function run() {
		$params = Yii::$app->getRequest ()->getBodyParams ();
		// 验证数据
		
		return $return;
	}
}