<?php

namespace app\modules\v1\actions\topic;

use Yii;
use yii\rest\Action;
use app\modules\v1\models\Topic;

class DeleteAction extends Action {

	public function run($id) {
		$return = [ ];
		$condition ['tid'] = intval ( $id );
		$res = Topic::del ( $condition );
		if (! $res) {
			$return ['errno'] = 0;
			$return ['errmsg'] = 'failed or not found';
		} else {
			$return ['errno'] = 1;
			$return ['errmsg'] = 'succ';
		}
		return $return;
	}
}
