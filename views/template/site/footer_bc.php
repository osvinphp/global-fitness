<input type="hidden" value="<?php if(isset($_SESSION['firstname'])){ echo '1'; }else{ echo '0'; } ?>" id="checklooged">
<input type="hidden" value="0" id="alertsubcheck">

<style>
  .Email_auttoo .modal-title {color: #33cc33!important; font-family: 'PT Sans', sans-serif !important; font-size: 26px !important;}
 .Email_successfull_content_PEnaL {
    font-size: 16px !important;font-family: 'PT Sans', sans-serif !important;line-height: 22px; font-weight: 400 !important;}

.proDuct_Name{color: #000000 !important; font-family: 'PT Sans', sans-serif !important; font-style: italic; font-weight: normal;}
.footer_bottom_popup p{color: #444444 !important; margin: 0 !important; padding: 0 !important; font-size: 12px !important;}
.row.footer_bottom_popup{padding: 0 !important;}

</style>
<div class="footer_outer">
<div class="container">
  <div class="row footer">
    <div class="col-md-3 col-sm-3">
      <h2>Shop</h2>
      <ul class="footer_nav">
       <li><a href="<?php echo base_url('/page'); ?>/Fitness-Equipment-Sales">Fitness Equipment Sales</a></li>
       <li><a href="http://www.labistour.com/globalfitnessrentals.com" target="_blank">Rent Fitness Equipment</a></li>
       <li><a href="<?php echo base_url('/page'); ?>/Educational-Sales">Educational Sales</a></li>
       <li><a href="<?php echo base_url('/page'); ?>/Donations">Donations</a></li>
       <li><a href="<?php echo base_url('/page'); ?>/Government-Sales">Government Sales</a></li>
       <li><a href="<?php echo base_url('/page'); ?>/Gym-Owners">Gym Owners</a></li>
       <li><a href="<?php echo base_url('/page'); ?>/International-Sales">International Sales</a></li>
     </ul>
   </div>
   <div class="col-md-3 col-sm-3">
    <h2>About Us</h2>
    <ul class="footer_nav">
     <li><a href="<?php echo base_url('/page'); ?>/About-Global-Fitness">About Global Fitness</a></li>
     <li><a href="<?php echo base_url('/page'); ?>/Terms-&-Conditions">Terms & Conditions</a></li>
     <li><a href="<?php echo base_url('/page'); ?>/Privacy-Policy">Privacy Policy</a></li>
     <li><a href="<?php echo base_url('/page'); ?>/Legal">Legal</a></li>
     <li><a href="<?php echo base_url('/page'); ?>/Contact-Us">Contact Us</a></li>
     <li><a href="https://www.yelp.com/biz/globalfitness-fitness-equipment-warehouse-gardena" target="_blank">Testimonials</a></li>
     <li><a href="https://blog.globalfitness.com/category/fitness-press-and-media-articles/" target="_blank">Press & Media</a></li>
   </ul>
 </div>
 <div class="col-md-3 col-sm-3">
  <h2>Support</h2>
  <ul class="footer_nav">
   <li><a href="<?php echo base_url('/page'); ?>/Manuals-&-Liriture">Manuals & Literature</a></li>
   <li><a href="https://blog.globalfitness.com/category/product-help/" target="_blank">Product Help</a></li>
   <li><a href="<?php echo base_url('/page'); ?>/Register-Purchase">Register Purchase</a></li>
   <li><a href="<?php echo base_url('/page'); ?>/Replacement-Parts">Replacement Parts</a></li>
   <li><a href="<?php echo base_url('/page'); ?>/Schedule-Service">Schedule Service</a></li>
 </ul>
</div>
<div class="col-md-3 col-sm-3">
  <h2>Connect With Us</h2>
  <ul class="footer_nav">
  <?php
      $page = $this->Site_model->customepagedetail();
           foreach($page as $p){
        ?>
        <li><a target="_blank" href="<?php echo $p->title; ?>"><?php echo $p->Type; ?></a></li>
        <?php
      }
   ?>

 </ul>
</div>
</div>
</div>   
<div class="container">
  <div class="row footer_bottom">
    <div class="col-md-12 col-sm-12">
      <p>Copyright © 2016 Global Fitness, Inc. All rights reserved.</p>
    </div>
  </div>
</div>
</div>
 

<div class="modal fade" id="myModal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog Login_pOP" role="document">
    <div class="modal-content">
    <div class="paddingg">
      <div class="modal-header">
      <div class="auttoo">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Your Account</h4>
        <div class="ussrr">
        <img src="<?php echo base_url() ?>/public/assets/images/usser.png">
        </div>
        </div>
      </div>
      <div class="modal-body">
         <div class="box">
         <span class="error" style="color:red;"></span>
       </div>
      <div class="box">
        <input type="text" id="myphn" placeholder="Email/Username">
        <input type="Password" id="mypass" placeholder="Password">
        <div id='recaptcha1' class='g-recaptcha-response'></div>
      </div> 
      </div>
      <div class="modal-footer">
        
        <div class="submit">
          <input id="mylogin" type="button" value="Submit">
        </div><!--end submit-->
              <div class="user">
        <p>New user ? <span><a href="#" id="show_register" class="showlogin">Sign Up</a></span></p>
        <p><span><a href="<?php echo base_url('/user/forget_password'); ?>" id="abc" data-attr="0" class="showlogin">Forget Password</a></span></p>
      </div>
      </div>
     </div>
    </div>
  </div>
</div> 



<!-- modal for email me start  -->
<div class="modal fade myModal_email" id="myModal_email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
      <div class="paddingg">
        <div class="Email_auttoo">
          <h4 class="modal-title" id="myModalLabel">Price Inquiry</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png"> 
          <!-- <span aria-hidden="true">&times;</span> -->
          </button>
      
        </div>
      <div class="modal-body">
         <div class="box">
         <span class="error" id='error' style="color:red;"></span>
          </div>
      
      <form  method='post' name='email_m' id='email_m'>
        <div class="first_penal_ship">
          <div class="form-group">
            <input required id="Email_firstname" class="form-control firstname" name="firstname" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['firstname']; }  ?>" placeholder="First Name (required)" type="text">
          </div>
          <div class="form-group_second">
            <input required value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['lastname']; }  ?>" id="Email_lastname" name="lastname" class="form-control lastname" placeholder="Last Name (required)" type="text">
          </div>
        </div>

        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required id="email_address"  value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['email']; }  ?>" name="email_address" class="form-control StreetAddress"  placeholder="Email address (required)" type="text">
          </div>
        </div>


        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required id="Email_TEl_no" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['phone_number']; }  ?>" name="phone_number" class="form-control StreetAddress" placeholder="Telephone Number (required)" type="text">
          </div>
        </div>
        <div class="Emailtext_area_penal"></div>
          <input type='hidden' name='productId' value='<?php  echo $detail[0]->ListID; ?>'>
          <input type='hidden' name='productName' value='<?php echo $detail[0]->ProductName; ?>'>
          <input type='hidden' name='brandName' value='<?php echo $detail[0]->BrandName; ?>'>
          <input type='hidden' name='versionName' value='<?php echo $detail[0]->VersionName; ?>'>
          <input type='hidden' name='sku' value='<?php echo $detail[0]->StockKeepingUnit; ?>'>
          <textarea name="message" id='message' required>Hi There! I am inquiring about a price on this <?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>, can you please contact me with this information?</textarea>
          <div id="recaptcha2" class='g-recaptcha-response'></div>
           <!-- <div id='recaptcha' class='g-recaptcha-response'></div> -->
        </div>
        <div class="EmailSubmiuttt_penal green_color">
          <input type='submit' class="btn drop_ad" name='email_m' value='Send Email' id='email_me'>
        </div>
      </form>
      </div>
      
      </div>

        <div class="Email_bottom_foter">
          <h1>Questions</h1>
          <div class="Email_bottom_foter_content">
            <h4>Why do some products on your website have no pricing?</h4>
            <p>Some of our products we list online are void of pricing because a recent transaction has significantly altered the value of the product and Global Fitness is adjusting the sale price accordingly. Please complete and submit this form and we can get you a price right away! </p>
          </div>
          <div class="row footer_bottom">
            <div class="col-md-12 col-sm-12">
              <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
            </div>
          </div>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for email me end -->



<!-- modal for email me start  -->
<div class="modal fade waitlistMeModal" id="waitlistMeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
      <div class="paddingg">
        <div class="Email_auttoo">
          <h4 class="modal-title" id="myModalLabel">Wait List Request</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png"> 
          <!-- <span aria-hidden="true">&times;</span> -->
          </button>
        
   
        </div>
      <div class="modal-body">
         <div class="box">
         <span class="error" id='error' style="color:red;"></span>
          </div>
      
      <form  method='post' name='waitlist_m' id='waitlist_m'>
        <div class="first_penal_ship">
          <div class="form-group">
            <input required id="firstname_waitlist" class="form-control firstname" name="firstname_waitlist" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['firstname']; }  ?>" placeholder="First Name (required)" type="text">
          </div>
          <div class="form-group_second">
            <input required value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['lastname']; }  ?>" id="lastname_waitlist" name="lastname_waitlist" class="form-control lastname" placeholder="Last Name (required)" type="text">
          </div>
        </div>

        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required id="email_address_waitlist"  value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['email']; }  ?>" name="email_address_waitlist" class="form-control StreetAddress"  placeholder="Email address (required)" type="text">
          </div>
        </div>


        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required id="phone_number_waitlist" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['phone_number']; }  ?>" name="phone_number_waitlist" class="form-control StreetAddress" placeholder="Telephone Number (required)" type="text">
          </div>
        </div>
        <div class="Emailtext_area_penal"></div>
          <input type='hidden' name='productId_waitlist' value='<?php  echo $detail[0]->ListID; ?>'>
          <input type='hidden' name='productName' value='<?php echo $detail[0]->ProductName; ?>'>
          <input type='hidden' name='brandName' value='<?php echo $detail[0]->BrandName; ?>'>
          <input type='hidden' name='versionName' value='<?php echo $detail[0]->VersionName; ?>'>
          <input type='hidden' name='sku' value='<?php echo $detail[0]->StockKeepingUnit; ?>'>
          <textarea name="message_waitlist" id='message_waitlist' required>Hi There!&#13;&#10;Please add me to the wait list for this "<?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>"&#13;&#10;Thanks</textarea>
          <div id="recaptcha4" class='g-recaptcha-response'></div>
           <!-- <div id='recaptcha' class='g-recaptcha-response'></div> -->
        </div>
        <div class="EmailSubmiuttt_penal green_color">
          <input type='submit' class="btn drop_ad" name='waitlist_me' value='Send Email' id='waitlist_me'>
        </div>
      </form>
      </div>
      </div>

        <div class="Email_bottom_foter">
          <h1>Questions</h1>
          <div class="Email_bottom_foter_content">
            <h4>How do I know where on the wait list I am for a particular product?</h4>
            <p>That is easy, once you submit this form a dialog form will open showing you a where you stand on the list at the given moment. Whenever a customer order is filled you position will be updated and you shall receive an email updating you with you new position.</p>
          </div>
          <div class="row footer_bottom">
            <div class="col-md-12 col-sm-12">
              <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
            </div>
          </div>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for email me end -->



<!-- modal for email me start -->
<div class="modal fade myModal_email" id="myModal_email_Sucessfull" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
        <div class="Border_PopUP">
        <div class="paddingg">
        <div class="Email_auttoo">
          
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Email sent successfully</h4>
     
        </div>
      <div class="modal-body">
        <div class="Email_successfull_content_PEnaL"><!-- <span> <span class="proDuct_Name">-->"<?php if(isset($_POST['firstname'])){ echo $_POST['firstname']; } ?>"<!-- </span> --> thank you for getting in touch!<br>
We appreciate you contacting us about the <?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?><!-- </span> -->. We try to respond as soon as possible, so one of our Customer Service colleagues will get back to you within a few hours.<br>
Have a great day!
 <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
</div>

      </div>

      <div class="row footer_bottom footer_bottom_popup">
        <div class="col-md-12 col-sm-12">
          <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
        </div>
      </div>

      </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for email me end -->


<!-- modal for email me start -->
<div class="modal fade myModal_email" id="myModal_email_waitlist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
        <div class="Border_PopUP">
        <div class="paddingg">
        <div class="Email_auttoo">
          
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Email sent successfully</h4>
      
        </div>
      <div class="modal-body">
        <div class="Email_successfull_content_PEnaL"><p style="color:#268aff; margin-top:5px; font-size:15px;">"<?php if(isset($_POST['firstname_waitlist'])){ echo $_POST['firstname_waitlist']; } ?>", here is your position on the wait list for:</p>
<p>"<?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>"</p>
<p><b>Your Position: <?php echo $position; ?></b>&nbsp;&nbsp;&nbsp; sku : "<span style="color:#268aff; margin-top:5px; font-size:15px;"><?php echo $detail[0]->StockKeepingUnit; ?></span>"</p>
<?php
$x=1;
$count=count($WaitListRank);
foreach($WaitListRank as $WaitListRankVal)
{
if($x==10 and $count>10 )
{
  echo "<p>&nbsp;&nbsp;&nbsp;...</p>";
}elseif($x<10)
{
echo "<p><b>".$x.") </b>".$WaitListRankVal->firstName." ".$WaitListRankVal->lastName."</p>";
}elseif($x==$count)
{
echo "<p><b>".$x.") </b>".$WaitListRankVal->firstName." ".$WaitListRankVal->lastName."</p>";
}


$x++;
}
?>

 <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
</div>

      </div>

      <div class="row footer_bottom footer_bottom_popup">
        <div class="col-md-12 col-sm-12">
          <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
        </div>
      </div>

      </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for email me end -->

<!-- modal for email me start -->
<div class="modal fade myModal_email_waitlist_error" id="myModal_email_waitlist_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
        <div class="Border_PopUP">
        <div class="paddingg">
        <div class="Email_auttoo">
          
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel" ><span style="color:red">Sorry, You have already request for waitlist</span></h4>
  
        </div>

         <div class="modal-body">
        <div class="Email_successfull_content_PEnaL">

  <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
          </div>

      </div>
    
      <div class="row footer_bottom footer_bottom_popup">
        <div class="col-md-12 col-sm-12">
          <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
        </div>
      </div>

      </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for email me end -->



<!-- modal for email me start  -->
<div class="modal fade myModal_RentProduct" id="myModal_RentProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
      <div class="paddingg">
        <div class="Email_auttoo">
          <h4 class="modal-title" id="myModalLabel" style="color:#268aff;">Start Renting Today</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png"> 
          <!-- <span aria-hidden="true">&times;</span> -->
          </button>
        
        </div>
      <div class="modal-body">
         <div class="box">
         <span class="error" id='error' style="color:red;"></span>
          </div>
      
      <form  method='post' name='RentProduct' id='RentProduct'>
        <div class="first_penal_ship">
          <div class="form-group">
            <input required id="firstname_RentProduct" class="form-control firstname" name="firstname_RentProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['firstname']; }  ?>" placeholder="First Name (required)" type="text">
          </div>
          <div class="form-group_second">
            <input required value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['lastname']; }  ?>" id="lastname_RentProduct" name="lastname_RentProduct" class="form-control lastname" placeholder="Last Name (required)" type="text">
          </div>
        </div>

        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required id="email_address_RentProduct"  value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['email']; }  ?>" name="email_address_RentProduct" class="form-control StreetAddress"  placeholder="Email address (required)" type="text">
          </div>
        </div>


        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required id="phone_number_RentProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['phone_number']; }  ?>" name="phone_number_RentProduct" class="form-control StreetAddress" placeholder="Telephone Number (required)" type="text">
          </div>
        </div>
        <div class="Emailtext_area_penal"></div>
          <input type='hidden' name='productId_RentProduct' value='<?php  echo $detail[0]->ListID; ?>'>
          <input type='hidden' name='productName' value='<?php echo $detail[0]->ProductName; ?>'>
          <input type='hidden' name='brandName' value='<?php echo $detail[0]->BrandName; ?>'>
          <input type='hidden' name='versionName' value='<?php echo $detail[0]->VersionName; ?>'>
          <input type='hidden' name='sku' value='<?php echo $detail[0]->StockKeepingUnit; ?>'>
          <textarea name="message_RentProduct" id='message_RentProduct' required>Hi There!&#13;&#10; I have some questions about renting this "<?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>".&#13;&#10;Please reach out to me about this.&#13;&#10;Thanks</textarea>
          <div id="recaptcha5" class='g-recaptcha-response'></div>
           <!-- <div id='recaptcha' class='g-recaptcha-response'></div> -->
        </div>
        <div class="EmailSubmiuttt_penal green_color">
          <input type='submit' class="btn drop_ad" name='email_RentProduct' value='Send Email' id='email_RentProduct'>
        </div>
      </form>
      </div>
      
      </div>

        <div class="Email_bottom_foter">
          <h1>Questions</h1>
          <div class="Email_bottom_foter_content">
            <h4>How much does it cost to rent equipment from Global Fitness?</h4>
            <p>The cost vary by model, however we can say it costs a fraction of the purchase price and it included maintenance for the life of the contract. We also service the rental fleet on a quarterly basis with free replacement if a unit fails. We charge up front and you pay for delivery only.</p>
          </div>
          <div class="row footer_bottom">
            <div class="col-md-12 col-sm-12">
              <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
            </div>
          </div>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for email me end -->

<!-- /////////// rudra code start ////// -->
<div class="modal fade myModal_email" id="myModal_email_GenProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
        <div class="Border_PopUP">
        <div class="paddingg">
        <div class="Email_auttoo">
          
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Email sent successfully</h4>
        
        </div>
      <div class="modal-body">
        <div class="Email_successfull_content_PEnaL"><p style="color:#268aff; margin-top:5px; font-size:15px;">"<?php if(isset($_POST['firstname_GenProduct'])){ echo $_POST['firstname_GenProduct']; } ?>", thank you for getting in touch!</p>
<p>We appreciate you contacting us about the "<?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>". We try to respond as soon as possible, so one of our Customer Service colleagues will get back to you within few hours.</p>
<p>Have a great day!</p>
 <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
</div>
      </div>

      <div class="row footer_bottom footer_bottom_popup">
        <div class="col-md-12 col-sm-12">
          <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
        </div>
      </div>

      </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>

<div class="modal fade myModal_email_GenProduct_error" id="myModal_email_GenProduct_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
        <div class="Border_PopUP">
        <div class="paddingg">
        <div class="Email_auttoo">
          
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel" ><span style="color:red">Sorry, You have already requested for General Product Question</span></h4>
        </div>

         <div class="modal-body">
        <div class="Email_successfull_content_PEnaL">

  <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
          </div>

      </div>
    
      <div class="row footer_bottom footer_bottom_popup">
        <div class="col-md-12 col-sm-12">
          <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
        </div>
      </div>

      </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- rudra code ends////// -->
<!-- modal for email me start -->
<div class="modal fade myModal_email" id="myModal_email_RentProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
        <div class="Border_PopUP">
        <div class="paddingg">
        <div class="Email_auttoo">
          
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Email sent successfully</h4>
   
        </div>
      <div class="modal-body">
        <div class="Email_successfull_content_PEnaL"><p style="color:#268aff; margin-top:5px; font-size:15px;">"<?php if(isset($_POST['firstname_RentProduct'])){ echo $_POST['firstname_RentProduct']; } ?>", thank you for getting in touch!</p>
<p>We appreciate you contacting us about the "<?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>". We try to respond as soon as possible, so one of our Customer Service colleagues will get back to you within few hours.</p>
<p>Have a great day!</p>
 <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
</div>
      </div>

      <div class="row footer_bottom footer_bottom_popup">
        <div class="col-md-12 col-sm-12">
          <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
        </div>
      </div>

      </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for email me end -->

<!-- modal for email me start -->
<div class="modal fade myModal_email_RentProduct_error" id="myModal_email_RentProduct_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
        <div class="Border_PopUP">
        <div class="paddingg">
        <div class="Email_auttoo">
          
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel" ><span style="color:red">Sorry, You have already requested for Renting this Product</span></h4>
        </div>

         <div class="modal-body">
        <div class="Email_successfull_content_PEnaL">

  <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
          </div>

      </div>
    
      <div class="row footer_bottom footer_bottom_popup">
        <div class="col-md-12 col-sm-12">
          <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
        </div>
      </div>

      </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for email me end -->




<!-- modal for email me start  -->
<div class="modal fade myModal_SellProduct" id="myModal_SellProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
      <div class="paddingg">
        <div class="Email_auttoo">
          <h4 class="modal-title" id="myModalLabel" style="color:#268aff;">Sell Your Fitness Equipment</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png"> 
          <!-- <span aria-hidden="true">&times;</span> -->
          </button>
     
        </div>
      <div class="modal-body">
         <div class="box">
         <span class="error" id='error' style="color:red;"></span>
          </div>
      
      <form  method='post' name='SellProduct' id='SellProduct'>
        <div class="first_penal_ship">
          <div class="form-group">
            <input required id="firstname_SellProduct" class="form-control firstname" name="firstname_SellProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['firstname']; }  ?>" placeholder="First Name (required)" type="text">
          </div>
          <div class="form-group_second">
            <input required value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['lastname']; }  ?>" id="lastname_SellProduct" name="lastname_SellProduct" class="form-control lastname" placeholder="Last Name (required)" type="text">
          </div>
        </div>

        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required id="email_address_SellProduct"  value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['email']; }  ?>" name="email_address_SellProduct" class="form-control StreetAddress"  placeholder="Email address (required)" type="text">
          </div>
        </div>


        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required id="phone_number_SellProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['phone_number']; }  ?>" name="phone_number_SellProduct" class="form-control StreetAddress" placeholder="Telephone Number (required)" type="text">
          </div>
        </div>

        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required id="zip_code_SellProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['zip_code']; }  ?>" name="zip_code_SellProduct" class="form-control StreetAddress" placeholder="Zip Code of Equipment Location (required)" type="text">
          </div>
        </div>
        <div class="Emailtext_area_penal"></div>
          <input type='hidden' name='productId_SellProduct' value='<?php  echo $detail[0]->ListID; ?>'>
          <input type='hidden' name='productName' value='<?php echo $detail[0]->ProductName; ?>'>
          <input type='hidden' name='brandName' value='<?php echo $detail[0]->BrandName; ?>'>
          <input type='hidden' name='versionName' value='<?php echo $detail[0]->VersionName; ?>'>
          <input type='hidden' name='sku' value='<?php echo $detail[0]->StockKeepingUnit; ?>'>
          <textarea name="message_SellProduct" id='message_SellProduct' required>Hi There!&#13;&#10; I have a "<?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>" that I need to turn into cash&#13;&#10;Are you interested in purchasing it from me?&#13;&#10;Thanks</textarea>
          <div id="recaptcha6" class='g-recaptcha-response'></div>
           <!-- <div id='recaptcha' class='g-recaptcha-response'></div> -->
        </div>
        <div class="EmailSubmiuttt_penal green_color">
          <input type='submit' class="btn drop_ad" name='email_SellProduct' value='Send Email' id='email_SellProduct'>
        </div>
      </form>
      </div>
      
      </div>

        <div class="Email_bottom_foter">
          <h1>Questions</h1>
          <div class="Email_bottom_foter_content">
            <h4>How much does it cost to rent equipment from Global Fitness?</h4>
            <p>The cost vary by model, however we can say it costs a fraction of the purchase price and it included maintenance for the life of the contract. We also service the rental fleet on a quarterly basis with free replacement if a unit fails. We charge up front and you pay for delivery only.</p>
          </div>
          <div class="row footer_bottom">
            <div class="col-md-12 col-sm-12">
              <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
            </div>
          </div>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for email me end -->


<!-- modal for email me start -->
<div class="modal fade myModal_email" id="myModal_email_SellProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
        <div class="Border_PopUP">
        <div class="paddingg">
        <div class="Email_auttoo">
          
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Email sent successfully</h4>
  
        </div>
      <div class="modal-body">
        <div class="Email_successfull_content_PEnaL"><p style="color:#268aff; margin-top:5px; font-size:15px;">"<?php if(isset($_POST['firstname_SellProduct'])){ echo $_POST['firstname_SellProduct']; } ?>", thank you for getting in touch!</p>
<p>We appreciate you contacting us about the "<?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>". We try to respond as soon as possible, so one of our Customer Service colleagues will get back to you within few hours.</p>
<p>Have a great day!</p>
 <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
</div>
      </div>

      <div class="row footer_bottom footer_bottom_popup">
        <div class="col-md-12 col-sm-12">
          <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
        </div>
      </div>

      </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for email me end -->

<!-- modal for email me start -->
<div class="modal fade myModal_email_SellProduct_error" id="myModal_email_SellProduct_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
        <div class="Border_PopUP">
        <div class="paddingg">
        <div class="Email_auttoo">
          
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel" ><span style="color:red">Sorry, You have already requested for Renting this Product</span></h4>
        </div>

         <div class="modal-body">
        <div class="Email_successfull_content_PEnaL">

  <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
          </div>

      </div>
    
      <div class="row footer_bottom footer_bottom_popup">
        <div class="col-md-12 col-sm-12">
          <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
        </div>
      </div>

      </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for email me end -->


<!-- Revuiew submit -->
<div class="modal fade myModal_email" id="review_submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
        <div class="Border_PopUP">
        <div class="paddingg">
        <div class="Email_auttoo">
          
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Review submitted successfully</h4>
 
        </div>
      <div class="modal-body">
        <div class="Email_successfull_content_PEnaL">
          Thank you for submitting your review.<br>
          Our moderators will evaluate your submission and notify you when your review is live.

  <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
          </div>

      </div>

      <div class="row footer_bottom footer_bottom_popup">
        <div class="col-md-12 col-sm-12">
          <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
        </div>
      </div>

      </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for email me end -->






<div class="modal fade" id="Modal_QUSTION" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="paddingg">
      <div class="modal-header">
      <div class="auttoo">
   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   
        </div>
      </div>
      <div class="modal-body">

      <div class="visa_card">
        <img src="<?php echo base_url() ?>/public/assets/images/cards.png">
      </div>
      </div>
      <div class="modal-footer">

      </div>
</div>
    </div>
  </div>
</div> 














<div class="modal fade" id="Modal_important_cod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="paddingg">
      <div class="modal-header">
      <div class="auttoo">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title important_heading" id="myModalLabel">Important Notice</h4>
        </div>
      </div>
      <div class="modal-body">
         <div class="box">
         <span class="error" style="color:red;"></span>
       </div>
      <div class="dumy_important">
        <p>Global Fitness does COD / Wire payment , The wire payment must be received prior to shipping and you plan to pick it up You must to return to step one to check the third check box "I want to pick this up"</p>
      </div>
      </div>
      <div class="modal-footer">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="Cancel">
           <a href="<?php echo base_url('/site/step2'); ?>">Change Shipping Details</a>
          </div> 
        </div>
         
      </div>
      </div>
    </div>
    </div>
  </div>
</div> 



















<div class="modal fade" id="Modal_important" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="paddingg">
      <div class="modal-header">
      <div class="auttoo">
   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title important_heading" id="myModalLabel">Important Notice</h4>
<!--         <div class="ussrr">
        <img src="http://72.32.47.90/public/assets/images/usser.png">
        </div> -->
        </div>
      </div>
      <div class="modal-body">
         <div class="box">
         <span class="error" style="color:red;"></span>
       </div>
<!--       <div class="box">
        <input type="text" id="myphn" placeholder="Email/Username">
        <input type="Password" id="mypass" placeholder="Password">
      </div>  -->
<!--       <div class="visa_card">
        <img src="http://72.32.47.90/public/assets/images/cards.png">
      </div> -->
      <div class="dumy_important">
        <p>Global Fitness does ship internationally however, shipping rates vary drastically from country to country. As a result, we like to research rates to so we can remain competitive. 
 </p>
<p>Your order will be completed and emailed to us so we can find the best way to ship your order.</p> 

<p>Please note your card not be billed nor authorized. We will collect payment from you when we have your shipping rate and approval from you prior to shipping.</p>
      </div>
      </div>
      <div class="modal-footer">
       <div class="submit">
          <input class="submitContinue"  type="button" value="Continue">
        </div><!--end submit-->
<!--            <div class="user">
        <p>New user ? <span><a href="<?php echo base_url('/user/register'); ?>" id="abc" data-attr="0" class="showlogin">Sign Up</a></span></p>
      </div>  -->
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="Cancel">
           <a href="" data-dismiss="modal" aria-label="Close">Cancel</a>
          
          </div> 
        </div>
         <div class="col-md-6 col-sm-6">
          <div class="contects">
            <p>Questions?<a href="https://www.globalfitness.com/page/contact-us" class="btn btn-link"><span>Contact Us</span></a></p>
          </div>
        </div>
      </div>
      </div>
</div>
    </div>
  </div>
</div> 
<div class="modal fade myModal_RentProduct" id="emailUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
      <div class="paddingg">
        <div class="Email_auttoo">
          <h4 class="modal-title" id="myModalLabel" style="color:#268aff;">General Product Question</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png"> 
          <!-- <span aria-hidden="true">&times;</span> -->
          </button>
        
      <!--<div class="ussrr">
        <img src="http://72.32.47.90/public/assets/images/usser.png">
        </div> -->
        </div>
      <div class="modal-body">
         <div class="box">
         <span class="error" id='error' style="color:red;"></span>
          </div>
      
      <form  method='post' name='GenProduct' id='GenProduct'>
        <div class="first_penal_ship">
          <div class="form-group">
            <input required id="firstname_RentProduct" class="form-control firstname" name="firstname_GenProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['firstname']; }  ?>" placeholder="First Name (required)" type="text">
          </div>
          <div class="form-group_second">
            <input required value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['lastname']; }  ?>" id="lastname_RentProduct" name="lastname_GenProduct" class="form-control lastname" placeholder="Last Name (required)" type="text">
          </div>
        </div>

        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required id="email_address_RentProduct"  value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['email']; }  ?>" name="email_address_GenProduct" class="form-control StreetAddress"  placeholder="Email address (required)" type="text">
          </div>
        </div>


        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required id="phone_number_RentProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['phone_number']; }  ?>" name="phone_number_GenProduct" class="form-control StreetAddress" placeholder="Telephone Number (required)" type="text">
          </div>
        </div>
        <div class="Emailtext_area_penal"></div>
          <input type='hidden' name='productId_GenProduct' value='<?php  echo $detail[0]->ListID; ?>'>
          <input type='hidden' name='productName' value='<?php echo $detail[0]->ProductName; ?>'>
          <input type='hidden' name='brandName' value='<?php echo $detail[0]->BrandName; ?>'>
          <input type='hidden' name='versionName' value='<?php echo $detail[0]->VersionName; ?>'>
          <input type='hidden' name='sku' value='<?php echo $detail[0]->StockKeepingUnit; ?>'>
          <textarea name="message_GenProduct" id='message_RentProduct' required>Hi There!&#13;&#10; I have some questions about this "<?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>".&#13;&#10;Please reach out to me about this.&#13;&#10;Thanks</textarea>
          <div id="recaptcha7" class='g-recaptcha-response'></div>
           <!-- <div id='recaptcha' class='g-recaptcha-response'></div> -->
        </div>
        <div class="EmailSubmiuttt_penal green_color">
          <input type='submit' class="btn drop_ad" name='email_GenProduct' value='Send Email' id='email_GenProduct'>
        </div>
      </form>
      </div>
      
      </div>

        <div class="Email_bottom_foter">
          <h1>Questions</h1>
          <div class="Email_bottom_foter_content">
            <h4>How much does it cost to rent equipment from Global Fitness?</h4>
            <p>The cost vary by model, however we can say it costs a fraction of the purchase price and it included maintenance for the life of the contract. We also service the rental fleet on a quarterly basis with free replacement if a unit fails. We charge up front and you pay for delivery only.</p>
          </div>
          <div class="row footer_bottom">
            <div class="col-md-12 col-sm-12">
              <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
            </div>
          </div>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>


<div class="modal fade" id="requestacall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="paddingg" style="padding: 0px; margin: 10px 20px 30px; border: 0px solid rgb(204, 204, 204);">
      <div class="modal-header">
      <div class="auttoo">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title Request_A_Call" id="myModalLabel">Request a Call</h4>
        
        </div>
      </div>
      <form action="<?php echo base_url('site/twilliocalling');?>">
      <div class="modal-body">       
      <div class="dumy_important">
        <p>Please enter the number you would like our staff to reach out to you on.</p>
      </div>
      <div class="box">
        <input type="text" required name="number" placeholder="Telephone Number">
      </div> 
      </div>
      <div class="modal-footer">
        <div class="submit">
          <input type="submit" value="Call Me Now" style="font-weight: 600;">
        </div><!--end submit-->              
      </div>
      </form>
      </div>
    </div>
  </div>
</div> 

<div class="modal fade" id="myproductlist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="paddingg" style="padding: 0px; margin: 10px 20px 30px; border: 0px solid rgb(204, 204, 204);">
      <div class="modal-header">
      <div class="auttoo My_List_Equipment_Inquiry">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -17px -122px 0px 0px ! important;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title Request_A_Call" id="myModalLabel">My List <span>Equipment Inquiry</span></h4>
        
        </div>
      </div>
      <form action="" method="post" id="clickcall_me">
      <div class="modal-body">       
        <span style='color:red;' id='display_error_call'></span>
      
      <div class="box">
        <input type="text" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['firstname']; }  ?>" id="first_last" required name="name" placeholder="First & Last Name">
      </div> 

      <div class="box">
        <input type="text" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['email']; }  ?>" id="email_first_last" required name="email" placeholder="Email">
      </div>

      <div class="box">
        <input type="text" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['phone_number']; }  ?>" name="number" placeholder="Telephone(optional)">
      </div>


      </div>
      <div class="modal-footer">
        <div class="submit">
          <input type="submit" id="clickcallme_now" value="Download List" style="font-weight: 600;">
        </div><!--end submit-->              
      </div>
      </form>
      </div>
    </div>
  </div>
</div> 



<!-- Register  -->

<div class="modal fade myModal_email" id="myModal_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
      <div class="paddingg">
        <div class="Email_auttoo">
          <h4 class="modal-title" id="myModalLabel">Create an Account</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png"> 
           </button>
        
       </div>
      <div class="modal-body">

      <div class="box">
        <span class="error" id='register_error' style="color:red;"></span>
      </div>
      
      <form  method='post' id="register_form">
        <div class="first_penal_ship">
          <div class="form-group">
            <input required class="form-control firstname" name="first" placeholder="First Name (required)" type="text">
          </div>
          <div class="form-group_second">
            <input required name="last" class="form-control lastname" placeholder="Last Name (required)" type="text">
          </div>
        </div>


        <div class="fourth_penal_ship">
          <div class="form-group">
            <input  name="middle" class="form-control StreetAddress" placeholder="Middle(optional)" type="text">
          </div>
        </div>

         <div class="fourth_penal_ship">
          <div class="form-group">
            <input required name="username" class="form-control StreetAddress" placeholder="Username(required)" type="text">
          </div>
        </div>

        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required name="email" class="form-control StreetAddress" placeholder="Email address (required)" type="text">
          </div>
        </div>

        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required name="password" class="form-control StreetAddress" placeholder="Password (required)" type="password">
          </div>
        </div>


        <div class="fourth_penal_ship">
          <div class="form-group">
            <input required name="phone_number" class="form-control StreetAddress" placeholder="Telephone Number (required)" type="text">
          </div>
        </div>
       
         
        <div id="recaptcha3" class='g-recaptcha-response'></div>
           <!-- <div id='recaptcha' class='g-recaptcha-response'></div> -->
        </div>
        <div class="EmailSubmiuttt_penal green_color">
          <input type='submit' class="btn drop_ad" id="submit_register" value='Register'>
        </div>

      </form>
      </div>
      
      </div>        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for register -->






<!-- Request a call submit -->
<div class="modal fade myModal_email" id="request_call" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog email_model_box">
    <div class="modal-content">
      <div class="modal-header">
        <div class="Border_PopUP">
        <div class="paddingg">
        <div class="Email_auttoo">
          
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Call successfully sent</h4>
 
        </div>
      <div class="modal-body">
        <div class="Email_successfull_content_PEnaL">
          You should receive a call shortly that will connect you to one of our fitness professionals.
          <br>
          Thanks and stay healthy!
          <br>
  <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
          </div>

      </div>

      <div class="row footer_bottom footer_bottom_popup">
        <div class="col-md-12 col-sm-12">
          <p>Copyright &copy; 2016 Global Fitness, Inc. All rights reserved.</p>
        </div>
      </div>

      </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>
</div>
<!-- Modal for request a call end -->





<?php 
  if(isset($_SESSION['errorto']) && ($_SESSION['errorto']==1)){
    ?>
      <script>
    $("#request_call").modal('show'); 
    setTimeout(function(){
      $('#request_call').modal("hide");
    }, 3000);
  </script>
    <?php
    unset($_SESSION['errorto']);
  }
?>



<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
<script src="<?php echo base_url('public/assets/js/jquery.bxslider.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/jquery.easing.1.3.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/starjs/star-rating.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/index.js'); ?>"></script><!---->
<script src="<?php echo base_url('public/assets/js/myscript.js'); ?>"></script>


      <?php 
        if(isset($_POST['firstname']) && isset($_POST['message'])):
          ?>
            <script>
            $("#myModal_email_Sucessfull").modal('show'); 
            </script>
          <?php
       endif;
      ?>

      <?php 
        if(isset($_POST['firstname_waitlist']) && isset($_POST['message_waitlist']) && !isset($_SESSION['waitlest_error'])):
          ?>
            <script>
            $("#myModal_email_waitlist").modal('show'); 
            </script>
          <?php
       endif;
      ?>

      <?php 
        if(isset($_SESSION['waitlest_error'])):
          ?>
            <script>
            $("#myModal_email_waitlist_error").modal('show'); 
            </script>
          <?php
       endif;
      /////////////////////my code ///////////////////
      ?>
      <?php 
        if(isset($_POST['firstname_GenProduct']) && isset($_POST['message_GenProduct']) && !isset($_SESSION['GenProduct_error'])):
          ?>
            <script>
            $("#myModal_email_GenProduct").modal('show'); 
            </script>
          <?php
       endif;
      ?>

       <?php 
        if(isset($_SESSION['GenProduct_error'])):
          ?>
            <script>
            $("#myModal_email_GenProduct_error").modal('show'); 
            </script>
          <?php
       endif;
      ///////////my code end//////////////////////
      ?>



        <?php 
        if(isset($_POST['firstname_RentProduct']) && isset($_POST['message_RentProduct']) && !isset($_SESSION['rentProduct_error'])):
          ?>
            <script>
            $("#myModal_email_RentProduct").modal('show'); 
            </script>
          <?php
       endif;
      ?>

       <?php 
        if(isset($_SESSION['rentProduct_error'])):
          ?>
            <script>
            $("#myModal_email_RentProduct_error").modal('show'); 
            </script>
          <?php
       endif;
      ?>



      <?php 
        if(isset($_POST['firstname_SellProduct']) && isset($_POST['message_SellProduct']) && !isset($_SESSION['SellProduct_error'])):
          ?>
            <script>
            $("#myModal_email_SellProduct").modal('show'); 
            </script>
          <?php
       endif;
      ?>

       <?php 
        if(isset($_SESSION['SellProduct_error'])):
          ?>
            <script>
            $("#myModal_email_SellProduct_error").modal('show'); 
            </script>
          <?php
       endif;
      ?>

      <?php if((isset($_POST['productId']) && ($_POST['message']=="")) || isset($_POST['review_id'])){ ?>

        <script>
              $("#review_submit").modal('show'); 
        </script>


      <?php
      }
      ?>



<!-- Serch_hide -->

<script type="text/javascript">
$(document).click(function(event) { 
    if(!$(event.target).closest('.mydisplay').length) {
      if($('.mydisplay').is(":visible")) {
          $('.mydisplay').hide();
      }
    }        
})
</script>
<!-- Serch_hide -->
<script type="text/javascript">
jssor_1_slider_init();
</script>



<script src="https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit" async defer></script>
    <script>
      var recaptcha1;
      var recaptcha2;
      var recaptcha3;
      var recaptcha4;
      var recaptcha5;
      var recaptcha6;
      var recaptcha7;
      var myCallBack = function() {
        //Render the recaptcha1 on the element with ID "recaptcha1"
        recaptcha1 = grecaptcha.render('recaptcha1', {
          'sitekey' : '6Ldd7AoUAAAAAGMNn1YkptZO7s9TY2xHe7nW45ma', //Replace this with your Site key
          'theme' : 'light'
        });
        
        //Render the recaptcha2 on the element with ID "recaptcha2"
        recaptcha2 = grecaptcha.render('recaptcha2', {
          'sitekey' : '6Ldd7AoUAAAAAGMNn1YkptZO7s9TY2xHe7nW45ma', //Replace this with your Site key
          'theme' : 'light'
        });

         recaptcha3 = grecaptcha.render('recaptcha3', {
          'sitekey' : '6Ldd7AoUAAAAAGMNn1YkptZO7s9TY2xHe7nW45ma', //Replace this with your Site key
          'theme' : 'light'
        });

         recaptcha4 = grecaptcha.render('recaptcha4', {
          'sitekey' : '6Ldd7AoUAAAAAGMNn1YkptZO7s9TY2xHe7nW45ma', //Replace this with your Site key
          'theme' : 'light'
        });
         recaptcha5 = grecaptcha.render('recaptcha5', {
          'sitekey' : '6Ldd7AoUAAAAAGMNn1YkptZO7s9TY2xHe7nW45ma', //Replace this with your Site key
          'theme' : 'light'
        });
         recaptcha6 = grecaptcha.render('recaptcha6', {
          'sitekey' : '6Ldd7AoUAAAAAGMNn1YkptZO7s9TY2xHe7nW45ma', //Replace this with your Site key
          'theme' : 'light'
        });
              recaptcha7 = grecaptcha.render('recaptcha7', {
          'sitekey' : '6Ldd7AoUAAAAAGMNn1YkptZO7s9TY2xHe7nW45ma', //Replace this with your Site key
          'theme' : 'light'
        });
      };
    </script>

<script type="text/javascript">
$(function() {
    $('#reviewlink_c').click(function() {
      console.log('ggg');
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
        if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    });
});
</script>

<script type="text/javascript">
      $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    });
</script>

 <?php if($this->session->flashdata('fdsjfkjsdf')): ?>
<script>
location.href = '<?php echo base_url()."/site/downexcel" ?>';
</script> 
<?php endif; ?>



</body>
</html>
