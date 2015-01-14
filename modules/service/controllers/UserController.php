<?php

namespace app\modules\service\controllers;

use yii\web\Controller;

class UserController extends Controller {

	public function actionLogin() {
		return $this->render ( 'index' );
	}

	public function actionLogout() {
		return $this->render ( 'index' );
	}

	public function actionRegist() {
		return $this->render ( 'index' );
	}
}
