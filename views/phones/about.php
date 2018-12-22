<div class="container item-owner-section">
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
        <div class="owner-image text-center">
            <img src="/uploads/<?= $owner['image'] ?>">
        </div>
        <?php
        $name = $owner['first_name'];
        //                if(!empty($owner['middle_name'])){
        //                    $name .= ' ' . $owner['middle_name'];
        //                }
        if(!empty($owner['last_name'])){
            $name .= ' ' . $owner['last_name'];
        }
        ?>
        <a href="/user/profile?id=<?= $owner['id']; ?>" class="owner-name"><?= $name ?></a>
    </div>
    <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="owner-info">

        </div>
</div>

</div>
    <div class="col-md-12">
        <div class="detailes-block">
            <div class="row block-item">
                <?php if(!empty($owner['region'])) {?>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12">Մարզ: </div>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12"><?= $owner['region'] ?></div>
                <?php  } ?>

                <?php if(!empty($owner['city'])) {?>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12">Քաղաք/Գյուղ: </div>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12"><?= trim($owner['city']," \t\n\r\0\x0B\xC2\xA0") ?></div>
                <?php  } ?>

                <?php if(!empty($owner['address'])) {?>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12">Հասցե: </div>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12"><?= $owner['address'] ?></div>
                <?php  } ?>

                <?php if(!empty($owner['phone'])) {?>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12">Հիմնական հեռ. </div>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12"><?= $owner['phone'] ?></div>
                <?php  } ?>

                <?php if(!empty($owner['phone_secondary'])) {?>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12">Հավելյալ հեռ. </div>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12"><?= $owner['phone_secondary'] ?></div>
                <?php  } ?>

                <?php if(!empty($owner['email'])) {?>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12">E-mail: </div>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12"><?= $owner['email'] ?></div>
                <?php  } ?>

                <?php if(!empty($owner['web_page'])) {?>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12">Կայք: </div>
                    <div class="details-item col-lg-6 col-md-6 col-sm-6 col-xs-12"><?= $owner['web_page'] ?></div>
                <?php  } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 map-section text-center">
            <div id="mapid"></div>
        </div>
    </div>

    <script>

        <?php if(!empty($owner['location_x']) && !empty($owner['location_y'])) { ?>
        $(document).ready(function() {
        var map = L.map('mapid').setView([<?= $owner['location_x'] ?>, <?= $owner['location_y'] ?>], 13);

            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Registered &copy; License for <strong>cash.am</strong>',
            maxZoom: 25,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoiZXJpa2FydXN0YW15YW4iLCJhIjoiY2prdGl4djdiMDVsMjNwcGM3b2U0cDZwbCJ9.PithNUJv4jWPTBetE5o2wg'
        }).addTo(map);

        L.marker([<?= $owner['location_x'] ?>, <?= $owner['location_y'] ?>]).addTo(map)
            .bindPopup('<strong><?= $name ?></strong> <br> <?= $owner['region'] ?>, <?= trim($owner['city']," \t\n\r\0\x0B\xC2\xA0") ?>')
            .openPopup();
        });



//https://maps.googleapis.com/maps/api/staticmap?center=40.152216,44.397914&markers=red:red%7Clabel:C%7C40.152216,44.397914&zoom=16&size=600x300&client=AIzaSyBxR5a_bgrqmLSDyHw6X2qOz6nbN4tfTA4&signature=crohc4ixu--5U-mBsEzrCBNHWWc=
//https://maps.googleapis.com/maps/api/staticmap?center=40.152216,44.397914&markers=red:red%7Clabel:C%7C40.152216,44.397914&zoom=16&size=600x300&callback=initMap&key=AIzaSyBxR5a_bgrqmLSDyHw6X2qOz6nbN4tfTA4&signature=wytjkqBvcKoqo1XRjlalF_Ba9TU=
//        var range = $('#map-zoomer');
//        range.change(function(){
//            var zoom = 15;
//                $('.map-section .img-map').attr('src', 'https://maps.googleapis.com/maps/api/staticmap?center=<?//= $owner['location_x'] ?>//,<?//= $owner['location_y'] ?>//&markers=red:red%7Clabel:C%7C<?//= $owner['location_x'] ?>//,<?//= $owner['location_y'] ?>//&zoom=' + zoom +'&size=720x480')
//        });
        <?php } ?>
    </script>
<style>
    #mapid {
        position: relative;
        height: 350px;
        width: 100%;
        /* top: 229px; */
        outline: none;
    }
    .owner-name {
        font-weight: bold;
        font-size: 19px;
    }
    .owner-info {
        margin-top: 10px;
    }
    .map-section{
        margin-top: 10px;
        /*background-color: #3c3c3c;*/
        padding:10px;
        height:350px;
    }
    .img-map {
        max-width: 100%;
        box-shadow: 0 0 1px #3c3c3c;
    }

    .mrg-bottom-25 {
        margin-bottom: 25px;
    }
</style>