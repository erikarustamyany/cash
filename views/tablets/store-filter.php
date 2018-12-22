<div class="store-filter clearfix" style="margin-top: 20px;">
    <?php  if($isTop) { ?>
    <div class="pull-left">
        <div class="sort-filter">
            <span class="text-uppercase">Ըստ:</span>
            <select id="product-order-select" class="input" style="width: 180px;">
                <option value="1" <?=(!empty($params['ordering']) && $params['ordering'] == 1)? 'selected':'' ?>>Հայտնիության</option>
                <option value="2"  <?=(!empty($params['ordering']) && $params['ordering'] == 2)? 'selected':'' ?>>Հերթականության</option>
                <option value="3"  <?=(!empty($params['ordering']) && $params['ordering'] == 3)? 'selected':'' ?> >Գնի աճման</option>
                <option value="4"  <?=(!empty($params['ordering']) && $params['ordering'] == 4)? 'selected':'' ?> >Գնի նվազման</option>
            </select>
            <div id="product-order-btn" class="main-btn icon-btn" style="cursor: pointer"><i class="fa fa-arrow-down"></i></div>
        </div>
    </div>
    <?php } else { ?>
    <div class="pull-right">
        <ul class="store-pages">
            <li><span class="text-uppercase">Էջ:</span></li>
            <?php if($params['current_page'] - 3 > 1) { ?>
                <li class="list-pages"><?= 1 ?></li>
            <?php } ?>

            <?php if($params['current_page'] - 4 > 1) { ?>
               ...
            <?php } ?>
            <?php for($x = $params['current_page'] - 3;$x <= $params['current_page'] + 3; $x++) { ?>
                <?php if($x > 0 && $x <= $params['last_page']) {?>
                    <li class="list-pages <?= ($params['current_page'] == $x? 'active':'') ?>"><?= $x ?></li>
            <?php } } ?>


            <?php if($params['current_page'] + 4 < $params['last_page']) { ?>
                ...
            <?php } ?>

            <?php if($params['current_page'] + 3 < $params['last_page']) { ?>
                <li class="list-pages"><?= $params['last_page'] ?></li>
            <?php } ?>

            <li><a href="<?= $params['requested_url']. 'page=' . ($params['current_page'] + 1) ?>"><i class="fa fa-caret-right"></i></a></li>
        </ul>
    </div>
    <?php } ?>
</div>