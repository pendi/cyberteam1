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
                            <a href="#">
                                <div class="image" style="background: url(<?php echo base_url('data/').'/'.$item['cover'] ?>) center no-repeat; background-size: cover;"></div>
                            </a>
                            <p class="desc">
                                <a href="#"><?php echo $item['title']?></a>
                            </p>
                        </li>
					<?php endforeach;?>
                        <!-- <li>
                            <a href="#">
                                <div class="image" style="background: url(themes/img/apocalypse.jpg) center no-repeat; background-size: cover;"></div>
                            </a>
                            <p class="desc">
                                <a href="#">Apocalypse Pompeii</a>
                            </p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="image" style="background: url(themes/img/arena.jpg) center no-repeat; background-size: cover;"></div>
                            </a>
                            <p class="desc">
                                <a href="#">Arena</a>
                            </p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="image" style="background: url(themes/img/captainphillips.jpg) center no-repeat; background-size: cover;"></div>
                            </a>
                            <p class="desc">
                                <a href="#">Captain Phillips</a>
                            </p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="image" style="background: url(themes/img/lankwaifong2.jpg) center no-repeat; background-size: cover;"></div>
                            </a>
                            <p class="desc">
                                <a href="#">Lan Kwai Fong 2</a>
                            </p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="image" style="background: url(themes/img/lankwaifong3.jpg) center no-repeat; background-size: cover;"></div>
                            </a>
                            <p class="desc">
                                <a href="#">Lan Kwai Fong 3</a>
                            </p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="image" style="background: url(themes/img/princeofpersia.jpg) center no-repeat; background-size: cover;"></div>
                            </a>
                            <p class="desc">
                                <a href="#">Prince of Persia</a>
                            </p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="image" style="background: url(themes/img/hercules.jpg) center no-repeat; background-size: cover;"></div>
                            </a>
                            <p class="desc">
                                <a href="#">The Legend Of Hercules</a>
                            </p>
                        </li> -->
                    </ul>
                    <div class="more">
                        <a class="pull-right" href="#">Show All Movies</a>
                    </div>
                </div>
            </section>
        </div>
    </div>