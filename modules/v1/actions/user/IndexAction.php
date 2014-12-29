<?php

namespace app\modules\v1\actions\user;

use yii\rest\Action;
use app\modules\v1\models\User;

class IndexAction extends Action {

	public function run() {
		$result = User::findAll ();
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