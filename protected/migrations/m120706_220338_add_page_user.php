<?php

class m120706_220338_add_page_user extends CDbMigration {

	public function up() {
		$engine = PRODUCTION? 'ENGINE = InnoDB' : '';
		$pk_type = PRODUCTION? 'INTEGER UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT' : 'INTEGER PRIMARY KEY AUTOINCREMENT';

		$this->createTable('page', array(
			'id' => $pk_type,
			'url' => 'VARCHAR(255) NOT NULL',
            'last_fetch' => 'TIMESTAMP NOT NULL DEFAULT 0',
            'last_md5' => 'CHAR(32)',
		), $engine);
        $this->createIndex('uq_page_url', 'page', 'url', true);

		$this->createTable('user', array(
			'id' => $pk_type,
			'name' => 'VARCHAR(50) NOT NULL',
            'email' => 'VARCHAR(50) NOT NULL',
            'username' => 'VARCHAR(25) NOT NULL',
            'password' => 'CHAR(40) NOT NULL',
		), $engine);
        $this->createIndex('uq_user_email', 'user', 'email', true);
        $this->createIndex('uq_user_username', 'user', 'username', true);

        $this->createTable('user_page', array(
			'user_id' => 'INT UNSIGNED NOT NULL',
			'page_id' => 'INT UNSIGNED NOT NULL',
            'PRIMARY KEY (user_id, page_id)',
		), $engine);
        $this->createIndex('uq_user_page', 'user_page', 'user_id, page_id', true);
		if (PRODUCTION) {
			$this->addForeignKey('fk_user_page_page', 'user_page', 'page_id', 'page', 'id');
			$this->addForeignKey('fk_user_page_user', 'user_page', 'user_id', 'user', 'id');
		}
	}


	public function down() {
		$this->dropTable('user_page');
		$this->dropTable('page');
		$this->dropTable('user');
	}
}