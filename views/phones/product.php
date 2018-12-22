<?= $this->render('/main/navigation-bar'); ?>
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
                <div class="col-md-12" style="padding: 0">
                    <div class="col-md-8">
                        <h2 class="product-name"><?= $product['title'] ?></h2>
                        <div class="product-rating">
                            <?php for($i = 0; $i < 50; $i+=10){ ?>
                                <i class="fa fa-star <?= ($i*10 > (int)$product['likes'])? 'empty':'' ?>"></i>
                            <?php } ?>
                        </div>
                        <div id="product-main-view">
                            <div class="carousel slide" id="mainCarousel" data-pause="false" data-interval="10000">
                                <div class="carousel-inner">
                                    <div class="active item  slider-image-container">
                                        <img  class="slider-image" src="<?= $product['main_image'] ?>" />
                                    </div>
                                    <?php if(!empty($product['secondary_images'])) foreach(json_decode($product['secondary_images']) as $key => $value) { ?>
                                        <div class="item slider-image-container">
                                            <img src="<?= $value ?>" class="slider-image" />
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
                        <div class="carousel slide"  style="padding: 0; margin-bottom: 5px;" data-type="multi" id="thumbCarousel" data-interval="false">
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

                    <div class="product-aside-ad col-md-4 hidden-on-phone hidden-on-tablet">
                        <div class="product-owner-aside">
                            <img src="/img/banner17.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-8" style="padding-left: 0; padding-right: 10px;">
                        <div class="product-label">
                            <?php if($product['type_top'] == 'true') {?><span class="sale">ՏՈՊ</span><?php } ?>
                            <?php if($product['type_hot'] == 'true') {?><span class="sale">Հայտնի</span><?php } ?>
                            <?php if($product['type_discount'] == 'true') {?><span class="sale">Զեղչված</span><?php } ?>
                        </div>
                        <div class="pull-right">
                            <button class="main-btn icon-btn follow-btn <?= ($followed)? 'followed':'' ?> follow-btn-product" data-action="like" data-model="<?= $model ?>" data-pid="<?= $product['id'] ?>"><i class="fa fa-heart"></i></button>
                        </div>
                        <div class="product-btns product-footer-section">
                            <div class="product-options">
                                <div class="product-price">
                                    Գինը: <span style="color: #F8694A"><?= $product['price_dram'] . 'դ.' ?></span>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="padding-left: 6px;">
                        <div class="product-body">
                        <p><strong>Լայքեր:</strong> <?= $product['likes'] ?></p>
                        <p><strong>Ֆիրմա:</strong> <?= $product['brand'] ?></p>
                        <p style="overflow-wrap: break-word"><?= $product['short_description'] ?></p>
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
                                <?php echo $this->render('/phones/about', ['product' => $product, 'owner' => $owner]); ?>

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
                                        <?php echo $this->render('/phones/phone-properties', ['product' => $product]); ?>
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
            <?php echo $this->render('/phones/random-inner-list', ['list' => $random_items]); ?>

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