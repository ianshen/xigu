<?php

namespace app\controllers;

use Yii;

class RegionController extends BaseController {

	public function behaviors() {
	}

	public function actions() {
	}

	public function actionIndex() {
		return $this->render ( 'index' );
	}

	public function actionChildren() {
		if ($this->isAjax ()) {
			$id = intval ( $this->get ( 'id', 0 ) );
			$type = $this->get ( 't', 'city' );
			$locations = [ ];
			switch ($type) {
				case 'prov' : // 省下
					break;
				case 'city' : // 城市下
					break;
				case 'area' : // 地区下
					break;
				case 'dist' : // 街道下
					break;
				case 'comm' : // 圈子下
					break;
				default :
					break;
			}
			return $locations;
		}
	}
}
