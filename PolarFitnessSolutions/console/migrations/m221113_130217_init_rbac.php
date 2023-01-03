<?php

use frontend\models\Client;
use frontend\models\Worker;
use yii\db\Migration;

/**
 * Class m221113_130217_init_rbac
 */
class m221113_130217_init_rbac extends Migration
{

    /**
     * Table name
     *
     * @var string
     */
    private $_user = "{{%user}}";

    private $_exercise = "{{%exercise}}";

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

        //Criação de utilizadores default na base de dados (admin, utilizador e funcionario)
        $password_hash = Yii::$app->getSecurity()->generatePasswordHash('12345678');
        $auth_key = Yii::$app->security->generateRandomString();
        $table = $this->_user;
        $table2 = $this->_exercise;
        $verification_token = Yii::$app->getSecurity()->generateRandomString();
        $now1 = time();
        $now2 = time();

        //admin
        Yii::$app->db->createCommand()->batchInsert($table,['username', 'password_hash','email', 'auth_key', 'verification_token','created_at', 'updated_at','status','street','zip_code','area','phone_number','nif','gender'],[['admin', '$password_hash',  'admin@email.com', '$auth_key','$verification_token', '$now1', '$now2', '10', 'Rua admin', '2222-222', 'Localidade teste','123123123', '321321321' , 'Outro'],['Pedro', '$password_hash',  'Pedro@email.com', '$auth_key','$verification_token', '$now1', '$now2','10', 'Rua cliente', '2222-222', 'Localidade teste','123123123', '321321321' , 'Outro'],['Joao', '$password_hash',  'Joao@email.com', '$auth_key','$verification_token', '$now1', '$now2', '10', 'Rua funcionario', '2222-222', 'Localidade teste','123123123', '321321321' , 'Masculino']])->execute();

        /*$sql1 = <<<SQL
        INSERT INTO {$table}
        (`username`, `password_hash`,`email`, `auth_key`, `verification_token`,`created_at`, `updated_at`,`status`,`street`,`zip_code`,`area`,`phone_number`,`nif`,`gender`)
        VALUES
        ('admin', '$password_hash',  'admin@email.com', '$auth_key','$verification_token', '$now1', '$now2', '10', 'Rua admin', '2222-222', 'Localidade teste','123123123', '321321321' , 'Outro'),
        ('Pedro', '$password_hash',  'Pedro@email.com', '$auth_key','$verification_token', '$now1', '$now2','10', 'Rua cliente', '2222-222', 'Localidade teste','123123123', '321321321' , 'Outro'),
        ('Joao', '$password_hash',  'Joao@email.com', '$auth_key','$verification_token', '$now1', '$now2', '10', 'Rua funcionario', '2222-222', 'Localidade teste','123123123', '321321321' , 'Masculino')
        SQL;*/

        //Exercises
        Yii::$app->db->createCommand()->batchInsert($table2,['exercise_name', 'max_rep', 'min_rep'],[['Supino Horizontal Com Barra', '10', '6'],['Supino Inclinado Com Barra', '10', '6'],['Supino Horizontal Com Halteres', '10', '6'],['Supino Inclinado Com Halteres', '10', '6'],['Agachamento Com Barra', '12', '6'],['Lunge Com Halteres', '12', '6'],['Peso Morto Com Barra', '12', '10'],['Leg Curl Sentado', '15', '12'],['Press Pernas 45 graus', '20', '12'],['Hip Thrust Com Barra', '20', '12'],['Flexões', '30', '5'],['Abdominais', '30', '5'],['Press De Ombros Com Barra', '10', '6'],['Press De Ombros Com Halteres', '10', '6'],['Dips De Tricep', '15', '5'],['Cross-over Alto', '10', '6'],['Extensão De Tricep Na Máquina', '10', '6'],['Elevações', '15', '2'],['Biceps Com Barra', '12', '6'],['Biceps Com Halteres', '12', '6'],['Biceps No Puxador Com Corda', '15', '12'],['Puxada ao peito (pega U)', '15', '12'],['Elevações laterais com halteres', '15', '12']])->execute();
        /*$sql2 = <<<SQL
        INSERT INTO {$table2}
        (`exercise_name`, `max_rep`, `min_rep`)
        VALUES
        ('Supino Horizontal Com Barra', '10', '6'),
        ('Supino Inclinado Com Barra', '10', '6'),
        ('Supino Horizontal Com Halteres', '10', '6'),

        ('Supino Inclinado Com Halteres', '10', '6'),

        ('Agachamento Com Barra', '12', '6'),

        ('Lunge Com Halteres', '12', '6'),

        ('Peso Morto Com Barra', '12', '10'),

        ('Leg Curl Sentado', '15', '12'),

        ('Press Pernas 45 graus', '20', '12'),

        ('Hip Thrust Com Barra', '20', '12'),

        ('Flexões', '30', '5'),

        ('Abdominais', '30', '5'),

        ('Press De Ombros Com Barra', '10', '6'),

        ('Press De Ombros Com Halteres', '10', '6'),

        ('Dips De Tricep', '15', '5'),

        ('Cross-over Alto', '10', '6'),

        ('Extensão De Tricep Na Máquina', '10', '6'),

        ('Elevações', '15', '2'),

        ('Biceps Com Barra', '12', '6'),

        ('Biceps Com Halteres', '12', '6'),

        ('Biceps No Puxador Com Corda', '15', '12'),

        ('Puxada ao peito (pega U)', '15', '12'),

        ('Elevações laterais com halteres', '15', '12')
        SQL;*/

//        Yii::$app->db->createCommand($sql1)->execute();
//        Yii::$app->db->createCommand($sql2)->execute();

        $client1 = new Client();
        $client1->client_id=2;
        $client1->save();
        $worker1 = new Worker();
        $worker1->worker_id=3;
        $worker1->save();

        //authManager
        $auth = Yii::$app->authManager;

        //rules
        $rule = new \console\rules\AdministradorRule;
        $auth->add($rule);

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
        $acederBackOffice->ruleName = $rule->name;
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
        $auth->assign($utilizador, 2);
        $auth->assign($funcionario, 3);





    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

}
