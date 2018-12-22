<?php echo $this->render('/admin/index', []); ?>

<div class="container">
    <div class="col-md-3">
        <a class="admin-nav active" href="/admin/users">
            <i class="fa fa-user-circle admin-icon"></i>
        </a>
    </div>
    <div class="col-md-3">
        <a class="admin-nav" href="/admin/items">
            <i class="fa fa-id-card-o admin-icon"></i>
        </a>
    </div>
    <div class="col-md-3">
        <a class="admin-nav" href="/">
            <i class="fa fa-line-chart admin-icon"></i>
        </a>
    </div>
    <div class="col-md-3">
        <a class="admin-nav" href="/">
            <i class="fa fa-line-chart admin-icon"></i>
        </a>
    </div>
</div>


<div class="container item-container">
    <?php foreach($users_valid as $key => $user) { ?>
    <div class="row list-inline-item">
            <div class="item-user">
                <div class="col-md-3">

                <div class="avatar">
                    <img src="/uploads/<?= $user['image'] ?>">
                </div>
                </div>
                <div class="col-md-9">
                <div class="item-inner container">
                    <div class="row" style="margin: 0">
                        <div class="col-md-5">
                     <h3>
                    <?php if ($user['type'] == 1) {
                        echo $user['first_name'] . ' ' . $user['last_name'] . ' ' . $user['middle_name'];
                    } else {
                        echo $user['first_name'];
                    } ?>
                    </h3>

                    <p>
                        <span class="info-item"><span class="item-bold">username: </span><?php echo $user['username']; ?></span>
                        <br>
                        <span class="info-item"><span class="item-bold">password: </span><?php echo $user['password']; ?></span>
                         <br>
                        <span class="info-item"><span class="item-bold">address: </span><?php echo $user['address']; ?></span>
                        <br>
                        <span class="info-item"><span class="item-bold">location_x: </span><?php echo $user['location_x']; ?></span>
                        <br>
                        <span class="info-item"><span class="item-bold">location_y: </span><?php echo $user['location_y']; ?></span>
                        <br>

                        <span class="info-item"><span class="item-bold"><?php echo $user['region']; ?> : </span><?php echo $user['city']; ?></span>

                    </p>
                        </div>
                        <div class="col-md-7">
                            <h3>  </h3>
                            <p>
                            <span class="info-item"><span class="item-bold">web page: </span><?php echo $user['web_page']; ?></span>
                            <br>
                            <span class="info-item"><span class="item-bold">email: </span><?php echo $user['email']; ?></span>
                           <br>
                            <span class="info-item"><span class="item-bold">phone main: </span><?php echo $user['phone']; ?></span>
                           <br>
                            <span class="info-item"><span class="item-bold">phone secondary: </span><?php echo $user['phone_secondary']; ?></span>
                           <br>
                            <span class="info-item"><span class="item-bold">type: </span><?php
                                if($user['type'] == 1){
                                    echo 'Personal';
                                } else if($user['type'] == 2){
                                    echo 'Company';
                                } else if($user['type']){
                                    echo 'Shop';
                                }
                                ?></span>
                            </p>
                            <button class="accept" data-id="<?= $user['id']?>">Accept</button>
                            <button class="disable" data-id="<?= $user['id']?>">Disable</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<script>
    $('.accept').click(function () {
        $.ajax({
            url: '/admin/accept-user',
            type: 'POST',
            data: {id: $(this).attr('data-id'), _csrf: "<?=Yii::$app->request->getCsrfToken()?>"},
            success: function (e) {
                e = JSON.parse(e);
                    if(e.status){
                        location.reload();
                    }
                }
        });
    })
    $('.disable').click(function () {
        $.ajax({
            url: '/admin/disable-user',
            type: 'POST',
            data: {id: $(this).attr('data-id'), _csrf: "<?=Yii::$app->request->getCsrfToken()?>"},
            success: function (e) {
                e = JSON.parse(e);
                    if(e.status){
                        location.reload();
                    }
                }
        });
    })
</script>

<style>
    .item-container .accept {
        background-color: #F8694A;
        color: white;
        border: 1px solid white;
    }
    .item-container .disable {
        background-color: #3c3c3c;
        color: white;
        border: 1px solid white;
    }
    .item-container {
        padding: 0 60px;
    }
    .list-inline-item {
        margin-top: 5px;
        background-color: #e3e3e3;
    }
    .item-inner {
        margin: 10px 5px;
    }
    .info-item {
        font-size: 17px;
    }
    .item-bold {
        font-weight: bold;
    }
</style>