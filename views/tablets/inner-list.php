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
    <div class="row">
        <?php
        $last_date = '';
        foreach($list as $key => $value) { ?>
            <?php if($params['ordering'] == 2 && $value['updated_time'] != $last_date) { ?>
                </div><div class="row">
                <h4 class="date-changed"><span><?php  $date = date_format(new DateTime($value['updated_time']), 'd.m.y');ARM_weekkday(date('w', strtotime($value['updated_time']))); echo ', '.  $date;?></span> </h4>
                <?php $last_date = $value['updated_time']; } ?>
        <!-- Product Single -->
        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="product product-single">
                <a href="/<?= $value['category'] ?>?id=<?= $value['id_inside'] ?>">
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

                    <h2 class="product-name"><a href="/<?= $value['category'] ?>?id=<?= $value['id_inside'] ?>"><?php echo $value['title']; ?></a></h2>
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

            <?php if(($key % 3) + 1 == 0) { ?>
                <div class="clearfix visible-md visible-lg"></div>
            <?php } ?>

        <?php } ?>
    </div>
    <!-- /row -->
</div>
<!-- /STORE -->