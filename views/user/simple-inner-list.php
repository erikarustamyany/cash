<!-- STORE -->
<div id="store" style="padding-top: 0">
    <!-- row -->
    <div class="row">
        <?php
        $last_date = '';
        foreach($list as $key => $value) { ?>
            <!-- Product Single -->
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="product product-single-list">
                    <a href="/<?= $value['category'] ?>?id=<?= $value['product_category_id'] ?>">
                        <div class="product-thumb">
                            <img src="<?= $value['main_image']; ?>" alt="">
                        </div>
                    </a>

                    <?php if($allowFollow) { ?>
                    <div class="product-btns">
                        <button class="main-btn icon-btn follow-btn <?php if(!empty($follows[$value['id']])) { ?> followed <?php } ?>" data-pid="<?= $value['id'] ?>"><i class="fa fa-heart"></i></button>
                    </div>
                    <?php } ?>

                    <div class="product-body">
                        <h3 class="product-price"><?= number_format($value['price_dram'],0, '', ' ').'դ.' ?></h3>

                        <h2 class="product-name"><a href="/<?= $value['category'] ?>?id=<?= $value['product_category_id'] ?>"><?php echo $value['title']; ?></a></h2>
                        <div class="model-name" style="overflow-wrap: break-word">
                            <p><?php echo $value['model']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Single -->

            <?php if(($key % 3) + 1 == 0) { ?>
                <div class="clearfix visible-md visible-lg"></div>
            <?php } ?>

        <?php } ?>
    </div>
    <!-- /row -->
</div>
<!-- /STORE -->
