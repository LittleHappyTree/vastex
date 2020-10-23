<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PT Vastex Inti Mulia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/bootstrap-responsive.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/fancybox/jquery.fancybox.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/jcarousel.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/flexslider.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/customstyle.css" rel="stylesheet" />

  <link id="bodybg" href="<?=base_url()?>assets/bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <!-- Theme skin -->
  <link href="<?=base_url()?>assets/skins/default.css" rel="stylesheet" />
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>assets/ico/apple-touch-icon-144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>assets/ico/apple-touch-icon-114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>assets/ico/apple-touch-icon-72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="<?=base_url()?>assets/ico/apple-touch-icon-57-precomposed.png" />
  <link rel="shortcut icon" href="<?=base_url()?>assets/ico/favicon.png" />

  <!-- =======================================================
    Theme Name: Flattern
    Theme URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>



<body>
  <div id="wrapper" class="boxed">
    <!-- start header -->
    <header>
      <div class="container">
        <!-- end toggle link -->
        <div class="row nomargin">
          <div class="span12">
            <div class="headnav">
              &nbsp;
            </div>
          </div>
        </div>
        <div class="row">
          <div class="span4">
            <div class="logo text-center" style="font-size: 13px; margin-top: 35px">
              <a href="index.html"><img src="<?=base_url()?>assets/img/logo-vastex.png" width="300px" /></a>
              <?php foreach ($address as $key):?>
              <p><?=$key->address?></p>
              <?php endforeach; ?>
              <?php $i=1; foreach ($contact as $key):?>
              <?=$key->title.':'?> <?=$key->description?><?=$retVal = ($i%2==0) ? '<br>' : ',' ;?>
              <?php $i++; endforeach; ?>
            </div>
          </div>
          <div class="span8">
            <section id="featured">
              <!-- start slider -->
              <!-- Slider -->
              <div id="nivo-slider">
                <div class="nivo-slider">
                  <!-- Slide #1 image -->
                  <img src="<?=base_url()?>assets/img/slides/nivo/bg-1.jpg" height="200px" alt="" title="#caption-1" />
                  <!-- Slide #2 image -->
                  <img src="<?=base_url()?>assets/img/slides/nivo/bg-2.jpg" alt="" title="#caption-2" />
                  <!-- Slide #3 image -->
                  <img src="<?=base_url()?>assets/img/slides/nivo/bg-3.jpg" alt="" title="#caption-3" />
                </div>
              </div>
              <!-- end slider -->
            </section>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->
    <section id="inner-headline">
      <div class="container" style="margin-bottom: -10px;">
        <div class="row">
          <div class="span2">
            <div class="menu-heading text-center">
              <a href="<?=base_url()?>" class="btn btn-menu btn-block <?=($active_page=='home') ? 'activated' : '';?> ">Home</a>
            </div>
          </div>
          <div class="span2">
            <div class="menu-heading text-center">
              <a href="<?=base_url()?>id/product" class="btn btn-menu btn-block <?=($active_page=='product') ? 'activated' : '';?>">Product</a>
            </div>
          </div>
          <div class="span2">
            <div class="menu-heading text-center">
              <a href="<?=base_url()?>id/about" class="btn btn-menu btn-block <?=($active_page=='certificate') ? 'activated' : '';?>">Certificate</a>
            </div>
          </div>
          <div class="span2">
            <div class="menu-heading text-center">
              <a href="<?=base_url()?>id/certificate" class="btn btn-menu btn-block <?=($active_page=='machining') ? 'activated' : '';?>">Machining Industry</a>
            </div>
          </div>
          <div class="span2">
            <div class="menu-heading text-center">
              <a href="<?=base_url()?>id/development" class="btn btn-menu btn-block <?=($active_page=='oilgas') ? 'activated' : '';?>">Oil and Gas</a>
            </div>
          </div>
          <div class="span2">
            <div class="menu-heading text-center">
              <a href="<?=base_url()?>id/contact" class="btn btn-menu btn-block <?=($active_page=='about') ? 'activated' : '';?>">About &amp; Contact</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
          <div class="row">
            <div class="span3">
              <aside class="left-sidebar">
                <div class="widget">
                  <h5 class="widgetheading">Product</h5>
                  <ul class="cat">
                    <li><i class="icon-angle-right"></i><a href="<?=base_url()?>id/product/product1">Product 1</li>
                    <li><i class="icon-angle-right"></i><a href="<?=base_url()?>id/product/product1">Product 2</li>
                    <li><i class="icon-angle-right"></i><a href="<?=base_url()?>id/product/product1">Product 3</li>
                    <li><i class="icon-angle-right"></i><a href="<?=base_url()?>id/product/product1">Product 4</li>
                    <li><i class="icon-angle-right"></i><a href="<?=base_url()?>id/product/product1">Product 5</li>
                  </ul>
                </div>
              </aside>
            </div>
            <div class="span9">
              <?php
                $this->view($page);
              ?>
            </div>
          </div>
      </div>
    </section>
    <footer>
      <div class="container">
        <div class="row">
          <div class="span2">
            <div class="widget">
              <h5 class="widgetheading">Home Page</h5>
              <ul class="link-list">
                <li><a href="#">Home Page</a></li>
              </ul>
            </div>
          </div>
          <div class="span2">
            <div class="widget">
              <h5 class="widgetheading">Product</h5>
              <ul class="link-list">
                <li><a href="#">Product 1</a></li>
                <li><a href="#">Product 2</a></li>
                <li><a href="#">Product 3</a></li>
                <li><a href="#">Product 4</a></li>
                <li><a href="#">Product 5</a></li>
              </ul>
            </div>
          </div>
          <div class="span2">
            <div class="widget">
              <h5 class="widgetheading">About</h5>
              <ul class="link-list">
                <li><a href="#">About Us</a></li>
              </ul>
            </div>
          </div>
          <div class="span2">
            <div class="widget">
              <h5 class="widgetheading">Certification</h5>
              <ul class="link-list">
                <li><a href="#">Certification</a></li>
              </ul>
            </div>
          </div>
          <div class="span2">
            <div class="widget">
              <h5 class="widgetheading">Development</h5>
              <ul class="link-list">
                <li><a href="#">Development</a></li>
              </ul>
            </div>
          </div>
          <div class="span2">
            <div class="widget">
              <h5 class="widgetheading">Contact</h5>
              <address>
								<strong>Vastex</strong><br>
                <?php foreach ($address as $key):?>
                <p><?=$key->address?></p>
                <?php endforeach; ?>
					 		</address>
              <p>
                <?php foreach ($contact as $key):?>
                    <?=$retVal = (empty($key->icon)) ? $key->title.':' : '<i class="fa '.str_replace('fa-','icon-',$key->icon).'"></i>' ;?> <?=$key->description?><br>
                <?php endforeach; ?>
              </p>
            </div>
          </div>
        </div>
      </div>  
    </footer>
  </div>
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?=base_url()?>assets/js/jquery.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.easing.1.3.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.js"></script>
  <script src="<?=base_url()?>assets/js/jcarousel/jquery.jcarousel.min.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.fancybox.pack.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.fancybox-media.js"></script>
  <script src="<?=base_url()?>assets/js/google-code-prettify/prettify.js"></script>
  <script src="<?=base_url()?>assets/js/portfolio/jquery.quicksand.js"></script>
  <script src="<?=base_url()?>assets/js/portfolio/setting.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.flexslider.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.nivo.slider.js"></script>
  <script src="<?=base_url()?>assets/js/modernizr.custom.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.ba-cond.min.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.slitslider.js"></script>
  <script src="<?=base_url()?>assets/js/animate.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="<?=base_url()?>assets/js/custom.js"></script>

</body>

</html>
