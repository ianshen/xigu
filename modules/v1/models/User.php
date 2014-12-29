<?php

namespace app\modules\v1\models;

use Yii;

class User extends Base {

	public static $loggedCN = 'logged';

	public static function collectionName() {
		return 'user';
	}

	public function attributes() {
		/*
		 * return [ '_id', 'name', 'mobile', 'passwd', 'nickname', 'gender', 'birth', 'livein', 'salary', 'degree', 'height', 'portrait', 'status' ];
		 */
	}

	public static function reg($data) {
		// 检查手机号唯一性
		$mobile = $data ['mobile'];
		$user = self::findOne ( [ 
			'mobile' => $mobile 
		] );
		if ($user) {
			return false;
		}
		// 产生自增ID
		$uid = self::genId ( self::collectionName () );
		if (empty ( $uid )) {
			return false;
		}
		// 插入数据
		$res = self::collection ()->insert ( [ 
			'uid' => $uid,
			'name' => $data ['name'],
			'mobile' => $mobile,
			'passwd' => md5 ( $data ['passwd'] ),
			'nickname' => $data ['nickname'],
			'gender' => $data ['gender'],
			'birth' => $data ['birth'],
			'livein' => $data ['livein'],
			'salary' => $data ['salary'],
			'degree' => $data ['degree'],
			'height' => $data ['height'],
			'portrait' => $data ['portrait'],
			'ctime' => time (),
			'utime' => time (),
			'status' => 1 
		] );
		if (! $res) {
			return false;
		}
		$data ['uid'] = $uid;
		return $data;
	}

	public static function modUser($condition, $params) {
		$user = self::findOne ( [ 
			'mobile' => $params ['mobile'] 
		] );
		if ($user ['uid'] != $params ['uid']) {
			// 不是当前用户，手机号已被其他人占用
			return false;
		}
		return self::modify ( $condition, $params );
	}

	public static function login($params) {
		$mobile = $params ['mobile'];
		$passwd = $params ['passwd'];
		$condition = [ 
			'mobile' => $mobile 
		];
		// 判断是否已登录
		$login = self::findOne ( $condition, self::$loggedCN );
		if ($login) {
			return [ 
				'errno' => '0',
				'errmsg' => 'already login' 
			];
		}
		// 判断用户是否存在
		$user = self::findOne ( $condition );
		if (! $user) {
			return [ 
				'errno' => '0',
				'errmsg' => 'user not found' 
			];
		}
		if (md5 ( $passwd ) != $user ['passwd']) {
			return [ 
				'errno' => '0',
				'errmsg' => 'wrong passwd' 
			];
		}
		// 记录登录
		$res = self::collection ( self::$loggedCN )->insert ( [ 
			'uid' => $user ['uid'],
			'mobile' => $mobile,
			'ctime' => time () 
		] );
		if (! $res) {
			return [ 
				'errno' => '0',
				'errmsg' => 'logged failed' 
			];
		}
		return [ 
			'errno' => 1,
			'errmsg' => 'succ' 
		];
	}

	public static function isLogged($params) {
		$condition = [ 
			'uid' => intval ( $params ['uid'] ) 
		];
		$user = self::findOne ( $condition, self::$loggedCN );
		if (! $user) {
			return false;
		}
		return true;
	}

	public static function logout($params) {
		$condition = [ 
			'uid' => intval ( $params ['uid'] ) 
		];
		$res = self::del ( $condition, self::$loggedCN );
		if (! $res) {
			return false;
		}
		return true;
	}
}