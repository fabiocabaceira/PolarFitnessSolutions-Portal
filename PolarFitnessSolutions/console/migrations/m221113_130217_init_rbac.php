<?php

use yii\db\Migration;

/**
 * Class m221113_130217_init_rbac
 */
class m221113_130217_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221113_130217_init_rbac cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth = Yii::$app->authManager;

        //roles
        //add "utilizador" role
        $utilizador = $auth->createRole('utilizador');
        $auth->add($utilizador);
        //add "funcionario" role
        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        //add "administrador" role
        $administrador = $auth->createRole('administrador');
        $auth->add($administrador);

    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

}
