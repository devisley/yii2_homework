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

class AccessBehavior extends Behavior
{

    public function events()
    {
        return [
            \yii\web\User::EVENT_BEFORE_LOGOUT => 'updateLastAccess',
        ];
    }

    public function updateLastAccess()
    {
        $user = User::findOne(Yii::$app->user->id);
        $user->last_access = time();
        $user->save();
    }
}
