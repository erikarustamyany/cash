<?php echo $this->render('/main/navigation-bar'); ?>

<?php $_SESSION['list-type'] = 'block' ?>
<div class="col-lg-12 col-sm-12 user-profile-main">
    <?= $this->render('/user/header', ['model' => 'user', 'active' => 'personal', 'user' => $_SESSION['user']]); ?>
    <?= $this->render('/user/user-settings-menu', ['model' => 'user', 'active' => 'personal']); ?>


                <div class="row" style="width: 100%">
                    <div class="col-xs-10 col-xs-offset-1">

                        <div class="group image-section">
                            <div id="image-container" class="image-container uploaded_image" data-for="personal">
                                <img src="/uploads/<?= htmlspecialchars($_SESSION['user'][0]['image']); ?>" class="img-thumbnail">
                            </div>
                            <div class="upload-btn-wrapper">
                                <button class="btn">Այլ նկար</button>
                                <input id="image-name" type="hidden" class="image-name input" name="image-avatar-personal" data-for="personal" value="<?= htmlspecialchars($_SESSION['user'][0]['image']); ?>">
                                <input type="file" name="upload_image" class="upload_image" data-for="personal">
                            </div>

                        </div>
                        <?php if($_SESSION['user'][0]['type'] == 1) { ?>
                        <div id="personal" class="tab-pane fade personal-inner in active">
                            <div class="group">
                                <label for="first_name" class="label">Անուն</label>
                                <input name="first_name" data-lang="am" type="text" class="input" value="<?= htmlspecialchars($_SESSION['user'][0]['first_name']); ?>">
                            </div>
                            <div class="group">
                                <label for="last_name" class="label">Ազգանուն</label>
                                <input name="last_name" data-lang="am" type="text" class="input" value="<?= htmlspecialchars($_SESSION['user'][0]['last_name']); ?>">
                            </div>

                            <div class="group">
                                <label for="middle_name" class="label">Հայրանուն</label>
                                <input name="middle_name" data-lang="am" type="text" class="input" value="<?= htmlspecialchars($_SESSION['user'][0]['middle_name']); ?>">
                            </div>

                            <div class="group">
                                <label for="username" class="label">Ծածկանուն</label>
                                <input name="username" type="text" class="input" value="<?= htmlspecialchars($_SESSION['user'][0]['username']); ?>">
                            </div>

                            <div class="group">
                                <label for="region" class="label">Մարզ</label>
                                <select id="region-personal" name="region"  class="input select region-dropdown" data-fordrop="#city-personal">
                                    <option value="0">Տարածաշրջան</option>
                                    <?php foreach($region_list as $key => $value) { ?>
                                        <option value="<?php echo $value['id']; ?>" <?php if($_SESSION['user'][0]['region_id'] == $value['id']) { echo 'selected'; } ?>><?php echo $value['name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="group">
                                <label for="city" class="label">Քաղաք/Գյուղ</label>
                                <select id="city-personal" name="city"  class="input select city-dropdown">
                                    <option value="0">Ընտրել</option>
                                    <?php foreach($city_list as $key => $value) { ?>
                                        <option value="<?php echo $value['id']; ?>" <?php if($_SESSION['user'][0]['city_id'] == $value['id']) { echo 'selected'; } ?>><?php echo trim(html_entity_decode($value['title']), " \t\n\r\0\x0B\xC2\xA0");?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="group">
                                <label for="phone_main" class="label">Հիմնական հեռախոսահամար</label>
                                <input type="tel" class="input" name="phone_main" placeholder="098-98-98-98" maxlength="9" data-num="true"  value="<?= htmlspecialchars($_SESSION['user'][0]['phone']); ?>">
                            </div>

                            <div class="group">
                                <label for="phone_secondary" class="label">Երկրորդական հեռախոսահամար (հավելյալ)</label>
                                <input name="phone_secondary" type="text" class="input" placeholder="098-98-98-98" maxlength="9" data-num="true"  value="<?= htmlspecialchars($_SESSION['user'][0]['phone_secondary']); ?>">
                            </div>

                            <div class="group">
                                <label for="email" class="label">E-mail (հավելյալ)</label>
                                <input name="email" type="email" class="input" placeholder="example@mail.com"  value="<?= htmlspecialchars($_SESSION['user'][0]['email']); ?>">
                            </div>

                            <div class="group submit-button-container">
                                <button class="button-large">Պահպանել</button>
                            </div>
                        </div>
                        <?php } else if($_SESSION['user'][0]['type'] == 2) { ?>
                            <div id="company" class="tab-pane fade in active">
                                <div class="group">
                                    <label for="company_name" class="label">Կազմակերպության անունը</label>
                                    <input name="company_name" type="text" class="input" value="<?= htmlspecialchars($_SESSION['user'][0]['first_name']); ?>">
                                </div>

                                <div class="group">
                                    <label for="username" class="label">Ծածկանուն</label>
                                    <input name="username" type="text" class="input" value="<?= htmlspecialchars($_SESSION['user'][0]['username']); ?>">
                                </div>

                                <div class="group">
                                    <label for="region" class="label">Մարզ</label>
                                    <select id="region-personal" name="region"  class="input select region-dropdown" data-fordrop="#city-personal">
                                        <option value="0">Տարածաշրջան</option>
                                        <?php foreach($region_list as $key => $value) { ?>
                                            <option value="<?php echo $value['id']; ?>" <?php if($_SESSION['user'][0]['region_id'] == $value['id']) { echo 'selected'; } ?>><?php echo $value['name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="group">
                                    <label for="city" class="label">Քաղաք/Գյուղ</label>
                                    <select id="city-personal" name="city"  class="input select city-dropdown">
                                        <option value="0">Ընտրել</option>
                                        <?php foreach($city_list as $key => $value) { ?>
                                            <option value="<?php echo $value['id']; ?>" <?php if($_SESSION['user'][0]['city_id'] == $value['id']) { echo 'selected'; } ?>><?php echo trim(html_entity_decode($value['title']), " \t\n\r\0\x0B\xC2\xA0");?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="group">
                                    <label for="address" class="label">Հասցե</label>
                                    <input type="text" name="address" class="input" value="<?= htmlspecialchars($_SESSION['user'][0]['address']); ?>">
                                </div>

                                <div class="group">
                                    <label for="coordinates" class="label">Կոորդինատներ</label>
                                    <div class="helper-map">
                                        <div id="map-section-company" class="map-section"></div>
                                    </div>
                                    <input type="text" name="coordinate-x" class="input" placeholder="Լայնություն" value="<?= htmlspecialchars($_SESSION['user'][0]['location_x']); ?>" disabled>
                                    <input type="text" name="coordinate-y" class="input" placeholder="Երկարություն" value="<?= htmlspecialchars($_SESSION['user'][0]['location_y']); ?>" disabled>
                                </div>

                                <div class="group">
                                    <label for="wep-page" class="label">Վեբ կայք (հավելյալ)</label>
                                    <input name="wep-page" type="text" class="input" value="<?= htmlspecialchars($_SESSION['user'][0]['web_page']); ?>">
                                </div>

                                <div class="group">
                                    <label for="phone_main" class="label">Հիմնական հեռախոսահամար</label>
                                    <input name="phone_main" type="text" class="input" placeholder="098-98-98-98" maxlength="9" data-num="true" value="<?= htmlspecialchars($_SESSION['user'][0]['phone']); ?>">
                                </div>
                                <div class="group">
                                    <label for="phone_secondary" class="label">Երկրորդական հեռախոսահամար (հավելյալ)</label>
                                    <input name="phone_secondary" type="text" class="input" placeholder="098-98-98-98" maxlength="9" data-num="true" value="<?= htmlspecialchars($_SESSION['user'][0]['phone_secondary']); ?>">
                                </div>

                                <div class="group">
                                    <label for="email" class="label">E-mail (հավելյալ)</label>
                                    <input name="email" type="email" class="input"  placeholder="example@mail.com" value="<?= htmlspecialchars($_SESSION['user'][0]['email']); ?>">
                                </div>
                                <div class="group submit-button-container">
                                    <button class="button-large">Պահպանել</button>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div id="shop" class="tab-pane fade in active">
                                <div class="group">
                                    <label for="shop_name" class="label">Խանութի անունը</label>
                                    <input name="shop_name" type="text" class="input" value="<?= htmlspecialchars($_SESSION['user'][0]['first_name']); ?>">
                                </div>

                                <div class="group">
                                    <label for="username" class="label">Ծածկանուն</label>
                                    <input name="username" type="text" class="input"  value="<?= htmlspecialchars($_SESSION['user'][0]['username']); ?>">
                                </div>

                                <div class="group">
                                    <label for="region" class="label">Մարզ</label>
                                    <select id="region-personal" name="region"  class="input select region-dropdown" data-fordrop="#city-personal">
                                        <option value="0">Տարածաշրջան</option>
                                        <?php foreach($region_list as $key => $value) { ?>
                                            <option value="<?php echo $value['id']; ?>" <?php if($_SESSION['user'][0]['region_id'] == $value['id']) { echo 'selected'; } ?>><?php echo $value['name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="group">
                                    <label for="city" class="label">Քաղաք/Գյուղ</label>
                                    <select id="city-personal" name="city" class="input select city-dropdown">
                                        <option value="0">Ընտրել</option>
                                        <?php foreach($city_list as $key => $value) { ?>
                                            <option value="<?php echo $value['id']; ?>" <?php if($_SESSION['user'][0]['city_id'] == $value['id']) { echo 'selected'; } ?>><?php echo trim(html_entity_decode($value['title']), " \t\n\r\0\x0B\xC2\xA0");?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="group">
                                    <label for="address" class="label">Հասցե</label>
                                    <input type="text" name="address" class="input" value="<?= htmlspecialchars($_SESSION['user'][0]['address']); ?>">
                                </div>

                                <div class="group">
                                    <label for="coordinates" class="label">Կոորդինատներ</label>
                                    <div class="helper-map">
                                        <div id="map-section-shop" class="map-section"></div>
                                    </div>
                                    <input type="text" name="coordinate-x" class="input" placeholder="Լայնություն" value="<?= htmlspecialchars($_SESSION['user'][0]['location_x']); ?>" disabled>
                                    <input type="text" name="coordinate-y" class="input" placeholder="Երկարություն" value="<?= htmlspecialchars($_SESSION['user'][0]['location_y']); ?>" disabled>
                                </div>

                                <div class="group">
                                    <label for="web-page" class="label">Վեբ կայք (հավելյալ)</label>
                                    <input name="web-page" type="text" class="input" value="<?= htmlspecialchars($_SESSION['user'][0]['web_page']); ?>">
                                </div>

                                <div class="group">
                                    <label for="phone_main" class="label">Հիմնական հեռախոսահամար</label>
                                    <input name="phone_main" type="text" class="input" placeholder="098-98-98-98" maxlength="9" data-num="true" value="<?= htmlspecialchars($_SESSION['user'][0]['phone']); ?>">
                                </div>
                                <div class="group">
                                    <label for="phone_secondary" class="label">Երկրորդական հեռախոսահամար (հավելյալ)</label>
                                    <input name="phone_secondary" type="text" class="input" placeholder="098-98-98-98" maxlength="9" data-num="true" value="<?= htmlspecialchars($_SESSION['user'][0]['phone_secondary']); ?>">
                                </div>
                                <div class="group">
                                    <label for="email" class="label">E-mail (հավելյալ)</label>
                                    <input name="email" type="email" class="input" placeholder="example@mail.com" value="<?= htmlspecialchars($_SESSION['user'][0]['email']); ?>">
                                </div>
                                <div class="group submit-button-container">
                                    <button class="button-large">Պահպանել</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ավելացնել նկար</h4>
                <br>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
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
                <p>Տվյալները պահպանված են:</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
            </div>
        </div>
    </div>
</div>

<style>

    .map-section {
        position: relative;
        height: 300px;
        margin: 5px 0;
        outline: none;
    }
    .map-button {
        width: 100%;
        border: 1px solid white;
        background-color: transparent;
        color: white;
        font-size: 15px;
        border-radius: 0;
        margin: 5px 0;
    }
    .map-button:hover, .map-button:active, .map-button:focus {
        color: white;
    }

    .group .map {
        background-color:  rgb(48, 50, 58);
        height: 300px;
        border: 1px solid white;
    }
    .group .map img{
        width: 100%;
        height: 100%;
    }
    .group .input {
        margin-top: 5px;
    }

    .profile-btn {
        background-color: #e3e3e3;
    }
    .tool-tip{
        position: absolute;
        top: 19px;
        right: 3px;
        color: #ff720c;
        font-weight: bold;
        padding: 8px;
        transition-duration: 0.5s;
        opacity: 1;
        transform: translateX(0);
    }
    .tool-tip.slow-hide{
        transition-duration: 0.5s;
        opacity: 0;
        transform: translateX(10px);
    }
    .submit-button-container {
        text-align: center;
    }
    .personal-inner {
        margin-top: 20px;
    }
    .group {
        position: relative;
    }
    .group .button-large {
        background-color: #3c3c3c;
        color: white;
        border: 1px solid white;
        width: 200px;
        max-width: 100%;
        height: 40px;
    }
    .group .button-large:hover {
        background-color: #F8694A;
    }
    .group .input:focus {
        -webkit-box-shadow: 0px 0px 0px 1px #F8694A inset, 0px 0px 0px 0px grey;
        box-shadow: 0px 0px 0px 1px #F8694A inset, 0px 0px 0px 0px grey;
        border: none;
    }
    .img-thumbnail {
        border-radius:  10px 10px 0 0;
    }
    button.crop_image:hover {
        border:none;
        background-color: #F8694A;
        color: white;
    }
    button.crop_image:focus {
        border:none;
        background-color: #F8694A;
        color: white;
    }
    button.crop_image:active {
        border:none;
        background-color: #F8694A;
        color: white;
    }
    button.crop_image {
        background-color: #3c3c3c;
        color: white;
        border:none;
        width: 53%;
        height: 40px;
        font-size: 18px;
        letter-spacing: 2px;
        margin-bottom: 5px;

    }
    .image-name {
        margin-top: 5px;
    }

    .group .upload-btn-wrapper{
        text-align: center;
        margin-top: -8px;
    }
    .group .upload-btn-wrapper .btn {
        width: 209px;
        max-width: 100%;
        background-color: #3c3c3c;
        color: white;
        font-size: 15px;
        margin-top: 5px;
        border-radius: 0 0 10px 10px;
    }
    .group .upload-btn-wrapper .btn:hover {
        opacity: 0.7;
        transition-duration: 0.3s;
    }

    .upload-btn-wrapper input[type=file] {
        width: 209px;
        height: 35px;
        position: absolute;
        left: 209px;
        top: 5px;
        opacity: 0;
        cursor: pointer;
    }

    .upload-btn-wrapper{
        position: relative;
    }

    .group .label {
        color: #3c3c3c;
    }

    .group .input {
        background-color: white;
        color: #3c3c3c;
        height: 35px;
    }

    .group input[type="password"] {
        box-shadow: none;
    }

    .upload-btn-wrapper .btn {
    }
    .uploaded_image {
        text-align: center;
    }
    .group input[type="password"]{
        margin-bottom: 0;
    }
    .group {
        margin-top: 5px;
    }

    .group .error {
        border: none !important;
        -webkit-box-shadow: 0px 0px 0px 1px red inset, 0px 0px 0px 0px grey !important;
        box-shadow: 0px 0px 0px 1px red inset, 0px 0px 0px 0px grey !important;
    }
</style>

<script>
    var slat = <?= $_SESSION['user'][0]['location_x'] ?>;
    var slng = <?= $_SESSION['user'][0]['location_y'] ?>;
    var clat = <?= $_SESSION['user'][0]['location_x'] ?>;
    var clng = <?= $_SESSION['user'][0]['location_y'] ?>;

    var map;
    var map_shop_inv = false;
    var map_company_inv = false;

</script>

<script>
    <?php if($_SESSION['user'][0]['type'] == 2) { ?>

    $(function(){
        setTimeout(function() {
            map = L.map('map-section-company');

            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                attribution: 'Registered &copy; License for <strong>cash.am</strong>',
                maxZoom: 25,
                id: 'mapbox.streets',
                accessToken: 'pk.eyJ1IjoiZXJpa2FydXN0YW15YW4iLCJhIjoiY2prdGl4djdiMDVsMjNwcGM3b2U0cDZwbCJ9.PithNUJv4jWPTBetE5o2wg'
            }).addTo(map);

            map.setView([<?= $_SESSION['user'][0]['location_x'] ?>, <?= $_SESSION['user'][0]['location_y'] ?>], 18);

            document.getElementById('map-section-company').style.display = 'block';

            map.invalidateSize();

            var marker;
            marker = L.marker([<?= $_SESSION['user'][0]['location_x'] ?>, <?= $_SESSION['user'][0]['location_y'] ?>]).addTo(map);

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
        }, 1500);

    });
    <?php } else if ($_SESSION['user'][0]['type'] == 3) { ?>

    $(function(){
        setTimeout(function() {
            map = L.map('map-section-shop');

            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                attribution: 'Registered &copy; License for <strong>cash.am</strong>',
                maxZoom: 25,
                id: 'mapbox.streets',
                accessToken: 'pk.eyJ1IjoiZXJpa2FydXN0YW15YW4iLCJhIjoiY2prdGl4djdiMDVsMjNwcGM3b2U0cDZwbCJ9.PithNUJv4jWPTBetE5o2wg'
            }).addTo(map);

            map.setView([<?= $_SESSION['user'][0]['location_x'] ?>, <?= $_SESSION['user'][0]['location_y'] ?>], 18);

            document.getElementById('map-section-shop').style.display = 'block';

            map.invalidateSize();

            var marker;
            marker = L.marker([<?= $_SESSION['user'][0]['location_x'] ?>, <?= $_SESSION['user'][0]['location_y'] ?>]).addTo(map);

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
        }, 1500);

    });
    <?php } ?>
</script>

<script>
    $('#personal .button-large').click(function (){
        var first_name = $('#personal .input[name="first_name"]');
        var last_name = $('#personal .input[name="last_name"]');
        var middle_name = $('#personal .input[name="middle_name"]');
        var region_id = $('#personal select[name="region"]');
        var city_id = $('#personal select[name="city"]');
        var phone_main = $('#personal .input[name="phone_main"]');
        var phone_secondary = $('#personal .input[name="phone_secondary"]');
        var avatar_name = $('#image-name');
        var email = $('#personal .input[name="email"]');
        var error = 0;
        var username = $('#personal .input[name="username"]');


        if(username.val() == ''){
            username.addClass('error');
            error++;
        } else {
            username.removeClass('error');
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
            $('#image-container').addClass('error');
            error++;
        } else {
            $('#image-container').removeClass('error');
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
                url: '/user/personal/',
                type: "POST",
                data: {
                    account_type: 'personal',
                    first_name: first_name.val(),
                    last_name: last_name.val(),
                    middle_name: middle_name.val(),
                    username: username.val(),
                    region_id: region_id.val(),
                    city_id: city_id.val(),
                    phone_main: phone_main.val(),
                    phone_secondary: phone_secondary.val(),
                    avatar_name: avatar_name.val(),
                    email: email.val(),
                    _csrf: frsc
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
        var avatar_name = $('#image-name');
        var email = $('#company .input[name="email"]');
        var error = 0;
        var username = $('#company .input[name="username"]');


        if(username.val() == ''){
            username.addClass('error');
            error++;
        } else {
            username.removeClass('error');
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
            $('#image-container').addClass('error');
            error++;
        } else {
            $('#image-container').removeClass('error');
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
                url: '/user/personal/',
                type: "POST",
                data: {
                    account_type: 'company',
                    company_name: name.val(),
                    username: username.val(),
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
                    _csrf: frsc
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
        var avatar_name = $('#image-name');
        var email = $('#shop .input[name="email"]');
        var error = 0;
        var username = $('#shop .input[name="username"]');

        if(username.val() == ''){
            username.addClass('error');
            error++;
        } else {
            username.removeClass('error');
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
            $('#image-container').addClass('error');
            error++;
        } else {
            $('#image-container').removeClass('error');
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
                url: '/user/personal/',
                type: "POST",
                data: {
                    account_type: 'shop',
                    shop_name: name.val(),
                    username: username.val(),
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
                    _csrf: frsc
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

    $(function(){ // let all dom elements are loaded
        $('#info-modal').on('hide.bs.modal', function (e) {
            location.reload();
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
            }, 3000);   setTimeout(function(){
                that.parent().find('.tool-tip').remove();
            }, 4000);
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
                        console.log('#' + that.attr('data-for') + ' .uploaded_image[data-for="' + that.attr('data-for') + '"]');
                        $('#image-container').html(data.path);
                        $('#image-name').val(data.name);
                    }
                });
            })
        });

    });
</script>