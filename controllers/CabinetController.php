<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 05.11.2018
 * Time: 11:03
 */

namespace app\controllers;
use app\models\RegistryForm;
use app\models\User;
use yii\filters\AccessControl;

class CabinetController extends MyController
{
    public function actionIndex()
    {
        $model = new RegistryForm();

        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                $user = User::findOne(\Yii::$app->user->identity->id_user);
                $user->setAttributes($model->getAttributes());
                $user->password = $user->getPasswordHash($user->password);
                if ($user->save()) {
                    return $this->redirect('index');
                }
            }
        }

        return $this->render('index', ['model' => $model]);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['simple'],
                    ],
                ],
            ],
        ];
    }


}