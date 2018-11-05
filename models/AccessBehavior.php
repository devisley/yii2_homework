<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 05.11.2018
 * Time: 15:52
 */

namespace app\models;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\web\User;

class AccessBehavior extends Behavior
{

    public function events()
    {
        return [
            User::EVENT_BEFORE_LOGOUT => 'updateLastAccess',
        ];
    }

    public function updateLastAccess()
    {
        $user = \app\models\User::findOne(Yii::$app->user->id);
        $user->last_access = time();
        var_dump($user);
        $user->save();
    }
}
