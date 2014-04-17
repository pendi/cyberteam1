<div id="body">
    <div class="container">
        <section class="detail">
            <div class="row">
                <h2 class="title"><?php echo ($film['title']); ?></h2>
                <div class="span-4">
                    <div class="image" style="background:url('<?php echo base_url('data/').'/'.$film['cover'] ?>') center; background-size: cover;"></div>
                    <div class="detail-mov">
                        <div class="row">
                            <div class="span-12">
                                <div class="row">
                                    <div class="span-4">
                                        <h6>Category</h6>
                                    </div>
                                    <div class="span-8">
                                        <h6><?php echo format_model_param($film['category_id'],'category'); ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <div class="row">
                                    <div class="span-4">
                                        <h6>Size</h6>
                                    </div>
                                    <div class="span-8">
                                        <h6><?php echo ($film['size']); ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <div class="row">
                                    <div class="span-4">
                                        <h6>Quality</h6>
                                    </div>
                                    <div class="span-8">
                                        <h6><?php echo format_param_short($film['quality'],'quality'); ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span-12">
                                <div class="row rate">
                                    <div class="span-4">
                                        <h6>Rate</h6>
                                    </div>
                                    <div class="span-8">
                                        <h6><?php echo $film['rate'] ?> Like</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="span-12">
                                <div class="row rate">
                                    <div class="span-4">
                                        <h6>Comment</h6>
                                    </div>
                                    <div class="span-8">
                                        <h6>Like <?php echo $film['rate'] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="download">
                                <div class="span-6">
                                    <a class="submit pull-left" href="<?php echo site_url('web/detail_film').'/'.$film['id'].'/1'; ?>">Like</a>
                                </div>
                                <div class="span-6">
                                    <a class="submit pull-right" href="<?php echo base_url('data/film/filmnya/').'/'.$film['title'].'.zip' ?>">Download</a>
                                </div>
                            </div>                                
                        </div>
                        <div class="row comment-field">
                            <div class="span-12">
                                <div class="row comment-content">
                                    <div class="span-4">
                                        <div class="avatar" style="background: url(themes/img/aliaraaab.jpg) center no-repeat; background-size: cover;"></div>
                                    </div>
                                    <div class="span-8">
                                        <div class="username">
                                            <h6>
                                                <a href="#">wahyu</a>
                                                Comment
                                            </h6>
                                        </div>
                                        <div class="date">
                                            <span>2014-04-17 15:34:28</span>
                                        </div>
                                        <div class="content-req">
                                            <p>content</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span-8">
                    <div class="row">
                        <div class="span-12">
                            <div class="row">
                                <div class="span-2">
                                    <h6>Sinopsis</h6>
                                </div>
                                <div class="span-10 description">
                                    <p>
                                        <?php echo nl2br($film['description']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span-12">
                            <div class="row">
                                <div class="span-2">
                                    <h6>Trailer</h6>
                                </div>
                                <div class="span-10 trailer">
                                    <?php
                                        $film_code = $film['trailer'];
                                        $youtube = explode("v=", $film_code);
                                    ?>
                                    <?php if(!empty($film['trailer'])) : ?>
                                        <iframe width="530" height="315" src="//www.youtube.com/embed/<?php echo $youtube[1] ?>" frameborder="0" allowfullscreen></iframe>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span-12">
                            <div class="row comment">
                                <form action="" method="POST">
                                    <div class="span-2">
                                        <h6>Comment</h6>
                                    </div>
                                    <div class="span-10">
                                        <textarea name="comment" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="span-12">
                                        <div class="row">
                                            <input value="Submit" type="submit" class="submit pull-right">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>