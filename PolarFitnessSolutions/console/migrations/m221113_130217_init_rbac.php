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

        $verFuncionario = $auth->createPermission('verFuncionario');
        $verFuncionario->description = 'Ver Funcionarios';
        $auth->add($verFuncionario);

        $criarFuncionario = $auth->createPermission('criarFuncionario');
        $criarFuncionario->description = 'Criar Funcionarios';
        $auth->add($criarFuncionario);

        $editarFuncionario = $auth->createPermission('editarFuncionario');
        $editarFuncionario->description = 'Editar Funcionarios';
        $auth->add($editarFuncionario);

        $apagarFuncionario = $auth->createPermission('apagarFuncionario');
        $apagarFuncionario->description = 'Apagar Funcionarios';
        $auth->add($apagarFuncionario);

        $criarConta = $auth->createPermission('criarConta');
        $criarConta->description = 'criar conta no ginásio';
        $auth->add($criarConta);

        $editarDetalhesConta = $auth->createPermission('editarDetalhesConta');
        $editarDetalhesConta->description = 'Editar Detalhes da conta';
        $auth->add($editarDetalhesConta);

        $gerirUtilizadores = $auth->createPermission('gerirUtilizadores');
        $gerirUtilizadores->description = 'Gerir utilizadores';
        $auth->add($gerirUtilizadores);

        $increverNoGinasio = $auth->createPermission('inscreverNoGinasio');
        $increverNoGinasio->description = 'Inscrever No Ginasio';
        $auth->add($increverNoGinasio);

        $trocarMensagens = $auth->createPermission('trocarMensagens');
        $trocarMensagens->description = 'trocar mensagens';
        $auth->add($trocarMensagens);

        $criarPlanosTreino = $auth->createPermission('criarPlanoTreino');
        $criarPlanosTreino->description = 'Criar Planos de treino';
        $auth->add($criarPlanosTreino);

        $atribuirPlanosTreino = $auth->createPermission('atribuirPlanoTreino');
        $atribuirPlanosTreino->description = 'Atribuir Planos de treino a utilizadores';
        $auth->add($atribuirPlanosTreino);


        $acederCalendarioAvaliacoes = $auth->createPermission('acederCalendarioAvaliacoes');
        $acederCalendarioAvaliacoes->description = 'Aceder ao Calendario de avaliacoes';
        $auth->add($acederCalendarioAvaliacoes);

        $acederBackOffice =$auth->createPermission('acederBackOffice');
        $acederBackOffice->description = 'Aceder ao Back-Office';
        $auth->add($acederBackOffice);


        //Criação de Roles

        //Utilizador
        $utilizador = $auth->createRole('utilizador');
        $auth->add($utilizador);
        $auth->addChild($utilizador, $editarDetalhesConta);
        $auth->addChild($utilizador, $acederCalendarioAvaliacoes);
        $auth->addChild($utilizador, $criarConta);
        $auth->addChild($utilizador, $trocarMensagens);
        $auth->addChild($utilizador, $criarPlanosTreino);


        //Funcionário
        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $gerirUtilizadores);


        //Administrador
        $administrador = $auth->createRole('administrador');
        $auth->add($administrador);
        $auth->addChild($administrador,$acederBackOffice);

        //Assign de roles
        $auth->assign($administrador, 1);
        $auth->assign($funcionario, 3);


    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

}
