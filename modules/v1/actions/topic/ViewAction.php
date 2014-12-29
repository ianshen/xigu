<?php

namespace app\modules\v1\actions\topic;

use yii\rest\Action;
use app\modules\v1\models\Topic;

class ViewAction extends Action {

	public function run($id) {
		$condition ['tid'] = intval ( $id );
		$topic = Topic::findOne ( $condition );
		if (! $topic) {
			$return ['errno'] = 0;
			$return ['errmsg'] = 'not found';
			return $return;
		}
		unset ( $topic ['_id'] );
		$return = $topic;
		$return ['errno'] = 1;
		$return ['errmsg'] = 'succ';
		return $return;
	}
}