<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class CommunityController extends Controller {

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
