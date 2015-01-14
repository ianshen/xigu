<?php

namespace app\controllers;

use Yii;

class ServiceController extends BaseController {

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
