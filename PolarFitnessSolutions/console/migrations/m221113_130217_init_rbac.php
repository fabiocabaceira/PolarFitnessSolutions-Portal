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

        // Criação de permissions

        // add "criarassets" permission
        $createAsset = $auth->createPermission('createAsset');
        $createAsset->description = 'Create Asset';
        $auth->add($createAsset);

        //Permission to view all dashboards
        $viewDashboards = $auth->createPermission('viewDashboards');
        $viewDashboards->description = 'View Dashboards';
        $auth->add($viewDashboards);

        //Utilizador
        $utilizador = $auth->createRole('utilizador');
        $auth->add($utilizador);
        $auth->addChild($utilizador, $createAsset);

        //Funcionário
        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $createAsset);

        //Administrador
        $administrador = $auth->createRole('administrador');
        $auth->add($administrador);
        $auth->addChild($administrador, $viewDashboards);

        //Assign de roles
        $auth->assign($administrador, 1);
        $auth->assign($funcionario, 4);
        $auth->assign($utilizador, 5);

    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

}
