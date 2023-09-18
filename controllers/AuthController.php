<?php

namespace app\controllers;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\User;

class AuthController extends Controller
{

    public function actionSignin()
    {
        $session = Yii::$app->session;

        $model = new User;
        if($model->load(Yii::$app->request->post()))
        { 
            $user = $model::find()->where(['login' => $model->login, 
                                          'email' => $model->email, 
                                          'password' => $model->password])->one();
                                          
            if (is_null($user))
            {
                return $this->render('signIn', ['model' => $model, 'error' => 'Пользователь не найден']);
            }

            $session['nickname'] = $user->nickname;
            $session['email'] = $user->email;
            $session['date'] = $user->date;
            Yii::$app->response->redirect(Url::to('/auth/home'));
        }
        else
        {
            return $this->render('signIn', ['model' => $model]);
        }
    }

    public function actionSignup()
    {
        $session = Yii::$app->session;
        if (isset($session['nickname']) && isset($session['email']) && isset($session['date']))
        {
            Yii::$app->response->redirect(Url::to('/auth/home'));
        }

        $model = new User;
        if($model->load(Yii::$app->request->post()))
        {
            $model->date = date("Y:m:d");
            $model->save();

            $session->open();
            $session['nickname'] = $model->nickname;
            $session['email'] = $model->email;
            $session['date'] = $model->date;

            Yii::$app->response->redirect(Url::to('/auth/home'));
        }
        else
        {
            return $this->render('signUp', ['model' => $model]);
        }
        
    }

    public function actionHome()
    {
        $session = Yii::$app->session;
        $user = User::find()->where(['nickname' => $session['nickname'], 
                                     'email' => $session['email'], 
                                     'date' => $session['date']])->one();

        return $this->render('homePage', ['nickname' => $user->nickname, 
                                          'email' =>  $user->email,
                                          'date' =>  $user->date,
                                          'role' => $user->role]);
    }

    public function actionQuit()
    {
        $session = Yii::$app->session;
        $session->destroy();
        Yii::$app->response->redirect(Url::to('/'));
    }

}