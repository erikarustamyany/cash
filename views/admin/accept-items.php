<?php echo $this->render('/admin/index', []); ?>

<div class="container">
    <div class="col-md-3">
        <a class="admin-nav" href="/admin/users">
            <i class="fa fa-user-circle admin-icon"></i>
        </a>
    </div>
    <div class="col-md-3">
        <a class="admin-nav active" href="/admin/items">
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
