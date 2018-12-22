<!-- NAVIGATION -->
<div id="navigation">
    <!-- container -->
    <div class="container">
        <div id="responsive-nav">
            <!-- category nav -->
            <div class="category-nav show-on-click">
                <span class="category-header">Բաժիններ <i class="fa fa-list"></i></span>
                <ul class="category-list">
                    <?php foreach (Yii::$app->params['categories'] as $key => $value) { ?>
                        <li class="dropdown side-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?php echo $key;?><i class="fa fa-angle-right"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li><h3 class="list-links-title"><?php echo $value['items-header']; ?></h3></li>
                                            <?php foreach ($value['items'] as $k => $v) { ?>
                                                <li>
                                                    <a href="<?php echo $v['href']; ?>"><?php echo $v['title']; ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li><h3 class="list-links-title"><?php echo $value['products-header']; ?></h3></li>
                                            <?php foreach ($value['products'] as $k => $v) { ?>
                                                <li>
                                                    <a href="<?php echo $v['href']; ?>"><?php echo $v['title']; ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li><h3 class="list-links-title"><?php echo $value['more-header']; ?></h3></li>
                                            <?php foreach ($value['more'] as $k => $v) { ?>
                                                <li>
                                                    <a href="<?php echo $v['href']; ?>"><?php echo $v['title']; ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                </div>
                                <div class="row hidden-sm hidden-xs">
                                    <div class="col-md-12">
                                        <hr>
                                        <a class="banner banner-1" href="#">
                                            <img src="<?php echo $value['image-path']; ?>" alt="">
                                            <div class="banner-caption text-center">
                                                <h2 class="white-color"><?php echo $value['image-header']; ?></h2>
                                                <h3 class="white-color font-weak"><?php echo $value['image-description'] ?></h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /NAVIGATION -->
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Գլխավոր</a></li>
            <li><a href="/"><?= $category_name ?></a></li>
            <li><a href="<?=  $category_main_path ?>"><?= $product_type ?></a></li>
            <li class="active"><?= $product['model'] ?></li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!--  Product Details -->
            <div class="product product-details clearfix">
                <div class="col-md-6">
                    <div id="product-main-view">
                        <div class="carousel slide" id="mainCarousel" data-pause="false" data-interval="10000">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <img src="<?= $product['main_image'] ?>" />
                                </div>
                                <?php if(!empty($product['secondary_images'])) foreach(json_decode($product['secondary_images']) as $key => $value) { ?>
                                    <div class="item" style="height: 290px; overflow: hidden">
                                        <img src="<?= $value ?>" />
                                    </div>
                                <?php } ?>
                            </div><!-- /.carousel-inner -->
                            <a class="left carousel-control" href="#mainCarousel" data-slide="prev">
                                <span class="icon-prev"></span>
                            </a>
                            <a class="right carousel-control" href="#mainCarousel" data-slide="next">
                                <span class="icon-next"></span>
                            </a>
                        </div><!-- /#myCarousel -->
                    </div><!-- /.col-lg-6.col-lg-offset-3 -->
                    <div class="carousel slide"  style="padding: 0" data-type="multi" id="thumbCarousel" data-interval="false">
                        <div class="carousel-inner row">
                            <div class="item active">
                                <div class="slider-col-5" data-target="#mainCarousel" data-slide-to="0">
                                    <div class="wrapper">
                                        <div class="inside">
                                            <img src="<?= $product['main_image'] ?>" />
                                        </div>
                                    </div>
                                </div>

                            <?php if(!empty($product['secondary_images'])) foreach(json_decode($product['secondary_images']) as $key => $value) { ?>
                                <?= (($key + 1)%5 == 0? '</div><div class="item">':'') ?>
                                <div class="slider-col-5" data-target="#mainCarousel" data-slide-to="<?= $key + 1 ?>">
                                    <div class="wrapper">
                                        <div class="inside">
                                            <img src="<?= $value ?>" />
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        </div><!-- /.carousel-inner.row -->
                        <a class="left carousel-control bottom-slider" href="#thumbCarousel" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control bottom-slider" href="#thumbCarousel" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div><!-- /#thumbCarousel -->
                </div>
                <div class="col-md-6">
                    <div class="product-body">
                        <div class="product-label">
                            <?php if($product['type_top'] == 'true') {?><span class="sale">ՏՈՊ</span><?php } ?>
                            <?php if($product['type_hot'] == 'true') {?><span class="sale">Հայտնի</span><?php } ?>
                            <?php if($product['type_discount'] == 'true') {?><span class="sale">Զեղչված</span><?php } ?>
                        </div>
                        <h2 class="product-name" style="overflow-wrap: break-word;"><?= $product['title'] ?></h2>
                        <div>
                            <div class="product-rating">
                                <?php for($i = 0; $i < 50; $i+=10){ ?>
                                    <i class="fa fa-star <?= ($i*10 > (int)$product['likes'])? 'empty':'' ?>"></i>
                                <?php } ?>
                            </div>
                        </div>
                        <p><strong>Լայքեր:</strong> <?= $product['likes'] ?></p>
                        <p><strong>Ֆիրմա:</strong> <?= $product['brand'] ?></p>
                        <p style="overflow-wrap: break-word"><?= $product['short_description'] ?></p>




                        <div class="product-btns product-footer-section">
                            <div class="product-options">
                                <p class="product-price"><h2>Գինը: <span style="color: #F8694A"><?= $product['price_dram'] . 'դ.' ?></span></h2> </p>
                                <br>
                            </div>
                            <div class="pull-right inline-btn-section">
                                <button class="main-btn icon-btn" data-action="like" data-model="<?= $model ?>" data-product="<?= $product['id'] ?>"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn" data-action="buy" data-model="<?= $model ?>" data-product="<?= $product['id'] ?>"><i class="fa fa-exchange"></i></button>
                                <button class="main-btn icon-btn" data-action="share" data-model="<?= $model ?>"  data-product="<?= $product['id'] ?>"><i class="fa fa-share-alt"></i></button>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-12">
                    <div class="product-tab">
                        <!-- section title -->
                        <div class="col-md-12">
                            <div class="section-title">
                                <h3 class="title">Ավելին</h3>
                            </div>
                            <div id="tab1" class="tab-pane fade in active">

                            </div>
                        </div>
                        <!-- section title -->

                        <?php if(!empty($product['video_path'])) { ?>
                            <!-- section title -->
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h3 class="title">Վիդեո</h3>
                                </div>

                                <div id="video-section" class="tab-pane fade in active">
                                    <iframe id="ytplayer" type="text/html" width="720" height="405"
                                            src="https://www.youtube.com/embed/<?= $product['video_path'] ?>?cc_load_policy=1&disablekb=1&enablejsapi=1&modestbranding=1&playsinline=1&rel=0&showinfo=0&color=white"
                                            frameborder="0" allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                            <!-- section title -->

                        <?php } ?>

                            <!-- section title -->
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h3 class="title">Տեղեկություն</h3>
                                </div>
                                <!-- section title -->
                                <div id="tab2" class="tab-pane fade in active">
                                    <div class="text-center">
                                        <?php echo $this->render('/tablets/tablet-properties', ['product' => $product]); ?>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>

            </div>
            <!-- /Product Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Այլ</h2>
                </div>
            </div>
            <!-- section title -->

            <?php foreach($random_items as $key => $value) { ?>
            <!-- Product Single -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single">
                    <a href="/<?= $value['category'] ?>?id=<?= $value['product_category_id'] ?>">
                        <div class="product-thumb">
                            <?php if($value['type_top'] == 'true') { ?>
                                <div class="product-label">
                                    <span class="sale">ՏՈՊ</span>
                                </div>

                                <?php if($value['type_discount'] == 'true') { ?>
                                    <div class="product-label-discount" style="display: none">
                                        <span class="sale">-20%</span>
                                    </div>
                                <?php } ?>

                            <?php } else if($value['type_hot'] == 'true') { ?>
                                <div class="product-label" >
                                    <span class="sale">Հայտնի</span>
                                </div>

                                <?php if($value['type_discount'] == 'true') { ?>
                                    <div class="product-label-discount" style="display: none">
                                        <span class="sale">-20%</span>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <img src="<?= $value['main_image']; ?>" alt="">
                        </div>
                    </a>
                    <div class="product-body">
                        <h3 class="product-price"><?= number_format($value['price_dram'],0, '', ' ').'դ.' ?></h3>

                        <h2 class="product-name" style="overflow-wrap: break-word; height: 35px;"><a href="/<?= $value['category'] ?>?id=<?= $value['product_category_id'] ?>"><?php echo $value['title']; ?></a></h2>
                        <div style="overflow-wrap: break-word">
                            <p style="color: #ff9933; font-weight: bold"><?php echo $value['model']; ?></p>
                        </div>
                        <div class="product-btns">
                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Single -->
            <?php } ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<style>
    @import url(http://fonts.googleapis.com/css?family=Rock+Salt);
    #thumbCarousel .carousel-inner {
        margin-left: 0;
    }
    #thumbCarousel .item {
        cursor: pointer;
    }
    #thumbCarousel .carousel-inner > .next {
        left: 20%;
    }
    #thumbCarousel .carousel-inner > .prev {
        left: -20%;
    }
    #thumbCarousel .carousel-inner > .next.left,
    #thumbCarousel .carousel-inner > .prev.right {
        left: 0;
    }
    #thumbCarousel .carousel-inner > .active.left {
        left: -20%;
    }
    #thumbCarousel .carousel-inner > .active.right {
        left: 20%;
    }
    .carousel-control.left, .carousel-control.right {
        background-image: none;
    }
    .carousel-control {
        width: 10%;
    }
    #thumbCarousel .carousel-control .icon-prev,
    #thumbCarousel .carousel-control .icon-next {
        transform: translate(0, -50%);
    }
    .slider-col-5 {
        position: relative;
        min-height: 1px;
        float: left;
        width: 20%;
    }
    .item.active .slider-col-5:first-child {
        /*-webkit-filter: grayscale(100%);*/
        /*filter: grayscale(100%);*/
        transition: border .5s ease;
    }
    .wrapper {
        position: relative;
        padding-bottom: 100%;
        height: 0;
    }
    .inside {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow:hidden;
    }
    .inside img:hover {
        -webkit-transform: scale(2);
        -ms-transform: scale(2);
        transform: scale(2);
    }
    .inside img {
        height: 100%;
        transition: all .5s ease;
    }

    #mainCarousel .active.item:hover:before {
        opacity: 1;
        bottom: 0;
    }

    .bottom-slider {
        width: 5%;
        background-color: #0f0f0f;
    }
    .bottom-slider .icon-prev,.bottom-slider .icon-next{
        top: 57%
    }

    #video-section {
        text-align: center;
    }
    .videoWrapper {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 */
        padding-top: 25px;
        height: 0;
    }
    .videoWrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

<script>
    var $mainCarousel = $('#mainCarousel');
    var $thumbCarousel = $('#thumbCarousel');
    var $thumbItems = $('#thumbCarousel').find('.item');
    // Make the thumbnail slider increment one at at time
    $thumbItems.each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
//        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < 3; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

//            next.children(':first-child').clone().appendTo($(this));
        }
    });

    // Synchronize the carousels > IE10+
    $mainCarousel.on('slide.bs.carousel', function (event) {
        var direction = event.direction;
        var nextactiveslide = $(event.relatedTarget).index();
        if (direction === 'left') {
            $thumbCarousel.carousel('next').on('transitionend webkitTransitionEnd oTransitionEnd', function () {
                if($thumbCarousel.find('.active').index() != nextactiveslide) {
                    $thumbCarousel.carousel('next');
                } else {
                    $thumbCarousel.off('transitionend webkitTransitionEnd oTransitionEnd');
                }
            });
        } else {
            $thumbCarousel.carousel('prev').on('transitionend webkitTransitionEnd oTransitionEnd', function(){
                if($thumbCarousel.find('.active').index() != nextactiveslide) {
                    $thumbCarousel.carousel('prev');
                } else {
                    $thumbCarousel.off('transitionend webkitTransitionEnd oTransitionEnd');
                }
            });
        }
    });
</script>