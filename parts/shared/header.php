<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 ie6" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8 ie7" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9 ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?>  <?php wp_title(); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width" >
    <link href="<?php bloginfo('template_directory'); ?>/css/screen.css" media="screen" rel="stylesheet">
    <link rel="alternate" type="application/rss xml" title="Subscribe to <?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
    <script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="container">
    <div class="page">
        <header class="header clearfix">
            <nav id="global" class="clear-fix">
                <ul id="global-access" class="unstyled horizontal pull-left">
                    <li class="normal-case">
                        <a href="http://www.caringbridge.org/sites">Sites</a>
                    </li>
                    <li class="normal-case active">
                        <a href="http://supportplanner.caringbridge.org">SupportPlanner</a>
                    </li>
                </ul>
            </nav>
            <div id="caringbridge_header_logo" class="pull-left image-container">
                <a class="brand" data-ga-label="CaringBridge Logo" href="http://www.caringbridge.org">
                <img alt="CaringBridge" src="<?php bloginfo('template_directory'); ?>/vendor/caringbridge/brand/public/images/logo/logo-caringbridge-large.png">
                </a>
            </div>
            <a class="btn-donate pull-right" href="https://donate.caringbridge.org/?Split=1101" target="_blank">
                <i class="icon-flower"></i> Donate now
            </a>
        </header>
        
        <nav id="hybrid_site_navigation">
                <ul id="primarynav" class="horizontal" data-ga-label-prefix="Primary Nav - ">
                    <li class="first" id="aboutnav"><a href="http://www.caringbridge.org/about" id="site-nav-about-link">About</a></li>
                    <li id="sharenav"><a href="http://www.caringbridge.org/getinvolved" id="site-nav-share-service-link">Get Involved</a></li>
                    <li id="partnersnav"><a href="http://www.caringbridge.org/partners" id="site-nav-partners-link">Partners</a></li>
                    <li id="ourblognav" class="active"><a href="http://blog.caringbridge.org" id="site-nav-blog-link">Our Blog</a></li>
                    <li id="newsroomnav"><a href="http://www.caringbridge.org/newsroom" id="site-nav-newsroom-link">Newsroom</a></li>
                    <li id="waystogivenav"><a href="http://www.caringbridge.org/waystogive" id="site-nav-waystogive-link">Ways to Give</a></li>
                </ul>
            </nav>
        
    </div> <!-- div.page -->
</div> <!-- div.container -->
