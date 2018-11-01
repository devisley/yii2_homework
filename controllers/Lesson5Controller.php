<?php

namespace app\controllers;

use app\models\User;
use yii\web\Controller;
use app\models\Person;
use app\models\Position;
use app\models\Author;
use app\models\Book;

class Lesson5Controller extends Controller
{
    public function actionIndex()
    {

        $data = Person::findOne(['id' => 1]);
        $data2 = Person::find()->where(['id' => 1])->limit(1)->asArray()->one();

        $dataAll1 = Person::findAll('1=1');
        $dataAll2 = Person::find()->asArray()->all();


        //Если запрос не нужно настраивать
        $position = Person::findOne(['id' => 1])->position;

        //Запрос с настройкой
        $position2 = Person::findOne(['id' => 1])->getPosition()->asArray()->one();
        //$position2 = Person::findOne(['id' => 1])->getPosition()->asArray()->all();

        //С обратной стороны
        $people = Position::findOne(['id' => '1'])->people;
        $people2 = Position::findOne(['id' => '1'])->getPeople()->asArray()->all();

        return $this->render('index', [
            'data' => $data,
            'data2' => $data2,
            'dataAll1' => $dataAll1,
            'dataAll2' => $dataAll2,
            'position' => $position,
            'position2' => $position2,
            'people' => $people,
            'people2' => $people2,
        ]);
    }

    public function actionInsert(){
        $model = new Person();
        $model->name = 'New user';
        $model->position_id = 1;
        $model->save();
    }

    public function actionUpdate(){
        $model = Person::findOne(['name' => 'New user']);
        //$model->name = 'New user';
        $model->position_id = 3;
        $model->save();
    }

    public function actionDelete(){
        //Person::deleteAll(['name' => 'New user']);
        $model = Person::findOne(['name' => 'New user']);
        $model->delete(); //Удаление 1 записи
    }

    public function actionMany()
    {
        $authorsIds = Book::findOne(['id' => 1])->bookAuthors;

        $authorsVia = Book::findOne(['id' => 1])->authors;
        $authorsViaArray = Book::findOne(['id' => 1])->getAuthors()->asArray()->all();

        $authorsViaTable = Book::findOne(['id' => 1])->authors2;
        $authorsViaArrayTable = Book::findOne(['id' => 1])->getAuthors2()->asArray()->all();
        $authorsViaArrayTableSql = Book::findOne(['id' => 1])->getAuthors2()->createCommand()->rawSql;

        $books = Author::findOne(['id' => 2])->getBooks()->asArray()->all();
        $books2 = Author::findOne(['id' => 2])->getBooks2()->asArray()->all();

        return $this->render('many', [
            'authorsIds' => $authorsIds,
            'authorsVia' => $authorsVia,
            'authorsViaArray' => $authorsViaArray,
            'authorsViaTable' => $authorsViaTable,
            'authorsViaArrayTable' => $authorsViaArrayTable,
            'authorsViaArrayTableSql' => $authorsViaArrayTableSql,
            'books' => $books,
            'books2' => $books2,
        ]);
    }

    public function actionAddUser()
    {
        $user = new User();
        $user->login = 'admin';
        $user->password = $user->getPasswordHash('1234');
        $user->name = 'Олег';

        if($user->save()){
            \Yii::info('Успешно');
        } else {

        }
    }
}