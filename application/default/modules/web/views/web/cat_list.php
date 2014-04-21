<style>
	.clear{
		clear: both;
	}
</style>
<div id="body">
    <div class="container">
        <section class="thumbnail">
            <div class="thumb-movie">
            	<?php foreach ($category as $key => $item) : ?>
                <h2 class="title"></span> <?php echo $item['name'];?></h2>
				<?php endforeach ?>
                <ul class="flat">
                <?php foreach ($film as $item):?>
                    <li>
                        <a href="<?php echo site_url('web/detail_film/'.$item['id'])?>">
                            <div class="image" style="background: url(<?php echo base_url('data/').'/'.$item['cover'] ?>) center no-repeat; background-size: cover;"></div>
                        </a>
                        <p class="desc">
                            <a href="<?php echo site_url('web/detail_film/'.$item['id'])?>"><?php echo $item['title']?></a>
                        </p>
                    </li>
				<?php endforeach;?>
                </ul>
                <div clas="row">
                    <?php echo $this->pagination->new_create_links() ?>
                </div>
                <div class="clear"></div>
            </div>
        </section>
    </div>
</div>