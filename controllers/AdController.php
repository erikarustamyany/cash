<?php

namespace app\controllers;

use app\models\PhoneProducts;
use app\models\StoreProducts;
use PHPUnit\Framework\Constraint\Count;
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
use app\models\PhoneProductSpecifications;
use conquer\select2\Select2Widget;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

class AdController extends CentController
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

    public function actionPhones() {
        return $this->render('/ad/phones/index', ['model' => 'ad']);
    }

    public function actionNewPhone() {
        if (Yii::$app->request->isPost) {
            date_default_timezone_set('Asia/Yerevan');
            $date = date('Y-m-d H:i:s');

            //validation

            //saving
            $phone = new StoreProducts();
            $phone->title = htmlspecialchars($_POST['title']);
            $phone->long_description = htmlspecialchars($_POST['info']);
            $phone->state = htmlspecialchars($_POST['state']);
            $phone->model = htmlspecialchars($_POST['model']);
            $phone->price_dram = htmlspecialchars($_POST['price_dram']);
            $phone->owner_id = htmlspecialchars($_SESSION['user'][0]['id']);
            $phone->category = 'phones';
            $phone->created_time = $date;
            $phone->updated_time = $date;
            $phone->save();

            $spid = $phone->id;

            $phone_product = new PhoneProducts();
            $phone_product->brand_id = $_POST['brand_id'];
            $phone_product->model_id = $_POST['model_id'];
            $phone_product->category_name = 'PHONE';
            $phone_product->sp_id = $phone->id;
            $phone_product->save();

            $phone_ = StoreProducts::findOne($spid);
            $phone_->product_category_id = $phone_product->id;
            $phone_->save();

            if($_POST['has_properties'] == 'true') {
                $phone_specifications = new PhoneProductSpecifications();
                $phone_specifications->released = $date;
                $phone_specifications->product_id = $phone_product->id;
                $phone_specifications->color = $_POST['other_color'];
                $phone_specifications->display_resolution = $_POST['display_resolution'];
                $phone_specifications->display_size = $_POST['display_size'];
                $phone_specifications->platform_os = $_POST['os'];
                $phone_specifications->platform_chipset = $_POST['system_processor'];
                $phone_specifications->memory_internal = $_POST['system_drive'];
                $phone_specifications->memory_ram = $_POST['system_ram'];
                $phone_specifications->comm_wlan = $_POST['module_wifi'];
                $phone_specifications->comm_bluetooth = $_POST['module_bluetooth'];
                $phone_specifications->comm_nfc = $_POST['module_nfc'];
                $phone_specifications->comm_infrared = $_POST['module_infrared'];
                $phone_specifications->comm_gps = $_POST['module_gps'];
                $phone_specifications->card_slots = $_POST['other_cardcount'];
                $phone_specifications->save();
            }

            return json_encode([
                'status' => 1,
            ]);
        }
    }

    public function actionLoadProperties() {
        $params = Yii::$app->request->getQueryParams();
        $section = htmlspecialchars($params['section']);

        return json_encode([
            'html' => $this->render('/ad/'. $section . '/properties', ['model' => 'ad'])
            ]);
    }

}
