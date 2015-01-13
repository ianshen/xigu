<?php
$params = require (__DIR__ . '/params.php');

$config = [ 
	'id' => 'basic',
	'basePath' => dirname ( __DIR__ ),
	'bootstrap' => [ 
		'log' 
	],
	'modules' => [ 
		'v1' => [ 
			'class' => 'app\modules\v1\v1' 
		],
		'copartner' => [ 
			'class' => 'app\modules\copartner' 
		],
		'service' => [ 
			'class' => 'app\modules\service\service' 
		] 
	],
	'aliases' => [ 
		'@mongodb' => '@vendor/yiisoft/yii2-mongodb',
		'@redis' => '@vendor/yiisoft/yii2-redis' 
	],
	'components' => [ 
		'mongodb' => [ 
			'class' => '\yii\mongodb\Connection',
			'dsn' => 'mongodb://ianshen:4sQY61k1dmJb@10.10.21.200:27017/shanshan' 
		],
		'urlManager' => [ 
			'enablePrettyUrl' => true,
			'enableStrictParsing' => false,
			'showScriptName' => false,
			'rules' => [ 
				[ 
					'class' => 'yii\rest\UrlRule',
					'controller' => [ 
						'v1/user' 
					] 
				] 
			] 
		],
		'request' => [ 
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'enableCookieValidation' => false,
			'cookieValidationKey' => '' 
		],
		'cache' => [ 
			'class' => 'yii\caching\FileCache' 
		],
		'user' => [ 
			'identityClass' => 'app\models\User',
			'enableAutoLogin' => true 
		],
		'errorHandler' => [ 
			'errorAction' => 'site/error' 
		],
		'mailer' => [ 
			'class' => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure a transport
			// for the mailer to send real emails.
			'useFileTransport' => true 
		],
		'log' => [ 
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [ 
				[ 
					'class' => 'yii\log\FileTarget',
					'levels' => [ 
						'error',
						'warning' 
					] 
				] 
			] 
		],
		'db' => require (__DIR__ . '/db.php') 
	],
	'params' => $params 
];

if (YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config ['bootstrap'] [] = 'debug';
	$config ['modules'] ['debug'] = 'yii\debug\Module';
	
	$config ['bootstrap'] [] = 'gii';
	$config ['modules'] ['gii'] = 'yii\gii\Module';
}

return $config;
