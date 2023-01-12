<?php

namespace backend\modules\api\models;

use backend\modules\api\resources\UserResource;
use common\models\User;

class LoginForm extends \common\models\LoginForm
{

    private $_user;

    public function getUser()
    {

        if ($this->_user === null) {
            $this->_user = UserResource::findByUsername($this->username);
        }

        return $this->_user;
    }
}