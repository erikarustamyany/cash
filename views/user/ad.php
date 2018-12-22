<?php echo $this->render('/main/navigation-bar'); ?>

<div class="col-lg-12 col-sm-12 user-profile-main">
    <?= $this->render('/user/header', ['model' => 'user', 'active' => 'ad', 'user' => $_SESSION['user']]); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <ul class="ad-section-list">
                    <?php foreach (Yii::$app->params['ad-categories-all'] as $key => $value) { ?>
                        <li><a data-tab="#<?= $value ?>" class="f-section"><?= $key ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <ul id="ad-categories-buy" class="ad-section-list changing-middle">
                    <?php $cid = 0; foreach (Yii::$app->params['ad-categories-buy'] as $key => $value) { $cid++; ?>
                    <li><a data-tab="#<?= $cid . '-buy' ?>" class="m-section"><?= $key ?></a></li>
                    <?php } ?>
                </ul>
                <ul id="ad-categories-work" class="ad-section-list changing-middle">
                    <?php $cid = 0; foreach (Yii::$app->params['ad-categories-work'] as $key => $value) { $cid++; ?>
                    <li><a data-tab="#<?= $cid . '-work' ?>" class="m-section"><?= $key ?></a></li>
                    <?php } ?>
                </ul>
                <ul id="ad-categories-event" class="ad-section-list changing-middle">
                    <?php $cid = 0; foreach (Yii::$app->params['ad-categories-event'] as $key => $value) { $cid++; ?>
                    <li><a data-tab="#<?= $cid . '-event' ?>" class="m-section"><?= $key ?></a></li>
                    <?php } ?>
                </ul>
                <ul id="ad-categories-lease" class="ad-section-list changing-middle">
                    <?php $cid = 0; foreach (Yii::$app->params['ad-categories-lease'] as $key => $value) { $cid++; ?>
                    <li><a data-tab="#<?= $cid . '-lease' ?>" class="m-section"><?= $key ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 tab-container">
                <?php $cid = 0; foreach (Yii::$app->params['ad-categories-buy'] as $key => $value) { $cid++;?>
                    <ul id="<?= $cid . '-buy' ?>" class="ad-section-list changing-last">
                        <?php foreach ($value['items'] as $k => $v) { ?>
                        <li><a href="<?= $v['href'] ?>" class="l-section"><?= $v['title'] ?></a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <?php $cid = 0; foreach (Yii::$app->params['ad-categories-work'] as $key => $value) { $cid++;?>
                    <ul id="<?= $cid . '-work' ?>" class="ad-section-list changing-last">
                        <?php foreach ($value['items'] as $k => $v) { ?>
                        <li><a href="<?= $v['href'] ?>" class="l-section"><?= $v['title'] ?></a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <?php $cid = 0; foreach (Yii::$app->params['ad-categories-event'] as $key => $value) { $cid++;?>
                    <ul id="<?= $cid . '-event' ?>" class="ad-section-list changing-last">
                        <?php foreach ($value['items'] as $k => $v) { ?>
                        <li><a href="<?= $v['href'] ?>" class="l-section"><?= $v['title'] ?></a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <?php $cid = 0; foreach (Yii::$app->params['ad-categories-lease'] as $key => $value) { $cid++;?>
                    <ul id="<?= $cid . '-lease' ?>" class="ad-section-list changing-last">
                        <?php foreach ($value['items'] as $k => $v) { ?>
                        <li><a href="<?= $v['href'] ?>" class="l-section"><?= $v['title'] ?></a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>

    <script>
        $('.ad-section-list li').click(function(){
            if($(this).find('a').hasClass('f-section')){
                $('.ad-section-list.changing-middle').removeClass('opened');
                $('.ad-section-list.changing-last').removeClass('opened');
                $('.ad-section-list.changing-middle li').removeClass('active');
            } else if($(this).find('a').hasClass('m-section')) {
                $('.ad-section-list.changing-last').removeClass('opened');
                $('.ad-section-list.changing-last li').removeClass('active');
            }
            $($(this).find('a').attr('data-tab')).addClass('opened');

            $(this).parent().find('li').each(function (key,value) {
                $(this).removeClass('active');
            });

            $(this).addClass('active');
        });

        $('.ad-section-list.changing-last li').click(function() {
            location.replace($(this).find('a').attr('href'));
        })

    </script>

    <style>
        .ad-section-list {
            margin-top: 10px;
            background-color: #3c3c3c;
        }
        .ad-section-list li {
            height: 67px;
            line-height: 65px;
            padding-left: 20px;
        }

        .ad-section-list li a {
            color: white;
        }

        .ad-section-list li:hover, .ad-section-list li:focus, .ad-section-list li.active {
            border: none;
            background-color: #F8694A;
            transition-duration: 0.5s;
            cursor: pointer;
        }

        .ad-section-list li:hover a, .ad-section-list li.active a {
            color: white;
            display: inline-block;
            -webkit-transform: translateX(30px);
            -ms-transform: translateX(30px);
            transform: translateX(30px);
            transition-duration: 0.5s;
            -webkit-transition: 0.3s all;

        }
        .ad-section-list.changing-middle, .ad-section-list.changing-last {
            display: none;
        }
        .ad-section-list.opened {
            display: block;
        }
    </style>

