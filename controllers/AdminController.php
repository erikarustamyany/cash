<?php

namespace app\controllers;

use PHPUnit\Framework\Constraint\Count;
use Yii;
use yii\base\Model;
use yii\db\Exception;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Images;
use app\models\Products;
use app\models\UploadForm;
use conquer\select2\Select2Widget;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;



class AdminController extends CentController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $params = Yii::$app->request->getQueryParams();

        return $this->render('/admin/accept-users', ['model' => 'admin']);
    }

    public function actionUsers()
    {
        $params = Yii::$app->request->getQueryParams();
        $users_validation = (new Query())->select(['u.*', 'r.name as region', 'p.title as city'])->from('users_validation as u')->join('INNER JOIN', 'regions as r', 'r.id = u.region_id')->join('INNER JOIN', 'places as p', 'p.id = u.city_id')->where('status = 0')->orderBy('u.date_registered DESC')->all();

        return $this->render('/admin/accept-users', ['model' => 'admin', 'users_valid' => $users_validation]);
    }

    public function actionItems()
    {
        $params = Yii::$app->request->getQueryParams();

        return $this->render('/admin/accept-items', ['model' => 'admin']);
    }

    public function actionAcceptUser()
    {
        if (Yii::$app->request->isPost) {

            $_user = (new Query())->select(['*'])->from('users_validation as u')->where('u.id = ' . $_POST['id'])->one();

            $products_specifications = (new Query())->createCommand()->batchInsert('users', [
                'first_name',
                'middle_name',
                'last_name',
                'username',
                'password',
                'type',
                'country_id',
                'region_id',
                'city_id',
                'phone',
                'image',
                'phone_secondary',
                'email',
                'web_page',
                'location_x',
                'location_y',
                'address',
                'date_registered',
                'visible'], [[
                $_user['first_name'],
                $_user['middle_name'],
                $_user['last_name'],
                $_user['username'],
                $_user['password'],
                $_user['type'],
                $_user['country_id'],
                $_user['region_id'],
                $_user['city_id'],
                $_user['phone'],
                $_user['image'],
                $_user['phone_secondary'],
                $_user['email'],
                $_user['web_page'],
                $_user['location_x'],
                $_user['location_y'],
                $_user['address'],
                $_user['date_registered'],
                1
            ]])->execute();

            $delete_user = (new Query())->createCommand()->delete('users_validation', 'id = ' . $_user['id'])->execute();

            $products_specifications = (new Query())->createCommand()->batchInsert('users_validation', [
                'first_name',
                'middle_name',
                'last_name',
                'username',
                'password',
                'type',
                'country_id',
                'region_id',
                'city_id',
                'phone',
                'image',
                'phone_secondary',
                'email',
                'web_page',
                'location_x',
                'location_y',
                'address',
                'visible',
                'status'], [[
                $_user['first_name'],
                $_user['middle_name'],
                $_user['last_name'],
                $_user['username'],
                $_user['password'],
                $_user['type'],
                $_user['country_id'],
                $_user['region_id'],
                $_user['city_id'],
                $_user['phone'],
                $_user['image'],
                $_user['phone_secondary'],
                $_user['email'],
                $_user['web_page'],
                $_user['location_x'],
                $_user['location_y'],
                $_user['address'],
                1,
                1
            ]])->execute();


            return json_encode([
                'status' => 1
            ]);
        }
    }

    public function actionDisableUser()
    {
        if (Yii::$app->request->isPost) {

            $_user = (new Query())->select(['*'])->from('users_validation as u')->where('u.id = ' . $_POST['id'])->one();

            $delete_user = (new Query())->createCommand()->delete('users_validation', 'id = ' . $_user['id'])->execute();

            $products_specifications = (new Query())->createCommand()->batchInsert('users_validation', [
                'first_name',
                'middle_name',
                'last_name',
                'username',
                'password',
                'type',
                'country_id',
                'region_id',
                'city_id',
                'phone',
                'image',
                'phone_secondary',
                'email',
                'web_page',
                'location_x',
                'location_y',
                'address',
                'visible',
                'status'], [[
                $_user['first_name'],
                $_user['middle_name'],
                $_user['last_name'],
                $_user['username'],
                $_user['password'],
                $_user['type'],
                $_user['country_id'],
                $_user['region_id'],
                $_user['city_id'],
                $_user['phone'],
                $_user['image'],
                $_user['phone_secondary'],
                $_user['email'],
                $_user['web_page'],
                $_user['location_x'],
                $_user['location_y'],
                $_user['address'],
                1,
                -1
            ]])->execute();


            return json_encode([
                'status' => 1
            ]);
        }
    }

}
