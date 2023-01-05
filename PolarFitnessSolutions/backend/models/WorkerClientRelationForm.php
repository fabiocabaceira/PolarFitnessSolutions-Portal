<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
/**
 * Signup forms
 */
class WorkerClientRelationForm extends Model
{
    public $Cliente;
    public $Funcionario;




    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }


        $relation = new WorkerClientRelation();
        $relation->client_id = $this->client_id;
        $relation->worker_id = $this->worker_id;
        $relation->save();

        return true;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
