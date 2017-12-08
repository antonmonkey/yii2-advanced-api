<?php

use yii\db\Migration;

/**
 * Class m171202_130017_add_column_to_table_user
 */
class m171202_130017_add_column_to_table_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'isAdmin', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->downColumn('user', 'isAdmin', $this->integer());
    }

}
