<?php echo $this->render('/main/navigation-bar'); ?>

<div class="col-lg-12 col-sm-12 user-profile-main">

    <!-- section title -->
    <div class="col-md-12">
        <div class="section-title">
            <h3 class="title">Հիմնական</h3>
        </div>
    </div>
    <!-- section title -->


    <div class="ad-inner-container">
        <div class="group">
            <label for="title" class="label">Անվանում</label>
            <input name="title" type="text" class="input" value="" maxlength="70" autocomplete="off">
        </div>

        <div class="group">
            <label for="long_descripttion" class="label">Տեղեկություն</label>
            <textarea name="long_description" type="text" class="text-about" value="" maxlength="1000">
            </textarea>
        </div>

        <div class="group">
            <label for="state_type" class="label">Վիճակ</label>
            <br>
            <select name="state_type" class="select select-ad">
                <option value="0">Ընտրել</option>
                <option value="1">Նոր</option>
                <option value="2">Օգտագործած</option>
                <option value="3">Մասերի համար</option>
            </select>
        </div>

        <div class="group">
            <label for="price" class="label">Գինը (դրամ)</label>
            <input name="price" type="text" class="input" value="" data-number="true" maxlength="18" autocomplete="off">
        </div>

        <div class="group">
            <label for="brand_id" class="label">Ֆիրմա</label>
            <br>
            <select name="brand_id" class="select select-ad">
                <option value="0">Ընտրել</option>
            </select>
        </div>

        <div class="group">
            <label for="model_id" class="label">Մոդել</label>
            <br>
            <select name="model_id" class="select select-ad">
                <option value="0">Ընտրել</option>
            </select>
        </div>

        <div class="ad-prop-title">
            <label for="more-prop" class="title-text">Հավելյալ կարգավորումներ</label>
            <input name="more-prop" id="more-prop" class="title-checkbox load-properties" type="checkbox">
        </div>

        <div class="inner-prop">
        </div>
    </div>

</div>
<script>
    function onlyNumbers(input) {
        var Regex_numbers =/^[0-9]*$/g;

        if(!(Regex_numbers.exec(input.val().slice(-1)))) {
            var text = input.val();
            text = text.replace(/[^0-9]+/g, "");
            input.val(text);
            return true;
        }

        return false;
    }
    $('.input[data-number="true"]').keyup(function () {
        if(onlyNumbers($(this))){
            $(this).parent().find('.tool-tip').remove();
        }
    });
    $(document).ready(function(){
        $('.text-about').text('');
    });

    $('.load-properties').click(function() {
        $('.inner-properties').toggleClass('hidden');
    })
</script>
<style>
    .title-checkbox {
        width: 31px;
        height: 16px;
        margin-top: 0px;
    }
    .group {
        margin-top: 20px;
    }

    .input {
        background-color: white;
    }

    .select.select-ad {
        height: 40px;
        width: 250px;
    }

    .select:focus {
        outline: none;
        /*border: 1px solid #F8694A;*/
    }

    .ad-prop-title {
        margin-top: 30px;
        font-size: 16px;
        font-weight: bold;
    }

    .label.label {
        margin-bottom: 5px;
        display: inline-block;
    }
</style>