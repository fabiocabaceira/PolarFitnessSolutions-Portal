<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace frontend\modules\api\models;

use frontend\modules\api\resources\UserResource;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends \common\models\LoginForm
{
    private $_user;

    //todo make comment (IMPORTANT!)
    public function getUserApi(): ?UserResource
    {
        if ($this->_user === null) {
            $this->_user = UserResource::findByUsername($this->username);
        }

        return $this->_user;
    }
}
