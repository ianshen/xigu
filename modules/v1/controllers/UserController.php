<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController {

	public $modelClass = 'app\modules\v1\models\User';

	public function actions() {
		$actions = parent::actions ();
		$actions ['index'] = [ 
			'class' => 'app\modules\v1\actions\user\IndexAction',
			'modelClass' => $this->modelClass,
			'checkAccess' => [ 
				$this,
				'checkAccess' 
			] 
		];
		$actions ['view'] = [ 
			'class' => 'app\modules\v1\actions\user\ViewAction',
			'modelClass' => $this->modelClass,
			'checkAccess' => [ 
				$this,
				'checkAccess' 
			] 
		];
		$actions ['create'] = [ 
			'class' => 'app\modules\v1\actions\user\CreateAction',
			'modelClass' => $this->modelClass,
			'checkAccess' => [ 
				$this,
				'checkAccess' 
			] 
		];
		$actions ['update'] = [ 
			'class' => 'app\modules\v1\actions\user\UpdateAction',
			'modelClass' => $this->modelClass,
			'checkAccess' => [ 
				$this,
				'checkAccess' 
			] 
		];
		$actions ['delete'] = [ 
			'class' => 'app\modules\v1\actions\user\DeleteAction',
			'modelClass' => $this->modelClass,
			'checkAccess' => [ 
				$this,
				'checkAccess' 
			] 
		];
		$actions ['login'] = [ 
			'class' => 'app\modules\v1\actions\user\LoginAction',
			'modelClass' => $this->modelClass,
			'checkAccess' => [ 
				$this,
				'checkAccess' 
			] 
		];
		$actions ['logout'] = [ 
			'class' => 'app\modules\v1\actions\user\LogoutAction',
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
				'PUT',
				'PATCH' 
			],
			'delete' => [ 
				'DELETE' 
			],
			'login' => [ 
				'POST' 
			],
			'logout' => [ 
				'POST' 
			] 
		];
	}
}