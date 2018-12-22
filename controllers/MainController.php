<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Images;
use app\models\Products;

class MainController extends CentController
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $images = Images::find()->select(['title', 'source', 'image_type'])->where(['image_type' => 'MAIN_PAGE_HEADER'])->orWhere(['image_type' => 'MAIN_PAGE_SECONDARY'])->orWhere(['image_type' => 'MAIN_PAGE_HOT'])->all();
        $top_4x = (new Query())->select(['sp.*'])->from('store_products as sp')->where('type_top = "true"')->orderBy('RAND()')->limit(4)->all() ;//"SELECT * FROM `images` as img JOIN `products` as p on img.id = p.main_image LIMIT 4")->all();
        $popular_4x = (new Query())->select(['sp.*'])->from('store_products as sp')->where('type_hot = "true"')->orderBy('RAND()')->limit(4)->all() ;//"SELECT * FROM `images` as img JOIN `products` as p on img.id = p.main_image LIMIT 4")->all();
        $discount_4x = (new Query())->select(['sp.*'])->from('store_products as sp')->where('type_discount = "true"')->orderBy('RAND()')->limit(4)->all() ;//"SELECT * FROM `images` as img JOIN `products` as p on img.id = p.main_image LIMIT 4")->all();

        $random_items =  (new Query())->select(['sp.*'])->from('store_products as sp')->orderBy('RAND()')->limit(4)->all();
//        echo "<pre>";
//        print_r($top_products);
//        exit;
        $secondary_images = [];
        $main_header_image = '';

        foreach ($images as $key => $value){
            if($value->image_type == 'MAIN_PAGE_HEADER'){
                $main_header_image = $value;
            } else if($value->image_type == 'MAIN_PAGE_SECONDARY'){
                $secondary_images[] = $value;
            }
        }


//        echo "<pre>";
//        print_r($top_products);
//        exit;

        return $this->render('index', ['model' => 'main', 'images' => ['main_image' => $main_header_image, 'secondary_images' => $secondary_images], 'products' => [ 'popular_products_4x' => $popular_4x, 'top_products_4x' => $top_4x, 'discounted_products_4x' => $discount_4x, 'random_4x' => $random_items] ]);
    }

    public function actionLogin()
    {
        return $this->render('login', ['model' => 'main' ]);
    }
}
