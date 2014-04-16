<div id="body">
    <div class="container">
        <section class="detail">
            <div class="row">
                <h2 class="title"><?php echo $film['title']?></h2>
                <div class="span-4">
                    <div class="image" style="background:url('<?php echo base_url('data/').'/'.$film['cover'] ?>') center; background-size: cover;"></div>
                    <div class="download">
                        <a class="submit" href="<?php echo base_url('data/film/filmnya/').'/'.$film['title'].'.zip' ?>">Download</a>
                    </div>
                    <form action="" method="POST">
                        <div class="download">
                            <input type="hidden" name="rate" value="1">
                            <input type="submit" value="Like">
                        </div>
                    </form>
                </div>
                <div class="span-8">
                    <div class="row">
                        <div class="span-12">
                            <div class="row">
                                <div class="span-2">
                                    <h6>Category</h6>
                                </div>
                                <div class="span-10">
                                    <h6><?php echo format_model_param($film['category_id'],'category'); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span-12">
                            <div class="row">
                                <div class="span-2">
                                    <h6>Size</h6>
                                </div>
                                <div class="span-10">
                                    <h6><?php echo ($film['size']); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span-12">
                            <div class="row">
                                <div class="span-2">
                                    <h6>Quality</h6>
                                </div>
                                <div class="span-10">
                                    <h6><?php echo format_param_short($film['quality'],'quality'); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <div class="span-10">
                                    <?php
										$film_code = $film['trailer'];
										$youtube = explode("v=", $film_code);
									?>
									<?php if(!empty($film['trailer'])) : ?>
										<iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $youtube[1] ?>" frameborder="0" allowfullscreen></iframe>
									<?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>