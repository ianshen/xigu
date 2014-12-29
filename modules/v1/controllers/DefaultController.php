<?php

namespace app\modules\v1\controllers;

use yii\web\Controller;

class DefaultController extends Controller {

	public function actionIndex() {
		exit ();
		return $this->render ( 'index' );
	}
}
