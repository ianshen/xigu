<?php

namespace app\controllers;

use Yii;

class CommunityController extends BaseController {

	public function behaviors() {
	}

	public function actions() {
	}

	public function actionIndex() {
		return $this->render ( 'index' );
	}

	public function actionSay() {
		echo 'hello';
	}
}
