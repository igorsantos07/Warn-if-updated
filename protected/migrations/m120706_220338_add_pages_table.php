<?php

class m120706_220338_add_pages_table extends CDbMigration {

	public function up() {
		$this->createTable('pages', array(
			'id INTEGER NOT NULL PRIMARY KEY',
			'url VARCHAR NOT NULL UNIQUE',
		));
	}

	public function down() {
		$this->dropTable('pages');
	}
}