<?php

namespace api\controllers;

use Yii;
use yii\rest\Controller;
use api\models\LoginForm;
use api\models\SignupForm;

class SiteController extends Controller
{

   public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return [
         'admin' => [ 'login' => 'Hossi', 'password' => 'noadmin' ],
         'url\'s' => [ 'front' => 'http://api.bdlab.com.ua', 'back' => 'http://api.bdlab.com.ua/admin', 'api' => 'http://api.bdlab.com.ua/api' ],
         'Обязательный заголовок' => 'Accept application/json',
         'Регистрация:' => ['Адрес:' => 'http://api.bdlab.com.ua/api/signup POST', 'Поля:' => 'username, password, email', 'Ответ:' => 'username, password, email или ошибка'],
         'Авторизация:' => ['Адрес:' => 'http://api.bdlab.com.ua/api/auth POST', 'Поля:' => 'username, password', 'Ответ:' => 'token, expired_at'],
         'Получить все товары:' => ['' => 'http://api.bdlab.com.ua/api/product GET', 'Поля:' => '', 'Ответ:' => 'товары'],
         'Получить один товар:' => ['Адрес:' => 'http://api.bdlab.com.ua/api/product/:id GET', 'Поля:' => '', 'Ответ:' => ''],
         'Обновить товар:' => ['Адрес:' => 'http://api.bdlab.com.ua/api/product/:id PUT, PATCH', 'Поля:' => '', 'Ответ:' => 'Обновлять и удалять можно только товары текущего полльзователя'],
         'Удалить товар:' => ['Адрес:' => 'http://api.bdlab.com.ua/api/product/:id DELETE ', 'Поля:' => '', 'Ответ:' => 'Обновлять и удалять можно только товары текущего полльзователя'],
         'Просмотр своего профиля:' => ['Адрес:' => 'http://api.bdlab.com.ua/api/profile GET', 'Поля:' => '', 'Ответ:' => ''],
         'Обновление профиля ' => ['Адрес:' => 'http://api.bdlab.com.ua/api/profile PUT, PATCH', 'Поля:' => '', 'Ответ:' => ''],
         'Удаление профиля:' => ['Адрес:' => 'http://api.bdlab.com.ua/api/profile DELETE', 'Поля:' => '', 'Ответ:' => ''],
        ];

    }
    public function actionLogin()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->bodyParams, '');
        if ($token = $model->auth()) {
            return [
                'token' => $token->token,
                'expired' => date(DATE_RFC3339, $token->expired_at),
            ];
        } else {
            return $model;
        }
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '')) {
            if ($user = $model->signup()) {
                return $model;
            } else {
              return $model;
            }
        } else {
          return ['0'=>'0'];
        }
    }

    protected function verbs()
    {
        return [
            'login' => ['post'],
            'signup' => ['post'],
        ];
    }
}
