<div id="body">
    <div class="container">
        <section class="thumbnail">
            <div class="thumb-movie">
                <h2 class="title">Movies</h2>
                <div class="sortby">
                    <ul class="flat">
                        <li>
                            <h6>Sortby :</h6>
                        </li>
                        <li>
                            <a href="<?php echo site_url('web/list_movie/az') ?>">A - Z</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('web/list_movie/za') ?>">Z - A</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('web/list_movie/latest') ?>">Latest</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('web/list_movie/oldest') ?>">Oldest</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('web/list_movie/quality') ?>">Quality</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('web/list_movie/rate') ?>">Rate</a>
                        </li>
                    </ul>
                </div>
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
                <ul class="pagination">
                    <?php echo $this->pagination->create_links() ?>
                    <!-- <li class="arrow-first"><a href="#">&lt;&lt;</a></li>
                    <li class="prev"><a href="#">&lt;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#">&gt;</a></li>
                    <li class="arrow-last"><a href="#">&gt;&gt;</a></li> -->
                </ul>
                <div class="clear"></div>
            </div>
        </section>
    </div>
</div>