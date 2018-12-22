
<!-- NAVIGATION -->
<div id="navigation">
    <!-- container -->
    <div class="container">
        <div id="responsive-nav">
            <!-- category nav -->
            <div class="category-nav">
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
            <!-- /category nav -->

            <!-- menu nav -->
            <!--
            <div class="menu-nav">
                <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                <ul class="menu-list">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Women <i class="fa fa-caret-down"></i></a>
                        <div class="custom-menu">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="list-links">
                                        <li>
                                            <h3 class="list-links-title">Categories</h3></li>
                                        <li><a href="#">Women’s Clothing</a></li>
                                        <li><a href="#">Men’s Clothing</a></li>
                                        <li><a href="#">Phones & Accessories</a></li>
                                        <li><a href="#">Jewelry & Watches</a></li>
                                        <li><a href="#">Bags & Shoes</a></li>
                                    </ul>
                                    <hr class="hidden-md hidden-lg">
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-links">
                                        <li>
                                            <h3 class="list-links-title">Categories</h3></li>
                                        <li><a href="#">Women’s Clothing</a></li>
                                        <li><a href="#">Men’s Clothing</a></li>
                                        <li><a href="#">Phones & Accessories</a></li>
                                        <li><a href="#">Jewelry & Watches</a></li>
                                        <li><a href="#">Bags & Shoes</a></li>
                                    </ul>
                                    <hr class="hidden-md hidden-lg">
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-links">
                                        <li>
                                            <h3 class="list-links-title">Categories</h3></li>
                                        <li><a href="#">Women’s Clothing</a></li>
                                        <li><a href="#">Men’s Clothing</a></li>
                                        <li><a href="#">Phones & Accessories</a></li>
                                        <li><a href="#">Jewelry & Watches</a></li>
                                        <li><a href="#">Bags & Shoes</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row hidden-sm hidden-xs">
                                <div class="col-md-12">
                                    <hr>
                                    <a class="banner banner-1" href="#">
                                        <img src="./img/banner05.jpg" alt="">
                                        <div class="banner-caption text-center">
                                            <h2 class="white-color">NEW COLLECTION</h2>
                                            <h3 class="white-color font-weak">HOT DEAL</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Men <i class="fa fa-caret-down"></i></a>
                        <div class="custom-menu">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="hidden-sm hidden-xs">
                                        <a class="banner banner-1" href="#">
                                            <img src="./img/banner06.jpg" alt="">
                                            <div class="banner-caption text-center">
                                                <h3 class="white-color text-uppercase">Women’s</h3>
                                            </div>
                                        </a>
                                        <hr>
                                    </div>
                                    <ul class="list-links">
                                        <li>
                                            <h3 class="list-links-title">Categories</h3></li>
                                        <li><a href="#">Women’s Clothing</a></li>
                                        <li><a href="#">Men’s Clothing</a></li>
                                        <li><a href="#">Phones & Accessories</a></li>
                                        <li><a href="#">Jewelry & Watches</a></li>
                                        <li><a href="#">Bags & Shoes</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <div class="hidden-sm hidden-xs">
                                        <a class="banner banner-1" href="#">
                                            <img src="./img/banner07.jpg" alt="">
                                            <div class="banner-caption text-center">
                                                <h3 class="white-color text-uppercase">Men’s</h3>
                                            </div>
                                        </a>
                                    </div>
                                    <hr>
                                    <ul class="list-links">
                                        <li>
                                            <h3 class="list-links-title">Categories</h3></li>
                                        <li><a href="#">Women’s Clothing</a></li>
                                        <li><a href="#">Men’s Clothing</a></li>
                                        <li><a href="#">Phones & Accessories</a></li>
                                        <li><a href="#">Jewelry & Watches</a></li>
                                        <li><a href="#">Bags & Shoes</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <div class="hidden-sm hidden-xs">
                                        <a class="banner banner-1" href="#">
                                            <img src="./img/banner08.jpg" alt="">
                                            <div class="banner-caption text-center">
                                                <h3 class="white-color text-uppercase">Accessories</h3>
                                            </div>
                                        </a>
                                    </div>
                                    <hr>
                                    <ul class="list-links">
                                        <li>
                                            <h3 class="list-links-title">Categories</h3></li>
                                        <li><a href="#">Women’s Clothing</a></li>
                                        <li><a href="#">Men’s Clothing</a></li>
                                        <li><a href="#">Phones & Accessories</a></li>
                                        <li><a href="#">Jewelry & Watches</a></li>
                                        <li><a href="#">Bags & Shoes</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <div class="hidden-sm hidden-xs">
                                        <a class="banner banner-1" href="#">
                                            <img src="./img/banner09.jpg" alt="">
                                            <div class="banner-caption text-center">
                                                <h3 class="white-color text-uppercase">Bags</h3>
                                            </div>
                                        </a>
                                    </div>
                                    <hr>
                                    <ul class="list-links">
                                        <li>
                                            <h3 class="list-links-title">Categories</h3></li>
                                        <li><a href="#">Women’s Clothing</a></li>
                                        <li><a href="#">Men’s Clothing</a></li>
                                        <li><a href="#">Phones & Accessories</a></li>
                                        <li><a href="#">Jewelry & Watches</a></li>
                                        <li><a href="#">Bags & Shoes</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="#">Sales</a></li>
                    <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="products.html">Products</a></li>
                            <li><a href="product-page.html">Product Details</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            -->
            <!-- menu nav -->
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /NAVIGATION -->


<!-- HOME -->
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="home-wrap">
            <!-- home slick -->
            <div id="home-slick">
                <!-- banner -->
                <div class="main-banner banner banner-1" style="height: 484px;">
                    <img src="\img\banners\main\mi-air-banner.jpg" alt="" style="height: 100%">
                    <div class="banner-caption text-center">
                        <h1 style="    text-shadow: 0 0 3px snow;">Xiaomi Mi Air 13.0</h1>
                        <h3 class="white-color font-weak">Այժմ արդեն Windows 11.0 - ով </h3>
                        <button class="primary-btn">Ավելին</button>
                    </div>
                </div>
                <!-- /banner -->

            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>
<!-- /HOME -->

<!-- section -->
<div class="section secondary-banners">

    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <?php foreach($images['secondary_images'] as $key => $value) { ?>
            <!-- banner -->
            <div class="col-md-3 col-sm-6">
                <a class="banner banner-1" href="#">
                    <img src="<?php echo $value->source; ?>" alt="">
                    <div class="banner-caption text-center">
                        <h2 class="white-color" style=""><?php echo $value->title; ?></h2>
                    </div>
                </a>
            </div>
            <!-- /banner -->
            <?php } ?>

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
                    <h2 class="title">ՏՈՊ</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-2 custom-dots">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section title -->

            <?php foreach ($products['top_products_4x'] as $key => $value) { ?>
                <!-- Product Single -->
                <div class="col-md-3 col-sm-3 col-xs-12">
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

                            <h2 class="product-name"><a href="/<?= $value['category'] ?>?id=<?= $value['product_category_id'] ?>"><?php echo $value['title']; ?></a></h2>
                            <div style="overflow-wrap: break-word">
                                <p style="color: #ff9933; font-weight: bold"><?php echo $value['model']; ?></p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
            <?php } ?>

        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Սիրված</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-2 custom-dots">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section title -->

            <?php foreach ($products['popular_products_4x'] as $key => $value) { ?>
                <!-- Product Single -->
                <div class="col-md-3 col-sm-3 col-xs-12">
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

                            <h2 class="product-name"><a href="/<?= $value['category'] ?>?id=<?= $value['product_category_id'] ?>"><?php echo $value['title']; ?></a></h2>
                            <div style="overflow-wrap: break-word">
                                <p style="color: #ff9933; font-weight: bold"><?php echo $value['model']; ?></p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
            <?php } ?>

        </div>
        <!-- /row -->

        <?php if(!empty($products['discounted_products_4x'])) { ?>
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Զեղչված</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-2 custom-dots">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section title -->

            <?php foreach ($products['discounted_products_4x'] as $key => $value) { ?>
                <!-- Product Single -->
                <div class="col-md-3 col-sm-3 col-xs-12">
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

                            <h2 class="product-name"><a href="/<?= $value['category'] ?>?id=<?= $value['product_category_id'] ?>"><?php echo $value['title']; ?></a></h2>
                            <div style="overflow-wrap: break-word">
                                <p style="color: #ff9933; font-weight: bold"><?php echo $value['model']; ?></p>
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
<?php } ?>
<!-- section -->
<div class="section section-grey hidden-on-phone">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row hidden-on-phone">
            <!-- banner -->
            <div class="col-md-8">
                <div class="banner banner-1">
                    <img src="/img/banners/secondary/huaway-banner.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h1 class="primary-color">Շահավետ ապրանքներ<br><span class="white-color font-weak">50% զեղչեր</span></h1>
                        <button class="primary-btn">Ավելին</button>
                    </div>
                </div>
            </div>
            <!-- /banner -->

            <!-- banner -->
            <div class="col-md-4 col-sm-6">
                <a class="banner banner-1" href="#">
                    <img src="/img/banners/secondary/pc-banner.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h2 class="white-color">Գերհզոր սարքեր</h2>
                    </div>
                </a>
            </div>
            <!-- /banner -->

            <!-- banner -->
            <div class="col-md-4 col-sm-6">
                <a class="banner banner-1" href="#">
                    <img style="height: 262px;" src="/img/banners/secondary/apple-watch-banner.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h2 class="white-color">Նոր հորիզոններ</h2>
                    </div>
                </a>
            </div>
            <!-- /banner -->
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

        <?php /*
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Latest Products</h2>
                </div>
            </div>
            <!-- section title -->

            <!-- Product Single -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single">
                    <div class="product-thumb">
                        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                        <img src="/img/product01.jpg" alt="">
                    </div>
                    <div class="product-body">
                        <h3 class="product-price">$32.50</h3>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                        </div>
                        <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                        <div class="product-btns">
                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Single -->

            <!-- Product Single -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single">
                    <div class="product-thumb">
                        <div class="product-label">
                            <span>New</span>
                            <span class="sale">-20%</span>
                        </div>
                        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                        <img src="/img/product02.jpg" alt="">
                    </div>
                    <div class="product-body">
                        <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                        </div>
                        <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                        <div class="product-btns">
                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Single -->

            <!-- Product Single -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single">
                    <div class="product-thumb">
                        <div class="product-label">
                            <span>New</span>
                            <span class="sale">-20%</span>
                        </div>
                        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                        <img src="/img/product03.jpg" alt="">
                    </div>
                    <div class="product-body">
                        <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                        </div>
                        <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                        <div class="product-btns">
                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Single -->

            <!-- Product Single -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single">
                    <div class="product-thumb">
                        <div class="product-label">
                            <span>New</span>
                        </div>
                        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                        <img src="/img/product04.jpg" alt="">
                    </div>
                    <div class="product-body">
                        <h3 class="product-price">$32.50</h3>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                        </div>
                        <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                        <div class="product-btns">
                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Single -->
        </div>
        <!-- /row -->
        */ ?>
        <!-- row -->
        <div class="row hidden-on-phone">
            <!-- banner -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="banner banner-2">
                    <img src="/img/banner19.jpg" alt="">
                    <div class="banner-caption">
                        <h2 class="white-color">Արվեստ</h2>
                        <button class="primary-btn">Ավելին</button>
                    </div>
                </div>
            </div>
            <!-- /banner -->
            <!-- banner -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="banner banner-2">
                    <img src="/img/banner15.jpg" alt="">
                    <div class="banner-caption">
                        <h2 class="white-color">Հագուստ</h2>
                        <button class="primary-btn">Ավելին</button>
                    </div>
                </div>
            </div>
            <!-- /banner -->
            <!-- banner -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="banner banner-2">
                    <img src="/img/banner16.jpg" alt="">
                    <div class="banner-caption">
                        <h2 class="white-color">Տներ</h2>
                        <button class="primary-btn">Ավելին</button>
                    </div>
                </div>
            </div>
            <!-- /banner -->
            <!-- banner -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="banner banner-2">
                    <img src="/img/banner17.jpg" alt="">
                    <div class="banner-caption">
                        <h2 class="white-color">Մեքենաներ</h2>
                        <button class="primary-btn">Ավելին</button>
                    </div>
                </div>
            </div>
            <!-- /banner -->
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Հետաքրքիր առաջարկներ</h2>
                </div>
            </div>
            <!-- section title -->
        </div>

         <?php foreach($products['random_4x'] as $key => $value) { ?>
            <!-- Product Single -->
            <div class="col-md-3 col-sm-3 col-xs-12">
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

                        <h2 class="product-name"><a href="/<?= $value['category'] ?>?id=<?= $value['product_category_id'] ?>"><?php echo $value['title']; ?></a></h2>
                        <div style="overflow-wrap: break-word">
                            <p style="color: #ff9933; font-weight: bold"><?php echo $value['model']; ?></p>
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
