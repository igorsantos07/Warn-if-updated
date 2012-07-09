<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string $password
 */
class User extends CActiveRecord {
	/**
	 * Returns the static model of the specified AR class.
	 * @return user the static model class
	 */
	public static function model($className=__CLASS__) { return parent::model($className); }

	public function tableName() { return 'user'; }

	public function rules() {
		// NOTE: you should only define rules for those attributes that will receive user inputs.
		return array(
			array('name, email, username, password', 'required'),
			array('name, email', 'length', 'max'=>50),
			array('username', 'length', 'max'=>25),
			array('password', 'length', 'max'=>40),
			array('id, name, email, username, password', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'page' => array(self::MANY_MANY, 'Page', 'user_page(user_id, page_id)'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'email' => 'Email',
			'username' => 'Username',
			'password' => 'Password',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
}