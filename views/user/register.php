<?php echo $this->render('/main/navigation-bar'); ?>

<div class="inner-wrap">
<div class="login-wrap">
    <div class="login-html">

        <!-- section title -->
                <h2 class="reg-title">Գրանցվել որպես</h2>
        <!-- section title -->

        <div class="container navbar" style="width: 100%;">
            <div class="row">
                <ul class="reg-nav">
                    <li class="col-md-3 col-sm-4 reg-nav-item active"><a data-toggle="pill" href="#personal">Անհատ</a></li>
                    <li class="col-md-6 col-sm-4 reg-nav-item "><a data-toggle="pill" href="#company">Կազմակերպություն</a></li>
                    <li class="col-md-3 col-sm-4 reg-nav-item"><a data-toggle="pill" href="#shop">Խանութ</a></li>
                </ul>
            </div>
        </div>


        <div class="tab-content">
            <div id="personal" class="tab-pane fade in active">
                <div class="group">
                    <label for="first_name" class="label">Անուն</label>
                    <input name="first_name" data-lang="am" type="text" class="input">
                </div>
                <div class="group">
                    <label for="last_name" class="label">Ազգանուն</label>
                    <input name="last_name" data-lang="am" type="text" class="input">
                </div>

                <div class="group">
                    <label for="middle_name" class="label">Հայրանուն</label>
                    <input name="middle_name" data-lang="am" type="text" class="input">
                </div>

                <div class="group">
                    <label for="username" class="label">Ծածկանուն</label>
                    <input name="username" type="text" class="input">
                </div>

                <div class="group">
                    <label for="password" class="label">Ծածկագիր</label>
                    <input name="password" type="password" class="input" data-section="personal">
                </div>

                <div class="group">
                    <label for="password_verification" class="label">Կրկնեք ծածկագիրը</label>
                    <input name="password_verification" type="password" class="input"  data-section="personal">
                </div>

                <div class="group">
                    <label for="region" class="label">Մարզ</label>
                    <select id="region-personal" name="region"  class="input select region-dropdown" data-fordrop="#c-drop-personal">
                        <option value="0">Տարածաշրջան</option>
                        <?php foreach($region_list as $key => $value) { ?>
                            <option value="<?php echo $value['id']; ?>" <?php if(!empty($params['region']) && $params['region'] == $value['id']) { echo 'selected'; } ?>><?php echo $value['name']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="group">
                    <label for="city" class="label">Քաղաք</label>
                    <select id="c-drop-personal" name="city" class="input select city-dropdown c-drop-personal">
                      <option value="0">Ընտրել</option>
                    </select>
                </div>
                <div class="group">
                    <label for="phone_main" class="label">Հիմնական հեռախոսահամար</label>
                    <input type="tel" class="input" name="phone_main" placeholder="098-98-98-98" maxlength="9" data-num="true">
                </div>
                <div class="group">
                    <label for="phone_secondary" class="label">Երկրորդական հեռախոսահամար (հավելյալ)</label>
                    <input name="phone_secondary" type="text" class="input" placeholder="098-98-98-98" maxlength="9" data-num="true">
                </div>
                <div class="group">
                    <label for="avatar_image" class="label">Անձնական լուսանկար</label>

                    <div class="upload-btn-wrapper">
                        <button class="btn">Ընտրել նկարը</button>
                        <input type="hidden" class="image-name input" name="image-avatar-personal" data-for="personal">
                        <input type="file" name="upload_image" class="upload_image" data-for="personal">
                    </div>
                    <div class="image-container uploaded_image"  data-for="personal"></div>

                </div>
                <div class="group">
                    <label for="email" class="label">E-mail (հավելյալ)</label>
                    <input name="email" type="email" class="input" placeholder="example@mail.com">
                </div>
                <div class="group">
                    <button class="button-large">Գրանցվել</button>
                </div>
            </div>
            <div id="company" class="tab-pane fade">
                <div class="group">
                    <label for="company_name" class="label">Կազմակերպության անունը</label>
                    <input name="company_name" type="text" class="input">
                </div>

                <div class="group">
                    <label for="username" class="label">Ծածկանուն</label>
                    <input name="username" type="text" class="input">
                </div>

                <div class="group">
                    <label for="password" class="label">Ծածկագիր</label>
                    <input name="password" type="password" class="input"  data-section="company">
                </div>

                <div class="group">
                    <label for="password_verification" class="label">Կրկնեք ծածկագիրը</label>
                    <input name="password_verification" type="password" class="input" data-section="company">
                </div>

                <div class="group">
                    <label for="user" class="label">Մարզ</label>
                    <select id="region-company" name="region"  class="input select region-dropdown" data-fordrop="#c-drop-company">
                        <option value="0">Տարածաշրջան</option>
                        <?php foreach($region_list as $key => $value) { ?>
                            <option value="<?php echo $value['id']; ?>" <?php if(!empty($params['region']) && $params['region'] == $value['id']) { echo 'selected'; } ?>><?php echo $value['name']?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="group">
                    <label for="city" class="label">Քաղաք</label>
                    <select id="c-drop-company" name="city"  class="input select city-dropdown c-drop-company">
                        <option value="0">Ընտրել</option>
                    </select>
                </div>

                <div class="group">
                    <label for="address" class="label">Հասցե</label>
                    <input type="text" name="address" class="input"">
                </div>

                <div class="group">
                    <label for="coordinates" class="label">Կոորդինատներ</label>
                    <div class="helper-map">
                        <div id="map-section-company" class="map-section"></div>
                    </div>
                    <input type="text" name="coordinate-x" class="input" placeholder="Լայնություն" disabled>
                    <input type="text" name="coordinate-y" class="input" placeholder="Երկարություն" disabled>
                </div>

                <div class="group">
                    <label for="wep-page" class="label">Վեբ կայք (հավելյալ)</label>
                    <input name="wep-page" type="text" class="input">
                </div>

                <div class="group">
                    <label for="phone_main" class="label">Հիմնական հեռախոսահամար</label>
                    <input name="phone_main" type="text" class="input" placeholder="098-98-98-98" maxlength="9" data-num="true">
                </div>
                <div class="group">
                    <label for="phone_secondary" class="label">Երկրորդական հեռախոսահամար (հավելյալ)</label>
                    <input name="phone_secondary" type="text" class="input" placeholder="098-98-98-98" maxlength="9" data-num="true">
                </div>
                <div class="group">
                    <label for="avatar_image" class="label">Լոգո կամ կենտրոնի լուսանկար</label>

                    <div class="upload-btn-wrapper">
                        <button class="btn">Ընտրել նկարը</button>
                        <input type="hidden" class="image-name input" name="image-avatar-company"  data-for="company">
                        <input type="file" name="upload_image" class="upload_image" data-for="company">
                    </div>
                    <div class="image-container uploaded_image"  data-for="company"></div>

                </div>
                <div class="group">
                    <label for="email" class="label">E-mail (հավելյալ)</label>
                    <input name="email" type="email" class="input"  placeholder="example@mail.com">
                </div>
                <div class="group">
                    <button class="button-large">Գրանցվել</button>
                </div>
            </div>
            <div id="shop" class="tab-pane fade">
                <div class="group">
                    <label for="shop_name" class="label">Խանութի անունը</label>
                    <input name="shop_name" type="text" class="input">
                </div>

                <div class="group">
                    <label for="username" class="label">Ծածկանուն</label>
                    <input name="username" type="text" class="input">
                </div>

                <div class="group">
                    <label for="password" class="label">Ծածկագիր</label>
                    <input name="password" type="password" class="input"  data-section="shop">
                </div>

                <div class="group">
                    <label for="password_verification" class="label">Կրկնեք ծածկագիրը</label>
                    <input name="password_verification" type="password" class="input" data-section="shop">
                </div>

                <div class="group">
                    <label for="user" class="label">Մարզ</label>
                    <select id="region-shop" name="region" class="input select region-dropdown" data-fordrop="#c-drop-shop">
                        <option value="0">Տարածաշրջան</option>
                        <?php foreach($region_list as $key => $value) { ?>
                            <option value="<?php echo $value['id']; ?>" <?php if(!empty($params['region']) && $params['region'] == $value['id']) { echo 'selected'; } ?>><?php echo $value['name']?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="group">
                    <label for="city" class="label">Քաղաք</label>
                    <select id="c-drop-shop" name="city" class="input select city-dropdown c-drop-shop">
                        <option value="0">Ընտրել</option>
                    </select>
                </div>

                <div class="group">
                    <label for="address" class="label">Հասցե</label>
                    <input type="text" name="address" class="input"">
                </div>

                <div class="group">
                    <label for="coordinates" class="label">Կոորդինատներ</label>
                    <div class="helper-map">
                        <div id="map-section-shop" class="map-section"></div>
                    </div>
                    <input type="text" name="coordinate-x" class="input" placeholder="Լայնություն" disabled>
                    <input type="text" name="coordinate-y" class="input" placeholder="Երկարություն" disabled>
                </div>

                <div class="group">
                    <label for="web-page" class="label">Վեբ կայք (հավելյալ)</label>
                    <input name="web-page" type="text" class="input">
                </div>

                <div class="group">
                    <label for="phone_main" class="label">Հիմնական հեռախոսահամար</label>
                    <input name="phone_main" type="text" class="input" placeholder="098-98-98-98" maxlength="9" data-num="true">
                </div>
                <div class="group">
                    <label for="phone_secondary" class="label">Երկրորդական հեռախոսահամար (հավելյալ)</label>
                    <input name="phone_secondary" type="text" class="input" placeholder="098-98-98-98" maxlength="9" data-num="true">
                </div>
                <div class="group">
                    <label for="avatar_image" class="label">Խանութի լուսանկար</label>

                    <div class="upload-btn-wrapper">
                        <button class="btn">Ընտրել նկարը</button>
                        <input type="hidden" class="image-name input" name="image-avatar-shop"  data-for="shop">
                        <input type="file" name="upload_image" class="upload_image" data-for="shop">
                    </div>

                    <div class="image-container uploaded_image"  data-for="shop"></div>

                </div>
                <div class="group">
                    <label for="email" class="label">E-mail (հավելյալ)</label>
                    <input name="email" type="email" class="input" placeholder="example@mail.com">
                </div>
                <div class="group">
                    <button class="button-large">Գրանցվել</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ավելացնել նկար</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn crop_image">Կտրել</button>
                        <div id="image_demo"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="info-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document" style="width: 455px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ծանուցում</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Գրանցումը կատարված է:</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="response-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document" style="width: 455px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ծանուցում</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Գրանցումը կատարված է:</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="/js/register.js"></script>
<link href="/css/register.css" rel="stylesheet">

<script>

    var map;
    var map_shop_inv = false;
    var map_company_inv = false;

    var slat = 0;
    var slng = 0;
    var clat = 0;
    var clng = 0;
    $(document).ready(function() {

        setInterval(function(){
            if(!map_shop_inv && $('#shop').css('display') == 'block'){
                    map = L.map('map-section-shop');

                    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                        attribution: 'Registered &copy; License for <strong>cash.am</strong>',
                        maxZoom: 25,
                        id: 'mapbox.streets',
                        accessToken: 'pk.eyJ1IjoiZXJpa2FydXN0YW15YW4iLCJhIjoiY2prdGl4djdiMDVsMjNwcGM3b2U0cDZwbCJ9.PithNUJv4jWPTBetE5o2wg'
                    }).addTo(map);

                    map.setView([40.27952566881291, 44.97802734375], 7);

                    document.getElementById('map-section-shop').style.display = 'block';

                    map.invalidateSize();

                    var marker;
                    map.on('click', function(e){
                        var coord = e.latlng;
                        var lat = coord.lat;
                        var lng = coord.lng;
                        slat = lat;
                        slng = lng;
                        $('#shop .input[name="coordinate-x"]').val(lat);
                        $('#shop .input[name="coordinate-y"]').val(lng);

                        map.setView([lat, lng]);
                        if (marker) { // check
                            map.removeLayer(marker); // remove
                        }
                        marker = L.marker([lat, lng]).addTo(map);
                    });

                    map_shop_inv = true;
            }
            if(!map_company_inv && $('#company').css('display') == 'block'){
                    map = L.map('map-section-company');

                    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                        attribution: 'Registered &copy; License for <strong>cash.am</strong>',
                        maxZoom: 25,
                        id: 'mapbox.streets',
                        accessToken: 'pk.eyJ1IjoiZXJpa2FydXN0YW15YW4iLCJhIjoiY2prdGl4djdiMDVsMjNwcGM3b2U0cDZwbCJ9.PithNUJv4jWPTBetE5o2wg'
                    }).addTo(map);

                    map.setView([40.27952566881291, 44.97802734375], 7);

                    document.getElementById('map-section-company').style.display = 'block';

                    map.invalidateSize();

                    var marker;
                    map.on('click', function(e){
                        var coord = e.latlng;
                        var lat = coord.lat;
                        var lng = coord.lng;
                        clat = lat;
                        clng = lng;
                        $('#company .input[name="coordinate-x"]').val(lat);
                        $('#company .input[name="coordinate-y"]').val(lng);

                        map.setView([lat, lng]);
                        if (marker) { // check
                            map.removeLayer(marker); // remove
                        }
                        marker = L.marker([lat, lng]).addTo(map);
                    });

                    map_company_inv = true;
            }
        },1000)



//


    });

</script>
<script>
    /** Saving **/
    $('#personal .button-large').click(function (){
        var first_name = $('#personal .input[name="first_name"]');
        var last_name = $('#personal .input[name="last_name"]');
        var middle_name = $('#personal .input[name="middle_name"]');
        var region_id = $('#personal select[name="region"]');
        var city_id = $('#personal select[name="city"]');
        var phone_main = $('#personal .input[name="phone_main"]');
        var phone_secondary = $('#personal .input[name="phone_secondary"]');
        var avatar_name = $('#personal .input[name="image-avatar-personal"]');
        var email = $('#personal .input[name="email"]');
        var error = 0;
        var username = $('#personal .input[name="username"]');
        var password = $('#personal .input[name="password"]');
        var password_v = $('#personal .input[name="password_verification"]');

        if(password_v.val() == ''){
            password_v.addClass('error');
            error++;
        } else {
            password_v.removeClass('error');
        }

        if(username.val() == ''){
            username.addClass('error');
            error++;
        } else {
            username.removeClass('error');
        }
        if(password.val() == ''){
            password.addClass('error');
            error++;
        } else {
            password.removeClass('error');
        }

        if(first_name.val() == ''){
            first_name.addClass('error');
            error++;
        } else {
            first_name.removeClass('error');
        }

        if(last_name.val() == ''){
            last_name.addClass('error');
            error++;
        } else {
            last_name.removeClass('error');
        }

        if(middle_name.val() == ''){
            middle_name.addClass('error');
            error++;
        } else {
            middle_name.removeClass('error');
        }

        if(phone_main.val() == ''){
            phone_main.addClass('error');
            error++;
        } else {
            phone_main.removeClass('error');
        }

//        if(phone_secondary.val() == ''){
//            phone_secondary.addClass('error');
//            error++;
//        } else {
//            phone_secondary.removeClass('error');
//        }

        if(avatar_name.val() == ''){
            $('#personal .upload-btn-wrapper .btn').addClass('error');
            error++;
        } else {
            $('#personal .upload-btn-wrapper .btn').removeClass('error');
        }

//        if(email.val() == ''){
//            email.addClass('error');
//            error++;
//        } else {
//            email.removeClass('error');
//        }

        if(region_id.val() == 0){
            $('#select2-region-personal-container').addClass('error');
            error++;
        } else {
            $('#select2-region-personal-container').removeClass('error');
        }

        if(city_id.val() == 0){
            $('#select2-c-drop-personal-container').addClass('error');
            error++;
        } else {
            $('#select2-c-drop-personal-container').removeClass('error');
        }

        if(error == 0) {
            $.ajax({
                url: '/user/register/',
                type: "POST",
                data: {
                    account_type: 'personal',
                    first_name: first_name.val(),
                    last_name: last_name.val(),
                    middle_name: middle_name.val(),
                    username: username.val(),
                    password:password.val(),
                    region_id: region_id.val(),
                    city_id: city_id.val(),
                    phone_main: phone_main.val(),
                    phone_secondary: phone_secondary.val(),
                    avatar_name: avatar_name.val(),
                    email: email.val(),
                    _csrf: "<?=Yii::$app->request->getCsrfToken()?>"
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status) {
                        $('#info-modal').modal('show');
                    } else {
                    $('#response-modal div.modal-body').text(response.info);
                    $('#response-modal').modal('show');
                    }
                }
            });
        }
    });
    $('#company .button-large').click(function (){
        var name = $('#company .input[name="company_name"]');
        var region_id = $('#company select[name="region"]');
        var address = $('#company .input[name="address"]');
        var city_id = $('#company select[name="city"]');
        var cor_x = $('#shop .input[name="coordinate-x"]');
        var cor_y = $('#shop .input[name="coordinate-y"]');
        var web_page = $('#company .input[name="wep-page"]');
        var phone_main = $('#company .input[name="phone_main"]');
        var phone_secondary = $('#company .input[name="phone_secondary"]');
        var avatar_name = $('#company .input[name="image-avatar-company"]');
        var email = $('#company .input[name="email"]');
        var error = 0;
        var username = $('#company .input[name="username"]');
        var password = $('#company .input[name="password"]');
        var password_v = $('#company .input[name="password_verification"]');


        if(password_v.val() == ''){
            password_v.addClass('error');
            error++;
        } else {
            password_v.removeClass('error');
        }

        if(username.val() == ''){
            username.addClass('error');
            error++;
        } else {
            username.removeClass('error');
        }
        if(password.val() == ''){
            password.addClass('error');
            error++;
        } else {
            password.removeClass('error');
        }

        if(name.val() == ''){
            name.addClass('error');
            error++;
        } else {
            name.removeClass('error');
        }

//        if(web_page.val() == ''){
//            web_page.addClass('error');
//            error++;
//        } else {
//            web_page.removeClass('error');
//        }

        if(phone_main.val() == ''){
            phone_main.addClass('error');
            error++;
        } else {
            phone_main.removeClass('error');
        }

//        if(phone_secondary.val() == ''){
//            phone_secondary.addClass('error');
//            error++;
//        } else {
//            phone_secondary.removeClass('error');
//        }

        if(avatar_name.val() == ''){
            $('#company .upload-btn-wrapper .btn').addClass('error');
            error++;
        } else {
            $('#company .upload-btn-wrapper .btn').removeClass('error');
        }

//        if(email.val() == ''){
//            email.addClass('error');
//            error++;
//        } else {
//            email.removeClass('error');
//        }

        if(region_id.val() == 0){
            $('#select2-region-company-container').addClass('error');
            error++;
        } else {
            $('#select2-region-company-container').removeClass('error');
        }

        if(city_id.val() == 0){
            $('#select2-c-drop-company-container').addClass('error');
            error++;
        } else {
            $('#select2-c-drop-company-container').removeClass('error');
        }

        if(address.val() == ''){
            address.addClass('error');
            error++;
        } else {
            address.removeClass('error');
        }

        if(error == 0) {
            $.ajax({
                url: '/user/register/',
                type: "POST",
                data: {
                    account_type: 'company',
                    company_name: name.val(),
                    username: username.val(),
                    password:password.val(),
                    address: address.val(),
                    web_page: web_page.val(),
                    cor_x: clat,
                    cor_y: clng,
                    region_id: region_id.val(),
                    city_id: city_id.val(),
                    phone_main: phone_main.val(),
                    phone_secondary: phone_secondary.val(),
                    avatar_name: avatar_name.val(),
                    email: email.val(),
                    _csrf: "<?=Yii::$app->request->getCsrfToken()?>"
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status) {
                        $('#info-modal').modal('show');
                    } else {
                        $('#response-modal div.modal-body').text(response.info);
                        $('#response-modal').modal('show');
                    }
                }
            });
        }
    });

    $('#shop .button-large').click(function (){
        var name = $('#shop .input[name="shop_name"]');
        var region_id = $('#shop select[name="region"]');
        var city_id = $('#shop select[name="city"]');
        var address = $('#shop .input[name="address"]');
        var cor_x = $('#shop .input[name="coordinate-x"]');
        var cor_y = $('#shop .input[name="coordinate-y"]');
        var web_page = $('#shop .input[name="web-page"]');
        var phone_main = $('#shop .input[name="phone_main"]');
        var phone_secondary = $('#shop .input[name="phone_secondary"]');
        var avatar_name = $('#shop .input[name="image-avatar-shop"]');
        var email = $('#shop .input[name="email"]');
        var error = 0;
        var username = $('#shop .input[name="username"]');
        var password = $('#shop .input[name="password"]');
        var password_v = $('#shop .input[name="password_verification"]');

        if(password_v.val() == ''){
            password_v.addClass('error');
            error++;
        } else {
            password_v.removeClass('error');
        }

        if(username.val() == ''){
            username.addClass('error');
            error++;
        } else {
            username.removeClass('error');
        }

        if(password.val() == ''){
            password.addClass('error');
            error++;
        } else {
            password.removeClass('error');
        }

        if(name.val() == ''){
            name.addClass('error');
            error++;
        } else {
            name.removeClass('error');
        }

//        if(web_page.val() == ''){
//            web_page.addClass('error');
//            error++;
//        } else {
//            web_page.removeClass('error');
//        }

        if(address.val() == ''){
            address.addClass('error');
            error++;
        } else {
            address.removeClass('error');
        }

//        if(cor_x.val() == ''){
//            cor_x.addClass('error');
//            error++;
//        } else {
//            cor_x.removeClass('error');
//        }
//        if(cor_y.val() == ''){
//            cor_y.addClass('error');
//            error++;
//        } else {
//            cor_y.removeClass('error');
//        }

        if(phone_main.val() == ''){
            phone_main.addClass('error');
            error++;
        } else {
            phone_main.removeClass('error');
        }

//        if(phone_secondary.val() == ''){
//            phone_secondary.addClass('error');
//            error++;
//        } else {
//            phone_secondary.removeClass('error');
//        }

        if(avatar_name.val() == ''){
            $('#shop .upload-btn-wrapper .btn').addClass('error');
            error++;
        } else {
            $('#shop .upload-btn-wrapper .btn').removeClass('error');
        }

//        if(email.val() == ''){
//            email.addClass('error');
//            error++;
//        } else {
//            email.removeClass('error');
//        }

        if(region_id.val() == 0){
            $('#select2-region-shop-container').addClass('error');
            error++;
        } else {
            $('#select2-region-shop-container').removeClass('error');
        }
        if(city_id.val() == 0){
            $('#select2-c-drop-shop-container').addClass('error');
            error++;
        } else {
            $('#select2-c-drop-shop-container').removeClass('error');
        }

        if(error == 0) {
            $.ajax({
                url: '/user/register/',
                type: "POST",
                data: {
                    account_type: 'shop',
                    shop_name: name.val(),
                    username: username.val(),
                    password:password.val(),
                    web_page: web_page.val(),
                    region_id: region_id.val(),
                    city_id: city_id.val(),
                    address: address.val(),
                    cor_x: slat,
                    cor_y: slng,
                    phone_main: phone_main.val(),
                    phone_secondary: phone_secondary.val(),
                    avatar_name: avatar_name.val(),
                    email: email.val(),
                    _csrf: "<?=Yii::$app->request->getCsrfToken()?>"
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status) {
                        $('#info-modal').modal('show');
                    } else {
                        $('#response-modal div.modal-body').text(response.info);
                        $('#response-modal').modal('show');
                    }
                }
            });
        }
    });
</script>
<script>
    $(document).ready(function(){
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:200,
                height:200,
                type:'square' //circle
            },
            boundary:{
                width:300,
                height:300
            }
        });

        $('.upload_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            };
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').find('button.crop_image').attr('data-for', $(this).attr('data-for'));
            $('#uploadimageModal').modal('show');
        });

        $('.crop_image').click(function(event){
            var that = $(this);
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $.ajax({
                    url:"/user/uploadimage",
                    type: "POST",
                    data:{
                        "image": response,
                         "_csrf": "<?=Yii::$app->request->getCsrfToken()?>"
                    },
                    success:function(data) {
                        data = JSON.parse(data);
                        $('#uploadimageModal').modal('hide');
                        $('#' + that.attr('data-for') + ' .uploaded_image[data-for="' + that.attr('data-for') + '"]').html(data.path);
                        $('#' + that.attr('data-for') + ' .image-name[data-for="' + that.attr('data-for') + '"]').val(data.name);
                    }
                });
            })
        });

    });
</script>

