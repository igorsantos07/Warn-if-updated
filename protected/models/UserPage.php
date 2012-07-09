<?php

/**
 * This is the model class for table "user_page".
 *
 * The followings are the available columns in table 'user_page':
 * @property integer $user_id
 * @property integer $page_id
 */
class UserPage extends CActiveRecord {
	public static function model($className=__CLASS__) { return parent::model($className); }

	public function tableName() { return 'user_page'; }

	public function rules() {
		// NOTE: you should only define rules for those attributes that will receive user inputs.
		return array(
			array('user_id, page_id', 'required'),
			array('user_id, page_id', 'numerical', 'integerOnly'=>true),
			array('user_id, page_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'users' => array(self::BELONGS_TO, 'User', 'user_id'),
			'pages' => array(self::BELONGS_TO, 'Page', 'page_id'),
		);
	}
}