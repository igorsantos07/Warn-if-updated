<?php

class m120706_220338_add_page_user extends CDbMigration {

	public function up() {
		$this->createTable('page', array(
			'id' => 'INTEGER UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT',
			'url' => 'VARCHAR(255) NOT NULL',
            'last_fetch' => 'TIMESTAMP NOT NULL DEFAULT 0',
            'last_md5' => 'CHAR(32)',
		), 'ENGINE = InnoDB');
        $this->createIndex('uq_page_url', 'page', 'url', true);

		$this->createTable('user', array(
			'id' => 'INTEGER UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT',
			'name' => 'VARCHAR(50) NOT NULL',
            'email' => 'VARCHAR(50) NOT NULL',
            'username' => 'VARCHAR(25) NOT NULL',
            'password' => 'CHAR(40) NOT NULL',
		), 'ENGINE = InnoDB');
        $this->createIndex('uq_user_email', 'user', 'email', true);
        $this->createIndex('uq_user_username', 'user', 'username', true);

        $this->createTable('user_page', array(
			'user_id' => 'INT UNSIGNED NOT NULL',
			'page_id' => 'INT UNSIGNED NOT NULL',
            'PRIMARY KEY (user_id, page_id)',
		), 'ENGINE = InnoDB');
        $this->createIndex('uq_user_page', 'user_page', 'user_id, page_id', true);
		$this->addForeignKey('fk_user_page_page', 'user_page', 'page_id', 'page', 'id');
		$this->addForeignKey('fk_user_page_user', 'user_page', 'user_id', 'user', 'id');
	}


	public function down() {
		$this->dropTable('user_page');
		$this->dropTable('page');
		$this->dropTable('user');
	}
}