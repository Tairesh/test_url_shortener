<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%links}}`.
 */
final class m240703_204634_CreateLinksTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%links}}', [
            'id' => $this->primaryKey(),
            'url' => $this->text(),
            'code' => $this->string(5)->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%links}}');
    }
}
