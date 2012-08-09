<?php

class m120809_052804_change_timestamp_to_integer extends CDbMigration {

	public function up() {
		$this->alterColumn('page', 'last_fetch', 'BIGINT NOT NULL DEFAULT 0');
	}

	public function down() {
		$this->alterColumn('page', 'last_fetch', "TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00");
	}
}