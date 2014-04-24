<?php
    if(!empty($quser)){
        $user = $quser;
    }else{
        $user = $CI->auth->get_user();
    }
?>
<?php if(!empty($param)) : ?>
    <?php endif ?>
<div id="body">
    <div class="container">
        <section class="flashmovie">
            <div class="row">
                <div class="span-8">
                    <div class="wrapper">
                        <div class="flashnews">
                            <ul class="flashnews-slide flat">
                                <?php foreach ($films as $item):?>
                                    <li>
                                        <div class="movie">
                                            <div class="slide-movie" style="background:url(<?php echo base_url('data/').'/'.$item['cover'] ?>) center; background-size: cover;"></div>
                                        </div>
                                        <div class="description">
                                            <h2><a href="<?php echo site_url('web/detail_film/'.$item['id'])?>"><?php echo $item['title']?></a></h2>
                                        </div>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="span-4">
                    <div class="wrapper">
                        <div class="review">
                            <h4><span class="icon-review"></span>Review</h4>
                            <?php foreach ($film_rev as $item):?>
                                <div class="review-movie">
                                    <div class="image">
                                        <a href="<?php echo site_url('web/detail_film/'.$item['id']); ?>">
                                            <img src ="<?php echo base_url('data/').'/'.$item['cover'] ?>">
                                        </a>
                                    </div>
                                    <div class="title-desc">
                                        <h6 class="title">
                                            <a href="<?php echo site_url('web/detail_film/'.$item['id']); ?>"><?php echo $item['title']?></a>
                                        </h6>
                                        <p class="desc">
                                            <?=word_limiter($item['description'],12)."  "?>
                                        </p>
                                        <a href="<?php echo site_url('web/detail_film/'.$item['id']); ?>">Read More ></a>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="popular-movie">
            <div class="row">
                <div class="span-12">
                    <div class="thumb-movie">
                        <h4><span class="icon-popular"></span>Popular Movie</h4>
                        <ul class="flat">
                            <?php foreach ($film_pop as $item):?>
                                <li>
                                    <a href="<?php echo site_url('web/detail_film/'.$item['id']); ?>">
                                        <div class="image" style="background:url(<?php echo base_url('data/').'/'.$item['cover'] ?>) center no-repeat; background-size: cover;">
                                        </div>
                                    </a>
                                    <p class="desc">
                                        <a href="<?php echo site_url('web/detail_film/'.$item['id']); ?>"><?php echo $item['title']?></a>
                                    </p>
                                </li>
                            <?php endforeach;?>
                        </ul>
                        <div class="more">
                            <a class="pull-right" href="<?php echo site_url('web/list_movie') ?>">Show All Movies</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>