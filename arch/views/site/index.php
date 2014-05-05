<style type="text/css">
    .desktop {
        text-align: center;
    }
</style>
<div class="container">
    <div class="row-fluid">
        <fieldset class="desktop">
            <legend>CYBERTEAM</legend>
            <div class="layout-flexible row-fluid" style="margin-top: 50px; margin-bottom: 50px">
                <div class="span4 item" style="margin: 0 auto;; float: none">
                    <a href="<?php echo site_url ('article/listing') ?>" title="">
                        <img src="<?php echo theme_url('/img/folder.png') ?>" width="300px" height="300px">
                        <div class="clear"></div>
                        <h4>List Article</h4>
                    </a>
                </div>
            <?php //foreach ($category_film as $key => $cat_film) : ?>
                <!-- <div class="span4 item" style="margin: 0">
                    <a href="<?php echo site_url ('film/cat').'/'.$cat_film['id'] ?>" title="">
                        <img src ="<?php echo base_url('data/').'/'.$cat_film['image'] ?>" width="150" height="150">
                        <div class="clear"></div>
                        <h6><?php echo $cat_film['name'] ?></h6>
                    </a>
                </div> -->
            <?php //endforeach ?>
            </div>
        </fieldset>
    </div>
</div>