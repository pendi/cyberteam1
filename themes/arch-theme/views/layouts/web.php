<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $CI->_page_title; ?></title>

    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="creator" content="Ali" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="Xinix, Xinix-Tech, Xinix-Technology, IT consultant, IT solution, Web Developer, Web Designer, perusahaan IT Indonesia, IT solution Indonesia, IT solution Jakarta, content management system, PT Sagara XINIX solusitama, ESB Implementor Jakarta Indonesia, Business Intelligence, Java Programmer, J2EE Developer, PHP programmer, IT developer Team, camel, IT Company, Indonesia, Jakarta, Solusi teknologi informasi " />
    <meta name="description" content="Xinix, Xinix-Tech, Xinix-Technology, IT consultant, IT solution, Web Developer, Web Designer, perusahaan IT Indonesia, IT solution Indonesia, IT solution Jakarta, content management system, PT Sagara XINIX solusitama, ESB Implementor Jakarta Indonesia,Business Intelligence, Java Programmer, J2EE Developer, PHP programmer, IT developer Team, camel, IT Company, Indonesia, Jakarta, Solusi teknologi informasi" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="image/x-icon" href="<?php echo theme_url('favicon.ico') ?>" rel="Shortcut icon" />
    <link href="<?php echo theme_url('js/jquery.bxslider/jquery.bxslider.css') ?>" rel="stylesheet" media="all" />
    <link href="<?php echo theme_url('css/naked.css') ?>" rel="stylesheet" media="all" />
    <link href="<?php echo theme_url('css/main.css') ?>" rel="stylesheet" media="all" />
    <link href="<?php echo theme_url('css/font/montserrat/stylesheet.css') ?>" rel="stylesheet" media="all" />
    <link href="<?php echo theme_url('css/font/open_sans/stylesheet.css') ?>" rel="stylesheet" media="all" />

	<script type="text/javascript" src="<?php echo theme_url('js/jquery-1.9.1.js') ?>"></script>
	<script type="text/javascript" src="<?php echo theme_url('js/jquery.bxslider/jquery.bxslider.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo theme_url('js/main.js') ?>"></script>
</head>
<?php $USER = $CI->auth->get_user() ?>
<body>
	<header>
        <div class="container">
            <div class="row">
                <nav>
                    <h1 class="brand">
                        <a href="index.php">
                            <span class="logo"></span>
                            Xinix Movie
                        </a>
                    </h1>
                    <div class="menu pull-right">
                        <ul class="flat navigation">
                            <li>
                                <a href="<?php echo site_url('web/list_movie') ?>">Movies</a>
                            </li>
                            <?php if($USER['is_login']) : ?>
							<li><a href='<?php echo site_url('web/detail_user'.'/'.$USER['id'])?>'><span style="color: #02ADD8;"><?php echo $USER['username'] ?></span></a></li>
							<li><a href='<?php echo site_url('user/logout')?>'>Logout</a></li>
							<?php else : ?>
                            <li>
                                <a href="<?php echo site_url('web/signup') ?>">Register</a>
                            </li>
                            <li class="login">
                                <a>Login</a>
                                <div class="menu-login hide animated fadeOutUp">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="span-12">
                                                <label>Username</label>
                                                <input type="text" name="login" value=""  placeholder="<?php echo l('Username/Email') ?>" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="span-12">
                                                <label>Password</label>
                                                <input type="password"name="password" value="" placeholder="<?php echo l('Password') ?>" />
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="span-12 forgot">
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="span-12">
                                                <input value="Login" type="submit" class="submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <?php endif ?>
                        </ul>
                        <div class="search-media">
                            <div class="search">
                                <form action="">
                                    <input type="text" placeholder="Search" class="text">
                                    <span class="search-icon"></span>
                                </form>
                            </div>
                            <div class="media">
                                <ul class="flat">
                                    <li class="fb">
                                        <a href="#">FB</a>
                                    </li>
                                    <li class="tw">
                                        <a href="#">TW</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="category">
        <div class="container">
            <ul class="flat">
                <li>
                    <a href="#">Horror</a>
                </li>
                <li>
                    <a href="#">Biography</a>
                </li>
                <li>
                    <a href="#">Action</a>
                </li>
                <li>
                    <a href="#">Comedy</a>
                </li>
                <li>
                    <a href="#">Adult</a>
                </li>
                <li>
                    <a href="#">Cartoon</a>
                </li>
                <li>
                    <a href="#">Anime</a>
                </li>
            </ul>
        </div>
    </div>

    <section id="<?php echo empty($uri) ? 'body':'content-body'?>">
        <?php echo $this->load->view($CI->_view, $CI->_data, true) ?>
    </section>
    
    <div id="footer">
        <div class="container">
            <div class="wrapper">
                <div class="nav-foot">
                    <ul class="flat">
                        <li>
                            <a href="#">Privacy</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('site/index') ?>">Dashboard</a>
                        </li>
                    </ul>
                </div>
                <p class="copyright">Copyright © 2014 Xinix Technology, some right reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>