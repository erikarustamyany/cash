<?php echo $this->render('/main/navigation-bar'); ?>

<div class="col-lg-12 col-sm-12 user-profile-main">
    <?= $this->render('/user/header', ['model' => 'user', 'active' => 'liked', 'user' => $_SESSION['user']]); ?>

    <div class="tab-content">
        <?php  if(empty($liked_items)) { ?>
            <h3 class="user-info">Դուք դեռ սիրված ապրանքներ չունեք:</h3>
        <?php } ?>

        <?= $this->render('/user/simple-inner-list', ['model' => 'user', 'list' => $liked_items, 'follows' => $follows, 'allowFollow' => true]); ?>

    </div>
</div>
