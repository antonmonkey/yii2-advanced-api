<?php

use yii\db\Migration;

/**
 * Class m171204_101709_change_table_product
 */
class m171204_101709_change_table_product extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropColumn('product', 'date');
        $this->addColumn('product', 'date', $this->integer());
        $this->addColumn('product', 'user_id', $this->integer()->notNull());

        $this->createIndex('idx-product-user_id', 'product', 'user_id');

        $this->addForeignKey('fk-product-user_id', '{{%product}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171204_101709_change_table_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171204_101709_change_table_product cannot be reverted.\n";

        return false;
    }
    */
}
