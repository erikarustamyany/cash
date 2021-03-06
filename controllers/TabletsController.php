<?php

namespace app\controllers;

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
use conquer\select2\Select2Widget;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

class TabletsController extends CentController
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
    public function actionList()
    {
        $params = Yii::$app->request->getQueryParams();

        $brands_list = (new Query())->select(['*'])->from('tablet-brands')->all();
        $region_list = (new Query())->select(['*'])->from('regions')->all();
        $model_id = '';
        $model_name = '';
        $list = [];

        $products_count =  (new Query())->select(['p.id'])->from('tablet-products as p')->count();

        $offset_aside = rand(0,$products_count-2);

        $aside_items=  (new Query())->from('store-products as sp')->join('INNER JOIN', 'tablet-products as p', 'p.sp_id = sp.id')->where('sp.category = "tablets"')->andWhere('sp.visible = 1')->offset($offset_aside)->limit(2)->all() ;//"SELECT * FROM `images` as img JOIN `products` as p on img.id = p.main_image LIMIT 4")->all();



        $list = (new Query())->select(['sp.*', 'pp.*', 'pps.*', 'pp.id as id_inside'])->from('store-products as sp')->join('INNER JOIN', 'tablet-products as pp', 'pp.sp_id = sp.id')->join('INNER JOIN', 'tablet-product-specifications as pps', 'pps.product_id = pp.id')->where('sp.category = "tablets"')->andWhere('sp.visible = 1');

        if(empty($params)){

        } else {
            if(!empty($params['brand'])) {
                if (!empty($params['model'])) {
                    $model_id = $params['model'];
                    $model_name = (new Query())->select(['name'])->from('tablet-models')->where('id=' . intval($model_id))->one()['name'];
                    $list->andWhere('pp.model_id = ' . intval($model_id));
                } else {
                    $list->andWhere('pp.brand_id = ' . intval($params['brand']));

                }
            }
            if(!empty($params['color'])) {
                $list->andWhere('pps.color = '. "'". trim($params['color']) . "'");
            }
            if(!empty($params['system'])) {
                $list->andWhere('pps.system = '.  "'". trim(strtolower($params['system'])) . "'");
            }
            if(!empty($params['battery'])) {
                if(strpos($params['battery'], ',')){
                    $min_max =  explode(',', $params['battery']);
                    $list->andWhere('pps.battery >= '. intval(trim($min_max[0])));
                    $list->andWhere('pps.battery <= '. intval(trim($min_max[1])));
                } else {
                    $list->andWhere('pps.battery = '. intval($params['battery']));
                }
            }
            if(!empty($params['camera'])) {
                if(strpos($params['camera'], ',')){
                    $min_max =  explode(',', $params['camera']);
                    $list->andWhere('pps.back_camera >= '. intval(trim($min_max[0])));
                    $list->andWhere('pps.back_camera <= '. intval(trim($min_max[1])));
                } else {
                    $list->andWhere('pps.back_camera = '. intval($params['camera']));
                }
            }
            if(!empty($params['display'])) {
                if(strpos($params['display'], ',')){
                    $min_max =  explode(',', $params['display']);
                    $list->andWhere('pps.display_size >= '. doubleval(trim($min_max[0])));
                    $list->andWhere('pps.display_size <= '. doubleval(trim($min_max[1])));
                } else {
                    $list->andWhere('pps.display_size = '. doubleval(trim($params['display'])));
                }
            }
            if(!empty($params['price_type'])) {
                if(!empty($params['price_from'])){
                    $list->andWhere('sp.price_' . trim($params['price_type']) . ' >= '. intval($params['price_from']));

                }
                if(!empty($params['price_to'])) {
                    $list->andWhere('sp.price_' . trim($params['price_type']) . ' <= '. intval($params['price_to']));
                }
            }
            if(!empty($params['region'])) {
                if(!empty($params['city'])){
                    $list->andWhere('sp.city_id = '. intval($params['city']));
                } else {
                    $list->andWhere('sp.region_id = '. intval($params['region']));
                }
            }

            if(!(empty($params['type_product']))){
                $list->andWhere('sp.state = '. intval($params['type_product']));
            }
        }

        if(empty($params['page'])){
            $params['page'] = 1;
        }

        $max_items = 10;
        $offset = ((int)$params['page'] - 1) * $max_items;
        $count = $list;
        $count = $count->count();

        $list = $list->limit($max_items)->offset($offset);

        $params['current_page'] = (int)$params['page'];
        $params['last_page'] = ceil($count / $max_items);



        if(empty($params['ordering'])) {
            $params['ordering'] = 1;
        }
        switch ($params['ordering']){
            case 1:
                $list->orderBy([
                    'sp.type_top' => SORT_DESC,
                    'sp.type_hot' => SORT_DESC,
                    'sp.likes' => SORT_DESC,
                    'sp.views' => SORT_DESC,
                ]);
                break;
            case 2:
                $date = date_default_timezone_set('Asia/Yerevan');
                $date = date('Y-m-d H:i:s');
                $list->orderBy([
                    'sp.updated_time' => SORT_DESC
                ]);
                break;
            case 3:
                $list->orderBy([
                    'sp.price_dram' => SORT_DESC,
                    'sp.type_top' => SORT_DESC,
                    'sp.type_hot' => SORT_DESC,
                    'sp.likes' => SORT_DESC,
                    'sp.views' => SORT_DESC,
                ]);
                break;
            case 4:
                $list->orderBy([
                    'sp.price_dram' => SORT_ASC,
                    'sp.type_top' => SORT_DESC,
                    'sp.type_hot' => SORT_DESC,
                    'sp.likes' => SORT_DESC,
                    'sp.views' => SORT_DESC,
                ]);
                break;
        }


        $list = $list->all();


//        echo  "<pre>";
//        print_r($list);
//        exit;
        $url = 'list?';

        if(!empty($params['brand'])) $url .= 'brand=' . $params['brand'] . '&';
        if(!empty($params['model'])) $url .= 'model=' . $params['model'] . '&';
        if(!empty($params['color'])) $url .= 'color=' . $params['color'] . '&';
        if(!empty($params['system'])) $url .= 'system=' . $params['system'] . '&';
        if(!empty($params['battery'])) $url .= 'battery=' . $params['battery'] . '&';
        if(!empty($params['camera'])) $url .= 'camera=' . $params['camera'] . '&';
        if(!empty($params['display'])) $url .= 'display=' . $params['display'] . '&';
        if(!empty($params['price_type'])) $url .= 'price_type=' . $params['price_type'] . '&';
        if(!empty($params['price_to'])) $url .= 'price_to=' . $params['price_to'] . '&';
        if(!empty($params['price_from'])) $url .= 'price_from=' . $params['price_from'] . '&';
        if(!empty($params['region'])) $url .= 'region=' . $params['region'] . '&';
        if(!empty($params['city'])) $url .= 'city=' . $params['city'] . '&';
        if(!empty($params['type_product'])) $url .= 'type_product=' . $params['type_product'] . '&';


        $params['requested_url'] = $url;

        return $this->render('list', ['model' => 'tablets', 'brand_list' => $brands_list, 'list' => $list, 'model_name' => $model_name, 'params' => $params, 'region_list' => $region_list, 'aside_items' => $aside_items]);
    }

    public function actionIndex()
    {
        $params = Yii::$app->request->getQueryParams();

        $category_main_path = '/tablets/list';
        $products_count =  (new Query())->select(['p.id'])->from('store-products as p')->count();
        $offset = rand(0,$products_count-4);
        $random_items =  (new Query())->select(['sp.*'])->from('store-products as sp')->offset($offset)->limit(4)->all() ;//"SELECT * FROM `images` as img JOIN `products` as p on img.id = p.main_image LIMIT 4")->all();


        if(empty($params['id'])){
            return $this->render('../main/error', ['model' => 'main' ]);
        }

        $params['id'] = htmlspecialchars($params['id']);
        $product = (new Query())->select(['sp.*', 'pp.*', 'pps.*', 'pb.brand', 'pm.name as model_name', 'pm.original_image_path', 'pm.video_path', 'pp.id as id_inside'])->from('tablet-products as pp')->join('INNER JOIN', 'store-products as sp', 'sp.id = pp.sp_id')->join('INNER JOIN','tablet-product-specifications as pps', 'pps.product_id = pp.id')->join('LEFT JOIN','tablet-models as pm', 'pm.id = pp.model_id')->join('INNER JOIN','tablet-brands as pb', 'pb.id = pp.brand_id')->where('pp.id = ' . $params['id'])->one();

        if(!empty($_SESSION['user'])) {
            $h = [];
            $last_id = 0;
            if (!empty($_COOKIE['$h'])) {
                $h = json_decode($_COOKIE['$h']);
                $last_id = json_decode(end($h))[0];
            }
            $h[] = json_encode([$last_id + 1,$product['id']]);
            $h = json_encode($h);
            setcookie('$h', $h, time() + 99999);
        }

        return $this->render('product', ['model' => 'tablets', 'category_name' => 'Էլեկտրոնիկա', 'product_type' => 'Հեռախոսներ', 'product' => $product, 'random_items'=> $random_items, 'category_main_path' => $category_main_path ]);
    }


    public function actionInsert()
    {
        $brands = [["Acer"],["Alcatel"],["Amazon"],["Ambrane"],["Amosta"],["AOC"],["Apple"],["Archos"],["Asus"],["Barnes and Noble"],["Beetel"],["Blackberry"],["BSNL Penta "],["Byond"],["Celkon"],["Classteacher learning Systems"],["Creative"],["Croma"],["Cygnett"],["Datawind"],["Dell"],["Digiflip Pro"],["DOMO"],["EAFT"],["Fly"],["Fujezone"],["Fujitsu"],["Go Tech "],["Google"],["HCL"],["HP"],["HTC"],["Huawei"],["iBall"],["iBerry"],["ICE "],["Intex"],["Karbonn"],["Lapbook"],["Lava"],["Lemon"],["Lenovo"],["LG"],["Logitech"],["Maxx"],["Mercury"],["Micromax"],["Microsoft"],["Milagrow"],["Mitashi"],["Mosti"],["Moto"],["Nokia"],["Notion Ink "],["Oplus"],["Panasonic"],["Pental"],["Reliance"],["Salora"],["Samsung"],["Simmtronics"],["Smartron"],["Sony"],["Spice"],["Swipe"],["Toshiba"],["Videocon"],["ViewSonic"],["WickedLeak"],["Wishtel"],["Xiaomi"],["Xolo"],["Zebronics"],["Zen"],["Zen Mobile"],["Zenfocus"],["Zotac"],["Zync"]];
        $xiaomi_models = [["Mi A2 (Mi 6X)","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-a2-mi-6x-.jpg"],["Mi A2 Lite (Redmi 6 Pro)","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-6-pro.jpg"],["Mi Max 3","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-max3-.jpg"],["Mi Pad 4","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-pad-4.jpg"],["Redmi 6","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-6.jpg"],["Redmi 6A","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-6a.jpg"],["Mi 8 Explorer","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi8-explore-.jpg"],["Mi 8","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi8.jpg"],["Mi 8 SE","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi8-se.jpg"],["Redmi S2 (Redmi Y2)","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-s2-.jpg"],["Mi Mix 2S","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-mix-2s.jpg"],["Redmi Note 5 AI Dual Camera","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-note-5-ai-dual-camera.jpg"],["Redmi Note 5 Pro","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-note-5-pro.jpg"],["Black Shark","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-black-shark.jpg"],["Redmi Note 5 (Redmi 5 Plus)","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-5-plus.jpg"],["Redmi 5","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-5.jpg"],["Redmi 5A","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-5a.jpg"],["Redmi Y1 (Note 5A)","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-note-5a.jpg"],["Redmi Y1 Lite","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-note-5as.jpg"],["Mi Note 3","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-note3-.jpg"],["Mi Mix 2","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-mix2-new.jpg"],["Mi A1","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-a1.jpg"],["Mi Max 2","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-max2.jpg"],["Redmi 4 (4X)","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-4x.jpg"],["Mi 6","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-6.jpg"],["Mi Pad 3","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-pad-3-1.jpg"],["Mi 5c","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-5c.jpg"],["Redmi Note 4X","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-note-4x.jpg"],["Redmi Note 4","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-note-4-sn.jpg"],["Redmi 4A","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-4a-.jpg"],["Redmi 4 (China)","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-4-prime-.jpg"],["Redmi 4 Prime","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-4-prime-new.jpg"],["Mi 6 Plus","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-6-plus.jpg"],["Mi Mix","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mix-.jpg"],["Mi Note 2","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-note2-.jpg"],["Mi 5s Plus","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-5s-plus.jpg"],["Mi 5s","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-mi-5s1.jpg"],["Redmi Note 4 (MediaTek)","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-note-4.jpg"],["Redmi Pro","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-pro.jpg"],["Redmi 3x","https://cdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-3x.jpg"]];
        $data = [];


//        $top_products = (new Query())->createCommand()->batchInsert('tablet-models', ['brand_id', 'name', 'original_image_path', 'video_path'], $data)->execute();
//         $products_specifications = (new Query())->createCommand()->batchInsert('tablet-product-specifications', ['product_id', 'announced', 'released', 'color', 'system', 'battery', 'battery_type', 'size', 'weight', 'front_camera', 'back_camera', 'display_size', 'display_resolution', 'display_multitouch', 'platform_os', 'platform_chipset', 'platform_cpu', 'platform_gpu', 'card_slot', 'memory_internal', 'memory_ram', 'comm_wlan', 'comm_bluetooth', 'comm_gps', 'comm_nfc', 'comm_infrared', 'comm_radio', 'comm_usb', 'sensor_fingerprint', 'sensor_gyro', 'sensor_accelerometer', 'sensor_barometer', 'sensor_compas'], $data)->execute();

        $_DATA = [
            [4, '2017-11-15', '2017-12-15', 'black', 'android', 2700, 'Li-ion', '125x321x4', '300', 5, 12, 5.5, '2540x1280', 'true', 'Android 8.0 MIUI', 'HiSilicon Kirin 970','Snapdragon 8 core 3.8մհ', 'Mali-G72 MP12', '2' , 64, 8, 'Wi-Fi 802.11 a/b/g/n/ac', '4.2'],
            [5, '2017-11-15', '2017-12-15', 'white', 'android', 2700,'Li-ion', '125x321x4', '300', 5, 12, 5.7, '2540x1280', 'true', 'Android 9.0 MIUI', 'HiSilicon Kirin 970','Snapdragon 10 core 3.8մհ', 'Mali-G72 MP12', '2' , 128, 4, 'Wi-Fi 802.11 a/b/g/n/ac', '4.2'],
            [6, '2017-11-15', '2017-12-15', 'blue', 'android', 2700,'Li-ion', '125x321x4', '300', 5, 21, 4.5, '2540x1280', 'true', 'Android 8.0 MIUI', 'HiSilicon Kirin 970','Snapdragon 8 core 3.8մհ', 'Mali-G72 MP12', '2' , 64, 8, 'Wi-Fi 802.11 a/b/g/n/ac', '4.2'],
            [7, '2017-11-15', '2017-12-15', 'black', 'android', 2700,'Li-ion', '125x321x4', '300', 5.5, 32, 5.5, '2540x1280', 'true', 'Android 8.0 MIUI', 'HiSilicon Kirin 970','Snapdragon 8 core 3.8մհ', 'Mali-G72 MP12', '2' , 64, 8, 'Wi-Fi 802.11 a/b/g/n/ac', '4.2'],
            [8, '2017-11-15', '2017-12-15', 'black', 'android', 2700, 'Li-ion', '125x321x4', '300', 5, 45, 5.5, '2540x1280', 'true', 'Android 8.0 MIUI', 'HiSilicon Kirin 970','Snapdragon 8 core 3.8մհ', 'Mali-G72 MP12', '2' , 64, 8, 'Wi-Fi 802.11 a/b/g/n/ac', '4.2'],
            [9, '2017-11-15', '2017-12-15', 'white', 'android', 2700,'Li-ion', '125x321x4', '300', 5, 12, 5.7, '2540x1280', 'true', 'Android 9.0 MIUI', 'HiSilicon Kirin 970','Snapdragon 10 core 3.8մհ', 'Mali-G72 MP12', '2' , 128, 4, 'Wi-Fi 802.11 a/b/g/n/ac', '4.2'],
            [10, '2017-11-15', '2017-12-15', 'blue', 'android', 2700,'Li-ion', '125x321x4', '300', 5, 3, 4.5, '2540x1280', 'true', 'Android 8.0 MIUI', 'HiSilicon Kirin 970','Snapdragon 8 core 3.8մհ', 'Mali-G72 MP12', '2' , 64, 8, 'Wi-Fi 802.11 a/b/g/n/ac', '4.2'],
            [11, '2017-11-15', '2017-12-15', 'black', 'android', 2700,'Li-ion', '125x321x4', '300', 4.5, 5, 5.5, '2540x1280', 'true', 'Android 8.0 MIUI', 'HiSilicon Kirin 970','Snapdragon 8 core 3.8մհ', 'Mali-G72 MP12', '2' , 64, 8, 'Wi-Fi 802.11 a/b/g/n/ac', '4.2']
        ];



        $locations = [["Երևան"],["      Աջափնյակ"],["      Արաբկիր"],["      Ավան"],["      Դավիթաշեն"],["      Էրեբունի"],["      Քանաքեռ Զեյթուն"],["      Կենտրոն"],["      Մալաթիա Սեբաստիա"],["      Նոր Նորք"],["      Նորք Մարաշ"],["      Նուբարաշեն"],["      Շենգավիթ"],["Արագածոտն"],["      Ապարան"],["      Արագած"],["      Աշտարակ"],["      Կոշ"],["      Թալին"],["      Ուջան"],["Արարատ"],["      Արարատ"],["      Արտաշատ"],["      Գեղանիստ"],["      Մասիս"],["      Վեդի"],["Արմավիր"],["      Արմավիր"],["      Էջմիածին"],["      Մեծամոր"],["Արցախ"],["      Ասկերան"],["      Մարտակերտ"],["      Մարտունի"],["      Շուշի"],["      Ստեփանակերտ"],["Գեղարքունիք"],["      Ճամբարակ"],["      Գավառ"],["      Մարտունի "],["      Սևան"],["      Վարդենիս"],["Կոտայք"],["      Աբովյան"],["      Աղվերան"],["      Արգել"],["      Առինջ"],["      Բջնի"],["      Բյուրեղավան"],["      Չարենցավան"],["      Գառնի"],["      Հրազդան"],["      Ջրվեժ"],["      Քանաքեռավան"],["      Քասախ"],["      Նոր Հաճըն"],["      Պտղնի"],["      Եղվարդ"],["      Զովունի"],["Լոռի"],["      Ալավերդի"],["      Սպիտակ"],["      Ստեփանավան"],["      Տաշիր"],["      Վանաձոր"],["Շիրակ"],["      Արթիկ"],["      Գյումրի"],["      Մարալիկ"],["Սյունիք"],["      Գորիս"],["      Քաջարան"],["      Կապան"],["      Մեղրի"],["      Սիսիան"],["Տավուշ"],["      Բերդ"],["      Դիլիջան"],["      Իջևան"],["      Նոյեմբերյան"],["Վայոց Ձոր"],["      Ջերմուկ"],["      Վայք"],["      Եղեգնաձոր"],["Հայաստանից դուրս"]];

        $products_specifications = (new Query())->createCommand()->batchInsert('tablet-brands', ['brand'], $brands)->execute();


        return $this->render('login', ['model' => 'main' ]);
    }
    public function actionGetModels()
    {
        $brand_id = Yii::$app->request->get('brand_id');

        $models_list = (new Query())->select(['*'])->from('tablet-models')->where('brand_id =' . $brand_id)->all();

        $result = [
            'status' => 1,
            'data' => $models_list
        ];
        return json_encode($result);
    }

    public function actionGetCities()
    {
        $region_id = Yii::$app->request->get('region_id');

        $city_list = (new Query())->select(['*'])->from('places')->where('region_id =' . $region_id)->all();

        $result = [
            'status' => 1,
            'data' => $city_list
        ];
        return json_encode($result);
    }

    public function actiongetItems()
    {
        $model_id = Yii::$app->request->get('model_id');

        $models_list = (new Query())->select(['*'])->from('products-tablets')->where('model_id = ' . $model_id)->all();

        $result = [
            'status' => 1,
            'data' => $models_list
        ];
        return json_encode($result);
    }


}
