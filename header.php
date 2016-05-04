<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <!-- Meta -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="favicon.ico">
	<?php wp_head(); ?>

</head>
<body>
    <!-- ******HEADER****** -->
    <header class="header">
        <div class="container">
            <img class="profile-image img-responsive pull-left" src="http://s.gravatar.com/avatar/fbda6a6d104fe0d1de91300e995f1c28?s=180" alt="James Lee" />
            <div class="profile-content pull-left">
                <h1 class="name"><?php echo get_bloginfo( 'name' ); ?></h1>
                <h2 class="desc"><?php echo get_bloginfo( 'description' ); ?></h2>
                <ul class="social list-inline">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-github-alt"></i></a></li>
                    <li class="last-item"><a href="#"><i class="fa fa-hacker-news"></i></a></li>
                </ul>
            </div><!--//profile-->
            <a class="btn btn-cta-primary pull-right" href="#" target="_blank"><i class="fa fa-paper-plane"></i><?php echo __('Contact Me', 'aloha') ?></a>
        </div><!--//container-->
    </header><!--//header-->