<?php

namespace app\modules\v1\actions\user;

use yii\rest\Action;
use app\modules\v1\models\User;

class ViewAction extends Action {

	public function run($id) {
		$condition ['uid'] = intval ( $id );
		$user = User::findOne ( $condition );
		if (! $user) {
			$return ['errno'] = 0;
			$return ['errmsg'] = 'not found';
			return $return;
		}
		unset ( $user ['_id'] );
		$return = $user;
		$return ['errno'] = 1;
		$return ['errmsg'] = 'succ';
		return $return;
	}
}