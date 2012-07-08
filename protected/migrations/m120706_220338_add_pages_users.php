<?php

class m120706_220338_add_pages_users extends CDbMigration {

	public function up() {
		$this->createTable('pages', array(
			'id' => 'INT UNSIGNED NOT NULL',
			'url' => 'VARCHAR(255) NOT NULL',
            'last_fetch' => 'TIMESTAMP NOT NULL DEFAULT 0',
            'last_md5' => 'CHAR(32)',
            'PRIMARY KEY (id)',
		), 'ENGINE = InnoDB');
        $this->createIndex('uq_pages_url', 'pages', 'url', true);

		$this->createTable('users', array(
			'id' => 'INT UNSIGNED NOT NULL',
			'name' => 'VARCHAR(50) NOT NULL',
            'email' => 'VARCHAR(50) NOT NULL',
            'username' => 'VARCHAR(25) NOT NULL',
            'password' => 'CHAR(40) NOT NULL',
            'PRIMARY KEY (id)',
		), 'ENGINE = InnoDB');
        $this->createIndex('uq_users_email', 'users', 'email', true);
        $this->createIndex('uq_users_username', 'users', 'username', true);

        $this->createTable('users_pages', array(
			'users_id' => 'INT UNSIGNED NOT NULL',
			'pages_id' => 'INT UNSIGNED NOT NULL',
            'PRIMARY KEY (users_id, pages_id)',
		), 'ENGINE = InnoDB');
        $this->createIndex('fk_users_pages_users', 'users_pages', 'users_id ASC');
        $this->createIndex('fk_users_pages_pages', 'users_pages', 'pages_id ASC');
        $this->createIndex('uq_users_pages', 'users_pages', array('users_id', 'pages_id'), true);
		$this->addForeignKey('fk_users_pages_pages', 'users_pages', 'pages_id', 'pages', 'id');
		$this->addForeignKey('fk_users_pages_users', 'users_pages', 'users_id', 'users', 'id');
	}


	public function down() {
		$this->dropTable('pages');
		$this->dropTable('users');
		$this->dropTable('users_pages');
	}
}