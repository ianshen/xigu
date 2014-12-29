<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;

class TopicController extends ActiveController {

	public $modelClass = 'app\modules\v1\models\Topic';

	public function actions() {
		$actions = parent::actions ();
		$actions ['index'] = [ 
			'class' => 'app\modules\v1\actions\topic\IndexAction',
			'modelClass' => $this->modelClass,
			'checkAccess' => [ 
				$this,
				'checkAccess' 
			] 
		];
		$actions ['view'] = [ 
			'class' => 'app\modules\v1\actions\topic\ViewAction',
			'modelClass' => $this->modelClass,
			'checkAccess' => [ 
				$this,
				'checkAccess' 
			] 
		];
		$actions ['create'] = [ 
			'class' => 'app\modules\v1\actions\topic\CreateAction',
			'modelClass' => $this->modelClass,
			'checkAccess' => [ 
				$this,
				'checkAccess' 
			] 
		];
		$actions ['update'] = [ 
			'class' => 'app\modules\v1\actions\topic\UpdateAction',
			'modelClass' => $this->modelClass,
			'checkAccess' => [ 
				$this,
				'checkAccess' 
			] 
		];
		$actions ['delete'] = [ 
			'class' => 'app\modules\v1\actions\topic\DeleteAction',
			'modelClass' => $this->modelClass,
			'checkAccess' => [ 
				$this,
				'checkAccess' 
			] 
		];
		return $actions;
	}

	public function verbs() {
		return [ 
			'index' => [ 
				'GET' 
			],
			'view' => [ 
				'GET' 
			],
			'create' => [ 
				'POST' 
			],
			'update' => [ 
				'POST',
				'PUT',
				'PATCH' 
			],
			'delete' => [ 
				'DELETE' 
			] 
		];
	}
}