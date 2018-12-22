<!-- NAVIGATION -->
<div id="navigation">
    <!-- container -->
    <div class="container">
        <div id="responsive-nav">
            <!-- category nav -->
            <div class="category-nav show-on-click">
                <span class="category-header">Բաժիններ<i class="fa fa-list"></i></span>
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


<!-- section -->
<div class="tablets-list section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Առանձնացնել</h3>
                    <button id="submit-filters" class="primary-btn">Ընդունել</button>
                    <button id="clear-filters" class="main-btn" style="margin-top: 5px;">Մաքրել բոլորը</button>
                </div>
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <div style="margin-top: 20px;">
                        <div class="sort-filter" style="margin-left: 0px">
                            <h3 class="aside-title">Ըստ մոդելի</h3>
                            <select id="brand-dropdown" class="input search-dropdown">
                                <option value="0">Ֆիրմա</option>
                                <?php foreach($brand_list as $key => $value) { ?>
                                    <option value="<?php echo $value['id']; ?>" <?php if(!empty($params['brand']) && $value['id'] == $params['brand']) { echo 'selected'; } ?>><?php echo $value['brand']?></option>
                                <?php } ?>
                            </select>
                            <select id="model-dropdown" class="input">
                                <option value="0">Մոդել</option>
                                <?php if(!empty($model_name) && !empty($list)) {?>
                                    <option value="<?= htmlspecialchars($params['model']);?>" selected><?= $model_name; ?></option>
                                <?php } ?>
                            </select>
<!--                            <a href="#" id="search-model-btn" class="main-btn icon-btn"><i class="fa fa-search"></i></a>-->
                        </div>
                    </div>
                </div>
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside center" >
                    <h3 class="aside-title">Ըստ գնի</h3>
                    <input id="price-from-input" type="number" min="0" class="input input-number" value="<?= (!empty($params['price_from']))? htmlspecialchars($params['price_from']):'' ?>">
                    -
                    <input id="price-to-input" type="number" min="0" class="input input-number" value="<?= (!empty($params['price_to']))? htmlspecialchars($params['price_to']):'' ?>">
                        <div class="div-select-aside">
                    <select id="money-type" class="input">
                        <option value="dram" <?= (!empty($params['price_type']) && $params['price_type'] == 'dram')? 'selected':'' ?>>AMD</option>
                        <option value="dollar" <?= (!empty($params['price_type']) && $params['price_type'] == 'dollar')? 'selected':'' ?>>USD</option>
                    </select>
                        </div>

                </div>
                <!-- aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <div style="margin-top: 20px;">
                        <div class="sort-filter" style="margin-left: 0px">
                            <h3 class="aside-title">Ըստ տարածաշրջանի</h3>
                            <select id="region-dropdown" class="input search-dropdown">
                                <option value="0">Տարածաշրջան</option>
                                <?php foreach($region_list as $key => $value) { ?>
                                    <option value="<?php echo $value['id']; ?>" <?php if(!empty($params['region']) && $params['region'] == $value['id']) { echo 'selected'; } ?>><?php echo $value['name']?></option>
                                <?php } ?>
                            </select>
                            <select id="city-dropdown" class="input">
                                <option value="0">Քաղաք</option>
                                <?php if(!empty($city_name)) {?>
                                    <option value="<?= htmlspecialchars($params['city']);?>" selected><?= $city_name; ?></option>
                                <?php } ?>
                            </select>
                            <!--                            <a href="#" id="search-model-btn" class="main-btn icon-btn"><i class="fa fa-search"></i></a>-->
                        </div>
                    </div>
                </div>
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Ըստ տեսակի</h3>
                    <ul class="product-filter-list list-links noselect">
                        <li class="filter-type <?= (!empty($params['type_product']) && $params['type_product'] == '1')? 'active':'' ?>"><a data-path="type_product=1">Նոր</a></li>
                        <li class="filter-type <?= (!empty($params['type_product']) && $params['type_product'] == '2')? 'active':'' ?>"><a data-path="type_product=2">Օգտագործված</a></li>
                        <li class="filter-type <?= (!empty($params['type_product']) && $params['type_product'] == '3')? 'active':'' ?>"><a data-path="type_product=3">Մասերի համար</a></li>
                    </ul>
                </div>
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Ըստ գույնի</h3>
                    <ul class="product-filter-color color-option noselect">
                        <li class="filter-color color-button-aside <?= (!empty($params['color']) && $params['color'] == 'black')? 'active':'' ?>"><a style="background-color:#000;" data-path="color=black"></a></li>
                        <li class="filter-color color-button-aside <?= (!empty($params['color']) && $params['color'] == 'white')? 'active':'' ?>"><a style="background-color:#fff;" data-path="color=white"></a></li>
                        <li class="filter-color color-button-aside <?= (!empty($params['color']) && $params['color'] == 'gray')? 'active':'' ?>"><a style="background-color:#DADADA;" data-path="color=gray"></a></li>
                        <li class="filter-color color-button-aside <?= (!empty($params['color']) && $params['color'] == 'blue')? 'active':'' ?>"><a style="background-color:#1f70f2;" data-path="color=blue"></a></li>
                        <li class="filter-color color-button-aside <?= (!empty($params['color']) && $params['color'] == 'orange')? 'active':'' ?> "><a style="background-color:#ffae00;" data-path="color=orange"></a></li>
                    </ul>
                </div>
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Ըստ համակարգի</h3>
                    <ul class="product-filter-list size-option noselect">
                        <li class="system-btn-aside filter-system <?= (!empty($params['system']) && $params['system'] == 'android')? 'active':'' ?>"><a data-path="system=Android">Android</a></li>
                        <li class="system-btn-aside filter-system <?= (!empty($params['system']) && $params['system'] == 'ios')? 'active':'' ?>"><a data-path="system=IOS">IOS</a></li>
                        <li class="system-btn-aside filter-system <?= (!empty($params['system']) && $params['system'] == 'java')? 'active':'' ?>"><a data-path="system=JAVA">JAVA</a></li>
                    </ul>
                </div>
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Ըստ մարտկոցի (մԱ/ժ)</h3>
                    <ul class="product-filter-list list-links noselect">
                        <li class="filter-battery <?= (!empty($params['battery']) && $params['battery'] == '0,1600')? 'active':'' ?>"><a data-path="battery=0,1600">մինչև 1600</a></li>
                        <li class="filter-battery <?= (!empty($params['battery']) && $params['battery'] == '1600,2600')? 'active':'' ?>"><a data-path="battery=1600,2600">1600 ից 2600</a></li>
                        <li class="filter-battery <?= (!empty($params['battery']) && $params['battery'] == '2600,4500')? 'active':'' ?>"><a data-path="battery=2600,4500">2600 ից 4500</a></li>
                        <li class="filter-battery <?= (!empty($params['battery']) && $params['battery'] == '4500,99999999')? 'active':'' ?>"><a data-path="battery=4500,99999999">4500 ից ավելի</a></li>
                    </ul>
                </div>
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Ըստ կամերայի (մեգապիկսել)</h3>
                    <ul class="product-filter-list list-links noselect">
                        <li class="filter-camera <?= (!empty($params['camera']) && $params['camera'] == '0,3')? 'active':'' ?>"><a data-path="camera=0,3">մինչև 3</a></li>
                        <li class="filter-camera <?= (!empty($params['camera']) && $params['camera'] == '3,5')? 'active':'' ?>"><a data-path="camera=3,5">3 ից 5</a></li>
                        <li class="filter-camera <?= (!empty($params['camera']) && $params['camera'] == '5,7')? 'active':'' ?>"><a data-path="camera=5,7">5 ից 7</a></li>
                        <li class="filter-camera <?= (!empty($params['camera']) && $params['camera'] == '7,99999')? 'active':'' ?>"><a data-path="camera=>7,99999">7 ից ավելի</a></li>
                    </ul>
                </div>
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Ըստ էկրանի (դույմ)</h3>
                    <ul class="product-filter-list list-links noselect">
                        <li class="filter-display <?= (!empty($params['display']) && $params['display'] == '0,4.5')? 'active':'' ?>"><a data-path="display=0,4.5" onclick="">մինչև 4.5</a></li>
                        <li class="filter-display <?= (!empty($params['display']) && $params['display'] == '4.5,5.5')? 'active':'' ?>"><a data-path="display=4.5,5.5">4.5</a></li>
                        <li class="filter-display <?= (!empty($params['display']) && $params['display'] == '5.5,6.5')? 'active':'' ?>"><a data-path="display=5.5,6.5">5</a></li>
                        <li class="filter-display <?= (!empty($params['display']) && $params['display'] == '6.5,99999')? 'active':'' ?>"><a data-path="display=6.5,99999">5.5 ից ավելի</a></li>
                    </ul>
                </div>
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside hidden-on-phone">
                    <h3 class="aside-title">Հիմա հայտնի են</h3>
                    <?php foreach($aside_items as $key => $product) {?>
                    <!-- widget product -->
                    <div class="product product-widget">
                        <div class="product-thumb">
                            <img src="<?= $product['main_image'] ?>" alt="">
                        </div>
                        <div class="product-body">
                            <h2 class="product-name" style="overflow-wrap: break-word"><a href="#"><?= $product['title'] ?></a></h2>
                            <h3 class="product-price"><?= $product['price_dram']; ?>դ.</h3>
                            <div class="product-rating">
                                <?php for($i = 0; $i < 50; $i+=10){ ?>
                                <i class="fa fa-star <?= ($i*10 > (int)$product['likes'])? 'empty':'' ?>"></i>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <!-- /widget product -->
                    <?php } ?>
                </div>
                <!-- /aside widget -->
            </div>
            <!-- /ASIDE -->

            <!-- MAIN -->
            <div id="main" class="col-md-9" style="padding-top: 10px;">
                <span style="font-size: 20px; cursor: default;">Հեռախոսներ</span>
                <div id="store-content">

                <?php if(count($list) > 0) { ?>
                    <?php echo $this->render('/tablets/store-filter', ['params' => $params, 'isTop' => true]); ?>

                    <?php echo $this->render('/tablets/inner-list', ['list' => $list, 'params' => $params]); ?>

                    <?php echo $this->render('/tablets/store-filter', ['params' => $params, 'isTop' => false]); ?>
                <?php } else { ?>
                    <hr>
                    <div class="inline-btn-section">
                        <h3>Ոչինչ չի գտնվել:</h3>
                    </div>
                <?php } ?>
                </div>
            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->


<script>
$('#brand-dropdown').select2({width: '212px'});
$('#model-dropdown').select2({width: '212px'});
$('#region-dropdown').select2({width: '212px'});
$('#city-dropdown').select2({width: '212px'});


$("#brand-dropdown").change(function(){
    $('#model-dropdown').next().find('.select2-selection--single').find('.select2-selection__rendered').text('Մոդել');
    var optionsHTML = '<option value="0">Մոդել </option>';
    $('#model-dropdown').empty().html(optionsHTML);

    $.ajax({
        url: '/tablets/get-models',
        data: {brand_id: $(this).val()},
        success: function(r) {
            var result = JSON.parse(r);
            if(result.status == 1){
                var optionsHTML = '<option value="0">Մոդել </option>';
                $.each(result.data, function(key, val) {
                    optionsHTML += '<option value="' + val['id'] + '">' + val['name'] + '</option>';
                });
                $('#model-dropdown').empty().html(optionsHTML);

            } else {

            }
        }
    })
});

$("#region-dropdown").change(function(){
    $('#city-dropdown').next().find('.select2-selection--single').find('.select2-selection__rendered').text('Մոդել');
    var optionsHTML = '<option value="0">Մոդել </option>';
    $('#city-dropdown').empty().html(optionsHTML);

    $.ajax({
        url: '/tablets/get-cities',
        data: {region_id: $(this).val()},
        success: function(r) {
            var result = JSON.parse(r);
            if(result.status == 1){
                var optionsHTML = '<option value="0">Մոդել </option>';
                $.each(result.data, function(key, val) {
                    optionsHTML += '<option value="' + val['id'] + '">' + val['title'] + '</option>';
                });
                $('#city-dropdown').empty().html(optionsHTML);

            } else {

            }
        }
    })
});


$('#product-order-btn').click(function(){
    var ordertype = $('#product-order-select').val();
    var url = "<?= $params['requested_url'] ?>";
    var attr = 'ordering=' + ordertype + '&';

    url = url + attr;

    location.replace(url);
});

$('.list-pages').click(function(){
    var page = $(this).text();
    var url = "<?= $params['requested_url'] . (!empty($params['ordering'])?  'ordering='. $params['ordering'] . '&':'') ?>";

    var attr = 'page=' + page + '&';

    url = url + attr;

    location.replace(url);
});

    $('.product-filter-list li a').click(function() {
        if(!$(this).parent().hasClass('active')) {
            $(this).parent().parent().find('.active').removeClass('active');
            $(this).parent().addClass('active');
        } else {
            $(this).parent().removeClass('active');
        }
    });
    $('.product-filter-color li a').click(function() {
        if(!$(this).parent().hasClass('active')) {
            $(this).parent().parent().find('.active').removeClass('active');
            $(this).parent().addClass('active');
        } else {
            $(this).parent().removeClass('active');

        }
    });

    $('#submit-filters').click(function(){
        var url = '/tablets/list?';

        var type = $('#money-type').val();
        var from = $('#price-from-input').val();
        var to = $('#price-to-input').val();

        var model = $('#model-dropdown').val();
        var brand = $('#brand-dropdown').val();
        var region = $('#region-dropdown').val();
        var city = $('#city-dropdown').val();

        var color = $('.filter-color.active').find('a').attr('data-path');
        var system = $('.filter-system.active').find('a').attr('data-path');
        var battery = $('.filter-battery.active').find('a').attr('data-path');
        var camera = $('.filter-camera.active').find('a').attr('data-path');
        var display = $('.filter-display.active').find('a').attr('data-path');
        var type_product = $('.filter-type.active').find('a').attr('data-path');



        if(!(typeof color == 'undefined')) {
            url += color + '&';
        }

        if(!(typeof system == 'undefined')) {
            url += system + '&';
        }

        if(!(typeof battery == 'undefined')) {
            url += battery + '&';
        }

        if(!(typeof camera == 'undefined')) {
            url += camera + '&';
        }

        if(!(typeof display == 'undefined')) {
            url += display + '&';
        }

        if(model != 0) {
            url += 'model=' + model + '&';
        }
        if(brand != 0) {
            url += 'brand=' + brand + '&';
        }
        if(region != 0) {
            url += 'region=' + region + '&';
        }
        if(city != 0) {
            url += 'city=' + city + '&';
        }

        if(typeof type_product != 'undefined') {
            url += type_product + '&';
        }


        if(type != '') {
            if (from != '') {
                url += 'price_from=' + from + '&price_type=' + type + '&';
                        if(to) {
                            url += 'price_to=' + to ;
                        }
            }
            if (to != '') {
                url += 'price_to=' + to + '&price_type=' + type + '&';
                        if(from) {
                            url += 'price_from=' + from;
                        }
            }
        }


        location.replace(url);
        //add-filter-query
    });


 $('#clear-filters').click(function(){
        var url = '/tablets/list';
        location.replace(url);

        /* by JavaScript
        var type = $('#money-type').val('dram');
        var from = $('#price-from-input').val('');
        var to = $('#price-to-input').val('');

        var model = $('#model-dropdown').val(0);

        var color = $('.filter-color.active').removeClass('active');
        var system = $('.filter-system.active').removeClass('active');
        var battery = $('.filter-battery.active').removeClass('active');
        var camera = $('.filter-camera.active').removeClass('active');
        var display = $('.filter-display.active').removeClass('active');
        */
    });

function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};

</script>
