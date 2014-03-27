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
    <link href="<?php bloginfo('template_directory'); ?>/css/uplift.css" media="screen" rel="stylesheet">
    <link rel="alternate" type="application/rss xml" title="Subscribe to <?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
    <script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.ba-throttle-debounce.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/navbar-squisher.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<nav class="navbar navbar-static-top navbar-global navbar-default" role="navigation" aria-label="Global Navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-global .navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="<?php bloginfo('template_directory'); ?>/img/logo-caringbridge-large.png"
                    alt="CaringBridge.org"
                    width="235"
                    height="41"
                />
            </a>
        </div>
        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right" role="menubar" data-navbar-squish=".dropdown-more">

                <li role="menuitem" data-expendability="0">
                    <a href="#">Start a Site</a>
                </li>

                <li role="menuitem" data-expendability="6">
                    <a href="#">Get Involved</a>
                </li>

                <li role="menuitem" data-expendability="8">
                    <a href="#">Shared Stories</a>
                </li>

                <li role="menuitem" data-expendability="10">
                    <a href="#">Uplift Blog</a>
                </li>

                <!-- MORE tab houses links that get dropped off as screen shrinks -->
                <li class="dropdown dropdown-more navbar-more hidden" role="menuitem" aria-haspopup="true">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    </ul>
                </li>

                <li role="menuitem" data-expendability="4">
                    <a class="nav-donate" href="#"><i class="cbicon-flower"></i> Donate</a>
                </li>

                <li class="dropdown" role="menuitem" aria-haspopup="true" title="Visit a Site">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Visit a Site <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="menuitem">
                            <form class="navbar-form" action="#" method="get" role="search">
                                <div class="form-group">
                                    <label class="visuallyhidden" for="q">
                                        Enter the site name you'd like to visit
                                    </label>
                                    <div class="input-group">
                                        <input placeholder="Site or Planner" class="form-control" type="search" id="q" name="q" autocorrect="off" autocapitalize="off" autocomplete="off" spellcheck="false" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                                <span class="visuallyhidden">Visit</span>
                                                <i class="icon-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>

                <li class="global-profile" role="menuitem">
                    <a href="#">Log In or Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>