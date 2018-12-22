<?php echo $this->render('/ad/main/ad-main-section'); ?>

<div class="inner-properties hidden" style="padding: 5px 40px">
    <?php echo $this->render('/ad/phones/properties'); ?>
</div>

<div class="text-center">
    <button class="button-large">Ավելացնել</button>
</div>

<script>
    $('.button-large').click(function(){
        var title = $('input[name="title"]');
        var info = $('textarea[name="long_description"]');
        var state = $('select[name="state_type"]');
        var price = $('input[name="price"]');
        var brand = $('select[name="brand_id"]');
        var model = $('select[name="model_id"]');

        var data = {};
        data.title =  title.val();
        data.info = info.val();
        data.state = state.val();
        data.price_dram = price.val();
        data.model = model.val();

        data.brand_id = $('select[name="brand_id"]').val();
        data.model_id = $('select[name="model_id"]').val();

        if($('#more-prop').prop('checked')){
            data.has_properties = true;
            data.released = $('input[name="released"]').val();
            data.os = $('input[name="os"]').val();


            data.display_resolution = $('input[name="display_resolution"]').val();
            data.display_size = $('input[name="display_size"]').val();

            data.camera_front = $('input[name="camera_front"]').val();
            data.camera_back = $('input[name="camera_back"]').val();

            data.system_processor = $('input[name="system_processor"]').val();
            data.system_ram = $('input[name="system_ram"]').val();
            data.system_drive = $('input[name="system_drive"]').val();

            data.module_gps = $('input[name="module_gps"]').val();
            data.module_bluetooth = $('input[name="module_bluetooth"]').val();
            data.module_wifi = $('input[name="module_wifi"]').val();
            data.module_nfc = $('input[name="module_nfc"]').val();
            data.module_infrared = $('input[name="module_infrared"]').val();

            data.battery_type = $('input[name="battery_type"]').val();
            data.battery_size = $('input[name="battery_size"]').val();

            data.other_cardcount = $('input[name="other_cardcount"]').val();
            data.other_color = $('input[name="other_color"]').val();
        } else {
            data.has_properties = false;
        }

        data._csrf = frsc;

        $.ajax({
           url: '/ad/new-phone',
           type:'POST',
           data: data,
           success: function(e) {
               console.log(e);
           }
         })
    });
</script>
<style>
    .button-large {
        background-color: #3c3c3c;
        color: white;
        border: 1px solid white;
        width: 280px;
        max-width: 100%;
        height: 40px;
        margin-top: 15px;
        margin-bottom: 20px;
    }
     .button-large:hover {
        background-color: #F8694A;
    }
</style>


