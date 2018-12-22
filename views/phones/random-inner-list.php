
<!-- STORE -->
<div id="store">
    <!-- row -->
    <div class="row">
        <?php
        $last_date = '';
        foreach($list as $key => $value) { ?>
            <!-- Product Single -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="product product-single-list">
                    <a href="/<?= $value['category'] ?>?id=<?= $value['product_category_id'] ?>">
                        <div class="product-thumb">
                            <img src="<?= $value['main_image']; ?>" alt="">
                        </div>
                    </a>

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
