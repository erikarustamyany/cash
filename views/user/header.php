<div class="card hovercard">
    <div class="card-background">
        <img class="card-bkimg" alt="" src="https://images.pexels.com/photos/289618/pexels-photo-289618.jpeg?auto=compress&cs=tinysrgb&h=350">
        <!-- http://lorempixel.com/850/280/people/9/ -->
    </div>
    <div class="useravatar">
        <a href="/user/profile">
            <img alt="" src="/uploads/<?= $user[0]['image'] ?>">
        </a>
    </div>
    <div class="card-info"> <a href="/user/profile?id=<?= $user[0]['id']; ?>" class="card-title" data-id="<?= $user[0]['id']; ?>"><?= $user[0]['first_name'] . ' ' . $user[0]['last_name'] ?></a>

    </div>
</div>
<?php if(!empty($_SESSION['user']) && !empty($user) && $user[0]['id'] == $_SESSION['user'][0]['id']) { ?>
<div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
    <div class="btn-group" role="group">
        <a href="/user/history" type="button" id="stars" class="default-btn profile-btn <?= ($active == 'history')? ' in active':'' ?>"><span class="fa fa-check" aria-hidden="true"></span>
            <div class="hidden-xs">Պատմություն</div>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="/user/liked" type="button" id="favorites" class="default-btn profile-btn <?= ($active == 'liked')? ' in active':'' ?>"><span class="fa fa-heart" aria-hidden="true"></span>
            <div class="hidden-xs">Սիրված</div>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="/user/ad" type="button" id="following" class="default-btn profile-btn <?= ($active == 'ad')? ' in active':'' ?>"><span class="fa fa-archive" aria-hidden="true"></span>
            <div class="hidden-xs">Հայտարարություն</div>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="/user/personal" type="button" id="following" class="default-btn profile-btn <?= ($active == 'personal')? ' in active':'' ?>"><span class="fa fa-user" aria-hidden="true"></span>
            <div class="hidden-xs">Կարգավորումներ</div>
        </a>
    </div>
</div>
<?php } ?>