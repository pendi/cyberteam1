<div id="body">
    <div class="container">
        <section class="thumbnail">
            <div class="thumb-movie">
                <h2 class="title">Movies</h2>
                <div class="sortby">
                    <ul class="flat">
                        <li>
                            <a href="#">A - Z</a>
                        </li>
                        <li>
                            <a href="#">Z - A</a>
                        </li>
                        <li>
                            <a href="#">Latest</a>
                        </li>
                        <li>
                            <a href="#">Oldest</a>
                        </li>
                        <li>
                            <a href="#">Quality</a>
                        </li>
                        <li>
                            <a href="#">Rate</a>
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
                <div class="more">
                    <a class="pull-right" href="#">Show All Movies</a>
                </div>
            </div>
        </section>
    </div>
</div>