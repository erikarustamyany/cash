<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="/js/jquery.min.js" type="text/javascript"></script>
<!--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">-->
    <script src="/js/select2-dropdown.js"></script>
    <script src="/js/leaflet.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <header id="header"><!--header-->
        <!-- header -->
            <div class="container">
                <div class="pull-left">
                    <!-- Logo -->
                    <div class="header-logo">
                        <a class="logo" href="/">
                            <img src="/img/logo/demo_logo.png" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->

                </div>

                <div id="user-section">
                <div class="pull-right user-controls">
                    <ul class="header-btns">
                        <!-- Account -->
                        <li class="header-account <?php  if(!empty($_SESSION['user']) || true) { ?> header-dropdown-account dropdown default-dropdown <?php } ?>">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon <?php if(empty($_SESSION['user'])) { ?>hidden-on-phone <?php } ?>">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <?php if(empty($_SESSION['user'])) { ?>
                                    <div data-toggle="modal" data-target="#login-modal" class="header-btns-icon hidden visible-on-phone">
                                        <i class="fa fa-sign-in"></i>
                                    </div>
                                <?php } ?>

                                <strong class="text-uppercase mypage-header hidden-on-phone" <?php if(!empty($_SESSION['user'])) { ?> data-toggle="modal" data-target="#mypage-modal"  <?php } ?>><?= (!empty($_SESSION['user']) && $_SESSION['user'][0]['id'] == 1)? 'Կառավարում':'Իմ էջը' ?> <i class="fa fa-caret-down"></i></strong>
                            </div>
                            <?php  $session = Yii::$app->session;
                            if(empty($_SESSION['user'])) {?>
                            <a href="#" data-toggle="modal" data-target="#login-modal" class="text-uppercase hidden-on-phone">Մուտք</a>
                            <?php } ?>

                            <?php  if(!empty($_SESSION['user'])) { ?>
                            <div class="drop-backdrop"></div>
                            <ul class="custom-menu">
                                <?php if($_SESSION['user'][0]['id'] != 1){ ?>
                                <li><a href="/user/profile"><i class="fa fa-user-o"></i> Իմ էջը </a></li>
                                <li><a href="/user/history"><i class="fa fa-heart-o"></i> Պատմություն </a></li>
                                <li><a href="/user/liked"><i class="fa fa-heart-o"></i> Սիրված </a></li>
                                <li><a href="/user/ad"><i class="fa fa-archive"></i> Հայտարարություն </a></li>
                                <li><a href="/user/personal"><i class="fa fa-check"></i> Կարգավորումներ </a></li>
                                <?php } else { ?>
                                    <li><a href="/admin/"><i class="fa fa-user-o"></i> Ընդհանուր </a></li>
                                <?php } ?>
                                <li><a href="/user/log-out"><i class="fa fa-unlock-alt"></i> Դուրս գալ</a></li>
                            </ul>
                            <?php } ?>
                        </li>
                        <!-- /Account -->


                        <!-- Mobile nav toggle-->
                        <li class="nav-toggle">
                            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                        </li>
                        <!-- / Mobile nav toggle -->
                    </ul>
                </div>
                <!-- Search -->
                <div class="header-search pull-right hidden-on-phone" style="width: 100%; margin։0 20px;">
                    <form style="width: 100%">
                        <input class="input search-input" type="text" style="width: 100%; margin։0 20px;">
                        <!--         Searching by categor                   -->
                        <!--                            <select class="input search-categories">-->
                        <!--                                <option value="0">All Categories</option>-->
                        <!--                                <option value="1">Category 01</option>-->
                        <!--                                <option value="1">Category 02</option>-->
                        <!--                            </select>-->
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>

            </div>
            <!-- header -->
        <!-- container -->
    </header>
    <!-- /HEADER -->
    <script>
        var frsc = "<?=Yii::$app->request->getCsrfToken()?>";
    </script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="gen-tab">
    <div class="gen-tab-inner">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container login">

            <h1>Մուտք</h1><br>
            <p class="info"></p>
            <form id="login-form">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input type="text" name="user" placeholder="Ծածկանուն">
                <input type="password" name="pass" placeholder="Ծակագիր">
            </form>
            <button class="loginmodal-submit">ՄՈՒՏՔ</button>

            <div class="login-help">
                <a href="/user/register">Գրանցվել</a> - <a href="/user/forgot">Մոռացել եմ ծածկագիրը</a>
            </div>

        </div>
    </div>
</div>

<!-- FOOTER -->
<footer id="footer" class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
                <!-- footer copyright -->
                <div class="footer-copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Demo Yii2 project | created by Erik Arustamyan
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
                <!-- /footer copyright -->
            </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /FOOTER -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
