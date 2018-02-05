<?php

use yii\db\Migration;

/**
 * Class m180205_111938_posts
 */
class m180205_111938_posts extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
		 return $this->createTable('posts', array(
			'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
			'title' => 'VARCHAR(255)',
			'data' => 'TEXT',
            'comment' => 'VARCHAR(255)',
			'create_time' => 'INT',
			'update_time' => 'INT'
		));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180205_111938_posts cannot be reverted.\n";
	
		return $this->dropTable('posts');
		
        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180205_111938_posts cannot be reverted.\n";

        return false;
    }
    */
}
