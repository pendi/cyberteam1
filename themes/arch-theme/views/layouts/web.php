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
	<link type="image/x-icon" href="<?php echo theme_url('img/favicon.ico') ?>" rel="Shortcut icon" />
    <link href="<?php echo theme_url('js/jquery.bxslider/jquery.bxslider.css') ?>" rel="stylesheet" media="all" />
    <link href="<?php echo theme_url('css/naked.css') ?>" rel="stylesheet" media="all" />
    <link href="<?php echo theme_url('css/main.css') ?>" rel="stylesheet" media="all" />
    <link href="<?php echo theme_url('css/font/montserrat/stylesheet.css') ?>" rel="stylesheet" media="all" />
    <link href="<?php echo theme_url('css/font/open_sans/stylesheet.css') ?>" rel="stylesheet" media="all" />

	<script type="text/javascript" src="<?php echo theme_url('js/jquery-1.9.1.js') ?>"></script>
	<script type="text/javascript" src="<?php echo theme_url('js/jquery.bxslider/jquery.bxslider.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo theme_url('js/main.js') ?>"></script>
    <script type="text/javascript" src="<?php echo theme_url ('js/oauthpopup.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#facebook').click(function(e){
                $.oauthpopup({
                    path: '<?php echo site_url()."/web/login_fb" ?>',
                    width:600,
                    height:300,
                    callback: function(){
                        window.location.reload();
                    }
                });
                e.preventDefault();
            });

            // ga('send', 'pageview', '/FBConnect');
        });
    </script>
</head>
       
<?php 
    if(!empty($quser)){
        $USER = $quser; 
    }else{
        $USER = $CI->auth->get_user(); 
    }
?>
<body>
	<header>
        <div class="container">
            <div class="row">
                <nav>
                    <h1 class="brand">
                        <a href="<?php echo site_url('web/index') ?>">
                            <span class="logo"></span>
                            Xinix Movie
                        </a>
                    </h1>
                    <div class="menu pull-right">
                        <ul class="flat navigation">
                            <li>
                                <a href="<?php echo site_url('web/list_movie') ?>">Movies</a>
                            </li>
                            <?php if(!empty($user['id'])) : ?>
                            <li>
                                <a href="<?php echo site_url('web/request_movie') ?>">Request</a>
                            </li>
                            <li><a href='<?php echo site_url('web/detail_user'.'/'.$user['id'])?>'><?php echo $user['username'] ?></a></li>
                            <li><a href='<?php echo site_url('web/logout')?>'>Logout</a></li>
                            <?php else : ?>
                            <li>
                                <a href="<?php echo site_url('web/signup') ?>">Register</a>
                            </li>
                            <li class="login">
                                <a>Login</a>
                                <div class="menu-login hide animated fadeOutUp">
                                    <form action="<?php echo site_url('user/login') ?>" method="POST">
                                        <div class="row">
                                            <div class="span-12">
                                                <label>Username</label>
                                                <input type="text" name="login" placeholder="Username/Email">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="span-12">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div clas="row">
                                            <div class="span-12">
                                                <a id="facebook" href="<?php echo site_url('web/login_fb') ?>">Login FB</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="span-12">
                                                <input type="hidden" name="continue" value="" />
                                                <input value="Login" type="submit" class="submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <?php endif ?>
                            <li>
                                <div class="search-media">
                                    <div class="search">
                                        <form method="post" action="<?php echo site_url('web/search') ?>">
                                            <input name="title" type="text" placeholder="Search Movie" class="text">
                                            <span class="search-icon"></span>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </header>
    <?php  
    	$category_film = $this->db->query("SELECT * FROM category")->result_array();
        $this->_data['category_film'] = $category_film;
    ?>
    <div class="category">
        <div class="container">
            <ul class="flat">
            	<?php foreach ($category_film as $cat):?>
                <li>
                    <a href="<?php echo site_url ('web/cat_list/'.$cat['id']) ?>"><?php echo $cat['name'] ?></a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>

    <section id="<?php echo empty($uri) ? 'body':'content-body'?>">
        <?php echo xview_error() ?>
        <?php echo xview_info() ?>
        <?php echo $this->load->view($CI->_view, $CI->_data, true) ?>
    </section>
    
    <div id="footer">
        <div class="container">
            <div class="wrapper">
                <div class="nav-foot">
                    <ul class="flat">
                        <li>
                            <a href="<?php echo site_url('web/index') ?>">Home</a>
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