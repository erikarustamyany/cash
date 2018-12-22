<?php echo $this->render('/main/navigation-bar'); ?>

<div class="col-lg-12 col-sm-12 user-profile-main">
    <?= $this->render('/user/header', ['model' => 'user', 'active' => 'personal', 'user' => $_SESSION['user']]); ?>
    <?= $this->render('/user/user-settings-menu', ['model' => 'user', 'active' => 'more']); ?>

    <div class="tab-content">
        <div class="container">
            <div class="row" style="width: 100%">
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="group">
                        <label for="phone_main" class="label">Հավելյալ ինֆորմացիա</label>
                        <textarea class="text-about" name="more">
                        </textarea>
                    </div>

                    <div class="group">
                        <label for="phone_main" class="label">Facebook</label>
                        <input class="input" name="fb" value="<?= (!empty($info))? htmlspecialchars($info->facebook):'' ?>">
                    </div>

                    <div class="group">
                        <label for="phone_main" class="label">Viber</label>
                        <input class="input" name="vb" value="<?= (!empty($info))? htmlspecialchars($info->viber):'' ?>">
                    </div>

                    <div class="group submit-button-container">
                        <button class="button-large change-info">Պահպանել</button>
                    </div>
                </div>
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

<script>
    var error = false;

    <?php if (!empty($info)) { ?>
    $(document).ready(function(){
        var more_text = <?= json_encode($info->more) ?>;

           $('textarea[name="more"]').val(more_text);

            $('.change-info').click(function(){
            var more = $('textarea[name="more"]');
            var fb = $('input[name="fb"]');
            var vb = $('input[name="vb"]');
             fb.removeClass('error');
                vb.removeClass('error');

                $.ajax({
                    url: '/user/change-info',
                    type: 'POST',
                    data: {more: more.val(), fb: fb.val(), vb: vb.val(), _csrf: frsc},
                    success: function (response) {
                        response = JSON.parse(response);
                        if (response.status == 1) {
                            $('#info-modal').modal('show');
                        } else {
                            $('#response-modal div.modal-body').text(response.info);
                            $('#response-modal').modal('show');
                        }
                    }
                });
        });
    });
    <?php } ?>
    $(function(){ // let all dom elements are loaded
        $('#info-modal').on('hide.bs.modal', function (e) {
            location.reload();
        });
    });
</script>
<style>
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