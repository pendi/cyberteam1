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
                            <a href="<?php echo site_url('web/list_article/latest') ?>"<?php if($sort == 'latest'){ echo 'class="active"';} ?> >Latest</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('web/list_article/az') ?>"<?php if($sort == 'az'){ echo 'class="active"';} ?> >A - Z</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('web/list_article/za') ?>" <?php if($sort == 'za'){ echo 'class="active"';} ?>>Z - A</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('web/list_article/oldest') ?>" <?php if($sort == 'oldest'){ echo 'class="active"';} ?> >Oldest</a>
                        </li>
                    </ul>
                </div>
                <ul class="flat">
                <?php foreach ($article as $item):?>
                    <li>
                        <a href="<?php echo site_url('web/detail_article/'.$item['id'])?>">
                            <div class="image" style="background: url(<?php echo base_url('data/').'/'.$item['cover'] ?>) center no-repeat; background-size: cover;"></div>
                        </a>
                        <p class="desc">
                            <a href="<?php echo site_url('web/detail_article/'.$item['id'])?>"><?php echo $item['title']?></a>
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
</div>