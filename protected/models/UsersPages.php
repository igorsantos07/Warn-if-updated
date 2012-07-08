<?php

/**
 * This is the model class for table "users_pages".
 *
 * The followings are the available columns in table 'users_pages':
 * @property integer $users_id
 * @property integer $pages_id
 */
class UsersPages extends CActiveRecord {
	public static function model($className=__CLASS__) { return parent::model($className); }

	public function tableName() { return 'users_pages'; }

	public function rules() {
		// NOTE: you should only define rules for those attributes that will receive user inputs.
		return array(
			array('users_id, pages_id', 'required'),
			array('users_id, pages_id', 'numerical', 'integerOnly'=>true),
			array('users_id, pages_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}
}