<!-- NAVIGATION -->
<div id="navigation">
    <!-- container -->
    <div class="container">
        <div id="responsive-nav">
            <!-- category nav -->
            <div class="category-nav show-on-click">
                <span class="category-header">Բաժիններ <i class="fa fa-list"></i></span>
                <!-- Search -->
                <div class="header-search-phone pull-right" style="width: 100%; margin։0 20px;">
                    <form style="width: 100%">
                        <input class="input search-input" placeholder="Որոնում" type="text" style="width: 100%; margin։0 20px;">
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
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
