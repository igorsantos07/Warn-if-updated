<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property string $url
 */
class Pages extends CActiveRecord {
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pages the static model class
	 */
	public static function model($className=__CLASS__) { return parent::model($className); }

	public function tableName() { return 'pages'; }

	public function rules() {
		// NOTE: you should only define rules for those attributes that will receive user inputs.
		return array(
			array('url', 'required'),
			array('id, url', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'url' => 'URL',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('url',$this->url,true);
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
}