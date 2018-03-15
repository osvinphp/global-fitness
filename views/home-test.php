<?php
 // echo "<pre>"; print_r($CarouselData[0]); die;?>
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
              <div class="banner_image_1920 slideimg-desktop"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg" alt="banner"></div>
              <div class="banner_image_960 slideimg-tab"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg" alt="banner"></div>
              <div class="banner_image_320 slideimg-mobile"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg" alt="banner"></div>
              <div class="carousel-caption">
                <h3 class="home_h1">LIFE FITNESS</h3>
                <h4 class="home_h2">95T INSPIRE TREAMILLS</h4>
              </div>
              <div class="carousel-caption_penllw">
                <h5 class="home_h3">Available Now </h5>
              </div>
            </div>
            <div class="swiper-slide">                            
              <div class="banner_image_1920 slideimg-desktop"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg" alt="banner"></div>  
              <div class="banner_image_960 slideimg-tab"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg" alt="banner"></div>
              <div class="banner_image_320 slideimg-mobile"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg" alt="banner"></div>
              <div class="carousel-caption">
                <h3 class="home_h1">LIFE FITNESS</h3>
                <h4 class="home_h2">95T INSPIRE TREAMILLS</h4>
              </div>
              <div class="carousel-caption_penllw">
                <h5 class="home_h3">Available Now Second</h5>
              </div>
            </div>
            <div class="swiper-slide">                            
              <div class="banner_image_1920 slideimg-desktop"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"  alt="banner"></div>
              <div class="banner_image_960 slideimg-tab"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"   alt="banner"></div>
              <div class="banner_image_320 slideimg-mobile"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"   alt="banner"></div>
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

              <!-- Section to display carousel image on large screen-->
              <a href="<?php 
              if (strpos($CarouselData[0]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[0]->CarouselHyperlink, 'strength') == false ) {
                print_r($CarouselData[0]->CarouselHyperlink);
              }else{                                    
                print_r(base_url().$CarouselData[0]->CarouselHyperlink);}?>">
                <div class="banner_image_1920 slideimg-desktop">
                  <img title="<?php echo $CarouselData[0]->CarouselImageTitleAtribute;?>" alt = "<?php echo $CarouselData[0]->CarouselImageTitleAtribute;?>" src="<?php print_r(base_url().$CarouselData[0]->LargeDesktopCarouselImage);?>">
                </div>
              </a>
              <!-- Image section End -->

              <!-- Section to display carousel image -->
              <a href="<?php 
              if (strpos($CarouselData[0]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[0]->CarouselHyperlink, 'strength') == false ) {
                print_r($CarouselData[0]->CarouselHyperlink);
              }else{                                    
                print_r(base_url().$CarouselData[0]->CarouselHyperlink);}?>"><div class="banner_image_960 slideimg-tab"><img title="<?php echo $CarouselData[0]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$CarouselData[0]->TabletDesktopCarouselImage); ?>" alt = "<?php echo $CarouselData[0]->CarouselImageAltAtribute;?>" ></div></a>
                <!-- Image section End -->

                <!-- Section to display carousel image on mobile-->
                <a href="<?php 
                if (strpos($CarouselData[0]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[0]->CarouselHyperlink, 'strength') == false ) {
                  print_r($CarouselData[0]->CarouselHyperlink);
                }else{                                    
                  print_r(base_url().$CarouselData[0]->CarouselHyperlink);}?>"> <div class="banner_image_320 slideimg-mobile"><img title="<?php echo $CarouselData[0]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$CarouselData[0]->MobileCarouselImage); ?>" alt = "<?php echo $CarouselData[0]->CarouselImageAltAtribute;?>"></div></a>
                  <!-- Image section End -->

                  <!-- Carousel title & sub title Section -->
                  <div class="carousel-caption">
                    <h3 class="home_h1">
                      <a title="<?php echo $CarouselData[0]->CarouselTitleAltAttribute ?>" href="<?php 
                        if (strpos($CarouselData[0]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[0]->CarouselHyperlink, 'strength') == false ) {
                          print_r($CarouselData[0]->CarouselHyperlink);
                        }else{
                          print_r(base_url().$CarouselData[0]->CarouselHyperlink);}?>"><?php echo $CarouselData[0]->CarouselTitle;?></a>
                        </h3>
                        <h4 class="home_h2">
                          <a href="<?php 
                          if (strpos($CarouselData[0]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[0]->CarouselHyperlink, 'strength') == false ) {
                            print_r($CarouselData[0]->CarouselHyperlink);
                          }else{

                            print_r(base_url().$CarouselData[0]->CarouselHyperlink);}?>"><?php echo $CarouselData[0]->CarouselSubTitle;?></a>
                          </h4>
                        </div>
                        <!-- Section End -->

                      </div>

 <div class="swiper-slide">

              <!-- Section to display carousel image on large screen-->
              <a href="<?php 
              if (strpos($CarouselData[1]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[1]->CarouselHyperlink, 'strength') == false ) {
                print_r($CarouselData[1]->CarouselHyperlink);
              }else{                                    
                print_r(base_url().$CarouselData[1]->CarouselHyperlink);}?>">
                <div class="banner_image_1921 slideimg-desktop">
                  <img title="<?php echo $CarouselData[1]->CarouselImageTitleAtribute;?>" alt = "<?php echo $CarouselData[1]->CarouselImageTitleAtribute;?>" src="<?php print_r(base_url().$CarouselData[1]->LargeDesktopCarouselImage);?>">
                </div>
              </a>
              <!-- Image section End -->

              <!-- Section to display carousel image -->
              <a href="<?php 
              if (strpos($CarouselData[1]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[1]->CarouselHyperlink, 'strength') == false ) {
                print_r($CarouselData[1]->CarouselHyperlink);
              }else{                                    
                print_r(base_url().$CarouselData[1]->CarouselHyperlink);}?>"><div class="banner_image_961 slideimg-tab"><img title="<?php echo $CarouselData[1]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$CarouselData[1]->TabletDesktopCarouselImage); ?>" alt = "<?php echo $CarouselData[1]->CarouselImageAltAtribute;?>" ></div></a>
                <!-- Image section End -->

                <!-- Section to display carousel image on mobile-->
                <a href="<?php 
                if (strpos($CarouselData[1]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[1]->CarouselHyperlink, 'strength') == false ) {
                  print_r($CarouselData[1]->CarouselHyperlink);
                }else{                                    
                  print_r(base_url().$CarouselData[1]->CarouselHyperlink);}?>"> <div class="banner_image_321 slideimg-mobile"><img title="<?php echo $CarouselData[1]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$CarouselData[1]->MobileCarouselImage); ?>" alt = "<?php echo $CarouselData[1]->CarouselImageAltAtribute;?>"></div></a>
                  <!-- Image section End -->

                  <!-- Carousel title & sub title Section -->
                  <div class="carousel-caption">
                    <h3 class="home_h1">
                      <a title="<?php echo $CarouselHeading[1]->CarouselTitleAltAttribute ?>" href="<?php 
                        if (strpos($CarouselHeading[1]->CarouselHyperlink, 'cardio') == false || strpos($CarouselHeading[1]->CarouselHyperlink, 'strength') == false ) {
                          print_r($CarouselHeading[1]->CarouselHyperlink);
                        }else{
                          print_r(base_url().$CarouselHeading[1]->CarouselHyperlink);}?>"><?php echo $CarouselHeading[1]->CarouselTitle;?></a>
                        </h3>
                        <h4 class="home_h2">
                          <a href="<?php 
                          if (strpos($CarouselHeading[1]->CarouselHyperlink, 'cardio') == false || strpos($CarouselHeading[1]->CarouselHyperlink, 'strength') == false ) {
                            print_r($CarouselHeading[1]->CarouselHyperlink);
                          }else{

                            print_r(base_url().$CarouselHeading[1]->CarouselHyperlink);}?>"><?php echo $CarouselHeading[1]->CarouselSubTitle;?></a>
                          </h4>
                        </div>
                        <!-- Section End -->

                      </div><!-- slider end -->


                       <div class="swiper-slide">

              <!-- Section to display carousel image on large screen-->
              <a href="<?php 
              if (strpos($CarouselData[2]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[2]->CarouselHyperlink, 'strength') == false ) {
                print_r($CarouselData[2]->CarouselHyperlink);
              }else{                                    
                print_r(base_url().$CarouselData[2]->CarouselHyperlink);}?>">
                <div class="banner_image_2922 slideimg-desktop">
                  <img title="<?php echo $CarouselData[2]->CarouselImageTitleAtribute;?>" alt = "<?php echo $CarouselData[2]->CarouselImageTitleAtribute;?>" src="<?php print_r(base_url().$CarouselData[2]->LargeDesktopCarouselImage);?>">
                </div>
              </a>
              <!-- Image section End -->

              <!-- Section to display carousel image -->
              <a href="<?php 
              if (strpos($CarouselData[2]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[2]->CarouselHyperlink, 'strength') == false ) {
                print_r($CarouselData[2]->CarouselHyperlink);
              }else{                                    
                print_r(base_url().$CarouselData[2]->CarouselHyperlink);}?>"><div class="banner_image_962 slideimg-tab"><img title="<?php echo $CarouselData[2]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$CarouselData[2]->TabletDesktopCarouselImage); ?>" alt = "<?php echo $CarouselData[2]->CarouselImageAltAtribute;?>" ></div></a>
                <!-- Image section End -->

                <!-- Section to display carousel image on mobile-->
                <a href="<?php 
                if (strpos($CarouselData[2]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[2]->CarouselHyperlink, 'strength') == false ) {
                  print_r($CarouselData[2]->CarouselHyperlink);
                }else{                                    
                  print_r(base_url().$CarouselData[2]->CarouselHyperlink);}?>"> <div class="banner_image_322 slideimg-mobile"><img title="<?php echo $CarouselData[2]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$CarouselData[2]->MobileCarouselImage); ?>" alt = "<?php echo $CarouselData[2]->CarouselImageAltAtribute;?>"></div></a>
                  <!-- Image section End -->

                  <!-- Carousel title & sub title Section -->
                  <div class="carousel-caption">
                    <h3 class="home_h2">
                      <a title="<?php echo $CarouselHeading[2]->CarouselTitleAltAttribute ?>" href="<?php 
                        if (strpos($CarouselHeading[2]->CarouselHyperlink, 'cardio') == false || strpos($CarouselHeading[2]->CarouselHyperlink, 'strength') == false ) {
                          print_r($CarouselHeading[2]->CarouselHyperlink);
                        }else{
                          print_r(base_url().$CarouselHeading[2]->CarouselHyperlink);}?>"><?php echo $CarouselHeading[2]->CarouselTitle;?></a>
                        </h3>
                        <h4 class="home_h2">
                          <a href="<?php 
                          if (strpos($CarouselHeading[2]->CarouselHyperlink, 'cardio') == false || strpos($CarouselHeading[2]->CarouselHyperlink, 'strength') == false ) {
                            print_r($CarouselHeading[2]->CarouselHyperlink);
                          }else{

                            print_r(base_url().$CarouselHeading[2]->CarouselHyperlink);}?>"><?php echo $CarouselHeading[2]->CarouselSubTitle;?></a>
                          </h4>
                        </div>
                        <!-- Section End -->

                      </div><!-- Slide end -->

                       <div class="swiper-slide">

              <!-- Section to display carousel image on large screen-->
              <a href="<?php 
              if (strpos($CarouselData[3]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[3]->CarouselHyperlink, 'strength') == false ) {
                print_r($CarouselData[3]->CarouselHyperlink);
              }else{                                    
                print_r(base_url().$CarouselData[3]->CarouselHyperlink);}?>">
                <div class="banner_image_3933 slideimg-desktop">
                  <img title="<?php echo $CarouselData[3]->CarouselImageTitleAtribute;?>" alt = "<?php echo $CarouselData[3]->CarouselImageTitleAtribute;?>" src="<?php print_r(base_url().$CarouselData[3]->LargeDesktopCarouselImage);?>">
                </div>
              </a>
              <!-- Image section End -->

              <!-- Section to display carousel image -->
              <a href="<?php 
              if (strpos($CarouselData[3]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[3]->CarouselHyperlink, 'strength') == false ) {
                print_r($CarouselData[3]->CarouselHyperlink);
              }else{                                    
                print_r(base_url().$CarouselData[3]->CarouselHyperlink);}?>"><div class="banner_image_963 slideimg-tab"><img title="<?php echo $CarouselData[3]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$CarouselData[3]->TabletDesktopCarouselImage); ?>" alt = "<?php echo $CarouselData[3]->CarouselImageAltAtribute;?>" ></div></a>
                <!-- Image section End -->

                <!-- Section to display carousel image on mobile-->
                <a href="<?php 
                if (strpos($CarouselData[3]->CarouselHyperlink, 'cardio') == false || strpos($CarouselData[3]->CarouselHyperlink, 'strength') == false ) {
                  print_r($CarouselData[3]->CarouselHyperlink);
                }else{                                    
                  print_r(base_url().$CarouselData[3]->CarouselHyperlink);}?>"> <div class="banner_image_333 slideimg-mobile"><img title="<?php echo $CarouselData[3]->CarouselImageTitleAtribute;?>" src="<?php  print_r(base_url().$CarouselData[3]->MobileCarouselImage); ?>" alt = "<?php echo $CarouselData[3]->CarouselImageAltAtribute;?>"></div></a>
                  <!-- Image section End -->

                  <!-- Carousel title & sub title Section -->
                  <div class="carousel-caption">
                    <h3 class="home_h3">
                      <a title="<?php echo $CarouselHeading[3]->CarouselTitleAltAttribute ?>" href="<?php 
                        if (strpos($CarouselHeading[3]->CarouselHyperlink, 'cardio') == false || strpos($CarouselHeading[3]->CarouselHyperlink, 'strength') == false ) {
                          print_r($CarouselHeading[3]->CarouselHyperlink);
                        }else{
                          print_r(base_url().$CarouselHeading[3]->CarouselHyperlink);}?>"><?php echo $CarouselHeading[3]->CarouselTitle;?></a>
                        </h3>
                        <h4 class="home_h3">
                          <a href="<?php 
                          if (strpos($CarouselHeading[3]->CarouselHyperlink, 'cardio') == false || strpos($CarouselHeading[3]->CarouselHyperlink, 'strength') == false ) {
                            print_r($CarouselHeading[3]->CarouselHyperlink);
                          }else{

                            print_r(base_url().$CarouselHeading[3]->CarouselHyperlink);}?>"><?php echo $CarouselHeading[3]->CarouselSubTitle;?></a>
                          </h4>
                        </div>
                        <!-- Section End -->

                      </div><!-- Slide end -->

                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <?php }?>



          <!-- Collapsable Div starts here -->
          <section id="HOME_slider_PENAL_TEXT">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                  <div onclick="toggle_visibility('ColappseDivcontent');" class="About_heading_middle_h1 "><h1><?php echo $ColappseDiv[0]->Title; ?></h1></div>
                  <!-- <div href="#ColappseDiv"  data-toggle="collapse" class="About_heading_middle_h1 "><?php echo $ColappseDiv[0]->Title; ?></div> -->
                  <div id="ColappseDivcontent" class="gymequipment-text">
                    <!-- <div id="ColappseDivcontent" class="collapse"> -->
                   <?php echo $ColappseDiv[0]->DivContent; ?>
                 </div>
               </div>
             </div>
           </div>
         </section>

         <!-- Collapsable Div ends  -->


         <section><!-- <div class="container-fluid"> -->
          <div class="container-fluid">
            <div class="row home_pahe_availall_PEnal">
              <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="home_pahe__afterBANNER1">
                  <div class="HOMEBNR_aftrCONTENT">
                  </div>
                </div>
              </div>  -->
              <?php if(empty($promo4[0]->VideoSmall)){ ?>
              <div class="col-xs-12 col-sm-6 padd_none_hom">
                <div class="home_pahe__afterBANNER_1920 newvar-banner">
                  <iframe width="100%" height="100%" src="https://www.youtube.com/embed/fyMCvKDMEiE" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="home_pahe__afterBANNER_960 newvar-banner">
                  <iframe width="100%" height="100%" src="https://www.youtube.com/embed/fyMCvKDMEiE" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="home_pahe__afterBANNER_320 newvar-banner">
                  <iframe width="100%" height="100%" src="https://www.youtube.com/embed/fyMCvKDMEiE" frameborder="0" allowfullscreen></iframe>
                </div>


                <?php }else{ ?>
                <div class="col-xs-12 col-sm-6 padd_none_hom">
                  <div class="home_pahe__afterBANNER_1920 newvar-banner">
                   <?php print_r($VideoData[0]->VideoLarge); ?>
                 </div>
                 <div class="home_pahe__afterBANNER_960 newvar-banner">
                   <?php print_r($VideoData[0]->VideoMedium); ?>
                 </div>
                 <div class="home_pahe__afterBANNER_320 newvar-banner">
                  <?php print_r($VideoData[0]->VideoSmall); ?>
                </div>
                <?php } ?>

              </div>
              <?php if(empty($promo1[0]->ImageLarge)){ ?>
              <div class="col-xs-12 col-sm-6 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                  <div class="product_content_tex product-imagecontent_text">
                    <div class="firstimg_paragraph">
                      <h3>Life Fitness</h3>
                      <h2>95T Discover SE Treadmill</h2>
                      <p><a class="blue_clor" href="">Learn More > </a></p>
                    </div>
                  </div>
                  <div class="product_ingsa_1920 ingsapro-ductimg"><img src="<?php echo base_url(); ?>/public/assets/images/firstproductaa.png" alt="product"></div>
                  <div class="product_ingsa_960 ingsapro-ductimg"><img src="<?php echo base_url(); ?>/public/assets/images/firstproductaa.png" alt="product"></div>
                  <div class="product_ingsa_320 ingsapro-ductimg"><img src="<?php echo base_url(); ?>/public/assets/images/firstproductaa.png" alt="product"></div>
                </div>
              </div>
              <?php }else{ ?>
              <div class="col-xs-12 col-sm-6 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                  <div class="product_content_tex product-imagecontent_text">
                    <div class="firstimg_paragraph">
                      <a title="<?php print_r($PromotionalData[0]->PNLinkTitleAttribute);?>" href="<?php print_r($PromotionalData[0]->Hyperlink);?>"><?php print_r($PromotionalData[0]->Title);?></a>

                      <a title="<?php print_r($PromotionalData[0]->PNLinkTitleAttribute);?>" href="<?php print_r($PromotionalData[0]->Hyperlink);?>"><?php print_r($PromotionalData[0]->Subtitle);?></a>

                      <?php 
                      $searchChar =explode('/',$PromotionalData[0]->Hyperlink,2);

                      if($searchChar[0] =='fitness_equipment'){
                        $mylink = 'cardio/'.$searchChar[1];
                      }
                      else{
                        $mylink = $PromotionalData[0]->Hyperlink;
                      }
                      ?>
                      <p><a class="blue_clor" title="<?php  print_r($PromotionalData[0]->PNLinkTitleAttribute); ?>" href="<?php print_r(base_url().$mylink);?>"><?php print_r($PromotionalData[0]->LinkCallToAction); ?> </a></p>
                    </div>
                  </div>

                  <div class="product_ingsa_1920 ingsapro-ductimg">
                    <!-- <a href="<?php //print_r(base_url().$mylink);?>"> -->
                    <img src="<?php print_r(base_url().$PromotionalData[0]->ImageLarge);?>" title="<?php  echo $PromotionalData[0]->ImageTitleAttribute; ?>" href="<?php  echo base_url().$PromotionalData[0]->Hyperlink; ?>" alt="<?php  echo $PromotionalData[0]->ImageAltAttribute; ?>">
                    <!-- </a> -->
                  </div>

                  <div class="product_ingsa_960 ingsapro-ductimg">
                    <!-- <a  href="<?php //print_r(base_url().$mylink);?>"> -->
                    <img src="<?php  print_r(base_url().$PromotionalData[0]->ImageMedium); ?>" title="<?php  print_r($PromotionalData[0]->ImageTitleAttribute); ?>" href="<?php  echo base_url().$PromotionalData[0]->Hyperlink; ?>" alt="<?php  print_r($PromotionalData[0]->ImageAltAttribute); ?>">
                    <!-- </a> -->
                  </div>

                  <div class="product_ingsa_320 ingsapro-ductimg">
                    <!-- <a href="<?php// print_r(base_url().$mylink);?>"> -->
                    <img src="<?php  print_r(base_url().$PromotionalData[0]->ImageSmall); ?>" alt="<?php  print_r($PromotionalData[0]->ImageAltAttribute); ?>" href="<?php echo base_url().$PromotionalData[0]->Hyperlink; ?>" title="<?php  print_r($PromotionalData[0]->ImageTitleAttribute); ?>">
                    <!-- </a> -->
                  </div>
                </div>
              </div>
              <?php } ?>
              <?php if(empty($PromotionalData[0]->ImageLarge)){ ?>
              <div class="col-xs-12 col-sm-6 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                  <div class="product_content_tex product-imagecontent_text">
                    <h2>Spinner@Blade</h2>
                    <p><a class="blue_clor" href="">Learn More > </a></p>
                  </div>
                  <div class="product_ingsa_1920 ingsapro-ductimg"><img src="<?php echo base_url(); ?>/public/assets/images/secondproductaa.png" alt="product"></div>
                  <div class="product_ingsa_960 ingsapro-ductimg"><img src="<?php echo base_url(); ?>/public/assets/images/secondproductaa.png" alt="product"></div>
                  <div class="product_ingsa_320 ingsapro-ductimg"><img src="<?php echo base_url(); ?>/public/assets/images/secondproductaa.png" alt="product"></div>
                </div>
              </div>
              <?php } else{ ?>
              <div class="col-xs-12 col-sm-6 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                  <div class="product_content_tex product-imagecontent_text">
                    <a title="<?php print_r($PromotionalData[1]->PNLinkTitleAttribute);?>" href="<?php print_r($PromotionalData[1]->Hyperlink);?>"><?php print_r($PromotionalData[1]->Title);?></a>

                    <a title="<?php print_r($PromotionalData[1]->PNLinkTitleAttribute);?>" href="<?php print_r($PromotionalData[1]->Hyperlink);?>"><?php print_r($PromotionalData[1]->Subtitle);?></a>
                    <?php 
                    $searchChar =explode('/',$PromotionalData[1]->Hyperlink,2);
                    if($searchChar[1] =='fitness_equipment'){
                      $mylink = 'cardio/'.$searchChar[1];
                    }
                    else{
                      $mylink =$PromotionalData[1]->Hyperlink;
                    }
                    ?>
                    <p><a class="blue_clor" title="<?php  print_r($PromotionalData[1]->CTALinkTitleAttribute); ?>" href="<?php print_r(base_url().$mylink);?>"><?php print_r($PromotionalData[1]->LinkCallToAction);?></a></p>
                  </div>
                  <div class="product_ingsa_1920 ingsapro-ductimg">
                    <!-- <a  href="<?php //print_r(base_url().$mylink);?>"> -->
                    <img src="<?php print_r(base_url().$PromotionalData[1]->ImageLarge);?>" alt="<?php  print_r($PromotionalData[1]->ImageAltAttribute); ?>"  href="<?php echo base_url().$PromotionalData[1]->Hyperlink; ?>" title="<?php  print_r($PromotionalData[1]->ImageTitleAttribute); ?>">
                    <!-- </a> -->
                  </div>
                  <div class="product_ingsa_960 ingsapro-ductimg">
                    <!-- <a  href="<?php //print_r(base_url().$mylink);?>"> -->
                      <img src="<?php  print_r(base_url().$PromotionalData[1]->ImageMedium); ?>"  alt="<?php  print_r($PromotionalData[1]->ImageAltAttribute); ?>"  href="<?php echo base_url().$PromotionalData[1]->Hyperlink; ?>" title="<?php  print_r($PromotionalData[1]->ImageTitleAttribute); ?>">
                    <!-- </a> -->
                  </div>
                  <div class="product_ingsa_320 ingsapro-ductimg">
                    <!-- <a  href="<?php// print_r(base_url().$mylink);?>"> -->
                    <img src="<?php  print_r(base_url().$PromotionalData[1]->ImageSmall); ?>"   href="<?php echo base_url().$PromotionalData[1]->Hyperlink; ?>" alt="<?php  print_r($PromotionalData[1]->ImageAltAttribute); ?>" title="<?php  print_r($PromotionalData[1]->ImageTitleAttribute); ?>">
                    <!-- </a> -->
                  </div>
                </div>
              </div>
              <?php }?>
              <?php if(empty($PromotionalData[2]->ImageLarge)){ ?>
              <div class="col-xs-12 col-sm-6 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                  <div class="product_content_tex POGESN1 product-imagecontent_text">
                    <h3>Cybex</h3>
                    <h2>750A Arc Trainer</h2>
                    <p><a class="blue_clor" href="">Learn More > </a></p>
                  </div>
                  <div class="product_ingsa_1920 ingsapro-ductimg">
                  <img src="<?php echo base_url(); ?>/public/assets/images/thirdproductaa.png" alt="product"></div>
                  <div class="product_ingsa_960 ingsapro-ductimg">
                  <img src="<?php echo base_url(); ?>/public/assets/images/thirdproductaa.png" alt="product"></div>
                  <div class="product_ingsa_320 ingsapro-ductimg">
                  <img src="<?php echo base_url(); ?>/public/assets/images/thirdproductaa.png" alt="product"></div>
                </div>
              </div>
              <?php } else{?>
              <div class="col-xs-12 col-sm-6 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                  <div class="product_content_tex POGESN1 product-imagecontent_text">
                    <?php 
                    $searchChar =explode('/',$PromotionalData[2]->Hyperlink,2);
                    if($searchChar[2] =='fitness_equipment'){
                      $mylink = 'cardio/'.$searchChar[2];
                    }
                    else{
                      $mylink = $PromotionalData[2]->Hyperlink;
                    }
                    ?>
                    <a title="<?php print_r($PromotionalData[2]->PNLinkTitleAttribute);?>" href="<?php print_r($PromotionalData[2]->Hyperlink);?>"><?php print_r($PromotionalData[2]->Title);?></a>

                    <a title="<?php print_r($PromotionalData[2]->PNLinkTitleAttribute);?>" href="<?php print_r($PromotionalData[2]->Hyperlink);?>"><?php print_r($PromotionalData[2]->Subtitle);?></a>
                    <p><a class="blue_clor" title="<?php  print_r($PromotionalData[2]->CTALinkTitleAttribute); ?>" href="<?php print_r(base_url().$mylink);?>"><?php print_r($PromotionalData[2]->LinkCallToAction);?></a></p>
                  </div>
                  <div class="product_ingsa_1920 ingsapro-ductimg">
                    <!-- <a  href="<?php print_r(base_url().$mylink);?>"> -->
                      <img src="<?php print_r(base_url().$PromotionalData[2]->ImageLarge);?>"  alt="<?php  print_r($PromotionalData[2]->ImageAltAttribute); ?>" href="<?php echo base_url().$PromotionalData[2]->Hyperlink; ?>" title="<?php  print_r($PromotionalData[2]->ImageTitleAttribute); ?>">
                      <!-- </a> -->
                      </div>

                      <div class="product_ingsa_960 ingsapro-ductimg">
                        <!-- <a  href="<?php //print_r(base_url().$mylink);?>"> -->
                          <img src="<?php  print_r(base_url().$PromotionalData[2]->ImageMedium); ?>" alt="<?php  print_r($PromotionalData[2]->ImageAltAttribute); ?>" href="<?php echo base_url().$PromotionalData[2]->Hyperlink; ?>" title="<?php  print_r($PromotionalData[2]->ImageTitleAttribute); ?>">
                          <!-- </a> -->
                          </div>

                          <div class="product_ingsa_320 ingsapro-ductimg">
                            <!-- <a  href="<?php //print_r(base_url().$mylink);?>"> -->
                              <img src="<?php  print_r(base_url().$PromotionalData[2]->ImageSmall); ?>" alt="<?php  print_r($PromotionalData[2]->ImageAltAttribute); ?>" href="<?php echo base_url().$PromotionalData[2]->Hyperlink; ?>" title="<?php  print_r($PromotionalData[2]->ImageTitleAttribute); ?>">
                              <!-- </a> -->
                              </div>
                            </div>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </section>

                    <!-- Blurb Section -->
                    <section id="HOME_LAST_PENAL_TEXT"> 
                      <div class="container-fluid blurb-container">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 ">
                            <div class="about-text-blurb">
                              <h2 class="About_heading_middle text-center"><?php echo $BlurbData[0]->Expr1; ?></h2>
                              <p class="about_content_text"><?php echo $BlurbData[0]->BlurbCopy; ?></p>
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-6">
                            <div class="about-text-blurb">
                              <h2 class="About_heading_middle text-center"><?php echo $BlurbData[1]->Expr1; ?></h2>
                              <p class="about_content_text"><?php echo $BlurbData[1]->BlurbCopy; ?></p>
                            </div></div>
                          </div>
                        </div>
                      </section>
                      <!-- Section End -->

                      <!-- Footer Link Sectiom -->
                      <section id="HOME_slider_PENAL_TEXT">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
                              <div class="About_heading_middle_h1 ">
                                <a target="_blank" title="<?php echo $FooterLinkData[0]->LinkTitleAttribute ?>" href="<?php echo $FooterLinkData[0]->Hyperlink ?>" target="_blank"><?php echo $FooterLinkData[0]->Expr1;?></a></div>
                              </div>
                            </div>
                          </div>
                        </section>
                      <!-- Section End -->

                      <!-- Script added for collapsable div -->
                      <script type="text/javascript">
                        function toggle_visibility(id) {
                           var e = document.getElementById(id);
                           if(e.style.display == 'block')
                              e.style.display = 'none';
                           else
                              e.style.display = 'block';
                        }

                    </script>