<?php

use yii\db\Migration;
use yii\db\sqlite\Schema;

/**
 * Class m190517_134701_persona
 */
class m190517_134701_persona extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable("persona",[
            'idPersona' => $this->primaryKey(),
            'nombrePersona' => $this->string(30)->notNull(),
            'apellidoPPersona' => $this->string(30)->notNull(),
            'apellidoMPersona' => $this->string(30)->notNull(),
            'estadoPersona' => $this->boolean()->defaultValue(1),
            'userId' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-persona.user_id',
            'persona',
            'userId',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190517_134701_persona cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190517_134701_persona cannot be reverted.\n";

        return false;
    }
    */
}
