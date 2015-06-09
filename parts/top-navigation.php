<nav class="navbar navbar-static-top navbar-global" role="navigation" aria-label="Global Navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://www.caringbridge.org">
                <img src="<?php bloginfo('template_directory'); ?>/img/logo-caringbridge-large.png"
                alt="CaringBridge.org"
                width="235"
                height="41"
                />
            </a>
            <a class="navbar-toggle" role="button" data-toggle="offcanvas" data-target=".row-offcanvas-right">
                <span class="sr-only">Toggle navigation</span>
                <i class="icon-reorder" role="presentation" aria-hidden="true"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <div class="top-tier">
                <div class="global-profile pull-right">
                    <a href="#" class="link-login">Log In or Sign Up</a>
                </div>
            </div>

            <div class="row bottom-tier">
                <div class="col-sm-8">
                    <ul class="nav navbar-nav navbar-left" role="menubar">
                        <li role="menuitem"><a href="#">Start a Site</a></li>
                        <li role="menuitem"><a href="#">About Us</a></li>
                        <li role="menuitem"><a href="#">Get Involved</a></li>
                        <li role="menuitem"><a class="nav-donate" href="#"><i class="cbicon-flower"></i> Donate</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <form class="navbar-form pull-right" action="#" method="get" role="search">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="placeholder-fallback" for="find-site">Find a Site</label>
                                <input placeholder="Find a Site" class="form-control" type="search" id="find-site" name="q" autocorrect="off" autocapitalize="off" autocomplete="off" spellcheck="false" />
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <span class="visuallyhidden">Visit</span>
                                        <i class="icon-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>