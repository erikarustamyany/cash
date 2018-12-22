<img src="<?= $product['original_image_path'] ?>" style="width: 200px; margin: 5px;">
<div class="detailes-block properties-container">
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Ընդհանուր բնութագրեր</div>

        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Մոդել</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= $product['model'] ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Հայտարարության տարին</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= $product['released'] ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Օպերացիոն համակարգ</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= $product['platform_os'] ?></div>
    </div>
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Էկրան</div>

        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Էկրանի բանաձևը</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= $product['display_resolution'] ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Էկրանի չափսը</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= $product['display_size'] ?> դույմ</div>
    </div>
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Տեսախցիկներ</div>

        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Դիմային տեսախցիկ</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= $product['front_camera'] ?> MP</div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Հիմնական տեսախցիկ</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= $product['back_camera'] ?> MP</div>
    </div>
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Հիշողություն և Պրոցեսոր</div>

        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Պրոցեսոր</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= $product['platform_cpu'] ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Օպերատիվ հիշողություն</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= $product['memory_ram'] ?> GB</div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Հիշողություն</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= $product['memory_internal'] ?> GB</div>
    </div>
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Ցանց</div>

        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">GPS</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= (!empty($product['comm_gps']))? 'Այո':'Ոչ' ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Bluetooth</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= (!empty($product['comm_bluetooth']))? 'Այո':'Ոչ' ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">WiFi Ցանց</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= (!empty($product['comm_wlan']))? 'Այո':'Ոչ' ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">NFC</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= (!empty($product['comm_nfc']))? 'Այո':'Ոչ' ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Ինֆրակարմիր պորտ:</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= (!empty($product['comm_infrared']))? 'Այո':'Ոչ' ?></div>
    </div>
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Սնուցում</div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Մարտկոցի տեսակը</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= (!empty($product['battery_type']))? $product['battery_type']:'Ոչ' ?> </div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Մարտկոցի հզորությունը</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= (!empty($product['battery']))? $product['battery'] . '  mAh':'Ոչ' ?></div>
    </div>
    <div class="row block-item">
        <div class="col-lg-12 col-md-12 col-sm-12 block-title details-list-header">Այլ</div>

        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Կշիռ</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= (!empty($product['weight']))? $product['weight'] . ' g':'' ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">Չափ</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= (!empty($product['size']))? $product['size']:'Ոչ' ?></div>
        <div class="details-item col-lg-3 col-md-3 col-sm-6 col-xs-12">SIM քարտի քանակ</div>
        <div class="details-item col-lg-9 col-md-9 col-sm-6 col-xs-12"><?= (!empty($product['card_slot']))? $product['card_slot'] . ' SIM':'Ոչ' ?></div>
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