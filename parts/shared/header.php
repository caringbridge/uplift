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
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-alert.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-button.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-carousel.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-collapse.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-dropdown.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-modal.js"></script>
<!-- throwing .js error for some reason    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-popover.js"></script> -->
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-scrollspy.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-tab.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-tooltip.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-transition.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-typeahead.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="navbar navbar-static-top gate-1-header" role="navigation" aria-label="Global Navigation">
        <div class="navbar-inner">
            <div class="fluid-container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".gate-1-header .nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <a class="brand" href="http://www.caringbridge.org/">
                    <img src="<?php bloginfo('template_directory'); ?>/img/logo-caringbridge-large.png" alt="CaringBridge.org" />
                </a>

                <div class="nav-collapse collapse">
                    <ul class="nav pull-right" role="menubar">
                        <li role="menuitem">
                            <a href="http://www.caringbridge.org/createwebsite">Start a Site</a>
                        </li>

                        <!-- @todo see if you can get this drop-down working -->
                        <li class="dropdown" role="menuitem" aria-haspopup="true" title="Visit a Site">
                            <a href="http://www.caringbridge.org/visit" class="dropdown-toggle" data-toggle="dropdown">Visit a Site <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="menuitem">
                                    <form class="form-search" action="http://www.caringbridge.org/search" method="get" role="search">
                                        <div class="input-append">
                                            <label class="visuallyhidden" for="q">Enter the site name you'd like to visit</label>
                                            <input placeholder="Site or Planner" class="search-query" type="search" id="q" name="q" />
                                            <button class="btn" type="submit">
                                                <span class="visuallyhidden">Visit</span>
                                                <i class="icon-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </li>
                             </ul>
                        </li>


                        <li class="global-profile" role="menuitem">
                            <a href="http://www.caringbridge.org/signin" class="link-login">Log In or Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="layout fluid-container">
        <div class="blog-header">
            <div class="faux-co-header">
                    <div class="clearfix">
                        <a href="http://www.caringbridge.org/" class="faux-co-header-logo">
                            <img src="<?php bloginfo('template_directory'); ?>/img/logo-caringbridge-large.png" alt="CaringBridge.org" />
                        </a>
                        <div class="pull-right">
                            <a href="https://www.caringbridge.org/redirect-donation/1101" class="btn btn-donate">
                            <i class="flower"></i>Donate Now</a>
                        </div>
                    </div>


                <ul class="faux-co-nav">
                    <li class=""><a href="http://www.caringbridge.org/about">About</a></li>
                    <li class=""><a href="http://www.caringbridge.org/getinvolved">Get Involved</a></li>
                    <li class=""><a href="http://www.caringbridge.org/partners">Partners</a></li>
                    <li class=""><a href="http://blog.caringbridge.org/">Our Blog</a></li>
                    <li class=""><a href="http://www.caringbridge.org/newsroom">Newsroom</a></li>
                    <li class=""><a href="http://www.caringbridge.org/waystogive">Ways to Give</a></li>
                </ul>
            </div>
        </div>
    </div>
