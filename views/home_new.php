<style type="text/css">
    .cd-dropdown-wrapper {
  z-index: 99999;
}
</style>
 <?php  
 if($promo5['rows'] != 4){ ?>
<section>
    <div class="container-fluid">
        <div class="row home_pahe_BANNER_PEnal">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 padd_none_hom">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">                            
                            <div class="banner_image_1920"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg" alt="banner"></div>
                            <div class="banner_image_960"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg" alt="banner"></div>
                            <div class="banner_image_320"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg" alt="banner"></div>
                            <div class="carousel-caption">
                                <h3 class="home_h1">LIFE FITNESS</h3>
                                <h4 class="home_h2">95T INSPIRE TREAMILLS</h4>
                            </div>
                            <div class="carousel-caption_penllw">
                                <h5 class="home_h3">Available Now </h5>
                            </div>
                        </div>
                        <div class="swiper-slide">                            
                            <div class="banner_image_1920"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg" alt="banner"></div>  
                            <div class="banner_image_960"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg" alt="banner"></div>
                            <div class="banner_image_320"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg" alt="banner"></div>
                            <div class="carousel-caption">
                                <h3 class="home_h1">LIFE FITNESS</h3>
                                <h4 class="home_h2">95T INSPIRE TREAMILLS</h4>
                            </div>
                            <div class="carousel-caption_penllw">
                                <h5 class="home_h3">Available Now Second</h5>
                            </div>
                        </div>
                        <div class="swiper-slide">                            
                            <div class="banner_image_1920"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"  alt="banner"></div>
                            <div class="banner_image_960"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"   alt="banner"></div>
                            <div class="banner_image_320"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"   alt="banner"></div>
                            <div class="carousel-caption">
                                <h3 class="home_h1">LIFE FITNESS</h3>
                                <h4 class="home_h2">95T INSPIRE TREAMILLS</h4>
                            </div>
                            <div class="carousel-caption_penllw">
                                <h5 class="home_h3">Available Now Third</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } else{?>
<section>
    <div class="container-fluid">
        <div class="row home_pahe_BANNER_PEnal">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 padd_none_hom">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                               <a href="<?php 
                                if (strpos($promo5['data'][0]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][0]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][0]->CarouselHyperlink);
                                }else{                                    
                          print_r(base_url().$promo5['data'][0]->CarouselHyperlink);}?>"> <div class="banner_image_1920"><img title="<?php echo $promo5['data'][0]->CarouselImageTitleAtribute;?>" alt = "<?php echo $promo5['data'][0]->CarouselImageTitleAtribute;?>" src="<?php print_r(base_url().$promo5['data'][0]->IndexCarouselImageLarge);?>"></div></a>
                            <a href="<?php 
                                if (strpos($promo5['data'][0]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][0]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][0]->CarouselHyperlink);
                                }else{                                    
                          print_r(base_url().$promo5['data'][0]->CarouselHyperlink);}?>"><div class="banner_image_960"><img title="<?php echo $promo5['data'][0]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$promo5['data'][0]->IndexCarouselImageMedium); ?>" alt = "<?php echo $promo5['data'][0]->CarouselImageAltAtribute;?>" ></div></a>
                          <a href="<?php 
                                if (strpos($promo5['data'][0]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][0]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][0]->CarouselHyperlink);
                                }else{                                    
                          print_r(base_url().$promo5['data'][0]->CarouselHyperlink);}?>">  <div class="banner_image_320"><img title="<?php echo $promo5['data'][0]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$promo5['data'][0]->IndexCarouselImageSmall); ?>" alt = "<?php echo $promo5['data'][0]->CarouselImageAltAtribute;?>"></div></a>
                            <div class="carousel-caption">
                              <h3 class="home_h1"><a href="<?php 
                                if (strpos($promo5['data'][0]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][0]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][0]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][0]->CarouselHyperlink);}?>"><?php echo $promo5['data'][0]->CarouselTitle;?></a></h3>
                                <h4 class="home_h2"><a href="<?php 
                                if (strpos($promo5['data'][0]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][0]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][0]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][0]->CarouselHyperlink);}?>"><?php echo $promo5['data'][0]->CarouselSubTitle;?></a></h4>
                            </div>

                            <div class="carousel-caption_penllw">
                          <a title =" <?php print_r($promo5['data'][0]->CarouselFooterTitleAttribute);?>" href="<?php 
                                if (strpos($promo5['data'][0]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][0]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][0]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][0]->CarouselHyperlink);}?>"><h5 class="home_h3"><?php echo $promo5['data'][0]->CarouselFooter; ?></h5></a>
                            </div>
                        </div>
                        <div class="swiper-slide">                            
                          <a href="<?php 
                                if (strpos($promo5['data'][1]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][1]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][1]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][1]->CarouselHyperlink);}?>
                                "><div class="banner_image_1920"><img  title="<?php echo $promo5['data'][1]->CarouselImageTitleAtribute;?>" src="<?php print_r(base_url().$promo5['data'][1]->IndexCarouselImageLarge);?>" alt = "<?php echo $promo5['data'][1]->CarouselImageAltAtribute;?>"></div></a>
                           <a href="<?php 
                                if (strpos($promo5['data'][1]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][1]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][1]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][1]->CarouselHyperlink);}?>
                                "> <div class="banner_image_960"><img title="<?php echo $promo5['data'][1]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$promo5['data'][1]->IndexCarouselImageMedium); ?>" alt = "<?php echo $promo5['data'][1]->CarouselImageAltAtribute;?>"></div></a>
                            <a href="<?php 
                                if (strpos($promo5['data'][1]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][1]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][1]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][1]->CarouselHyperlink);}?>"><div class="banner_image_320"><img  title="<?php echo $promo5['data'][1]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$promo5['data'][1]->IndexCarouselImageSmall); ?> " alt = "<?php echo $promo5['data'][1]->CarouselImageAltAtribute;?>"></div> </a>
                             <div class="carousel-caption">
                                <h3 class="home_h1"><a href="<?php 
                                if (strpos($promo5['data'][1]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][1]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][1]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][1]->CarouselHyperlink);}?>"><?php echo $promo5['data'][1]->CarouselTitle;?></a></h3>
                                <h4 class="home_h2"><a href="<?php 
                                if (strpos($promo5['data'][1]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][1]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][1]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][1]->CarouselHyperlink);}?>"><?php echo $promo5['data'][1]->CarouselSubTitle;?></a></h4></div>
                            <div class="carousel-caption_penllw">
                               <a title =" <?php print_r($promo5['data'][1]->CarouselFooterTitleAttribute);?>" href="<?php  if (strpos($promo5['data'][1]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][1]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][1]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][1]->CarouselHyperlink);}?>"> <h5 class="home_h3"><?php echo $promo5['data'][1]->CarouselFooter; ?></h5></a>
                            </div>
                        </div>
                        <div class="swiper-slide">                            
                          <a href="<?php 
                                if (strpos($promo5['data'][2]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][2]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][2]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][2]->CarouselHyperlink);}?>">  <div class="banner_image_1920"><img title="<?php echo $promo5['data'][2]->CarouselImageTitleAtribute;?>" alt = "<?php echo $promo5['data'][2]->CarouselImageAltAtribute;?>" src="<?php print_r(base_url().$promo5['data'][2]->IndexCarouselImageLarge);?>"></div></a>
                          <a href="<?php 
                                if (strpos($promo5['data'][2]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][2]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][2]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][2]->CarouselHyperlink);}?>">  <div class="banner_image_960"><img title="<?php echo $promo5['data'][2]->CarouselImageTitleAtribute;?>" alt = "<?php echo $promo5['data'][2]->CarouselImageAltAtribute;?>" src="<?php  print_r(base_url().$promo5['data'][2]->IndexCarouselImageMedium); ?>"></div></a>
                        <a href="<?php 
                                if (strpos($promo5['data'][2]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][2]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][2]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][2]->CarouselHyperlink);}?>">    <div class="banner_image_320"><img title="<?php echo $promo5['data'][2]->CarouselImageTitleAtribute;?>"  alt = "<?php echo $promo5['data'][2]->CarouselImageAltAtribute;?>" src="<?php  print_r(base_url().$promo5['data'][2]->IndexCarouselImageSmall); ?>"></div></a>
                            <div class="carousel-caption">
                              <h3 class="home_h1"><a href="<?php 
                                if (strpos($promo5['data'][2]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][2]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][2]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][2]->CarouselHyperlink);}?>"> <?php echo $promo5['data'][2]->CarouselTitle;?></a></h3>
                                <h4 class="home_h2"><a href="<?php 
                                if (strpos($promo5['data'][2]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][2]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][2]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][2]->CarouselHyperlink);}?>"> <?php echo $promo5['data'][2]->CarouselSubTitle; ?></a></h4>
                            </div>
                            <div class="carousel-caption_penllw">
                          <a title =" <?php print_r($promo5['data'][2]->CarouselFooterTitleAttribute);?>" href="<?php 
                                if (strpos($promo5['data'][2]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][2]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][2]->CarouselHyperlink);
                                }else{

                          print_r(base_url().$promo5['data'][2]->CarouselHyperlink);}?>"><h5 class="home_h3"><?php echo $promo5['data'][2]->CarouselFooter; ?></h5></a>
                            </div>
                        </div>
                      <div class="swiper-slide">                            
                          <a href="<?php 
                                if (strpos($promo5['data'][3]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][3]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][3]->CarouselHyperlink);
                                }else{
                          print_r(base_url().$promo5['data'][3]->CarouselHyperlink);}?>
                                "><div class="banner_image_1920"><img  title="<?php echo $promo5['data'][3]->CarouselImageTitleAtribute;?>" src="<?php print_r(base_url().$promo5['data'][3]->IndexCarouselImageLarge);?>" alt = "<?php echo $promo5['data'][3]->CarouselImageAltAtribute;?>"></div></a>
                           <a href="<?php 
                                if (strpos($promo5['data'][3]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][3]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][3]->CarouselHyperlink);
                                }else{                                    
                          print_r(base_url().$promo5['data'][3]->CarouselHyperlink);}?>
                                "> <div class="banner_image_960"><img title="<?php echo $promo5['data'][3]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$promo5['data'][3]->IndexCarouselImageMedium); ?>" alt = "<?php echo $promo5['data'][3]->CarouselImageAltAtribute;?>"></div></a>
                            <a href="<?php 
                                if (strpos($promo5['data'][3]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][3]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][3]->CarouselHyperlink);
                                }else{                                    
                          print_r(base_url().$promo5['data'][3]->CarouselHyperlink);}?>"><div class="banner_image_320"><img  title="<?php print_r(base_url().$promo5['data'][3]->CarouselImageTitleAtribute);?>" src="<?php  print_r(base_url().$promo5['data'][3]->IndexCarouselImageSmall); ?> " alt = "<?php print_r(base_url().$promo5['data'][3]->CarouselImageAltAtribute);?>"></div> </a>
                             <div class="carousel-caption">
                                <h3 class="home_h1"><a href="<?php 
                                if (strpos($promo5['data'][3]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][3]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][3]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][3]->CarouselHyperlink);}?>"><?php echo $promo5['data'][3]->CarouselTitle;?></a></h3>
                                <h4 class="home_h2"><a href="<?php 
                                if (strpos($promo5['data'][3]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][3]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][3]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][3]->CarouselHyperlink);}?>"><?php echo $promo5['data'][3]->CarouselSubTitle;?></a></h4>
                            </div>

                            <div class="carousel-caption_penllw">
                               <a title =" <?php print_r($promo5['data'][3]->CarouselFooterTitleAttribute);?>" href="<?php 
                                if (strpos($promo5['data'][3]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][3]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][3]->CarouselHyperlink);
                                }else{

                          print_r(base_url().$promo5['data'][3]->CarouselHyperlink);}?>"> <h5 class="home_h3"><?php echo $promo5['data'][3]->CarouselFooter; ?></h5></a>
                            </div>
                        </div>
                     </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }?>




<section id="HOME_slider_PENAL_TEXT">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="About_heading_middle_h1 text-center"><h1>USED FITNESS EQUIPMENT</h1></div>
                <div class="About_heading_middle_h2 text-center">SUSTAINABLE GREEN ECONOMICS</div>
                <p class="about_content_text text-center">By today’s standards, an environmentally conscious used fitness equipment company is not just a choice, it’s a responsibility, and one we take seriously. Even our business model spells green. We recycle used fitness equipment, extending its life span by stripping it to the bare frame then rebuilding it to factory specifications. Our customers pay a fraction of the cost of new fitness equipment.<br>
    We outfit facilities like YMCAs, personal training studios, hotels, campus gyms, and apartment complexes the world over with our quality refurbished gym equipment. This recycling brings back capital to the USA, employs Americans in our facilities and in OEM manufacturing plants such as Life Fitness and Precor, and allows training facilities to remain competitive by upgrading their used gym equipment with the latest technology. We’ve become an essential part of the industry and economy with our business model sustaining growth each year, making us the largest used exercise equipment company worldwide.<br>
    globalfitness® was incorporated in 1996 and over the last 15 years we’ve managed to build a reputation that surpasses all competitors who share this niche market. Many competitors sell cleaned up used exercise equipment as refurbished, thereby giving this industry a bad name, and as such, we recently sought after, and were awarded, a trademark by the U.S. trademark office. We have now begun to build our brand of quality refurbished gym equipment, something no other used gym equipment company would be able to do. We proudly stand by that brand, while offering the industry’s most affordable warranty on fully refurbished gym equipment.</p>
            </div>
        </div>
    </div>
</section>
<section><!-- <div class="container-fluid"> -->
    <div class="container-fluid">
        <div class="row home_pahe_availall_PEnal">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="home_pahe__afterBANNER1">
                    <div class="HOMEBNR_aftrCONTENT">
                    </div>
                </div>
            </div> 
            <?php if(empty($promo4[0]->VideoSmall)){ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-lg-6 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER_1920">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/fyMCvKDMEiE" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="home_pahe__afterBANNER_960">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/fyMCvKDMEiE" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="home_pahe__afterBANNER_320">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/fyMCvKDMEiE" frameborder="0" allowfullscreen></iframe>
                </div>


                <?php }else{ ?>
                 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-lg-6 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER_1920">
                   <?php print_r($promo4[0]->VideoLarge); ?>
                </div>
                <div class="home_pahe__afterBANNER_960">
                   <?php print_r($promo4[0]->VideoMedium);    ?>
                </div>
                <div class="home_pahe__afterBANNER_320">
                <?php print_r($promo4[0]->VideoSmall);    ?>
                </div>
                <?php } ?>

            </div>
            <?php if(empty($promo1[0]->ImageLarge)){ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3  padd_none_hom">
                <div class="home_pahe__afterBANNER">
                    <div class="product_content_tex">
                        <h3>Life Fitness</h3>
                        <h2>95T Discover SE Treadmill</h2>
                        <p><a class="blue_clor" href="">Learn More > </a></p>
                    </div>
                    <div class="product_ingsa_1920"><img src="<?php echo base_url(); ?>/public/assets/images/firstproductaa.png" alt="product"></div>
                    <div class="product_ingsa_960"><img src="<?php echo base_url(); ?>/public/assets/images/firstproductaa.png" alt="product"></div>
                    <div class="product_ingsa_320"><img src="<?php echo base_url(); ?>/public/assets/images/firstproductaa.png" alt="product"></div>
                </div>
            </div>
            <?php }else{ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                    <div class="product_content_tex">
                        <h3><?php print_r($promo1[0]->ProductBrand);?></h3>
                        <h2><?php print_r($promo1[0]->ProductName);?></h2>
                          <?php 
                    $searchChar =explode('/',$promo1[0]->Hyperlink,2);

                    if($searchChar[0] =='fitness_equipment'){
                        $mylink = 'cardio/'.$searchChar[1];
                    }
                    else{
                        $mylink = $promo1[0]->Hyperlink;
                    }
                    ?>
                        <p><a class="blue_clor" title="<?php  print_r($promo1[0]->CTALinkTitleAttribute); ?>" href="<?php print_r(base_url().$mylink);?>"><?php print_r($promo1[0]->LinkCallToAction); ?> </a></p>
                    </div>
                    <div class="product_ingsa_1920"><a href="<?php print_r(base_url().$mylink);?>"><img src="<?php print_r(base_url().$promo1[0]->ImageLarge);?>" title="<?php  print_r($promo1[0]->ImageTitleAttribute); ?>" alt="<?php  print_r($promo1[0]->ImageAltAttribute); ?>"></a></div>
                    <div class="product_ingsa_960"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php  print_r(base_url().$promo1[0]->ImageMedium); ?>" title="<?php  print_r($promo1[0]->ImageTitleAttribute); ?>" alt="<?php  print_r($promo1[0]->ImageAltAttribute); ?>"></a></div>
                    <div class="product_ingsa_320"><a href="<?php print_r(base_url().$mylink);?>"><img src="<?php  print_r(base_url().$promo1[0]->ImageSmall); ?>" alt="<?php  print_r($promo1[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo1[0]->ImageTitleAttribute); ?>"></a></div>
                </div>
            </div>
            <?php } ?>
            <?php if(empty($promo2[0]->ImageLarge)){ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                    <div class="product_content_tex">
                        <h2>Spinner@Blade</h2>
                        <p><a class="blue_clor" href="">Learn More > </a></p>
                    </div>
                    <div class="product_ingsa_1920"><img src="<?php echo base_url(); ?>/public/assets/images/secondproductaa.png" alt="product"></div>
                    <div class="product_ingsa_960"><img src="<?php echo base_url(); ?>/public/assets/images/secondproductaa.png" alt="product"></div>
                    <div class="product_ingsa_320"><img src="<?php echo base_url(); ?>/public/assets/images/secondproductaa.png" alt="product"></div>
                </div>
            </div>
            <?php } else{ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                    <div class="product_content_tex">
                         <h3><?php print_r($promo2[0]->ProductBrand);?></h3>
                        <h2><?php print_r($promo2[0]->ProductName);?></h2>
                          <?php 
                    $searchChar =explode('/',$promo2[0]->Hyperlink,2);
                    if($searchChar[0] =='fitness_equipment'){
                        $mylink = 'cardio/'.$searchChar[1];
                    }
                    else{
                        $mylink =$promo2[0]->Hyperlink;
                    }
                    ?>
                        <p><a class="blue_clor" title="<?php  print_r($promo2[0]->CTALinkTitleAttribute); ?>" href="<?php print_r(base_url().$mylink);?>"><?php print_r($promo2[0]->LinkCallToAction);?></a></p>
                    </div>
                    <div class="product_ingsa_1920"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php print_r(base_url().$promo2[0]->ImageLarge);?>" alt="<?php  print_r($promo2[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo2[0]->ImageTitleAttribute); ?>"></a></div>
                    <div class="product_ingsa_960"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php  print_r(base_url().$promo2[0]->ImageMedium); ?>"  alt="<?php  print_r($promo2[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo2[0]->ImageTitleAttribute); ?>"></a></div>
                    <div class="product_ingsa_320"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php  print_r(base_url().$promo2[0]->ImageSmall); ?>"   alt="<?php  print_r($promo2[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo2[0]->ImageTitleAttribute); ?>"></a></div>
                </div>
            </div>
            <?php }?>
            <?php if(empty($promo3[0]->ImageLarge)){ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                    <div class="product_content_tex POGESN1">
                        <h3>Cybex</h3>
                        <h2>750A Arc Trainer</h2>
                        <p><a class="blue_clor" href="">Learn More > </a></p>
                    </div>
                    <div class="product_ingsa_1920"><img src="<?php echo base_url(); ?>/public/assets/images/thirdproductaa.png" alt="product"></div>
                    <div class="product_ingsa_960"><img src="<?php echo base_url(); ?>/public/assets/images/thirdproductaa.png" alt="product"></div>
                    <div class="product_ingsa_320"><img src="<?php echo base_url(); ?>/public/assets/images/thirdproductaa.png" alt="product"></div>
                </div>
            </div>
            <?php } else{?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                    <div class="product_content_tex POGESN1">
                    <?php 
                    $searchChar =explode('/',$promo3[0]->Hyperlink,2);
                    if($searchChar[0] =='fitness_equipment'){
                        $mylink = 'cardio/'.$searchChar[1];
                    }
                    else{
                        $mylink = $promo3[0]->Hyperlink;
                    }
                    ?>
                        <h3><?php print_r($promo3[0]->ProductBrand); ?></h3>
                        <h2><?php print_r($promo3[0]->ProductName); ?></h2>
                        <p><a class="blue_clor" title="<?php  print_r($promo3[0]->CTALinkTitleAttribute); ?>" href="<?php print_r(base_url().$mylink);?>"><?php print_r($promo3[0]->LinkCallToAction);?></a></p>
                    </div>
                    <div class="product_ingsa_1920"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php print_r(base_url().$promo3[0]->ImageLarge);?>"  alt="<?php  print_r($promo3[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo3[0]->ImageTitleAttribute); ?>"></a></div>
                    <div class="product_ingsa_960"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php  print_r(base_url().$promo3[0]->ImageMedium); ?>" alt="<?php  print_r($promo3[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo3[0]->ImageTitleAttribute); ?>"></a></div>
                    <div class="product_ingsa_320"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php  print_r(base_url().$promo3[0]->ImageSmall); ?>" alt="<?php  print_r($promo3[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo3[0]->ImageTitleAttribute); ?>"></a></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<section id="HOME_LAST_PENAL_TEXT">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h2 class="About_heading_middle text-center">BUY COMMERCIAL REFURBISHED GYM EQUIPMENT</h2>
                <h2 class="About_heading_middle_h2 text-center">OUR PROMISE TO CUSTOMERS</h2>
                <p class="about_content_text text-center">One of the greatest consumer and dealer concerns pertaining to the commercial gym equipment market, specifically the used fitness equipment industry, is that of quality. In recent years this industry has flourished because of the rush of new products to production. Due to the improvements in product design, ranging from electronics advancements that include network affiliation, electronic personal trainers, built in LCD televisions, and innovation in ergonomics, gym owners, and certainly competing gym chains, need to keep up with the Jones’s, so to speak. This competitive edge comes at a cost, hundreds of thousands of dollars to refit a gym with the new advancements, and because of the rate of technology, design improvements, and new developments, equipment starts to look and feel dated after 6-10 years. A great deal of the used exercise equipment that we purchase is between 2-4 years old, which means that once it has been professionally refurbished or remanufactured it will still retain its appeal and functionality for at least 4-6 more years. Considering that this industry’s equipment replacement rate is roughly 3-4 years on average, this means that any equipment purchased from us is essentially no different from buying new. We have truly mastered the art of taking those same pieces of used exercise equipment from used condition to “Like New” condition. The only way to truly achieve this is by completely rebuilding the machine from the ground up and ensuring that every element is addressed and corrected.<br>
    The final crucial detail is the presentation of the product when it arrives at the discerning client’s location. With our professionally boxed products, each and every machine is represented like new, and has the aesthetic look and feel of a product that should have cost double or threefold the price. To add to the appeal is our “green” packaging that is made of all recycled materials yet looks and protects our refurbished gym equipment better than that of the original manufacturers.<br>
    Beyond the product and presentation is one additional facet that is often overlooked, but may be the most important added value of buying used fitness equipment, namely, the after sales service and warranty. Once again, we excel beyond all competitors; not only do we offer a longer and more concise warranty than all of our competitors, but we also sell extended warranties that match or exceed the warranties of new equipment. Add to this our network of almost 1,300 service providers nationwide and you have one of the most sophisticated service infrastructures in the industry. Even in the unlikely event of failure or breakdown, our customer care specialists are all experts and will work patiently and courteously with you to ensure your complete satisfaction. globalfitness® always strives to ensure that we supply the best possible refurbished gym equipment and the most fair and affordable pricing, without compromising on service and aesthetic appeal. With us, you don’t have to spend more … you can simply spend less and get more!</p>
            </div>
        </div>
    </div>
</section>