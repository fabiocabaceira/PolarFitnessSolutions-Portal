<?php
namespace console\rules;

use yii\rbac\Rule;
use common\models\user;

class AdministradorRule extends \yii\rbac\Rule
{
    public $name = 'acederBackOffice';

    public function execute($user, $item, $params)
    {
        return isset($params['user']) ? $user->id == 1 : false;
    }
}