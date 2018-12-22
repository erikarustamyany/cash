/**
 * Created by USER on 15.08.2018.
 */
$(function(){ // let all dom elements are loaded
    $('#info-modal').on('hide.bs.modal', function (e) {
        location.replace('/');
    });
});
$('.group .select').select2({width: '100%'});

$('.input[type="text"]').change(function () {
    if($(this).val().length < 2){
        $(this).addClass('error');
    } else {
        $(this).removeClass('error');
    }
});

$('.group select').change(function () {
    if($(this).val() != 0){
        $(this).addClass('error');
    } else {
        $(this).removeClass('error');
    }
});

$('.input[type="password"]').change(function () {
    validatePassword($(this).attr('data-section'));
});

$('.input[name="username"]').change(function () {
    if($(this).val().length < 8){
        $(this).addClass('error');
    } else {
        $(this).removeClass('error');
    }
});
function  validatePassword(section) {
    if(($('#' + section + ' .input[name="password"]').val() != '' || $('#' + section + ' .input[name="password_verification"]').val()) && ($('#' + section + ' .input[name="password"]').val() != $('#' + section + ' .input[name="password_verification"]').val() || $('#' + section + ' .input[name="password"]').val().length < 7 ||  $('#' + section + ' .input[name="password_verification"]').val().length < 7 ) ){
        $('#' + section + ' .input[name="password_verification"]').addClass('error');
        $('#' + section + ' .input[name="password"]').addClass('error');
    } else {
        $('#' + section + ' .input[name="password_verification"]').removeClass('error');
        $('#' + section + ' .input[name="password"]').removeClass('error');
    }
}
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validatePhone(str, n) {
    var ret = [];
    var i;
    var len;

    ret.push(str.substr(0,3));
    for(i = 3, len = str.length; i < len; i += n) {
        ret.push(str.substr(i, n))
    }
    return ret
};

$('.input[name="phone_main"]').change(function () {
    var text = $(this).val();
    text = text.replace(/[^0-9]+/g, "");
    text = validatePhone(text,2).join('-');
    $(this).val(text);
});

$('.input[name="phone_secondary"]').change(function () {
    var text = $(this).val();
    text = validatePhone(text,2).join('-');
    $(this).val(text);
});

$('.input[name="email"]').change(function () {
    if(validateEmail($(this).val())){
        $(this).removeClass('danger');
        var that = $(this);
        setTimeout(function(){
            that.parent().find('.tool-tip').addClass('slow-hide');
        }, 1000);   setTimeout(function(){
            that.parent().find('.tool-tip').remove();
        }, 1500);
    } else {
        $(this).addClass('danger');
        $(this).parent().find('.tool-tip').remove();
        var tooltip = $(this).before('<div class="tool-tip">Սխալ մուտքագրում:</div>');
    }
});

$('.input[data-lang="am"]').keyup(function () {
    if(!onlyArmCharacters($(this))){
        $(this).parent().find('.tool-tip').remove();
        var tooltip = $(this).before('<div class="tool-tip">Գրեք հայատառ:</div>');
        var that = $(this);
        setTimeout(function(){
            that.parent().find('.tool-tip').addClass('slow-hide');
        }, 1000);   setTimeout(function(){
            that.parent().find('.tool-tip').remove();
        }, 1500);
    }
});

$('.input[data-num="true"]').keyup(function () {
    if(onlyNumbers($(this))){
        $(this).parent().find('.tool-tip').remove();
        var tooltip = $(this).before('<div class="tool-tip">Գրեք միայն թվերով:</div>');
        var that = $(this);
        setTimeout(function(){
            that.parent().find('.tool-tip').addClass('slow-hide');
        }, 1000);   setTimeout(function(){
            that.parent().find('.tool-tip').remove();
        }, 1500);
    }
});

function onlyArmCharacters(input) {
    var Regex_capital_up =/^[\u0561-\u0587]*$/gm;
    var Regex_capital_lower =/^[\u0531-\u0556]*$/gm;

    if(!(Regex_capital_up.exec(input.slice(-1)) || Regex_capital_lower.exec(input.val().slice(-1))))
    {
        var text = input.val();
        text = text.replace(/[^\u0531-\u0556\u0561-\u0587]+/g, "");
        input.val(text);
        return true;
    }

    return false;
}

function onlyNumbers(input) {
    var Regex_numbers =/^[0-9]*$/g;

    if(!(Regex_numbers.exec(input.val().slice(-1))))
    {
        var text = input.val();
        text = text.replace(/[^0-9]+/g, "");
        input.val(text);
        return true;
    }

    return false;
}

$(".region-dropdown").change(function(){
    var city_drop = $($(this).attr('data-fordrop'));
    city_drop.next().find('.select2-selection--single').find('.select2-selection__rendered').text('Ընտրել');
    var optionsHTML = '<option value="0">Ընտրել </option>';
    city_drop.empty().html(optionsHTML);
    console.log($($(this).attr('data-fordrop')));
    $.ajax({
        url: '/tablets/get-cities',
        data: {region_id: $(this).val()},
        success: function(r) {
            var result = JSON.parse(r);
            if(result.status == 1){
                var optionsHTML = '<option value="0">Ընտրել </option>';
                $.each(result.data, function(key, val) {
                    optionsHTML += '<option value="' + val['id'] + '">' + val['title'].trim() + '</option>';
                });

                city_drop.empty().html(optionsHTML);
            } else {

            }
        }
    })
});

$('#select2-region-container').parent().css({'background-color': 'transparent'});
$('#select2-c-drop-personal-container').parent().css({'background-color': 'transparent'});
$('#select2-c-drop-shop-container').parent().css({'background-color': 'transparent'});
$('#select2-c-drop-company-container').parent().css({'background-color': 'transparent'});
