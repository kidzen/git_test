<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%user}}', [
			'id' => $this->primaryKey(),
			'username' => $this->string()->notNull()->unique(),
			'auth_key' => $this->string(32)->notNull(),
			'password_hash' => $this->string()->notNull(),
			'password_reset_token' => $this->string()->unique(),
			'email' => $this->string()->notNull()->unique(),

			'status' => $this->smallInteger()->notNull()->defaultValue(0),
			'deleted' => $this->smallInteger()->notNull()->defaultValue(0),
			'created_at' => $this->timestamp()->notNull(),
			'updated_at' => $this->timestamp()->notNull(),
			'deleted_at' => $this->timestamp(),
			], $tableOptions);

		$this->createTable('{{%person}}', [
			'id' => $this->primaryKey(),
			'type' => $this->integer(),
			'name' => $this->string()->notNull(),
			'ic_no' => $this->string()->notNull()->unique(),
			'email' => $this->string()->notNull()->unique(),
			'address' => $this->string(),
			'phone_no' => $this->string(),
			'spm' => $this->string(),

			'status' => $this->smallInteger()->notNull()->defaultValue(0),
			'deleted' => $this->smallInteger()->notNull()->defaultValue(0),
			'created_at' => $this->timestamp()->notNull(),
			'updated_at' => $this->timestamp()->notNull(),
			'deleted_at' => $this->timestamp(),
			], $tableOptions);
		
		$this->createTable('{{%relation}}', [
			'id' => $this->primaryKey(),
			'student_id' => $this->integer(),
			'parent_id' => $this->integer(),
			'relation' => $this->string(),
			
			'status' => $this->smallInteger()->notNull()->defaultValue(0),
			'deleted' => $this->smallInteger()->notNull()->defaultValue(0),
			'created_at' => $this->timestamp()->notNull(),
			'updated_at' => $this->timestamp()->notNull(),
			'deleted_at' => $this->timestamp(),
			], $tableOptions);

	}

	public function down()
	{
		$this->dropTable('{{%user}}');
		$this->dropTable('{{%person}}');
		$this->dropTable('{{%relation}}');
	}
}
