<?php
namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = \Yii::$app->authManager;

        //Удаление всех ранее существующих правил
        $auth->removeAll();

        //Создаем 2 роли - admin и simple
        $admin = $auth->createRole('admin');
        $simple = $auth->createRole('simple');

        //Сохраняем данные в БД
        try {
            $auth->add($admin);
            $auth->add($simple);
        } catch (\Exception $exception)
        {
            echo 'Передан неправильный тип при создании роли'.PHP_EOL;
        }

        //Создание разрешений
        $viewAdminLkPage = $auth->createPermission('viewAdminLkPage');
        $viewAdminLkPage->description = 'Просмотр админ панели';

        $viewSimplePage = $auth->createPermission('viewSimplePage');
        $viewSimplePage->description = 'Просмотр обычной страницы';

        //Сохраним разрешения в БД
        $auth->add($viewAdminLkPage);
        $auth->add($viewSimplePage);

        //Работаем с правилами наследования
        $auth->addChild($simple, $viewSimplePage);

        $auth->addChild($admin, $simple); //admin может делать все то, что может редактор
        $auth->addChild($admin, $viewAdminLkPage); //И еще может работать в админ панели

        //Связываем пользователей с ролями
        //Если есть регистрация, это нужно делать каждый раз, когда добавляется пользователь
        $auth->assign($admin, 1);

        ExitCode::OK;
    }
}
