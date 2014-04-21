
	<div class="container">
	    <section class="thumbnail">
	        <div class="thumb-movie">
	            <h2 class="title search">Search Result</h2>
	            <ul class="flat">
	                <?php foreach ($data['items'] as $item):?>
	                <li>
	                    <a href="<?php echo site_url('web/detail_film'.'/'.$item['id']) ?>">
	                        <div class="image" style="background: url(<?php echo base_url('data/').'/'.$item['cover'] ?>) center no-repeat; background-size: cover;"></div>
	                    </a>
	                    <p class="desc">
	                        <a href="detail-movie.php"><?php echo $item['title']?></a>
	                    </p>
	                </li>
                    <?php endforeach;?>
	            </ul>
	            <div clas="row">
                    <?php echo $this->pagination->new_create_links() ?>
                </div>
	        </div>
	    </section>
	</div>