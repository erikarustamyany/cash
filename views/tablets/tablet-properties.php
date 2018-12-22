<img src="<?= $product['original_image_path'] ?>" style="width: 200px; margin: 5px;">
<div class="detailes-block">
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Ընդհանուր բնութագրեր</div>

        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Մոդել</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= $product['model'] ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Հայտարարության տարին</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= $product['released'] ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Օպերացիոն համակարգ</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= $product['platform_os'] ?></div>
    </div>
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Էկրան</div>

        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Էկրանի բանաձևը</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= $product['display_resolution'] ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Էկրանի չափսը</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= $product['display_size'] ?> դույմ</div>
    </div>
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Տեսախցիկներ</div>

        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Դիմային տեսախցիկ</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= $product['front_camera'] ?> MP</div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Հիմնական տեսախցիկ</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= $product['back_camera'] ?> MP</div>
    </div>
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Հիշողություն և Պրոցեսոր</div>

        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Պրոցեսոր</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= $product['platform_cpu'] ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Օպերատիվ հիշողություն</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= $product['memory_ram'] ?> GB</div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Հիշողություն</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= $product['memory_internal'] ?> GB</div>
    </div>
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Ցանց</div>

        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">GPS</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= (!empty($product['comm_gps']))? 'Այո':'Ոչ' ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Bluetooth</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= (!empty($product['comm_bluetooth']))? 'Այո':'Ոչ' ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">WiFi Ցանց</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= (!empty($product['comm_wlan']))? 'Այո':'Ոչ' ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">NFC</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= (!empty($product['comm_nfc']))? 'Այո':'Ոչ' ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Ինֆրակարմիր պորտ:</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= (!empty($product['comm_infrared']))? 'Այո':'Ոչ' ?></div>
    </div>
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Սնուցում</div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Մարտկոցի տեսակը</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= (!empty($product['battery_type']))? $product['battery_type']:'Ոչ' ?> </div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Մարտկոցի հզորությունը</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= (!empty($product['battery']))? $product['battery']:'Ոչ' ?>  mAh </div>
    </div>
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Այլ</div>

        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Կշիռ</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= (!empty($product['weight']))? $product['weight']:'' ?> g</div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-6">Չափ</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-6"><?= (!empty($product['size']))? $product['size']:'Ոչ' ?></div>
    </div>
</div>

<style>
    .details-list-header {
        padding: 10px 0;
        font-size: 20px;
        width: 100%;
        text-align: left;
    }
    .details-item{
        background: #F5F5F5;
        padding: 10px 15px;
        border: #FFF solid;
        border-width: 0 1px 1px 0;
    }
    .detailes-block{
        padding: 0 15px;
    }
</style>