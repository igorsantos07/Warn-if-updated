<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $id
 * @property string $url
 * @property integer $last_fetch
 * @property string last_md5
 */
class Page extends CActiveRecord {

	public $url = 'http://';
	public $last_fetch = 0;

	/**
	 * Returns the static model of the specified AR class.
	 * @return page the static model class
	 */
	public static function model($className=__CLASS__) { return parent::model($className); }

	public function tableName() { return 'page'; }

	public function rules() {
		// NOTE: you should only define rules for those attributes that will receive user inputs.
		return array(
			array('url', 'required'),
			array('url', 'url'),
			array('last_fetch', 'numerical', 'allowEmpty' => true, 'integerOnly' => true),
			array('last_md5', 'length', 'min' => 32, 'max' => 32, 'allowEmpty' => true),
		);
	}

	public function relations() {
		return array(
			'users' => array(self::MANY_MANY, 'User', 'user_page(page_id, user_id)'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'url' => 'URL',
		);
	}
}