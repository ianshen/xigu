<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller {

	public function isAjax() {
		return Yii::$app->getRequest ()->isAjax;
	}

	public function get($name, $defaultValue = null) {
		return Yii::$app->getRequest ()->get ( $name, $defaultValue );
	}

	public function post($name, $defaultValue = null) {
		return Yii::$app->getRequest ()->post ( $name, $defaultValue );
	}
}
