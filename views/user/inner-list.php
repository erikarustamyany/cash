<?php
function ARM_weekkday($day){
    switch ($day) {
        case 1:
            echo 'Երկուշաբթի';
            break;
        case 2:
            echo 'Երեքշաբթի';
            break;
        case 3:
            echo 'Չորեքշաբթի';
            break;
        case 4:
            echo 'Հինգշաբթի';
            break;
        case 5:
            echo 'Ուրբաթ';
            break;
        case 6:
            echo 'Շաբաթ';
            break;
        case 0:
            echo 'Կիրակի';
            break;
    }
}
?>

<!-- STORE -->
<div id="store">

    <!-- row -->
    <div class="row  list-container">
        <?php
        $last_date = '';
        foreach($list as $key => $value) { ?>
            <?php if($value['updated_time'] != $last_date) { ?>
                </div><div class="row  list-container">
                <h4 class="date-changed"><span><?php  $date = date_format(new DateTime($value['updated_time']), 'd.m.y');ARM_weekkday(date('w', strtotime($value['updated_time']))); echo ', '.  $date;?></span> </h4>
                <?php $last_date = $value['updated_time']; } ?>
        <!-- Product Single -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="product product-single-list">
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

                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                </div>

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

            <?php if(($key % 3) + 1 == 0) { ?>
                <div class="clearfix visible-md visible-lg"></div>
            <?php } ?>

        <?php } ?>
    </div>
    <!-- /row -->
</div>
<!-- /STORE -->

<style>
        .date-changed {
            max-height: 6ch;
        }
        .date-changed {
            overflow: hidden;
        }
        .product.product-single-list .product-body {
            display: inline-block;
            position: absolute;
            padding: 0 33px;
        }

        .product-single-list .product-thumb {
            display: inline-block;
            position: relative;
        }

        .product-single-list .product-thumb {
            width: 230px;
            height: 145px;
            overflow: hidden;        }

        .product-single-list .product-body .product-price{
            font-size: 19px;
        }

        .product-single-list .product-body .product-name{
            font-size: 21px;
        }

        .product-single-list .product-thumb img {
            width: 100%;
            height: 100%;
        }

        .product-single-list .product-label {
            position: absolute;
        }

        .product-single-list {
            margin: 20px 5px;
        }

        .product-single-list .product-btns {
            position: absolute;
            left: 209px;
            bottom: 21px;
        }
        .list-container {
            padding: 0 17px;
        }



        @media only screen and (max-width: 767px) and (min-width: 585px) {
            .product.product-single-list .product-body {
                display: inline-block;
                position: absolute;
            }

            .product-single-list .product-body .product-price{
                font-size: 14px;
            }

            .product-single-list .product-body .product-name{
                font-size: 14px;
            }

            .product-single-list .product-thumb {
                width: 153px;
                height: 96px;
            }

            .product-single-list .icon-btn.main-btn {
                width: 30px;
                height: 30px;
                font-size: 13px;
                line-height: 32px;
            }

            .product-single-list .product-btns {
                left: 142px;
                bottom: 21px;
            }

            .product-single-list .product-label {
                font-size: 8px;
            }

            .date-changed {
                font-size: 14px;
            }

        }

 @media only screen and (max-width: 585px) {
            .product.product-single-list .product-body {
                display: inline-block;
                position: absolute;
            }

            .product-single-list .product-body .product-price{
                font-size: 11px;
            }

            .product-single-list .product-body .product-name{
                font-size: 11px;
            }

            .product-single-list .product-thumb {
                width: 139px;
                height: 87px;
            }

            .product-single-list .icon-btn.main-btn {
                width: 30px;
                height: 30px;
                font-size: 13px;
                line-height: 32px;
            }

            .product-single-list .product-btns {
                left: 128px;
                bottom: 21px;
            }

            .product-single-list .product-label {
                font-size: 8px;
            }

            .date-changed {
                font-size: 14px;
            }

        }

</style>