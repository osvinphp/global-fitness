<div itemscope itemtype="http://schema.org/Product">
  <div class="margen_top">
    <div class="container-fluid"></div>
  </div>
  <section id="CHECKOUT_NEW_SECTION text-center1">
    <div class="container">
      <div class="BORDER_CHACHOUT">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row Prodetail_tittle">
              <div class="col-md-12">
                <div class="prod_tittlt">
                  <span itemprop="brand" style="display: none"></span>
                  <h1 itemprop="name"><?php echo $detail[0]->ProductName ; ?></h1>
                </div>
                <div class="newprice_box new_PRICE_RESPONSIVE">
                  <?php if($detail[0]->Price!="Please Enquire"){ echo "$";}  $helo = trim($detail[0]->Price,'$');  ?>
                  <?php echo trim($detail[0]->Price,'$'); ?>
                </div>
              </div>
            </div>
          </div><!--end colm-->
        </div><!--end row-->
        <div class="row MG_BOTM">
          <div class="col-md-6 col-sm-6 col-xs-12 text-center1">
            <?php  if(isset($slideImages)){ ?>
            <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
              <div class='carousel-outer'><!-- me art lab slider -->
                <div class='carousel-inner text-center'>
                  <div class='item active'>
                    <img itemprop="image" class="img-responsive" alt="<?php echo $slideImages[1]->ImageTitle; ?>" title="<?php echo $slideImages[1]->ImageTitle; ?>" src="<?php echo base_url($detail[0]->ImageURL); ?>">
                  </div>
                  <div class='item'>
                    <img itemprop="image" class="img-responsive" alt="<?php echo $slideImages[0]->ImageAlt; ?>" title="<?php echo $slideImages[0]->ImageTitle; ?>" src="<?php echo base_url($slideImages[0]->ImageURL); ?>">
                  </div>
                  <div class='item'>
                    <img  itemprop="image" class="img-responsive" alt="<?php echo $slideImages[1]->ImageAlt; ?>" title="<?php echo $slideImages[1]->ImageTitle; ?>" src="<?php echo base_url($slideImages[1]->ImageURL); ?>">
                  </div>
                </div><!--end carousel-->
              </div><!--end carousel- outer -->

              <!-- thumb -->
              <ol class='carousel-indicators mCustomScrollbar meartlab text-center'>
                <li data-target='#carousel-custom' data-slide-to='0' class='active'>
                  <img itemprop="image" class="img-responsive" alt="<?php echo $slideImages[0]->ImageTitle; ?>" title="<?php echo $slideImages[0]->ImageTitle; ?>" src="<?php echo base_url($detail[0]->ImageURL); ?>">
                </li>
                <li data-target='#carousel-custom' data-slide-to='1'>
                  <img itemprop="image" class="img-responsive" alt="<?php echo $slideImages[0]->ImageAlt; ?>" title="<?php echo $slideImages[0]->ImageTitle; ?>" src="<?php echo base_url($slideImages[0]->ImageURL); ?>">
                </li>
                <li data-target='#carousel-custom' data-slide-to='2'>
                  <img itemprop="image" class="img-responsive" alt="<?php echo $slideImages[1]->ImageAlt; ?>" title="<?php echo $slideImages[1]->ImageTitle; ?>" src="<?php echo base_url($slideImages[1]->ImageURL); ?>">
                </li>
              </ol>
            </div><!--end carousel-custom -->
            <?php }else{  ?>
            <div class="Prod_detail_IMg Probodr1">
              <img itemprop="image" class="img-responsive" alt="<?php echo $detail[0]->ImageAtl; ?>" title="<?php echo $detail[0]->ImageTitle; ?>" src="<?php echo base_url($detail[0]->ImageURL); ?>">
            </div>
            <?php } ?>
          </div> <!--end colm-->
          <span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
          <span itemprop="ratingValue" style="display:none"><?php echo $star_rate; ?></span>
          <span itemprop="reviewCount" style="display:none"><?php echo $star_count; ?></span>
          <!-- <div itemprop="itemReviewed" itemscope itemtype="http://schema.org/Product"></div> -->
        </span>

          <div class="col-md-4 col-sm-6 col-md-offset-2 col-sm-offset-0 col-xs-12 text-center1">
            <div class="row Custom_PRONEW">
              <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <div class="col-md-12 col-sm-12 col-xs-12 Padd_reMOv">
                  <div class="newprice_box DESKTOP_NEW_price">
                  <meta itemprop="priceCurrency" content="USD" />
                   <?php if($detail[0]->Price!="Please Enquire"){ echo "$";}  $helo = trim($detail[0]->Price,'$');  ?>
                    <span itemprop="price" content="<?php print_r(str_replace(",","",$helo)); ?>">
                      <?php echo trim($detail[0]->Price,'$'); ?>
                    </span>
                  </div>
                  <!-- Do not delete below div as its is related to google structured data  -->
                  <div style="display:none;" class="new_product_penal_shiping_left all_center">Availability:
                    <link itemprop="availability" href="http://schema.org/InStock" />
                    <span>
                      <?php
                      if($detail[0]->QuantityOnHand<=0){
                        ?><span class="outstock">Out of Stock</span>
                        <?php
                      }
                      else if(($detail[0]->QuantityOnHand>0) && ($detail[0]->QuantityOnHand<3)){
                        ?>
                        <span class="lowstock"> Low Stock</span>
                        <?php
                      }   else{
                        ?>
                        <span class="inerstock">In Stock</span>
                        <?php
                      }
                      ?>
                    </span>
                  </div>
                  <div class="Add_tocard_BTN">
                    <?php                  
                    $heckcount = 0;
                    if(isset($_SESSION['productDetail']['addtocart'])){
                      if(in_array($detail[0]->ListID,$_SESSION['productDetail']['addtocart'])){
                        $heckcount = 1;
                      }
                    }
                    else{
                      $heckcount = 0;
                    }
                    if($heckcount==0){  
                      if(trim($detail[0]->Price,'$') === 'Please Enquire' ){ ?>
                      <button class="btn btn-primary NEW_ADDCARt" data-toggle="modal" data-target="#myModal_email">
                        Email me</button>
                        <?php }else{ 
                          if($detail[0]->QuantityOnHand<=0){
                            ?>
                            <button class="btn btn-primary NEW_ADDCARt" id="waitlistMe" data-toggle="modal" data-target="#waitlistMeModal">
                              Waitlist Me</button>
                              <?php }else{
                                ?>
                                <a rel="nofollow" class="btn btn-primary NEW_ADDCARt" title="Click here to add this <?php echo $detail[0]->ProductName; ?> to your shopping cart" href="<?php echo base_url('/site/addcart').'/'.$detail[0]->ListID ; ?>" id="addcart">Add To Cart</a>
                                <?php } } } ?>
                                <!-- <button type="button" >Add to Cart</button> -->
                              </div>
                            </div>
                          </div>
                          <div class="row Custom_PRONEW">
                            <div class="col-md-12 col-sm-12 all_center Padd_reMOv">
                              <div class="product_penal_content">
                                <!-- new_product_penal_shiping_first Start -->
                                <div class="new_product_penal_shiping all_center">
                                  <div class="ALL_CONTENT_right_box">
                                    <div class="new_product_penal_shiping_left all_center">Availability:
                                      <!-- <link itemprop="availability" href="http://schema.org/InStock" /> -->
                                      <span>
                                        <?php
                                        if($detail[0]->QuantityOnHand<=0){
                                          ?><span class="outstock">Out of Stock</span>
                                          <?php
                                        }
                                        else if(($detail[0]->QuantityOnHand>0) && ($detail[0]->QuantityOnHand<3)){
                                          ?>
                                          <span class="lowstock"> Low Stock</span>
                                          <?php
                                        }   else{
                                          ?>
                                          <span class="inerstock">In Stock</span>
                                          <?php
                                        }
                                        ?>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="ALL_CONTENT_right_box">
                                    <div class="new_product_penal_shiping_left all_center">Lead Time: <span><?php echo $detail[0]->LeadTime; ?></span>
                                    </div>
                                  </div>
                                  <div class="ALL_CONTENT_right_box">
                                    <div class="new_product_penal_shiping_left all_center">Product Code: <span><?php echo $detail[0]->StockKeepingUnit; ?></span>
                                    </div>
                                  </div>
                                  <div class="ALL_CONTENT_right_box">
                                    <div class="new_product_penal_shiping_left all_center">MPN: <span itemprop="mpn" ><?php  echo $detail[0]->MPN; ?></span></div>
                                    <!-- <span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                                      <span itemprop="ratingValue" style="display:none"><?php// echo $star_rate; ?></span>
                                      <span itemprop="reviewCount" style="display:none"><?php// echo $star_count; ?></span>
                                      <div itemprop="itemReviewed" itemscope itemtype="http://schema.org/Product">
                                        <!-- Product properties -->  
                                      </div>
                                    </span> 
                                  </div>
                                </div>
                                <!-- new_product_penal_shiping_first End-->
                                <!-- new_product_penal_shiping_Second Satrt -->
                                <div class="new_product_penal_shiping all_center">
                                  <div class="ALL_CONTENT_right_box">
                                    <div class="new_product_penal_shiping_left all_center">
                                      <link itemprop="itemCondition" href="http://schema.org/UsedCondition" />
                                      Condition: <span><a title="<?php  echo $detail[0]->ConditionLinkTitle; ?>" href="<?php echo $detail[0]->ConditionAnchorHrefName; ?>"><?php echo $detail[0]->Condition; ?></a></span> </div>
                                    </div>
                                    <div class="ALL_CONTENT_right_box">
                                      <div class="new_product_penal_shiping_left all_center">Warranty: <span><a title="<?php  echo $detail[0]->WarrantyLinkTitle; ?>" href="<?php echo $detail[0]->WarrantyAnchorHrefName; ?>"><?php  echo $detail[0]->WarrantyBlurb; ?></a></span>
                                      </div>
                                      <div class="Warranty_img_box">
                                        <a href=""> 
                                          <img class="img-responsive" alt="" title="" src="<?php echo base_url('public/assets/images/warenty_img.png'); ?>"> 
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- new_product_penal_shiping_Second End-->
                                  <div class="new_product_penal__question">
                                    <div class="question_heding"><img alt="" title="" src="<?php echo base_url('public/assets/images/Question_img_icon.jpg'); ?>">Have Questions?</div>
                                    <ul>
                                      <li>
                                        <span style="color:#f00">
                                          <?php 
                                          if(isset($_SESSION['errorto']) && ($_SESSION['errorto']!=1)){
                                            echo $_SESSION['errorto'];
                                            unset($_SESSION['errorto']);
                                          }
                                          ?>
                                        </span>
                                        <a data-toggle="modal" title="Click to chat about this <?php echo $detail[0]->ProductName; ?>" data-target="" class="btn new_btn-link" href="#">Live Chat</a>
                                        <br>
                                        <a data-toggle="modal" title="Click here to contact Global Fitness about this <?php echo $detail[0]->ProductName; ?>" data-target="#emailUs" class="btn new_btn-link" href="#">Email Us</a>
                                        <br>
                                        <a data-toggle="modal" title="Click here to request a call and discuss this <?php echo $detail[0]->ProductName; ?>" data-target="#requestacall" class="btn new_btn-link" href="#">Request To Call</a>
                                        <br>
                                        <a class="btn new_btn-link" title="<?php echo $detail[0]->ReviewLinkTitle; ?>" id="reviewlink_c" href="<?php echo $detail[0]->ReviewAnchorHrefName; ?>">Reviews</a>
                                        <br>
                                        <br>
                                        <div class="question_heding More_option">More Options</div>
                                        <a data-toggle="modal" title="Are you interested in renting this <?php echo $detail[0]->ProductName; ?>" data-target="#myModal_RentProduct" class="btn new_btn-link" href="">Rent this <?php echo $detail[0]->CategoryName; ?></a>
                                        <br>
                                        <a data-toggle="modal" title="Sell your <?php echo $detail[0]->ProductName; ?> to GlobalFitness here" data-target="#myModal_SellProduct" class="btn new_btn-link" href="">Sell your <?php echo $detail[0]->CategoryName; ?></a>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="fb-like" data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false">
                                  </div>
                                  <br>
                                  <br>
                                </div>
                              </div>
                            </div>
                          </div><!--end text-center1-->
                        </div><!--end row MG_BOTM-->

                        <div class="row SECtion_new_prod">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="prod_tittlt">
                              <?php echo $detail[0]->BoxSectionTitle;  ?>
                            </div>
                            <div class="new_prod_paragraph">
                              <ul class="ul_list">
                                <?php echo $detail[0]->WhatinBoxList;  ?>
                              </ul>
                            </div>
                          </div><!--end colm-->
                        </div><!--end row SECtion_new_prod-->
                        <?php
                        $str=$detail[0]->ConditionAnchorHrefName;
                        $ConditionAnchorHrefName = ltrim($str, '#');?>

                        <div class="row SECtion_new_prod">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="prod_tittlt" id="<?php echo $ConditionAnchorHrefName; ?>">
                              <?php echo $detail[0]->Section3Title ;  ?> 
                            </div><!--end prod_tittlt-->
                            <div class="new_prod_paragraph">
                              <?php echo $detail[0]->Section3Body ;  ?> 
                            </div><!--end new_prod_paragraph-->
                          </div><!--end colm-->
                        </div><!--end row SECtion_new_prod-->

                        <div class="row SECtion_new_prod">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="prod_tittlt">
                              <h2><?php echo $detail[0]->ProductOverviewTitle; ?></h2>
                            </div>
                            <div class="new_prod_paragraph new_ligt_color"><span itemprop="description">
                              <?php echo $detail[0]->ProductDescription; ?> 
                            </span>
                          </div>
                        </div><!--end colm-->
                      </div><!--end row SECtion_new_prod-->
                      <?php if(!empty($ProductionDetails)){ ?>
                      <div class="row SECtion_new_prod">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="prod_tittlt_2" id="<?php echo strip_tags($detail[0]->ProductionDetailsTitle); ?>">
                            <?php echo $detail[0]->ProductionDetailsTitle; ?>
                          </div>
                          <div class="new_prod_paragraph">
                            <div class="whyBuy_tittle">
                              <?php echo $detail[0]->ProductionDetailsSubtitle; ?>
                            </div>
                            <div class="row WHY_BUY_SECTION">
                              <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="WHY_BUY_SERVICES_PENAL">
                                  <div class="IMAGE_SECtion">
                                    <img class="img-responsive" alt="<?php echo $ProductionDetails[0]->CertifedLogoAlt; ?>" title="<?php echo $ProductionDetails[0]->CertifiedTitle; ?>" src="<?php echo (empty($ProductionDetails[0]->CertifedLogo) ?base_url('public/assets/images/sertified.png') : base_url($ProductionDetails[0]->CertifedLogo));  ?>">
                                  </div>
                                  <div class="WHY_BUY_SERVICES_PENAL_Tittle">
                                    <?php echo $ProductionDetails[0]->CertifiedTitle; ?>
                                  </div>
                                </div>
                                <div class="WHY_BUY_SERVICES_PENAL_content">
                                  <p><?php echo $ProductionDetails[0]->CertifiedDescription; ?></p>
                                </div>
                              </div>
                              <div class="col-md-5 col-md-offset-2  col-sm-5 col-sm-offset-2 col-xs-12">
                                <div class="WHY_BUY_SERVICES_PENAL">
                                  <div class="IMAGE_SECtion">
                                    <img class="img-responsive" alt="<?php echo $ProductionDetails[0]->ConsoleIconAlt; ?>" title="<?php echo $ProductionDetails[0]->ConsoleTitle; ?>" src="<?php  echo (empty($ProductionDetails[0]->ConsoleIcon) ?  base_url('public/assets/images/consol_overlay.png') : base_url($ProductionDetails[0]->ConsoleIcon));  ?>">
                                  </div>
                                  <div class="WHY_BUY_SERVICES_PENAL_Tittle">
                                    <?php echo $ProductionDetails[0]->ConsoleTitle; ?>
                                  </div>
                                </div>
                                <div class="WHY_BUY_SERVICES_PENAL_content">
                                  <p><?php echo $ProductionDetails[0]->ConsoleDescription; ?></p>
                                </div>
                              </div>
                            </div>
                            <div class="row WHY_BUY_SECTION">
                              <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="WHY_BUY_SERVICES_PENAL">
                                  <div class="IMAGE_SECtion">
                                    <img itemprop="image" class="img-responsive" alt="<?php echo $ProductionDetails[0]->DecalIconAlt; ?>" title="<?php echo $ProductionDetails[0]->DecalTitle; ?>" src="<?php  echo (empty($ProductionDetails[0]->DecalIcon) ?  base_url('public/assets/images/decals.png') : base_url($ProductionDetails[0]->DecalIcon));?>">
                                  </div>
                                  <div class="WHY_BUY_SERVICES_PENAL_Tittle">
                                    <?php echo $ProductionDetails[0]->DecalTitle; ?>
                                  </div>
                                </div>
                                <div class="WHY_BUY_SERVICES_PENAL_content">
                                  <p><?php echo $ProductionDetails[0]->DecalDescription; ?></p>
                                </div>
                              </div>
                              <div class="col-md-5 col-md-offset-2  col-sm-5 col-sm-offset-2 col-xs-12">
                                <div class="WHY_BUY_SERVICES_PENAL">
                                  <div class="IMAGE_SECtion">
                                    <img class="img-responsive" alt="<?php echo $ProductionDetails[0]->BeltIconAlt; ?>" title="<?php echo $ProductionDetails[0]->BeltTitle; ?>" src="<?php  echo (empty($ProductionDetails[0]->BeltIcon) ?  base_url('public/assets/images/derivebelt.png') : base_url($ProductionDetails[0]->BeltIcon));?>">
                                  </div>
                                  <div class="WHY_BUY_SERVICES_PENAL_Tittle">
                                    <?php echo $ProductionDetails[0]->BeltTitle; ?>
                                  </div>
                                </div>
                                <div class="WHY_BUY_SERVICES_PENAL_content">
                                  <p><?php echo $ProductionDetails[0]->BeltDescription; ?></p>
                                </div>
                              </div>
                            </div>
                            <div class="row WHY_BUY_SECTION">
                              <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="WHY_BUY_SERVICES_PENAL">
                                  <div class="IMAGE_SECtion">
                                    <img class="img-responsive" alt="<?php echo $ProductionDetails[0]->ElectronicsIconAlt; ?>" title="<?php echo $ProductionDetails[0]->ElectronicsTitle; ?>" src="<?php  echo (empty($ProductionDetails[0]->ElectronicsIcon) ?  base_url('public/assets/images/electronics.png') : base_url($ProductionDetails[0]->ElectronicsIcon));?>">
                                  </div>
                                  <div class="WHY_BUY_SERVICES_PENAL_Tittle">
                                    <?php echo $ProductionDetails[0]->ElectronicsTitle; ?>
                                  </div>
                                </div>
                                <div class="WHY_BUY_SERVICES_PENAL_content">
                                  <p><?php echo $ProductionDetails[0]->ElectronicsDescription; ?></p>
                                </div>
                              </div>
                              <div class="col-md-5 col-md-offset-2  col-sm-5 col-sm-offset-2 col-xs-12">
                                <div class="WHY_BUY_SERVICES_PENAL">
                                  <div class="IMAGE_SECtion">
                                    <img class="img-responsive" alt="<?php echo $ProductionDetails[0]->MechanicalIconAlt; ?>" title="<?php echo $ProductionDetails[0]->MechanicalTitle; ?>" src="<?php  echo (empty($ProductionDetails[0]->MechanicalIcon) ?  base_url('public/assets/images/mechnicals.png') : base_url($ProductionDetails[0]->MechanicalIcon));?>">
                                  </div>
                                  <div class="WHY_BUY_SERVICES_PENAL_Tittle">
                                    <?php echo $ProductionDetails[0]->MechanicalTitle; ?>
                                  </div>
                                </div>
                                <div class="WHY_BUY_SERVICES_PENAL_content">
                                  <p><?php echo $ProductionDetails[0]->MechanicalDescription; ?></p>
                                </div>
                              </div>
                            </div>
                            <div class="row WHY_BUY_SECTION">
                              <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="WHY_BUY_SERVICES_PENAL">
                                  <div class="IMAGE_SECtion">
                                    <img class="img-responsive" alt="<?php echo $ProductionDetails[0]->PaintIconAlt; ?>" title="<?php echo $ProductionDetails[0]->PaintTitle; ?>" src="<?php echo (empty($ProductionDetails[0]->PlasticIcon) ?  base_url('public/assets/images/paint_flash.png') : base_url($ProductionDetails[0]->PaintIcon));?>">
                                  </div>
                                  <div class="WHY_BUY_SERVICES_PENAL_Tittle">
                                    <?php echo $ProductionDetails[0]->PaintTitle; ?>
                                  </div>
                                </div>
                                <div class="WHY_BUY_SERVICES_PENAL_content">
                                  <p><?php echo $ProductionDetails[0]->PaintDescription; ?></p>
                                </div>   
                              </div>
                              <div class="col-md-5 col-md-offset-2  col-sm-5 col-sm-offset-2 col-xs-12">
                                <div class="WHY_BUY_SERVICES_PENAL">
                                  <div class="IMAGE_SECtion">
                                    <img class="img-responsive" alt="<?php echo $ProductionDetails[0]->PlasticIconAlt; ?>" title="<?php echo $ProductionDetails[0]->PlasticTitle; ?>" src="<?php  echo (empty($ProductionDetails[0]->PlasticTitle) ?  base_url('public/assets/images/plastics.png') : base_url($ProductionDetails[0]->PlasticIcon));?>">
                                  </div>
                                  <div class="WHY_BUY_SERVICES_PENAL_Tittle">
                                    <?php echo $ProductionDetails[0]->PlasticTitle; ?>
                                  </div>
                                </div>
                                <div class="WHY_BUY_SERVICES_PENAL_content">
                                  <p><?php echo $ProductionDetails[0]->PlasticDescription; ?></p>
                                </div>
                              </div>
                            </div>
                            <div class="row WHY_BUY_SECTION">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="wantlernmore_tittle">
                                  <!-- <h4>Do you want to learn more about our <a href="" title=""> used gym equipment </a>refurbishing process?</h4> -->
                                  <h4><?php echo $detail[0]->Section5SubTitle ;  ?></h4>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--end colm-->
                      </div><!--end row-->
                      <?php  }  ?>

                      <?php $str=$detail[0]->WarrantyAnchorHrefName;
                      $WarrantyAnchorHrefName = ltrim($str, '#');?>
                      <div class="row SECtion_new_prod">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="prod_tittlt" id="<?php echo $WarrantyAnchorHrefName; ?>">
                            <?php echo $detail[0]->WarrantyTitle ;  ?>
                          </div>
                          <div class="new_prod_paragraph new_ligt_color">
                            <p><?php echo $detail[0]->WarrantyDecription;  ?></p>
                          </div>
                        </div><!--end colm-->
                      </div><!--end row SECtion_new_prod-->

                      <?php if(!empty($video)){ ?>
                      <div class="row SECtion_new_prod">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="prod_tittlt">
                            <h3> <?php echo $video[0]->MovieTitle ;?></h3>
                          </div>
                          <div class="new_prod_paragraph1">
                            <div class="vedio_Product_penal1">
                              <?php echo $video[0]->VideoCode ;?>
                            </div>
                          </div>
                        </div><!--end colm-->
                      </div><!--end row-->
                      <?php } ?> 

                      <div class="row SECtion_new_prod">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="prod_tittlt">
                            <?php echo $detail[0]->SpecificationsTitle ;  ?> 
                          </div>
                          <div class="new_prod_paragraph">
                            <div class="prod_discrption_title">
                              <?php echo $detail[0]->SpecSubtitle1 ;  ?> 
                              <ul class="product_inner">
                                <?php echo $detail[0]->ElectricalList ;  ?> 
                              </ul>
                            </div>
                            <div class="prod_discrption_title">
                              <?php echo $detail[0]->SpecSubtitle2 ;  ?> 
                              <ul class="product_inner">
                                <?php echo $detail[0]->SpecificationsList ;  ?> 
                              </ul>
                            </div>
                          </div>
                        </div><!--end colm-->
                      </div><!--end row-->

                      <?php
                      $str=$detail[0]->ReviewAnchorHrefName;
                      $ReviewAnchorHrefName = ltrim($str, '#');?>
                      <div id="<?php echo $ReviewAnchorHrefName; ?>" class="row SECtion_new_prod">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <?php echo $detail[0]->ProductReviewsTitle ;  ?> 
                          <ul class="nav nav-tabs margin_top_penal_tab">
                            <li class="active"><a data-toggle="tab" href="#home">Most Recent</a></li>
                            <li><a data-toggle="tab" href="#menu1">Most Useful</a></li>
                            <li><a data-toggle="tab" href="#menu2">Write a review </a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                              <?php
                              if(count($review)>0){
                                foreach($review as $re){
                                  ?>
                                  <div class="row tab_penal_dscp">
                                    <div class="col-md-9 col-sm-9 right_border">
                                      <input id="input-21b" class="rating" data-min="0" data-max="5" data-step="1" value="<?php echo $re->star_rate; ?>" data-disabled="true" data-size="xs" data-show-clear="false" data-show-caption="false">
                                      <div class="tittle_penal">
                                        <?php echo $re->brief; ?>
                                      </div>
                                      <div class="discp_penal">
                                        <?php echo $re->description; ?>
                                      </div>
                                      <div class="discp_penal_date_time">Written by
                                        <?php echo $re->FirstName." ".$re->LastName." ".$re->MiddleName; ?> |
                                        <?php echo date("m/d/Y" ,strtotime($re->created)); ?>
                                      </div>
                                      <?php
                                      if($re->total!=0){
                                        echo $re->totalhelp; ?> of
                                        <?php echo $re->total; ?> found this review helpful
                                        <?php
                                      }

                                      ?>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                      <div class="discp_penal_help">
                                        <?php  if($re->myhelp==0){ ?> Is this useful</div>
                                        <div class="discp_penal_form">
                                          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <input class="res_button" type="hidden" value="<?php echo $re->ID; ?>" name="review_id">
                                            <?php if($this->session->userdata('userId')==''){ ?>
                                            <a href="" class="btn btn-default" data-toggle="modal" data-target="#myModal_login" name="action">Yes</a> <a href="" class="btn btn-default" data-toggle="modal" data-target="#myModal_login" name="action">No</a>
                                            <?php   }else{
                                              ?>
                                              <input class="no_button" type="submit" class="btn btn-default" value="Yes" name="action">
                                              <input type="submit" class="btn btn-default" value="No" name="action">
                                              <?php
                                            } ?>
                                          </form>
                                        </div>
                                        <?php 
                                      }
                                      else{
                                        echo "Already Given Feedback.</div>";
                                      }                               
                                      ?>
                                    </div>
                                  </div>
                                  <hr>
                                  <?php }
                                }
                                else{
                                  echo "<h4 style='color:red; '>This ".$detail[0]->Piece." has no reviews; be the first to write one by <a data-toggle='tab' href='#menu2'> clicking here!</a> </h4>";
                                }
                                ?>
                              </div><!--end home-->

                              <div id="menu1" class="tab-pane fade">
                                <?php 
                                function sortByOrder($b, $a) 
                                {
                                  return $a->total - $b->total;
                                }
                                usort($review, 'sortByOrder');
                                ?>
                                <?php
                                if(count($review)>0){
                                  foreach($review as $re){
                                    ?>
                                    <div class="row tab_penal_dscp">
                                      <div class="col-md-9 col-sm-9 right_border">
                                        <input id="input-21b" class="rating" data-min="0" data-max="5" data-step="1" value="<?php echo $re->star_rate; ?>" data-disabled="true" data-size="xs" data-show-clear="false" data-show-caption="false">
                                        <div class="tittle_penal">
                                          <?php echo $re->brief; ?>
                                        </div>
                                        <div class="discp_penal">
                                          <?php echo $re->description; ?>
                                        </div>
                                        <div class="discp_penal_date_time">Written by
                                          <?php echo $re->FirstName." ".$re->LastName." ".$re->MiddleName; ?> |
                                          <?php echo date("m/d/Y" ,strtotime($re->created)); ?>
                                        </div>
                                        <?php 
                                        if($re->total!=0){
                                          echo $re->totalhelp; ?> of
                                          <?php echo $re->total; ?> found this review helpful
                                          <?php
                                        }

                                        ?>
                                      </div>
                                      <div class="col-md-3 col-sm-3">
                                        <div class="discp_penal_help">
                                          <?php  if($re->myhelp==0){ ?> Is this useful</div>
                                          <div class="discp_penal_form">
                                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                              <input class="res_button" type="hidden" value="<?php echo $re->ID; ?>" name="review_id">
                                              <?php if($this->session->userdata('userId')==''){ ?>
                                              <a href="" class="btn btn-default" data-toggle="modal" data-target="#myModal_login" name="action">Yes</a> <a href="" class="btn btn-default" data-toggle="modal" data-target="#myModal_login" name="action">No</a>
                                              <?php   }else{
                                                ?>
                                                <input class="no_button" type="submit" class="btn btn-default" value="Yes" name="action">
                                                <input type="submit" class="btn btn-default" value="No" name="action">
                                                <?php
                                              } ?>
                                            </form>
                                          </div>
                                          <?php 
                                        }
                                        else{
                                          echo "Already Given Feedback.</div>";
                                        }                               
                                        ?>
                                      </div>
                                    </div>
                                    <hr>
                                    <?php }
                                  }
                                  else{
                                    echo "<h4 style='color:red; '>This ".$detail[0]->Piece." has no reviews; be the first to write one by <a data-toggle='tab' href='#menu2'> clicking here!</a> </h4>";
                                  }
                                  ?>
                                </div><!--end menu1-->
                                <div id="menu2" class="tab-pane fade">
                                  <form id="reviewform" style="margin-top:21px;" method="post" action="" class="form-horizontal" role="form">
                                    <input type="hidden" name="productId" value="<?php echo $detail[0]->ListID; ?>">
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="email">Brief Subject</label>
                                      <div class="col-sm-10">
                                        <input name="brief" required type="text" class="form-control" id="email" placeholder="Please limit to 10 words" maxlength="100">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="pwd">Rate this product</label>
                                      <div class="col-sm-10">
                                        <input id="input-21b" name="star" value="4.4" type="number" class="rating" min=0 max=5 step=0.2 data-size="xs"> (Select the number of stars you wish to rate this product.)
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="pwd">Your review</label>
                                      <div class="col-sm-10">
                                        <textarea name="review" required class="form-control" placeholder="please limit to 300 words" maxlength="500"></textarea>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" value="Submit" class="btn btn-default submitreviewBtn">
                                      </div>
                                    </div>
                                  </form>
                                </div><!--end menu2-->
                              </div><!--end tab-content-->
                            </div><!--end col-->
                          </div><!--end  row SECtion_new_prod-->
                        </div><!--end of BORDER_CHACHOUT-->
                      </div><!--end of container-->
                    </section>
                    <script type="text/javascript">
                      $(document).load(function() {
                        $(".mCustomScrollbar").mCustomScrollbar({axis:"x"});
                      });


// $(window).load(function() {
//   $(".mCustomScrollbar").mCustomScrollbar({axis:"x"});
// });
</script>
<style type="text/css">
  /*/////////////////////////---------------NEWproduct_details Starts-----////////////////////////////////*/
  .BORDER_CHACHOUT {border: 0px solid #ccc; margin-bottom: 20px; padding: 0 15px; }
  .Prodetail_tittle {margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #ccc; padding: 0 0 10px 0; }
  .prod_tittlt h1 {font-size: 24px; margin: 0px; }
  .Probodr {border-right: 1px solid #ccc; }
  .Prod_detail_IMg .img-responsive {width: 100%; display: inline-block; height: 100%; border-right: 0px solid #ccc; }
  .Padd_reMOv {padding: 0px; }
  .newprice_box {font-size: 20px; font-weight: 500; margin: 5px 0 0; color: #333333; width: 50%; float: left; text-align: left; }
  .Add_tocard_BTN {width: 50%; float: left; }
  .new_product_penal_shiping {border-top: 0px solid #ccc; border-bottom: 1px solid #ccc; font-size: 14px; float: left; padding: 4px 0; width: 100%; }
  .Custom_PRONEW {padding-right: 25px; }
  .Warranty_img_box .img-responsive {width: 50px; }
  .new_product_penal_shiping_right {text-align: left; color: #333; }
  .NEW_ADDCARt {padding: 5px 18px; font-size: 13px; text-align: center; background: #4ba5ea; /* Old browsers */ background: -moz-linear-gradient(top, #4ba5ea 0%, #2e92dc 53%, #2e92dc 57%, #1784d1 100%); /* FF3.6-15 */ background: -webkit-linear-gradient(top, #4ba5ea 0%,#2e92dc 53%,#2e92dc 57%,#1784d1 100%); /* Chrome10-25,Safari5.1-6 */ background: linear-gradient(to bottom, #4ba5ea 0%,#2e92dc 53%,#2e92dc 57%,#1784d1 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */ filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4ba5ea', endColorstr='#1784d1',GradientType=0 ); /* IE6-9 */ border:background: #4ba5ea; }
  .ALL_CONTENT_right_box {float: left; width: 100%; margin-bottom: 5px; }
  .new_product_penal_shiping_right {color: #009900; float: left; width: auto; }
  .new_product_penal_shiping_left {text-align: left; width: auto; color: #333; float: left; }
  .new_product_penal_shiping_right {text-align: left; color: #333; padding: 0 0px 0 8px; }
  .new_product_penal_shiping_right>span {color: #009900 !important; }
  .Warranty_img_box {width: 100%; float: left; }
  .new_btn-link {font-weight: normal; color: #1482d0 !important; border-radius: 0; padding: 0px; }
  .new_prod_paragraph {padding: 0 0 20px 20px; }
  .prod_tittlt h2 {font-size: 26px; color: #333; }
  .prod_tittlt h3 {font-size: 26px; color: #333; }
  .prod_tittlt > h3 {font-size: 26px; color: #333; }
  .new_prod_paragraph > p {color: #333; font-size: 18px; line-height: 27px; }
  .new_prod_paragraph {color: #333; font-size: 18px; line-height: 27px; }
  .new_ligt_color p{color: #666666 !important; font-size: 16px !important; margin-bottom:25px; }
  .new_ligt_color {color: #666666 !important; font-size: 16px !important; margin-bottom:25px; }
  .new_prod_paragraph li {color: #333; font-size: 18px; margin: 6px 0; }
  .More_option {border-top: 1px solid #ccc; }
  .multy_img_slide_list li {list-style: none; display: inline-block; width: 63px; height: 100%; margin: 0 15px; padding: 0px 0 10px 0; }
  .multy_img_slide {margin-top: 10%; }
  .multy_img_slide_list li .active {border-bottom: 2px solid #ccc; }
  .SECtion_new_prod {border-top: 1px solid #ccc; }
  .new_product_penal__question {border-bottom: 0px solid #ccc; float: left; margin: 15px 0; padding: 0 0 10px; width: 100%; }
  .new_prod_paragraph_link{color: #1483d1; text-decoration: none;}
  .WHY_BUY_SECTION{margin-bottom: 15px;}
  .whyBuy_tittle > h3 {font-size: 20px; color: #333; }
  .prod_tittlt_2 > h4 {font-size: 26px; color: #333; }
  .whyBuy_tittle h3 {font-size: 20px; color: #333; }
  .prod_tittlt_2 h4 {font-size: 26px; color: #333; }
  .new_prod_paragraph h4{font-size: 26px; color: #333; }
  .product_penal_content {margin-top: 15px; }
  .WHY_BUY_SERVICES_PENAL {float: left; width: 100%; }
  .IMAGE_SECtion {float: left; width: 70px; }
  .WHY_BUY_SERVICES_PENAL_Tittle {color: #333; float: left; font-size: 18px; font-weight: 600; line-height: 25px; margin-left: 15px; padding-top: 13px; width: 70%; }
  .WHY_BUY_SERVICES_PENAL_content {float: left; margin: 15px 0 0 0; width: 100%; }
  .WHY_BUY_SERVICES_PENAL_content > p{color: #333; font-size: 18px; line-height: 27px; }
  .wantlernmore_tittle h4{font-size: 24px; color: #333; }
  .vedio_Product_penal > iframe {margin-bottom: 15px; }
  .prod_discrption_title h3 {color: #333; font-size: 23px; }
  .new_prod_paragraph .product_inner > li {background: transparent none repeat scroll 0 0; color: #666; display: inline-block; float: left; font-size: 18px; line-height: 30px; list-style: outside none none !important; margin: 0 0 6px; padding: 0 0 0 10px; width: 100%; }
  .new_PRICE_RESPONSIVE{display: none;}
  .multy_img_slide .active {border-bottom: 1px solid #ccc; }
  .vedio_Product_penal1 > iframe {min-height: 550px; }
  .multy_img_slide_list {display: inline-block; text-align: center; width: 100%; }
  .ul_list li h4{color: #333; font-size: 18px; margin: 6px 0; }
  #DESKtoP_MENu {border-bottom: 1px solid #ccc; }
  /*------------------crasual start--------------------*/
  .carousel-inner {position: relative; width: 100%; min-height: 300px; }
  .carousel-control.right {right: 0; left: auto; background-image: none !important; background-repeat: repeat-x; }
  .carousel-control.left {left: 0; right: auto; background-image: none !important; background-repeat: repeat-x; }
  #carousel-example-generic {margin: 20px auto; width: 100%; }
  #carousel-custom {margin: 20px auto; width: 400px; }
  #carousel-custom .carousel-indicators {margin: 30px 0 0; overflow: auto; position: static; text-align: left; white-space: nowrap; width: 100%; overflow:hidden; text-align: center; }
  #carousel-custom .carousel-indicators li {background-color: transparent; -webkit-border-radius: 0; border-radius: 0; display: inline-block; height: auto; margin: 0 15px !important; width: auto; padding-bottom: 10px; }
  #carousel-custom .carousel-indicators li img {display: block; opacity: 0.5; }
  #carousel-custom .carousel-indicators li.active img {opacity: 1; }
  #carousel-custom .carousel-indicators li:hover img {opacity: 0.75; } 
  #carousel-custom .carousel-outer {position: relative; }
  .carousel-indicators li img {height: auto; width: 63px;}
  .carousel-indicators .active {border-bottom: 1px solid #ccc; }
  /*------------------crasual start--------------------*/
  /*/////////////////////////---------------NEWproduct_details END-----////////////////////////////////*/
  /*/////////////////////////---------------NEWproduct_details RESPONSIVE START-----////////////////////////////////*/
  @media only screen and (min-device-width:300px) and (max-device-width:768px) and (orientation:portrait){
    .container {margin: auto !important; }
    .BORDER_CHACHOUT {  border: 0 solid #ccc; padding:0px;}
    .prod_tittlt h1 {text-align: center; }
    .DESKTOP_NEW_price{display: none;}
    .new_PRICE_RESPONSIVE {display: block; text-align: center; width: 100%; }
    .Probodr {border-right: 0 solid #ccc; }
    .Prodetail_tittle {border-bottom: 0 solid #ccc; }
    .Prod_detail_IMg {width: 100%; float: left; height: auto; float: left; border-right: 0px solid #ccc; padding-top: 20px; }
    .Prod_detail_IMg .img-responsive {display: inline-block; height: auto; width: auto; }
    .multy_img_slide {margin-bottom: 5%; margin-top: 10%; }
    .Add_tocard_BTN {width: 100%; margin: 20px 0; }
    .Custom_PRONEW {float: none; padding-right: 0; width: auto; }
    .text-center1 {text-align: center; }
    .new_product_penal_shiping_left {text-align: center; width: 100%; }
    .Warranty_img_box .img-responsive {display: inline-block; width: 50px; }
    .SECtion_new_prod {border-top: 1px solid #ccc; text-align: center; }
    .new_prod_paragraph {padding-left: 0; }
    .WHY_BUY_SERVICES_PENAL_Tittle {float: left; margin-left: 0; width: 100%; line-height: 35px; }
    .IMAGE_SECtion {display: inline-block; float: none; width: 70px; }
    .WHY_BUY_SERVICES_PENAL_content > p {text-align: justify; }
    .new_prod_paragraph > p {text-align: justify; }
    .vedio_Product_penal1 > iframe {min-height: 100%; }
    .new_prod_paragraph .product_inner > li {padding: 0; text-align: left !important; width: 100%; }
    .nav > li > a {padding: 10px 5px; }
    #carousel-custom {margin: 10px auto; width: auto; }
    .vedio_Product_penal1 > iframe {min-height: 100%; width: 100%; height: 100%;
    }
    @media only screen and (min-device-width:300px) and (max-device-width:768px) and (orientation:landscape){
      .container {margin: auto !important; }
      .BORDER_CHACHOUT {  border: 0 solid #ccc; padding:0px;}
      .prod_tittlt h1 {text-align: center; }
      .DESKTOP_NEW_price{display: none;}
      .new_PRICE_RESPONSIVE {display: block; text-align: center; width: 100%; }
      .Prodetail_tittle {border-bottom: 0 solid #ccc; }
      .Probodr {border-right: 0 solid #ccc; }
      .Prod_detail_IMg {width: 100%; float: left; height: auto; float: left; border-right: 0px solid #ccc; padding-top: 20px; }
      .Prod_detail_IMg .img-responsive {display: inline-block; height: auto; width: auto; }
      .multy_img_slide {margin-bottom: 5%; margin-top: 10%; }
      .Add_tocard_BTN {width: 100%; margin: 20px 0; }
      .Custom_PRONEW {float: none; padding-right: 0; width: auto; }
      .text-center1 {text-align: center; }
      .new_product_penal_shiping_left {text-align: center; width: 100%; }
      .Warranty_img_box .img-responsive {display: inline-block; width: 50px; }
      .SECtion_new_prod {border-top: 1px solid #ccc; text-align: center; }
      .new_prod_paragraph {padding-left: 0; }
      .WHY_BUY_SERVICES_PENAL_Tittle {float: left; margin-left: 0; width: 100%; line-height: 35px; }
      .IMAGE_SECtion {display: inline-block; float: none; width: 70px; }
      .WHY_BUY_SERVICES_PENAL_content > p {text-align: justify; }
      .new_prod_paragraph > p {text-align: justify; }
      .vedio_Product_penal1 > iframe {min-height: 100%; }
      .new_prod_paragraph .product_inner > li {padding: 0; text-align: left !important; width: 100%; }
      .nav > li > a {padding: 10px 5px; }
      #carousel-custom {margin: 10px auto; width: auto; }
      .vedio_Product_penal1 > iframe {min-height: 100%; width: 100%; height: 100%; }
    }
    @media only screen and (min-device-width:768px) and (max-device-width:1366px) and (orientation:portrait){
      .Prod_detail_IMg {height: auto; width: auto; }
      .SECtion_new_prod {text-align: left !important; }
      .prod_tittlt h1 {text-align: left !important; }
      .DESKTOP_NEW_price {display: block; }
      .new_PRICE_RESPONSIVE {display: none; text-align: center; width: 100%; }
      .Add_tocard_BTN {margin: 0px 0; width: 50%; }
      #carousel-custom {margin: 20px auto; width: auto; }
      .Prodetail_tittle {border-bottom: 1px solid #ccc; }
      .Prod_detail_IMg {border-right: 1px solid #ccc; }
      .IMAGE_SECtion {float: left; width: 70px; }
      .WHY_BUY_SERVICES_PENAL_Tittle {float: left; line-height: 19px; margin-left: 12px; padding-top: 13px; width: 70%; font-size: 15px; }
      .container {margin: auto !important; }
    }
    @media only screen and (min-device-width:768px) and (max-device-width:1366px) and (orientation:landscape){
      .Prod_detail_IMg {height: auto; width: auto; }
      .SECtion_new_prod {text-align: left !important; }
      .prod_tittlt h1 {text-align: left !important; }
      #carousel-custom {margin: 20px auto; width: auto; }
      .IMAGE_SECtion {float: left; width: 70px; }
      .WHY_BUY_SERVICES_PENAL_Tittle {float: left; line-height: 19px; margin-left: 12px; padding-top: 13px; width: 70%; font-size: 15px; }
      .container {margin: auto !important; }
    }

/*@media only screen and (min-device-width:800px) and (max-device-width:1280px) and (orientation:portrait){
.Prod_detail_IMg { height: auto !important; width: auto !important; }
}
@media only screen and (min-device-width:800px) and (max-device-width:1280px) and (orientation:landscape){
.Prod_detail_IMg {height: auto !important; width: auto !important;}
}*/
/*/////////////////////////---------------NEWproduct_details RESPONSIVE  END-----////////////////////////////////*/
</style>