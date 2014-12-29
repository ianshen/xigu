<?php

namespace app\modules\v1\actions\topic;

use Yii;
use yii\rest\Action;
use app\modules\v1\models\Topic;

class CreateAction extends Action {

	public function run() {
		$params = Yii::$app->getRequest ()->getBodyParams ();
		$res = Topic::addTopic ( $params );
		if (! $res) {
			$return ['errno'] = 0;
			$return ['errmsg'] = 'failed';
		} else {
			$return = $res;
			$return ['errno'] = 1;
			$return ['errmsg'] = 'succ';
		}
		return $return;
	}
}