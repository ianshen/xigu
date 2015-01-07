<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\mongodb\Query;

class Base extends Model {

	public static $collection = null;

	public static $query = null;

	/**
	 * 城市
	 *
	 * @var unknown
	 */
	public static $cityCN = 'city';

	/**
	 * 地区
	 *
	 * @var unknown
	 */
	public static $areaCN = 'area';

	/**
	 * 街道
	 *
	 * @var unknown
	 */
	public static $districtCN = 'district';

	/**
	 * 圈子
	 *
	 * @var unknown
	 */
	public static $communityCN = 'community';

	/**
	 * 自增ID集合
	 *
	 * @var unknown
	 */
	public static $genIdCN = 'ids';

	public static function collectionName() {
		return '';
	}

	public static function query() {
		self::$query = new Query ();
		return self::$query;
	}

	public static function collection($collectionName = null) {
		$collectionName = $collectionName ? $collectionName : self::collectionName ();
		self::$collection = Yii::$app->mongodb->getCollection ( $collectionName );
		return self::$collection;
	}

	/**
	 * mongodb产生自增ID
	 * http://www.sharejs.com/codes/php/7145
	 *
	 * @param unknown $collectionName
	 *        	表示为哪个集合产生自增ID
	 * @return boolean
	 */
	public static function genId($collectionName) {
		$newId = false;
		$update ['$inc'] ['id'] = 1;
		$query ['name'] = $collectionName;
		$options ['new'] = true;
		$options ['upsert'] = true;
		$data = self::collection ( self::$genIdCN )->findandmodify ( $query, $update, [ ], $options );
		$newId = $data ['id'];
		return $newId;
	}

	public static function findAll($condition = [], $collectionName = null) {
		$users = [ ];
		$collectionName = $collectionName ? $collectionName : self::collectionName ();
		$all = self::query ()->from ( $collectionName )->where ( $condition )->all ();
		return $all;
	}

	public static function findOne($condition = [], $collectionName = null) {
		$one = [ ];
		$one = self::findAll ( $condition, $collectionName );
		if (! $one || ! is_array ( $one )) {
			return false;
		}
		return $one [0];
	}

	public static function insert($data, $collectionName = null) {
		$res = self::collection ( $collectionName )->insert ( $data );
		if (! $res) {
			return false;
		}
		return true;
	}

	public static function modify($condition = [], $params = [], $collectionName = null) {
		$res = self::collection ( $collectionName )->update ( $condition, $params );
		if (! $res) {
			return false;
		}
		return true;
	}

	public static function del($condition = [], $collectionName = null) {
		$res = self::collection ( $collectionName )->remove ( $condition );
		if (! $res) {
			return false;
		}
		return true;
	}
}