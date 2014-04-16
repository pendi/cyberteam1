<div id="body">
	<div class="container">
	    <section class="thumbnail">
	        <div class="thumb-movie">
	            <h2 class="title search">Search Result</h2>
	            <ul class="flat">
	                <?php foreach ($data['items'] as $item):?>
	                <li>
	                    <a href="detail-movie.php">
	                        <div class="image" style="background: url(<?php echo base_url('data/').'/'.$item['cover'] ?>) center no-repeat; background-size: cover;"></div>
	                    </a>
	                    <p class="desc">
	                        <a href="detail-movie.php"><?php echo $item['title']?></a>
	                    </p>
	                </li>
                    <?php endforeach;?>
	            </ul>
	            <ul class="pagination">
	                <li class="arrow-first"><a href="#">&lt;&lt;</a></li>
	                <li class="prev"><a href="#">&lt;</a></li>
	                <li class="active"><a href="#">1</a></li>
	                <li><a href="#">2</a></li>
	                <li><a href="#">3</a></li>
	                <li class="next"><a href="#">&gt;</a></li>
	                <li class="arrow-last"><a href="#">&gt;&gt;</a></li>
	            </ul>
	        </div>
	    </section>
	</div>
</div>