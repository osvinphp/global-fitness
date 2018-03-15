<input type="hidden" value="<?php if(isset($_SESSION['firstname'])){ echo '1'; }else{ echo '0'; } ?>" id="checklooged">
<input type="hidden" value="0" id="alertsubcheck">
<style>
.Email_auttoo .modal-title {
color: #33cc33!important;
font-family: 'PT Sans', sans-serif !important;
font-size: 26px;
}

.Email_successfull_content_PEnaL {
font-size: 16px !important;
font-family: 'PT Sans', sans-serif !important;
line-height: 22px;
font-weight: 400 !important;
}

.proDuct_Name {
color: #000000 !important;
font-family: 'PT Sans', sans-serif !important;
font-style: italic;
font-weight: normal;
}

.footer_bottom_popup p {
color: #444444 !important;
margin: 0 !important;
padding: 0 !important;
font-size: 12px !important;
}

.row.footer_bottom_popup {
padding: 0 !important;
}
/*accordian_footer*/


/*******************************
* ACCORDION WITH TOGGLE ICONS
* Does not work properly if "in" is added after "collapse".
* Get free snippets on bootpen.com
*******************************/
.panel-group .panel {border-radius: 0; box-shadow: none; border-color: #fff; }
.panel-default > .panel-heading {
padding: 0;
border-radius: 0;
color: #212121;
background-color: #fff;
border-bottom: 1px solid #ccc;
}
.panel-title a {font-size: 16px; font-family: 'PT Sans', sans-serif !important; color:#525252 !important}
.panel-title > a {
display: block;
padding: 10px 13px 10px 0;
text-decoration: none;
}
.more-less {float: right; color: #007fff; font-size: 9px; font-weight: 100;  }
.panel-default > .panel-heading + .panel-collapse > .panel-body {border-top-color: #EEEEEE; }

.demo {padding-top: 60px; padding-bottom: 110px; }
.demo-footer {position: fixed; bottom: 0; width: 100%; padding: 15px; background-color: #212121; text-align: center; }
.demo-footer > a {text-decoration: none; font-weight: bold; font-size: 14px; color: #fff; font-family: 'PT Sans', sans-serif !important; }

#responsive_footer_menu .footer_nav a {
color: #222222;
font-family: 'PT Sans', sans-serif !important;
font-size: 18px;
font-weight: 100; line-height: 28px;
text-decoration: none;
}
#responsive_footer_menu .panel-body {
padding: 13px 0; margin-top:-1px; 
border-bottom: 1px solid #f7f7f7;
}
         
            /*#fdw-sidebar {width: 310px; background: #f6f6f6; position: absolute; right: 20px; top: 5px; bottom: 0; border: 0; padding-left: 5px; }
            #fdw-sidebar .fixed {position: fixed; top: 1px; }*/

/*accordian_footer*/
  .displaynone{
  	display: none;
  }

</style>
<script type="text/javascript">
$(document).ready(
    function()
    {    $("#hideThis,#srch-term_aa").click(function(){
         $('#showThis').removeClass('displaynone');
         $('#hideThis,#srch-term_aa').addClass('displaynone');
      });
          $("#showbrand").click(function(){
                  $('#showbrand').removeClass('displaynone');
                  $('#hidebrand').addClass('displaynone');
                });
             $("#Brand_Cust,#PieceProduct_Cust,#Availability_Cust,#CategoryProduct_Cust,#ConditionProduct_Cust,#PriceProduct_Cust,#RatingProduct_Cust").click(function(){
            $('#showbrand').addClass('displaynone');
            $('#hidebrand').removeClass('displaynone');
        });
                  $("#PieceProduct_Cust,#Brand_Cust,#Availability_Cust,#CategoryProduct_Cust,#ConditionProduct_Cust,#PriceProduct_Cust,#RatingProduct_Cust").click(function(){
            $('#showThis').addClass('displaynone');
            $('#hideThis').removeClass('displaynone');
        });
        $(".mainvalclick").click(function(e){
          e.preventDefault();
          $checked = $(this).attr('id');
          $(this).parents('ul').find('input[type=checkbox]:checked').prop('checked',false);
          $("."+$checked).attr('checked', true); 
          $(this).parents(".testmyselfsubmit").find("form").submit();       
        });

        $(".clickmore").click(function(e){
          e.preventDefault();
          $val = $(this).data('val');
          if($val=="more"){
            $(this).parents('ul').find('li.displaynone').removeClass('displaynone').addClass('checkedok');
            $(this).parents('ul').find('li.showmore').addClass('displaynone');
            $(this).parents('ul').find('li.showless').removeClass('displaynone');
          }
          else{
            $(this).parents('ul').find('li.checkedok').removeClass('checkedok').addClass('displaynone');
            $(this).parents('ul').find('li.showless').addClass('displaynone');
            $(this).parents('ul').find('li.showmore').removeClass('displaynone');
          }               
        }); 
    }
);
</script>
<script type="text/javascript">
  function suggestionlist(){
     var key = $("#showbrand").val();
     alert(key);return false;
  $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Site/suggestion_live",
        data: "value="+key,
        success: function(html) { 
              var mydata = JSON.parse(html);
               $('.BrandRESPON li').addClass('displaynone');
              $.each(mydata, function(index){
            var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }     
    console.log(vars[hash[0]]);
    if ( typeof vars[hash[0]] == 'undefined'){
        $(".BrandRESPON").append('<li class="hello'+this.ID+'"><a href="?brand='+this.Name+'"><span class="tab">'+this.Name+'</span></a></li>'); }
        else{
           $(".BrandRESPON").append('<li class="hello'+this.ID+'"><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&brand='+this.Name+'"><span class="tab">'+this.Name+'</span></a></li>');   
            }
          });             
        },
    });
        return false;

  }
</script>
<div class="footer_outer">
<div class="container-fluid">
<div class="row footer PADD_ThREee">
    <div class="col-md-3 col-sm-3">
        <h2>Shop</h2>
        <ul class="footer_nav">
          <li><a href="<?php echo base_url('/page'); ?>/Fitness-Equipment-Sales">Sell Fitness Equipment</a></li>
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
</div>

<section id="responsive_footer_menu">
<div class="container-fluid">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="more-less glyphicon glyphicon-plus"></i> About Us</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
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
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="more-less glyphicon glyphicon-plus"></i>Support</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                     <ul class="footer_nav">
                        <li><a href="<?php echo base_url('/page'); ?>/Manuals-&-Liriture">Manuals & Literature</a></li>
                        <li><a href="https://blog.globalfitness.com/category/product-help/" target="_blank">Product Help</a></li>
                        <li><a href="<?php echo base_url('/page'); ?>/Register-Purchase">Register Purchase</a></li>
                        <li><a href="<?php echo base_url('/page'); ?>/Replacement-Parts">Replacement Parts</a></li>
                        <li><a href="<?php echo base_url('/page'); ?>/Schedule-Service">Schedule Service</a></li>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="more-less glyphicon glyphicon-plus"></i>Connect with Us</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
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
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingfour">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                            <i class="more-less glyphicon glyphicon-plus"></i>Shop Fitness Equipment</a>
                    </h4>
                </div>
                <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                    <div class="panel-body">
                    <ul class="footer_nav">
                        <li><a href="<?php echo base_url('/page'); ?>/Fitness-Equipment-Sales">Sell Fitness Equipment</a></li>
                        <li><a href="http://www.labistour.com/globalfitnessrentals.com" target="_blank">Rent Fitness Equipment</a></li>
                        <li><a href="<?php echo base_url('/page'); ?>/Educational-Sales">Educational Sales</a></li>
                        <li><a href="<?php echo base_url('/page'); ?>/Donations">Donations</a></li>
                        <li><a href="<?php echo base_url('/page'); ?>/Government-Sales">Government Sales</a></li>
                        <li><a href="<?php echo base_url('/page'); ?>/Gym-Owners">Gym Owners</a></li>
                        <li><a href="<?php echo base_url('/page'); ?>/International-Sales">International Sales</a></li>
                    </ul>
                    </div>
                </div>
            </div>
        </div><!-- panel-group -->
    </div>
</div>
</div>
</section>
<style>/*  #unddd {background: #dad; font-weight: bold; font-size: 16px; }*/  </style>
<section id="BoTTom_footeR">
<div class="container-fluid">
<div class="row footer_bottom PADD_ThREee">
    <div class="col-md-12 col-sm-12">
        <p>Copyright © 2017 Global Fitness, Inc. All rights reserved.</p>
    </div>
</div>
</div>
</section>
<!-- filter_responsive_view_popup -->
<div class="modal fade " id="myModal" role="dialog">
  <div class="modal-dialog ">
      <div class="modal-content FILTER_VIEW_POP_Up">
          <div class="modal-header">
              <button type="button" class="close colo_blue pull-left" data-dismiss="modal" aria-label=""> Reset <span>×</span></button>
              <button type="button" class="DONE_BUTTON_filter">Apply</button>
          </div>
          <div class="modal-body">
            <form role="form" method="post" action="" class="form-horizontal">
                <!-- filter_view_like_apple -->
                <!-- panel-group -->
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default FILETR_SIDER">
                        <div class="panel-heading" role="tab" id="Availability_CustRESPON">
                            <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#AvailabilityRESPON" aria-expanded="true" aria-controls="AvailabilityRESPON">
                                  <i class="more-less glyphicon glyphicon-plus"></i>Availability</a>
                            </h4>
                        </div>
                        <div id="AvailabilityRESPON" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Availability_CustRESPON">
                            <div class="panel-body">
                                <ul class="filter_view_laTEST_nav Availability">
                                    <?php if(isset($_GET)  && !empty($_GET)){ ?>
                                    <li>
                                        <a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&Availability=<?php echo  'In Stock'; ?>">
                                            <?php echo  "In Stock"; ?>
                                        </a>
                                    </li>
                                    <?php
                                        } 
                                          else{ ?>
                                        <li>
                                            <a href="?Availability=<?php echo  'In Stock'; ?>">
                                                <?php echo  "In Stock"; ?>
                                            </a>
                                        </li>
                                        <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default FILETR_SIDER">
                        <div class="panel-heading" role="tab" id="Brand_CustRESPON">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#BrandRESPON" aria-expanded="false" aria-controls="BrandRESPON">
                                  <i class="more-less glyphicon glyphicon-plus"></i>Brand</a>
                            </h4>
                        </div>
                        <div class="input-group Filter_PP_SERCH_cont displaynone" id="showbrand">
                            <div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                            <input type="text" onkeyup="suggestionlist();" class="form-control" placeholder="Search Brand" name="srch-term" id="ng_data">
                        </div>
                        <div id="BrandRESPON" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Brand_CustRESPON">
                            <div class="panel-body">
                                <ul class="filter_view_laTEST_nav Brand" id ="brand"> 
                                    <?php
                                          $k = 0;
                                           foreach($brand as $amp){
                                            $k++;
                                            if($strength_equipment == 'category'){
                                                if(isset($_GET) && !empty($_GET)){
                                                        ?>
                                        <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&brand=<?php echo  $amp->BrandName; ?>"><?php echo  $amp->BrandName; ?></a></li>
                                        <?php }
                                        else{
                                         ?>
                                        <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="?brand=<?php echo  $amp->BrandName; ?>"><?php echo  $amp->BrandName; ?></a></li>
                                        <?php 
                                        }
                                     }        if(isset($_GET) && !empty($_GET) && $strength_equipment != 'category'){
                                                        ?>
                                        <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&brand=<?php echo  $amp->Name; ?>"><?php echo  $amp->Name; ?></a></li>
                                        <?php }
                                          else{
                                           ?>
                                        <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="?brand=<?php echo  $amp->Name; ?>"><?php echo  $amp->Name; ?></a></li>
                                        <?php 
                                            }
                                          }
                                       if(count($brand)>9){
                                                        ?>
                                        <a href="#" id="hidebrand">
                                            <div class="input-group Filter_PP_SERCH_cont" id="hidebrand">
                                                <div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                                                <input type="text" class="form-control" placeholder="Search Brand" name="srch-term" id="srch-term_aa">
                                            </div>
                                        </a>
                                        </li>
                                        <?php
                                          }
                                        ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default FILETR_SIDER">
                        <div class="panel-heading" role="tab" id="CategoryProduct_CustRESPON">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#CategoryProductRESPON" aria-expanded="false" aria-controls="CategoryProductRESPON">
                                  <i class="more-less glyphicon glyphicon-plus"></i>Category</a>
                            </h4>
                        </div>
                        <div id="CategoryProductRESPON" class="panel-collapse collapse" role="tabpanel" aria-labelledby="CategoryProduct_CustRESPON">
                            <div class="panel-body">
                                <ul class="filter_view_laTEST_nav Category">
                                    <?php   
                                      $k = 0;
                                      foreach($mmcategory as $br){
                                          $k++;
                                      ?>
                                    <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="?category=<?php echo $br->Name ; ?>"><?php echo $br->Name ; ?></a></li>
                                    <?php
                                          }
                                    if(count($mmcategory)>9){
                                                    ?>
                                        <li class="showmore">
                                            <a href="#" class="clickmore" data-val="more" style='color: #337ab7 !important;'>More Category </a>
                                        </li>
                                        <li class="showless displaynone">
                                            <a href="#" data-val="less" class="clickmore" style='color: #337ab7 !important;'>Less Category </a>
                                        </li>
                                        <?php
                                            }
                                          ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default FILETR_SIDER">
                        <div class="panel-heading" role="tab" id="ConditionProduct_CustRESPON">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ConditionProductRESPON" aria-expanded="false" aria-controls="ConditionProductRESPON">
                                  <i class="more-less glyphicon glyphicon-plus"></i>Condition</a>
                            </h4>
                        </div>
                        <div id="ConditionProductRESPON" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ConditionProduct_CustRESPON">
                            <div class="panel-body">
                                <ul class="filter_view_laTEST_nav Condition">
                                    <?php
                                      foreach($condition as $cr){
                                      if(isset($_GET)  && !empty($_GET)){ 
                                            
                                            ?>
                                        <li> <a id="condition<?php echo  $cr->Name; ?>" href="<?php print_r($_SERVER['REQUEST_URI']); ?>&condition=<?php echo   $cr->Name; ?>"><?php echo   $cr->Name; ?></a></li>
                                        <?php } else{ ?>
                                        <li> <a id="condition<?php echo  $cr->Name; ?>" href="?condition=<?php echo   $cr->Name; ?>"><?php echo   $cr->Name; ?></a></li>
                                        <?php } 
                                          }
                                          ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default FILETR_SIDER">
                        <div class="panel-heading" role="tab" id="PieceProduct_CustRESPON">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#PieceProductRESPON" aria-expanded="false" aria-controls="PieceProductRESPON">
                                  <i class="more-less glyphicon glyphicon-plus"></i>Piece</a>
                            </h4>
                        </div>
                        <div class="input-group Filter_PP_SERCH_cont displaynone" id="showThis">
                            <div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                            <input type="text" onkeyup="suggestion();" class="form-control" placeholder="Search Piece" name="srch-term" id="sg_data">
         