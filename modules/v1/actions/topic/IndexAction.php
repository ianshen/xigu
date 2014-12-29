<?php

namespace app\modules\v1\actions\topic;

use yii\rest\Action;
use app\modules\v1\models\Topic;

class IndexAction extends Action {

	public function run() {
		$result = Topic::findAll ();
		if (! $result) {
			$return ['errno'] = 0;
			$return ['errmsg'] = 'failed or not found';
			return $return;
		}
		foreach ( $result as &$item ) {
			unset ( $item ['_id'] );
		}
		$return ['errno'] = 1;
		$return ['errmsg'] = 'succ';
		$return ['list'] = $result;
		return $return;
	}
}