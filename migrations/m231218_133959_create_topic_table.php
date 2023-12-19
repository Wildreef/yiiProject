<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%topic}}`.
 */
class m231218_133959_create_topic_table extends Migration

{

    /**
     * {@inheritdoc}
     */

    public function safeUp()

    {

        $this->createTable('{{%topic}}', [

            'id' => $this->primaryKey(),

            'name' => $this->string(),

        ]);

    }

    /**
     * {@inheritdoc}
     */

    public function safeDown()

    {

        $this->dropTable('{{%topic}}');

    }

}