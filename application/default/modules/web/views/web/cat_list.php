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
                <!-- <ul class="pagination" style="float: left; margin: 10px 0 0; border-bottom: 0px">
			        <?php echo $this->pagination->create_links() ?>
			    </ul> -->
                <ul class="pagination">
                    <li class="arrow-first"><a href="#">&lt;&lt;</a></li>
                    <li class="prev"><a href="#">&lt;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#">&gt;</a></li>
                    <li class="arrow-last"><a href="#">&gt;&gt;</a></li>
                </ul>
                <div class="clear"></div>
            </div>
        </section>
    </div>
</div>