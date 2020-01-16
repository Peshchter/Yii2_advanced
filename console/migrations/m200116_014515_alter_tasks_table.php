<?php

use yii\db\Migration;

/**
 * Class m200116_014515_alter_tasks_table
 */
class m200116_014515_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tasks}}', 'description', $this->text());
        $this->addColumn('{{%tasks}}', 'worker_id', $this->integer());
        $this->addColumn('{{%tasks}}', 'status', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tasks}}', 'description');
        $this->dropColumn('{{%tasks}}', 'worker_id');
        $this->dropColumn('{{%tasks}}', 'status');
    }
}
