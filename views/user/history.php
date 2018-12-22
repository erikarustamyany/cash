<?php echo $this->render('/main/navigation-bar'); ?>

<div class="col-lg-12 col-sm-12 user-profile-main">
    <?= $this->render('/user/header', ['model' => 'user', 'active' => 'history', 'user' => $_SESSION['user']]); ?>

    <div class="tab-content">
        <?php  if(empty($history_items)) { ?>
            <h3 class="user-info">Դուք դեռ պատմություն չունեք:</h3>
        <?php } ?>

        <?= $this->render('/user/simple-inner-list', ['model' => 'user', 'list' => $history_items, 'follows' => $follows, 'allowFollow' => false]); ?>

    </div>
</div>
