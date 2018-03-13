<?php 
  $brandData = $this->Site_model->BrandSearch(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="<?php echo base_url('/images-fitness-equipment-sale/favicon.ico'); ?>" type="image/gif" sizes="16x16" />
    <title>
        <?php
          //if(isset($title)){ echo $title ; }elseif(isset($CollapsiblePanelTitle)){ echo $CollapsiblePanelTitle;}else{ echo "Global Fitness"; }
           if(isset($MetaCategoryPageTitle)){ echo $MetaCategoryPageTitle ; }elseif(isset($title)){ echo $title;}else{ echo "Global Fitness"; }  
        ?>
    </title>
    <meta name="description" content="<?php if(isset($CategoryData)){ print_r($CategoryData[0]->MetaNameDescription) ; }
elseif(isset($detail[0]->MetaDetailPageDescriptionTag)){ print_r($detail[0]->MetaDetailPageDescriptionTag) ; }
 else{ print_r( $description) ; }
?>">
    <meta name="keywords" content="<?php if(isset($CategoryData)){
print_r($CategoryData[0]->MetaNameKeywords) ; }if(isset($detail[0]->MetaCategoryPageKeywords)){print_r($detail[0]->MetaCategoryPageKeywords);}
elseif(isset($keywords)){ print_r($keywords);}
elseif(isset($detail)){print_r($detail[0]->MetaDetailPageKeywordTag) ; } ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="distribution" content="<?php if(isset($CategoryData)){  print_r($CategoryData[0]->MetaNameLanguage) ; } else{
   echo " Global "; }?>">
    <meta name="language" content="English">
    <meta name="y_key" content="c31a912c6457457a">
    <?php

 if(isset($detail)){
?>
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@globalfitnessinc">
        <meta name="twitter:title" content="<?php if(isset($detail[0]->TwitterTitle)){ print_r($detail[0]->TwitterTitle); }else{ print_r($detail[0]->TwiiterTitle); }
 ?>">
        <meta name="twitter:description" content="<?php  print_r($detail[0]->TwitterDescription); ?>">
        <meta name="twitter:image" content="<?php if(isset($detail[0]->TwitterImage)){ print_r($detail[0]->TwitterImage); }else{ print_r($detail[0]->TwiiterImage); }
 ?>">
        <meta name="twitter:data1" content="<?php  print_r($detail[0]->TwitterData1); ?>">
        <meta name="twitter:label1" content="<?php  print_r($detail[0]->TwitterLabel1); ?>">
        <meta name="twitter:data2" content="<?php  print_r($detail[0]->TwitterData2); ?>">
        <meta name="twitter:label2" content="<?php  print_r($detail[0]->TwitterLabel2); ?>">
        <!-- Open Graph data -->
        <meta property="og:url" content="<?php  if(isset($detail[0]->ogUrl)){print_r($detail[0]->ogUrl);}else{print_r($detail[0]->ogURL); }?>" />
        <meta property="og:title" content="<?php  print_r($detail[0]->ogTitle); ?>" />
        <meta property="og:description" content="<?php  print_r($detail[0]->ogDescription); ?>" />
        <meta property="og:image" content="<?php  print_r($detail[0]->ogImage); ?>" />
        <meta property="og:type" content="<?php  print_r($detail[0]->ogType); ?>" />
        <meta property="og:site_name" content="<?php if(isset($detail[0]->ogSite)){print_r($detail[0]->ogSite);}else{print_r($detail[0]->ogSite_name);  }   ?>" />
        <meta property="og:price:amount" content="<?php  print_r($detail[0]->Price); ?>" />
        <meta property="og:price:currency" content="USD" />
        <?php   } ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="L2x_VprrPGVutLyM8_7BGD4O1o9O7xKU32R2Tck4LUs" />
        <meta name="msvalidate.01" content="E599DF9170BF8DC750EAD6418FE9343A" />
        <meta name=”alexaVerifyID” content="" />
        <meta name="Author" content="<?php if(isset($CategoryData)){  print_r($CategoryData[0]->MetaNameAuthor) ;} 
if(isset($Author)){ print_r($Author);}else{ echo " Global Fitness ";}?>">
        <meta name="distribution" content="<?php if(isset($CategoryData)){  print_r($CategoryData[0]->MetaNameDistribution) ; } ?>">
        <meta name="p:domain_verify" content="854f02f924e0b28ab0649663059a3a04" />
        <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-5369132-1', 'auto');
        ga('send', 'pageview');
        </script>
        <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "url": "https://www.globalfitness.com",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+1-888-991-9991",
                "contactType": "customer service"
            }
        }
        </script>
        <!--<meta name="description" content="<?php //if(isset($description)){ echo $description ; } ?>">
            <meta name="keywords" content="<?php //if(isset($keywords)){ echo $keywords ; } ?>">
        -->
        <?php
          $test  = $_SERVER['REQUEST_URI'];
          $test  = str_replace("filters/", "", $test);
        ?>
            <link rel="canonical" href="<?php echo canonical_url . $test; ?>" />
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/style_ii.css'); ?>" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/responsive.css'); ?>" />
            <link rel="stylesheet" href="<?php echo base_url('public/assets/css/reset.css'); ?>">
            <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style2.css'); ?>">
            <!-- Bootstrap -->
            <link href="<?php echo base_url('public/assets/css/bootstrap.css'); ?>" rel="stylesheet">
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
            <!--  <link href="<?php echo base_url('public/assets/css/jquery.bxslider1.css'); ?>" rel="stylesheet"/>
-->
            <link href="<?php echo base_url('public/assets/css/star-rating.css'); ?>" rel="stylesheet" />
            <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i" rel="stylesheet">
            <!-- neWMWNU -->
            <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
            <link rel="stylesheet" href="<?php echo base_url('public/assets/css/resetnewmenu.css'); ?>">
            <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style_newmenu.css'); ?>">
            <!-- newmenu -->
            <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
            <!-- responsive_menu -->
            <link rel="stylesheet" href="<?php echo base_url('public/assets/css/RESPONSIVEmenu.css'); ?>">
            <!-- responsive_menu -->
            <!-- CSS reset -->
            <link rel="stylesheet" href="<?php echo base_url('public/assets/css/swiper.min.css'); ?>">
            <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
            <style>
            .displaynone {display: none; }
            #display {background: #fff none repeat scroll 0 0 !important; border-bottom: 1px solid #dedede; border-left: 1px solid #dedede; border-right: 1px solid #dedede; display: none; float: right; margin-right: 8px; margin-top: 10px; overflow: hidden; position: relative; width: 98%; z-index: 999; }
            .display_box {background: #fff none repeat scroll 0 0; border-top: 1px solid #dedede; color: #525252; font-size: 12px; font-weight: 500; min-height: 34px; padding: 9px 11px 0; }
            #display .form-group:hover,
            #display .form-group.hover {border-radius: 4px 25px 25px 4px; width: 100%; }
            .display_box:hover {background: #f2f2f2; color: #FFFFFF; }
            #shade {background-color: #00CCFF; }
            a:hover,
            a:focus {color: #000; text-decoration: none; }
            .search-form .form-group:hover,
            .search-form .form-group.hover {border-radius: none; width: 100%; }
            .form-control:focus {border-color: #66afe9; box-shadow: 0 0px 0px rgba(0, 0, 0, 0.075) inset, 0 0 0px rgba(102, 175, 233, 0.6) !important; outline: 0 none; }
            .mystyle {padding-left: 18px !important; }
            /*NEW_MENU_OCT*/
            .content_wrapper .navbar-inverse {background-color: #fff; border-color: #fff; }
            .content_wrapper .navbar-inverse .navbar-nav > li > a {
                color: #333;font-size: 18px;
            } 
            .content_wrapper .navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
              color: #333 !important; 
              background-color: transparent !important;
            }

            .content_wrapper .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus {color: #333 !important; background-color: transparent !important; }
            .content_wrapper .fa {display: inline-block; font: normal normal normal 11px/1 FontAwesome; font-size: inherit; text-rendering: auto; color: #333; font-size: 13px !important; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; font-weight: lighter; }
            .mega-dropdown {position: static !important; }
            .mega-dropdown-menu {padding: 20px 0px; width: 100%; box-shadow: none; -webkit-box-shadow: none; }
            .mega-dropdown-menu>li>ul {padding: 0; margin: 0; }
            .mega-dropdown-menu>li>ul>li {list-style: none; }
            .mega-dropdown-menu>li>ul>li>a {display: block; color: #222; padding: 3px 5px; }
            .mega-dropdown-menu>li ul>li>a:hover,
            .mega-dropdown-menu>li ul>li>a:focus {text-decoration: none; }
            .mega-dropdown-menu .dropdown-header {font-size: 18px; color: #ff3546; padding: 5px 60px 5px 5px; line-height: 30px; }
            a.RED_MENU{color: #cc0000 !important;}
            .content_wrapper .open > .dropdown-menu {
                display: block;
                height: auto !important;
                overflow: inherit !important;
            }
            .content_wrapper .dropdown-menu > li {
                border-bottom: 0px solid #f2f2f2 !important;
            }
            /*NEW_MENU_OCT*/
            </style>
            <?php include_once "recaptchalib.php";  ?>
            <!-- Libs and Plugins CSS -->
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="<?php echo base_url('/public/assets');?>/js/jquery.validate.min.js"></script>
            <script src="<?php echo base_url('public/assets/js/bootstrap.js'); ?>"></script>
            <script src="<?php echo base_url('/public/assets');?>/js/main_NEWMNU.js"></script>
            <!-- <script src="<?php //echo base_url('/public/assets');?>/js/jquery-2.1.1_NEWMNU.js"></script> -->
            <!-- <script src="<?php// echo base_url('/public/assets');?>/js/jquery.menu-aim_NEWMNU.js"></script> -->
            <!-- menu aim -->
            <script>
            $base_url = "https://www.globalfitness.com";
            </script>
            <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jssor-slider/24.1.5/jssor.slider.min.js"></script> -->
            <!-- <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script> -->
            <script>
                function searchfeature() {
                    var key = $(".autofilling").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url() ?>Site/autosearch",
                        data: "searchword=" + key,
                        success: function(html) {
                            var mydata = JSON.parse(html);
                            // console.log(mydata);
                            $('.ac-gn-list2 li').addClass('displaynone');
                            if (mydata == '1') {
                                $('.ac-gn-list2 li').removeClass('displaynone');
                                $('.hello').addClass('displaynone');
                            }
                            $.each(mydata, function(index) {
                                var str = this.ProductName;
                                console.log(str);
                                var replace = str.replace(/ /g, '-');
                                console.log(replace);
                                if (this.Kingdom == "Cardio") {
                                    $(".ac-gn-list2").append('<li class="hello ' + this.ProductName + '"><a href="<?php echo base_url(' / cardio ').' / ';?>' + replace.toLowerCase() + '"><span class="tab">' + this.ProductName + '</span></a></li>');
                                }
                                if (this.Kingdom == "Strength") {
                                    $(".ac-gn-list2").append('<li class="hello ' + this.ProductName + '"><a href="<?php echo base_url(' / strength ').' / '; ?>' + replace.toLowerCase() + '"><span class="tab">' + this.ProductName + '</span></a></li>');
                                }

                            });
                        },
                    });
                    return false;

                }
            </script>
</head>

<body>
    <!-- responsive_menu -->
    <section id="RespONSIVE_MENu">
        <aside id="ac-gn-segmentbar" class="ac-gn-segmentbar">
        </aside>
        <input id="ac-gn-menustate" class="ac-gn-menustate" type="checkbox">
        <nav id="ac-globalnav" class="js no-touch">
            <div class="ac-gn-content">
                <ul class="ac-gn-header">
                    <li class="ac-gn-item ac-gn-menuicon">
                      <label class="ac-gn-menuicon-label" for="ac-gn-menustate" aria-hidden="true">
                          <span class="ac-gn-menuicon-bread ac-gn-menuicon-bread-top">
                            <span class="ac-gn-menuicon-bread-crust ac-gn-menuicon-bread-crust-top"></span>
                          </span>
                          <span class="ac-gn-menuicon-bread ac-gn-menuicon-bread-bottom">
                            <span class="ac-gn-menuicon-bread-crust ac-gn-menuicon-bread-crust-bottom"></span>
                          </span>
                      </label>
                      <a href="#ac-gn-menustate" class="ac-gn-menuanchor ac-gn-menuanchor-open" id="ac-gn-menuanchor-open">
                        <span class="ac-gn-menuanchor-label">Open Menu</span>
                      </a>
                      <a href="#" class="ac-gn-menuanchor ac-gn-menuanchor-close" id="ac-gn-menuanchor-close">
                        <span class="ac-gn-menuanchor-label">Close Menu</span>
                      </a>
                    </li>
                    <li class="ac-gn-item ac-gn-apple">
                        <a class="ac-gn-link ac-gn-link-apple" href="<?php echo base_url(); ?>" id="ac-gn-firstfocus-small">
                          <span class="ac-gn-link-text"></span>
                        </a>
                    </li>
                    <li class="ac-gn-item ac-gn-bag ac-gn-bag-small" id="ac-gn-bag-small">
                        <a class="ac-gn-link ac-gn-link-bag" href="<?php echo base_url('cart'); ?>" role="button">
                          <span class="ac-gn-link-text"><img alt ="cart_icon" src="<?php echo base_url(); ?>/public/assets/images/cart_icon2.png"></span>
                          <span class="ac-gn-bag-badge"></span>
                        </a>
                        <span class="ac-gn-bagview-caret ac-gn-bagview-caret-large"></span>
                    </li>
                </ul>
                <ul class="ac-gn-list">
                  <?php
                    foreach($menu as $cat){
                  ?>
                  <li class="ac-gn-item ac-gn-item-menu ">
                    <a class="ac-gn-link" title="<?php echo $cat->LinkTitleTag; ?>" href="<?php echo $cat->ConanicalURL ?>">
                      <span ><?php echo $cat->MenuName; ?></span>
                    </a>
                  </li>
                  <?php
                    }
                  ?>
                  <li class="ac-gn-item ac-gn-item-menu ac-gn-search" role="search">
                      <a class="ac-gn-link ac-gn-link-search " href="" role="button" aria-haspopup="true">
                        <span class="ac-gn-search-placeholder blue_clor" aria-hidden="true">Search Global Fitness</span>
                      </a>
                  </li>
                  <li class="ac-gn-item ac-gn-bag" id="ac-gn-bag">
                    <a class="ac-gn-link ac-gn-link-bag" href="" role="button" aria-haspopup="true" aria-expanded="false" aria-controls="ac-gn-bagview-content">
                      <span class="ac-gn-link-text">Shopping Bag</span>
                      <span class="ac-gn-bag-badge" aria-hidden="true"></span>
                    </a>
                    <span class="ac-gn-bagview-caret ac-gn-bagview-caret-large"></span>
                  </li>
                </ul>
                <aside id="ac-gn-searchview" class="ac-gn-searchview">
                    <div class="ac-gn-searchview-content">
                        <form id="ac-gn-searchform" class="ac-gn-searchform" action="/Site/AutoSearching" method="post">
                            <div class="ac-gn-searchform-wrapper">
                              <input id="ac-gn-searchform-input" name="searchkeyword" onkeyup="searchfeature();" class="ac-gn-searchform-input blue_clor autofilling" placeholder="Search Global Fitness" type="text">
                              <input id="ac-gn-searchform-src" name="src" value="globalnav" type="hidden">
                              <button id="ac-gn-searchform-submit" class="ac-gn-searchform-submit" type="submit" name="autosubmit" disabled="disabled"></button>
                              <button id="ac-gn-searchform-reset" class="ac-gn-searchform-reset" type="reset" disabled="disabled"></button>
                            </div>
                        </form>
                        <ul class="ac-gn-list2">
                            <li style="border: 0px saddlebrown;"><span style="font-size: 12px;color: #ccc;">Quick Links</span></li>
                            <li>
                                <a title="" href="<?php echo base_url('page/contact-us'); ?>">
                                  <span>Contact Us</span>
                                </a>
                            </li>
                            <li>
                                <a title="" href="https://blog.globalfitness.com/category/product-help/">
                                  <span>Support</span>
                                </a>
                            </li>
                            <li>
                                <a title="" href="<?php echo base_url('live-inventory') ?>">
                                  <span>Live Inventory</span>
                                </a>
                            </li>
                            <li>
                                <a title="" href="<?php echo base_url('lease-gym-equipment'); ?>">
                                  <span>Lease Gym Equipment</span>
                                </a>
                            </li>
                            <li>
                                <a title="" href="<?php echo base_url('about-global-fitness'); ?>">
                                  <span >About Us</span>
                                </a>
                            </li>
                        </ul>
                        <aside id="ac-gn-searchresults" class="ac-gn-searchresults"></aside>
                    </div>
                    <button id="ac-gn-searchview-close" class="ac-gn-searchview-close" aria-label="Close Search">
                        <span class="ac-gn-searchview-close-wrapper">
                          <span class="ac-gn-searchview-close-left"></span>
                          <span class="ac-gn-searchview-close-right"></span>
                        </span>
                    </button>
                </aside>
                <aside class="ac-gn-bagview" data-analytics-region="bag">
                    <div class="ac-gn-bagview-scrim">
                        <span class="ac-gn-bagview-caret ac-gn-bagview-caret-small"></span>
                    </div>
                    <div class="ac-gn-bagview-content" id="ac-gn-bagview-content">
                    </div>
                </aside>
            </div>
        </nav>
    </section>
    <!-- responsive_menu -->
    <div id="old_menu_penal" class="Navigation_top_bar bg_grey_nav">
        <div class="container-fluid">
            <div class="row header PADD_ThREee">
                <div class="col-md-3 col-sm-3">
                  <a itemprop="name" class="web-logo" href="<?php echo base_url(); ?>">
                    <img class="main_logo_penAL" src="<?php echo base_url('public/assets/images/main_logo.png'); ?>" alt="logo">
                  </a>
                  <a class="logo_Rispons" href="<?php echo base_url(''); ?>">
                    <img src="<?php echo base_url('public/assets/images/logo.png'); ?>"  class="logo_a" alt="logo"/> 
                  </a>
                    <div class="usrr">
                      <a class="logo_Rispons" data-target="#myModal_login" data-toggle="modal" href="#">
                        <img src="<?php echo base_url('public/assets/images/user_top.png'); ?>"  class="logo_a uss" alt="logo"/> 
                      </a>
                    </div>
                    <div class="cart-icon crt">
                        <a href="<?php echo base_url(); ?>" class="logo_Rispons"></a>
                        <a href="<?php echo base_url(); ?>" class="logo_Rispons"></a>
                        <div class="cart_img_penal">
                          <a href="<?php echo base_url('/cart'); ?>" class="logo_Rispons">
                            <div class="cart_bag" href="<?php echo base_url(); ?>/cart">
                                <img alt ="cart_icon" src="<?php echo base_url(); ?>/public/assets/images/cart_icon2.png">
                            </div>
                            <div class="nin1">
                             <?php if(isset($_SESSION['productDetail']['count'])){
                                if(isset($_SESSION['productDetail']['counting'])){
                                $data = ($_SESSION['productDetail']['counting'] + $_SESSION['productDetail']['count']);
                                echo $data;    }else{
                              echo $_SESSION['productDetail']['count'];
                              }
                               }else{
                                echo "0";
                                 }
                                  ?>
                            </div>
                          </a>
                        </div>
                    </div>
                    <div class="loginn">
                      <a href="<?php echo base_url(); ?>" class="logo_Rispons"></a>
                      <!--<a href="<?php echo base_url(); ?>" class="logo_Rispons"></a>-->
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="invet">
                        <nav class="navbar navbar-default container nav_navi" role="navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar icon_1"></span>
                                    <span class="icon-bar icon_2"></span>
                                    <span class="icon-bar icon_3"></span>
                                </button>
                            </div>
                            <div id="navbar" class="collapse navbar-collapse respons_box responsive_nav_penal padd_0">
                                <ul class="nav navbar-nav">
                                    <!-- header code deleted here -->
                                    <li><a href="<?php echo base_url('about-global-fitness'); ?>">About Us</a></li>
                                    <li><a href="/page/contact-us">Contact Us</a></li>
                                    <li><a href="#">International Buyers</a></li>
                                    <li><a href="/live-inventory">Live Inventory</a></li>
                                    <li><a href="#">Support</a></li>
                                    <?php if($this->session->userdata('userId')!=""){ ?>
                                    <li><a href="<?php echo base_url('/logout'); ?>">Logout( <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ?> )</a></li>
                                    <li><a href="<?php echo base_url('/updatepassword'); ?>"> Update Password </span></a></li>
                                    <?php } ?>
                                    <li>
                                        <div class="srch">
                                            <form action="" class="search2-form">
                                                <div class="form-group has-feedback">
                                                    <label for="search" class="sr-only">Search</label>
                                                    <input type="text" class="form-control mysearch" name="search" id="search" placeholder="search">
                                                    <span class="form-control-feedback" aria-hidden="true"> <img alt="tool" src="<?php echo base_url(); ?>/public/assets/images/tool.png"></span>
                                                    <div id="display" class="mydisplay"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="top_bar_menu">
                        <ul>
                            <li><a href="<?php echo base_url('about-global-fitness'); ?>">About Us</a></li>
                            <li><a href="<?php echo base_url('lease-gym-equipment'); ?>">Lease Gym Equipment</a></li>
                            <li><a href="<?php echo base_url('page/contact-us'); ?>">Contact Us</a></li>
                            <li class="numbr"><a href="">1-888-991-9991</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div id="search_display">
                        <div class="search_box1">
                            <form class="search-form" action="/Site/AutoSearching" method="post">
                                <div class="form-group has-feedback">
                                    <label class="sr-only" for="search">Search </label>
                                    <input type="hidden" id="type" name="type" value="<?php echo $_GET['type'];?>" class="form-control mysearch">
                                    <input type="text" placeholder="search" id="searching" name="search" class="form-control mysearch">
                                    <span aria-hidden="true" class="form-control-feedback"> <img src="<?php echo base_url('public/assets/images/search_icon_res.png'); ?>" alt="search"/></span>
                                    <div id="display" class="mydisplay"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="DESKtoP_MENu">
        <div class="container-fluid">
            <div class="row NEW_HOME_NEVIGATION PADD_ThREee1">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_non">
                    <!-- colone -->
                    <div class="content_wrapper">
                        <nav class="navbar navbar-inverse">
                            <div class="collapse navbar-collapse js-navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown_new mega-dropdown NAVIGATION_NEW_NAV">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop Cardio <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu mega-dropdown-menu">
                                            <li class="col-sm-6 NAVIGATION_NEW_NAV">
                                              <ul>
                                                  <?php
                                                    $k=0;
                                                    foreach($category as $cate){
                                                        $k++;
                                                  ?>
                                                <li class="FIFTy_WTH mega_Custom">
                                                  <a title="<?php echo $cate->LinkTitleTag; ?>" href="<?php echo $cate->URL; ?>">
                                                    <?php echo $cate->MenuName; ?>
                                                  </a>
                                                </li>
                                                  <?php
                                                      }
                                                  ?>
                                              </ul>
                                            </li>
                                            <li class="col-sm-6">
                                                <ul>
                                                    <li>
                                                        <a class="blue_clor mystyle">
                                                          <span class="ubermenu-target-title ubermenu-target-text ">Shop by Brand</span>
                                                        </a>
                                                        <ul class="mega_Custom Right_border">
                                                             <?php 
                                           
                                             foreach ($brandData as $key => $value) {
                                                if(strpos($value->PageName , 'Cardio') !== false){


                                              echo ' <li><a href="'.$value->ConanicalURL.'">'.$value->PageName.'</a></li>';
                                                }
                                                
                                                }?>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown_new mega-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop Strength <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu mega-dropdown-menu">
                                            <li class="col-sm-6 NAVIGATION_NEW_NAV">
                                                <ul>  
                                                    <?php
                                                        $k=0;
                                                        foreach($category2 as $cate){
                                                            $k++;
                                                             $link  = str_replace(" ", "-",$cate->Name);
                                                             $link = strtolower($link);?>
                                                                <li class="FIFTy_WTH mega_Custom">
                                                                    <a title="<?php echo $cate->LinkTitleTag; ?>" href="<?php echo $cate->URL; ?>"><?php echo $cate->MenuName; ?>
                                                                    </a>
                                                                </li>
                                                            <?php
                                                        }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li class="col-sm-6">
                                                <ul>
                                                    <li>
                                                        <a class="blue_clor mystyle">
                                                          <span class="ubermenu-target-title ubermenu-target-text ">Shop by Brand</span>
                                                        </a>
                                                        <ul class="mega_Custom Right_border">
                                                              <?php 
                                           
                                             foreach ($brandData as $key => $value) {
                                                if(strpos($value->PageName , 'Strength') !== false){


                                              echo ' <li><a href="'.$value->ConanicalURL.'">'.$value->PageName.'</a></li>';
                                                }
                                                
                                                }?>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="RED_MENU" href="#">Shop Sales</a></li>
                                </ul>
                            </div>
                            <!-- /.nav-collapse -->
                        </nav>
                    </div>
                </div>
                <!-- colone -->
                <div class="col-lg-8 col-lg-offset-4 col-md-6 col-md-offset-6 col-sm-5 col-sm-offset-7 col-xs-12  top_hder_SINGLE_LINK PADD_ThREee">
                    <!-- coltwo -->
                    <div class="NEWHOME_RIGHT_TOP_MM">
                        <ul class="NEWHOME_RIGHT_TOP_MM_UL">
                            <div class="top_bar__bottom_menu">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="<?php echo base_url(" live-inventory "); ?>">Live Inventory</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <?php if($this->session->userdata('userId')!=""){ ?>
                                            <a href="<?php echo base_url('/logout'); ?>">Logout( <?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?> )</a>
                                            <?php }else{
                                            ?>
                                            <a data-toggle="modal" data-target="#myModal_login" class="SIgn_in_link" href=""> Sign In</a>
                                            <?php
                                                } 
                                            ?>
                                        </a>
                                        <?php if($this->session->userdata('userId')!=""){ ?>
                                        <ul class="dropdown-menu Links_DROPdoWn">
                                            <li><a href="<?php echo base_url('site/orderall'); ?>">My orders</a></li>
                                            <li><a href="">Support</a></li>
                                            <li><a href="<?php echo base_url('/updatepassword'); ?>">Update Password</a></li>
                                        </ul>
                                        <?php } ?>
                                    </li>
                                    <li>
                                        <div class="cart-icon">
                                            <a rel="nofollow" href="<?php echo base_url('/cart'); ?>">
                                                <div class="cart_img_penal">
                                                    <div class="cart_bag">
                                                        <img alt="cart" src="<?php echo base_url('public/assets/images/caarrt.png'); ?>">
                                                    </div>
                                                    <div class="nin1">
                                                        <?php if(isset($_SESSION['productDetail']['count'])){
                                                            if(isset($_SESSION['productDetail']['counting'])){
                                                            $data = ($_SESSION['productDetail']['counting'] + $_SESSION['productDetail']['count']);
                                                            echo $data;    }else{
                                                            echo $_SESSION['productDetail']['count'];
                                                            }
                                                            }else{
                                                            echo "0";
                                                             } ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(".dropdown_new").click(
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("400");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("400");
                $(this).toggleClass('open');
            }
        );
    </script>
    <script>
        $(".mysearch").keyup(function() {
            var searchbox = $(this).val();
            var dataString = 'searchword=' + searchbox;
            if (searchbox == '') {
                $(".mydisplay").hide();
            } else {
                $.ajax({
                    type: "POST",
                    url: $base_url + "/site/searchajax",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        //console.log(html);
                        $(".mydisplay").html(html).show();
                    }
                });
            }
            return false;
        });
    </script>
    <!-- <a data-toggle="modal" data-target="#myModal_important_notice" href="">IMPORTANT NOTICE</a> -->
    <!-- <a data-toggle="modal" data-target="#myModal_UpsellProduct" href="">Pop Up myModal_UpsellProduct</a> -->