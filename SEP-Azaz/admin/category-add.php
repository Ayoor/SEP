

<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from 111.68.112.228:443/public/form-controls.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:42:47 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form controls &middot; Elephant Template &middot; The fastest way to build Modern Admin APPS for any platform, browser, or device.</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta property="og:url" content="http://demo.madebytilde.com/elephant">
    <meta property="og:type" content="website">
    <meta property="og:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
    <meta property="og:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta property="og:image" content="../../demo.madebytilde.com/elephant.html">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@madebytilde">
    <meta name="twitter:creator" content="@madebytilde">
    <meta name="twitter:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
    <meta name="twitter:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta name="twitter:image" content="../../demo.madebytilde.com/elephant.html">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#d9230f">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="css/vendor.min.css">
    <link rel="stylesheet" href="css/elephant.min.css">
    <link rel="stylesheet" href="css/application.min.css">
    <link rel="stylesheet" href="css/demo.min.css">
  </head>
  <body class="layout layout-header-fixed">
    <div class="layout-header">
      <div class="navbar navbar-default">
        <div class="navbar-header">
          <a class="navbar-brand navbar-brand-center" href="index.html">
            <img class="navbar-brand-logo" src="img/logo-inverse.svg" alt="Elephant">
          </a>
        </div>
      </div>
    </div>
    <div class="layout-main">
      <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
          <div class="custom-scrollbar">
            <nav id="sidenav" class="sidenav-collapse collapse">
              <ul class="sidenav">
                <li class="sidenav-search hidden-md hidden-lg">
                  <form class="sidenav-form" action="http://111.68.112.228:443/">
                    <div class="form-group form-group-sm">
                      <div class="input-with-icon">
                        <input class="form-control" type="text" placeholder="Search…">
                        <span class="icon icon-search input-icon"></span>
                      </div>
                    </div>
                  </form>
                </li>
                <li class="sidenav-heading">Navigation</li>
                <li class="sidenav-item has-subnav">
                  <a href="dashboard-1.html" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-home"></span>
                    <span class="sidenav-label">Dashboards</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                    <li><a href="store.php">Home</a></li>
                  </ul>
                </li>
                <li class="sidenav-item">
                  <a href="widgets.html">
                    <span class="badge badge-success">26</span>
                    <span class="sidenav-icon icon icon-th"></span>
                    <span class="sidenav-label">Add New Category</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Add New Categories</span>
              <span class="d-ib">
                <a class="title-bar-shortcut" href="#" title="Add to shortcut list" data-container="body" data-toggle-text="Remove from shortcut list" data-trigger="hover" data-placement="right" data-toggle="tooltip">
                  <span class="sr-only">Add to shortcut list</span>
                </a>
              </span>
             </h1>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal"  action="categoryFormSubmit.php" method="POST">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Category Name</label>
                    <div class="col-sm-9">
                      <input id="form-control-1" class="form-control" type="text" name="categoryName">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Category Description</label>
                    <div class="col-sm-9">
                      <textarea id="form-control-8" class="form-control" rows="3" name="description"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8"></label>
                    <div class="col-sm-9">
                    <button type="submit" name="save_data" class="btn btn-primary btn-block">Submit</button>
                    </div>
                  </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="theme">
      <div class="theme-panel theme-panel-collapsed">
        <div class="theme-panel-controls">
          <button class="theme-panel-toggler" title="Expand theme panel ( ] )" type="button">
            <span class="icon icon-cog icon-spin" aria-hidden="true"></span>
          </button>
        </div>
        <div class="theme-panel-body">
          <div class="custom-scrollbar">
            <div class="custom-scrollbar-inner">
              <h5 class="theme-heading">
                <a href="http://111.68.112.228:443/elephant/buy" class="btn btn-primary btn-block">Buy Elephant Now!</a>
              </h5>
              <ul class="theme-settings">
                <li class="theme-settings-heading">
                  <div class="divider">
                    <div class="divider-content">Theme Settings</div>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Header fixed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-header-fixed" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Sidebar fixed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-sidebar-fixed" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Sidebar sticky*</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-sidebar-sticky" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Sidebar collapsed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-sidebar-collapsed" data-sync="false">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Footer fixed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-footer-fixed" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-description">
                  <span>
                    <strong>Sidebar sticky*</strong> - by scrolling up and down the page, the menu placed on the sidebar moves along with the content until the bottom of the menu is reached. <a href="page-layouts.html">Learn more</a></span>
                </li>
              </ul>
              <hr class="theme-divider">
              <ul class="theme-variants">
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://111.68.112.228:443/elephant-v1.4.0/theme-1/" title="Theme 1">
                    <img class="img-responsive" src="img/f420a3cea0fb04862eb630f5a54b2733.jpg" alt="Theme 1">
                  </a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://111.68.112.228:443/elephant-v1.4.0/theme-2/" title="Theme 2">
                    <img class="img-responsive" src="img/3dd124286157b729cc38d9bd7045e384.jpg" alt="Theme 2">
                  </a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://111.68.112.228:443/elephant-v1.4.0/theme-3/" title="Theme 3">
                    <img class="img-responsive" src="img/35e0765272cd421a5352331003ae2ab1.jpg" alt="Theme 3">
                  </a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://111.68.112.228:443/elephant-v1.4.0/theme-4/" title="Theme 4">
                    <img class="img-responsive" src="img/4fcb4322807f1fd92aa3140adb37d4d9.jpg" alt="Theme 4">
                  </a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://111.68.112.228:443/elephant-v1.4.0/theme-5/" title="Theme 5">
                    <img class="img-responsive" src="img/b787e62313c23880e0797bfbbc3d150c.jpg" alt="Theme 5">
                  </a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://111.68.112.228:443/elephant-v1.4.0/theme-6/" title="Theme 6">
                    <img class="img-responsive" src="img/7489e404fb5088d63e5a5d55b27d546c.jpg" alt="Theme 6">
                  </a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://111.68.112.228:443/elephant-v1.4.0/theme-7/" title="Theme 7">
                    <img class="img-responsive" src="img/972b6c5882a45ee73d83a90a9852660c.jpg" alt="Theme 7">
                  </a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://111.68.112.228:443/elephant-v1.4.0/theme-8/" title="Theme 8">
                    <img class="img-responsive" src="img/0100e8b81ad03f81a64a0a5f49c5be41.jpg" alt="Theme 8">
                  </a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://111.68.112.228:443/elephant-v1.4.0/theme-9/" title="Theme 9">
                    <img class="img-responsive" src="img/69ece2eb60bdd2126e2acf27af43aa9b.jpg" alt="Theme 9">
                  </a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://111.68.112.228:443/elephant-v1.4.0/theme-10/" title="Theme 10">
                    <img class="img-responsive" src="img/2ef1cfdcf1da5256d7b994983bd8d457.jpg" alt="Theme 10">
                  </a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://111.68.112.228:443/elephant-v1.4.0/theme-11/" title="Theme 11">
                    <img class="img-responsive" src="img/cca2226fdaba079b321ba5cf05ba0adc.jpg" alt="Theme 11">
                  </a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://111.68.112.228:443/elephant-v1.4.0/theme-12/" title="Theme 12">
                    <img class="img-responsive" src="img/7a4ee939781f6165006cff1b5b8096d4.jpg" alt="Theme 12">
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="theme-panel-footer">
          <a class="rounded sq-36 bg-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fdemo.madebytilde.com%2Felephant&amp;t=The%20fastest%20way%20to%20build%20modern%20admin%20site%20for%20any%20platform%2C%20browser%2C%20or%20device" title="Share on Facebook" target="_blank">
            <span class="icon icon-facebook"></span>
          </a>
          <a class="rounded sq-36 bg-twitter" href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fdemo.madebytilde.com%2Felephant&amp;text=The%20fastest%20way%20to%20build%20modern%20admin%20site%20for%20any%20platform%2C%20browser%2C%20or%20device:%20http%3A%2F%2Fdemo.madebytilde.com%2Felephant&amp;via=madebytilde" title="Tweet" target="_blank">
            <span class="icon icon-twitter"></span>
          </a>
          <a class="rounded sq-36 bg-googleplus" href="https://plus.google.com/share?url=http%3A%2F%2Fdemo.madebytilde.com%2Felephant" title="Share on Google+" target="_blank">
            <span class="icon icon-google-plus"></span>
          </a>
          <a class="rounded sq-36 bg-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2Fdemo.madebytilde.com%2Felephant&amp;title=The%20fastest%20way%20to%20build%20modern%20admin%20site%20for%20any%20platform%2C%20browser%2C%20or%20device&amp;summary=Elephant%20is%20a%20front-end%20template%20created%20to%20help%20you%20build%20modern%20web%20applications%2C%20fast%20and%20in%20a%20professional%20manner.&amp;source=http%3A%2F%2Fdemo.madebytilde.com%2Felephant" title="Share on LinkedIn" target="_blank">
            <span class="icon icon-linkedin"></span>
          </a>
          <a class="rounded sq-36 bg-pinterest" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fdemo.madebytilde.com%2Felephant&amp;media=http://demo.madebytilde.com/elephant.jpg&amp;description=Elephant%20is%20a%20front-end%20template%20created%20to%20help%20you%20build%20modern%20web%20applications%2C%20fast%20and%20in%20a%20professional%20manner." title="Pin it" target="_blank">
            <span class="icon icon-pinterest-p"></span>
          </a>
          <a class="rounded sq-36 bg-default" href="mailto:?subject=The%20fastest%20way%20to%20build%20modern%20admin%20site%20for%20any%20platform%2C%20browser%2C%20or%20device&body=Elephant%20is%20a%20front-end%20template%20created%20to%20help%20you%20build%20modern%20web%20applications%2C%20fast%20and%20in%20a%20professional%20manner.:%20http%3A%2F%2Fdemo.madebytilde.com%2Felephant" title="Send email" target="_blank">
            <span class="icon icon-envelope-o"></span>
          </a>
        </div>
      </div>
    </div>
    <script src="js/vendor.min.js"></script>
    <script src="js/elephant.min.js"></script>
    <script src="js/application.min.js"></script>
    <script src="js/demo.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>

<!-- Mirrored from 111.68.112.228:443/public/form-controls.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:42:47 GMT -->
</html>
