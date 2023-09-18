<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public function rules()
    {
       return [
                [['login', 'nickname', 'password', 'email'], 'safe'],
                [['login', 'nickname', 'password', 'email'], 'required', 'message'=>"Поле не должно быть пустым"],

                ['email', 'email', 'message'=>"Ввелите правильный email адресс"]
            ];
    }

}
