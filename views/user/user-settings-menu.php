<div class="tab-content">
    <section class="main container">
            <div class="row" style="padding: 5px 0;">
                <div class="profile-secondary-btn col-xs-4">
                    <a href="/user/personal" class=" <?=($active == 'personal')? 'active':'' ?>">
                        <i class="fa fa-cog"></i>
                        <span class="hidden-xs">Ընդհանուր</span>
                    </a>
                </div>
                <div class="profile-secondary-btn col-xs-4">
                    <a href="/user/info" class="<?= ($active == 'more')? 'active':'' ?>" >
                        <i class="fa fa-pencil"></i>
                        <span class="hidden-xs">Հավելյալ տեղեկություն</span>
                    </a>
                </div>
                <div class="profile-secondary-btn col-xs-4">
                    <a href="/user/change-password" class="<?= ($active == 'change-password')? 'active':'' ?>">
                        <i class="fa fa-key"></i>
                        <span class="hidden-xs">Փոխել ծածկագիրը</span>
                    </a>
                </div>
            </div>
    </section>
</div>