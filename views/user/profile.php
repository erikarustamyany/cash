<?php echo $this->render('/main/navigation-bar'); ?>

<div class="col-lg-12 col-sm-12 user-profile-main">
    <?= $this->render('/user/header', ['model' => 'user', 'active' => 'profile', 'user' => $other_user]); ?>

    <div class="tab-content">
        <?= $this->render('/user/inner-list', ['model' => 'user','params'=> $params, 'list' => $list]); ?>
    </div>
</div>

    <script>
        $(".profile-btn").click(function () {
            $(".profile-btn.active").removeClass("active");
            // $(".tab").addClass("active"); // instead of this do the below
            $(this).addClass("active");
        });
    </script>