<?php
$totalpricee=substr($_SESSION['totalPrice'], 1);
$totaltaxx=$_SESSION['totalTaxOccur'];
// echo "<pre>"; print_r($order); die;
?>
<script>
ga('require', 'ecommerce');
ga('ecommerce:addTransaction', {
'id': '1234', // Transaction ID. Required.
'affiliation': 'Global Status', // Affiliation or store name.
'revenue': '<?php echo $totalpricee; ?>', // Grand Total.
'shipping': '5', // Shipping.
'tax': '<?php echo $totaltaxx; ?>' // Tax.
});

ga('ecommerce:addItem', {
'id': '1234', // Transaction ID. Required.
'name': 'Fluffy Pink Bunnies', // Product name. Required.
'sku': 'DD23444', // SKU/code.
'category': 'Party Toys', // Category or variation.
'price': '11.99', // Unit price.
'quantity': '1' // Quantity.
});
ga('ecommerce:send');
</script>


<style type="text/css">
.checkout_tittle {float: left; width: 100%; margin-top: 10px; margin-bottom: 10px; }
.checkout_tittle h3 {margin: 0; }
.EDITCHRCKOUT_NEW {padding: 0 28%; border: 1px solid #007fff; }
.ChackOUT_NEW_CART_IMg {width: 120px; margin: auto; height: 90px; }
.H_TAG_NO_MGN {margin: 0px; }
h5{font-size: 15px; }
.HALF_PENAL {width: 50%; float: left; text-align: right; }
.PRICE_BOX_NEW {float: left; width: 100%; margin-bottom: 12px; }
.NEW_BLUCOLOR{color: #007fff;}
.NEW_GREENCOLOR{color: #33cc33;}
.NEW_BRD{border-bottom: 1px solid #ccc; margin-top: 5px;margin-bottom: 10px;}
.PADDREmoVE{padding: 0px;}
.checkout-wrapper{padding-top: 40px; padding-bottom:40px; background-color: #fafbfa;}
.panel{margin-bottom: 0px;}
.checkout-step {border-top: 1px solid #ccc; color: #666; font-size: 14px; padding: 10px 0px; position: relative; }
.checkout-step-number {border-radius: 0; border: 0px solid #666; display: inline-block; font-size: 22px; height: 32px; margin-right: 0px; padding: 0px; text-align: center; width: 32px; }
.checkout-step-title{ font-size: 24px;font-weight: 500;display: inline-block; margin: 0px;}
.checout-address-step .form-group{margin-bottom: 18px;display: inline-block;}
.form-group {width: 100%; }
.second_penal_ship {float: left; width: 100%; } 
.first_penal_ship {float: left; width: 100%; }
.third_penal_ship {float: left; margin-bottom: 0; width: 100%; }
.shipping_form_penal {float: left; padding: 0 0 0 0px !important; width: 100%; }
.checkout-step-body{padding-left: 0px; padding-top: 20px;}
.checkout-step-active{display: block;}
.checkout-step-disabled{display: none;}
.login-phone{display: inline-block;}
.login-phone:before {content: ""; font-style: normal; color: #333; font-size: 18px; left: 12px; display: inline-block; font: normal normal normal 14px/1 FontAwesome; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
.login-phone:after, .login-phone:before {position: absolute; top: 50%; -webkit-transform: translateY(-50%); transform: translateY(-50%); }
.login-phone .form-control {padding-left: 68px; font-size: 14px; }
.checkout-login .btn{height: 42px; line-height: 1.8;}
.otp-verifaction{margin-top: 30px;}
.checkout-sidebar{background-color: #fff; border:1px solid #eaefe9; padding: 30px; margin-bottom: 30px;}
.checkout-sidebar-merchant-box{background-color: #fff;border:1px solid #eaefe9; margin-bottom: 30px;}
.checkout-total{border-bottom: 1px solid #eaefe9; padding-bottom: 10px;margin-bottom: 10px; }
.checkout-invoice{display: inline-block;width: 100%;}
.checout-invoice-title{float: left; color: #30322f;}
.checout-invoice-price{float: right; color: #30322f;}
.checkout-charges{display: inline-block;width: 100%;}
.checout-charges-title{float: left; }
.checout-charges-price{float: right;}
.charges-free{color: #43b02a; font-weight: 600;}
.checkout-payable{display: inline-block;width: 100%; color: #333;}
.checkout-payable-title{float: left; }
.checkout-payable-price{float: right;}
.checkout-cart-merchant-box{ padding: 20px;display: inline-block;width: 100%; border-bottom: 1px solid #eaefe9; padding-bottom: 20px; }
.checkout-cart-merchant-name{color: #30322f; float: left;}
.checkout-cart-merchant-item{ float: right; color: #30322f; }
.checkout-cart-products .checkout-charges{ padding: 10px 20px; color: #333;} 
.checkout-cart-item{ border-bottom: 1px solid #eaefe9; box-sizing: border-box; display: table; font-size: 12px; padding: 22px 20px; width: 100%;} 
.checkout-item-count{ float: left; }
.checkout-item-img{width: 60px; float: left;}
.checkout-item-name-box{ float: left; }
.checkout-item-title{ color: #30322f; font-size: 14px;  }
.checkout-item-price{float: right;color: #30322f; font-size: 14px; font-weight: 600;}
.checkout-viewmore-btn{padding: 10px; text-align: center;}
.header-checkout-item{text-align: right; padding-top: 20px;}
.checkout-promise-item {background-repeat: no-repeat; background-size: 14px; display: inline-block; margin-left: 20px; padding-left: 24px; color: #30322f; }
.checkout-promise-item i{padding-right: 10px;color: #43b02a;}
.BLC_COLOR{color: #444 !important;}
.box{color: #444; padding:0 20px; display: none; margin: 10px 0; }
label{ margin-right: 15px; }
.login-phone .box input {padding: 5px 8px; border: 1px solid #eeeded; margin: inherit; color: #444; }
.MG_BOTM {
  margin-bottom: 0;
  border-bottom: 0px solid #ccc;
  padding: 8px 0 0 0;
}
.box input {padding: 0 10px; border: 1px solid #ccc; margin: 0 15px 0 0; width: 100% !important; box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075); }
.continue_button_checkout_NEW {float: right; border: 1px solid #33cc33; padding: 4px 10px; border-radius: 5px; margin-right: 14px; }
.NEW_GREENCOLOR a {color: #33cc33; }
.ChaT_NEW {float: right; line-height: 30px; margin: 0 20px; }
.collapsed {color: #444444; }
.chackbox_right {float: right; width: 135px; }
.text_shipping {margin: 0; padding: 0 0 10px 10px; }
.cross_icon {color: #444; }
.FIFTY_BOX {float: left; width: 27%; margin-right: 3%; }
.FIFTY_BOX2 {float: left; width: 70%; }
#exampleInputEmail2 {width: 100%; }
.panel {background-color: #fff; border-radius: 0; -webkit-box-shadow: 0 0px 0px rgba(0, 0, 0, .05); box-shadow: 0 0px 0px rgba(0, 0, 0, .05);}
.shipping_title {color: #000; }
.form-group1 {margin-bottom: 15px; }
.PLACEORDER_AS_GUST{float: left; border: 1px solid #33cc33; padding: 4px 10px; border-radius: 5px; margin: 25px 0; }
a:hover, a:focus {color: #000; text-decoration: none; }
.DIFFRENT_LAYER{background: #fafafa; height: 20px; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; margin: 0px;}
/*.chackout_penal_heading > h3 {padding: 5px 50px; }*/
.chackout_penal_heading > h3 {margin: 0px 18px; border-bottom: 1px solid #ccc; padding: 8px 21px; }
.BORDER_CHECKout{border-top: 0px solid #ccc;}
.MG_LG {padding-left: 0; }
.MG_RG {padding-right: 0; }
.Ouestion_penal_left > h3 {font-size: 18px; color: #444; }
.Ouestion_penal_left > p {font-size: 16px; color: #666; }
.Ouestion_penal_right > h3 {font-size: 18px;color: #444; }
.Ouestion_penal_right > p {font-size: 16px; color: #666; }
.Ouestion_penal_left {float: left; margin-bottom: 21px; width: 87%; }
.Ouestion_penal_right {float: left; width: 94%; }
.DESKTOP_CHECKOUT{display: block;}
.MOBILE_CHECKOUT{display: none;}
.BDR {border-bottom: 1px solid #ccc; margin-bottom: 15px; display: none; }
.accordion-title.accordionTitle.js-accordionTrigger {font-size: 16px; text-align: justify; float: left; width: 85%; min-height: 50px; }
.arrw {float: right; margin: 6px 0 0; width: 20px; position: relative; right: -70px; top: 0px; }
.Chack_out_question_content {border-top: 0px solid #ccc !important; }
.accordionItem {width: 100%; }
.EDIT_BTN {display: inline-block; float: right; margin-right: 14px; }
#helloasasa {width: 48%; float: right; padding: 4px 0; }
#helloasasa1 {width: 48%; float: right; padding: 4px 0; }
#helloasasa2 {width: 48%; float: right; padding: 4px 0; }
#helloasasa3 {width: 48%; float: right; padding: 4px 0; }
.conTENT_TAXTAX_penal h4 {margin: 0; }
.RIGHT_ONE {float: right; width: 50% }
.Left_ONE {float: left; width: 50% }
.conTENT_TAXTAX_penal {float: left; width: 50%; }
.promo_COD {float: left; width: 130px; margin-right: 13px; }
.APPLYNOW {line-height: 33px; }

/*/////////////////////////----------POP UP CSS----------////////////////////////////////*/
/*/////////////////////////----------POP UP CSS----------////////////////////////////////*/
.modal-dialog.INSIDEDELIVERY_model_box {width: 100%; float: left; margin: 6% auto !important; border: 0px solid #ccc; }
.INSIDEDELIVERY_auttoo {float: left; width: 100%; padding: 0 20px; }
.INSIDEDELIVERY .close {color: #007fff !important; }
.INSIDEDELIVERY .close {color: #007fff; float: right; font-size: 2.5rem; font-weight: 700; line-height: 1; padding: 8px 0 0 0; opacity: 1; text-shadow: 0 1px 0 #fff; }
.INSIDEDELIVERY .modal-title {float: left; width: 95%; text-align: center; font-size: 32px; color: #444; font-weight: 600; }
.modal-title_small {float: left; width: 95%; text-align: center; font-size: 20px; color: #444; font-weight: 100; margin: 0px; }
.modal-content {border: 0px solid #999; }
.INSIDEDELIVERY_boDy{padding:0 0 10px 0px;}
.insidedelivery_bnr_img {border-bottom: 1px solid #ccc; }
.PADDCUT{padding: 0 30px;}
.OUESTION_TITLE {border-bottom: 1px solid #ccc; margin: 0 0 15px 0; padding: 10px 0; }
.POpUP_CHECKOUT .text_shipping {margin: 0 0 10px 0; padding: 0 0 0 0px !important; }
.pop_input {margin: 10px 0px 10px 20px; }
.NOTHENKS_TItle {color: #cc0000; float: left; width: 50%; }
.modal-open .modal {background: rgba(0, 0, 0, 0.8) none repeat scroll 0 0 !important; }
.YES_QUTEBTN {float: left; border: 1px solid #33cc33; padding: 4px 43px; border-radius: 5px; margin-top: 11px; /* display: inline-block; */ }
.delivery_pop_footer {border-top: 1px solid #ccc; float: left; width: 100%; }
.BORDER_CHACHOUT {
  border: 1px solid #ccc;
  padding: 0 15px;
  margin-bottom: 20px;
}
.form-inline {
  float: left;
}

.BOX_PAD {
  padding: 0 7%;
}

.checout-address-step {
  display: inline-block;
}

.FULL_WDTH{float: left; width: 100%;}
.FULL_WDTH .continue_button_checkout_NEW{margin-right: 0px;}
.checout-address-step1 {
  padding: 0 15px 0 0;
}
.payment_chack_prop_bottom .color_blue {
  padding: 0 0 0 35px !important;
}
.COD_TEXt{padding-right: 35px;}
.PADD_ZRo{padding: 0px;}

.HEADtext {
    float: left;
    width: 100%;
    padding: 5px 0 0 0;
    font-size: 28px;
    font-weight: bold;
}

/*/////////////////////////----------POP UP CSS----------////////////////////////////////*/
/*/////////////////////////----------POP UP CSS----------////////////////////////////////*/





/*/////////////////////////---------------RESPONSIVE START-----////////////////////////////////*/
/*/////////////////////////---------------RESPONSIVE START-----////////////////////////////////*/
@media only screen and (min-device-width:300px) and (max-device-width:768px) and (orientation:portrait){
.checkout_tittle h3 { font-size: 16px;}
.DESKTOP_CHECKOUT{display: none;}
.MOBILE_CHECKOUT{display: block;}
h5.PROMOCODE {font-size: 13px; font-weight: 500; }
section#CHECKOUT_NEW_SECTION {padding: 0 15px; }
.ChackOUT_NEW_CART_IMg {width: auto; }
.BDR {border-bottom: 1px solid #ccc; margin-bottom: 15px; display: block; }
.checkout-step-title {font-size: 16px; }
.checkout-step-number {font-size: 16px; }
.checkout-step-body {padding-top: 0; padding-left: 20px; }
.FIFTY_BOX {width: 60%; }
.checout-address-step .form-group {margin-bottom: 8px; }
.FIFTY_BOX2 {float: left; width: 100%; }
h5.PRODUCT_FONT {font-size: 13px; line-height: 20px; }
.SHIPPING_PENL_BOX label {margin-right: 0; font-weight: normal; font-size: 13px; }
.checkout-step {padding: 10px 0px; }
.ChaT_NEW {float: left; line-height: 30px; margin: 0 10px; }
.chackout_penal_heading > h3 {padding: 5px 0px; }
.payment_chack_prop_bottom {padding: 0 0 0 26px !important; }
.EDITCHRCKOUT_NEW {border: 0px solid #007fff; color: #007fff; }

/*popupcss*/
.INSIDEDELIVERY .modal-title {float: left; width: 93%;font-size: 16px;line-height: 19px; }
.modal-title_small { font-size: 14px;}
.delivery_pop_footer {width: 100%; text-align: center; display: inline-block; }
.NOTHENKS_TItle { color: #cc0000; float: right; width: 100%; margin: 26px 0; }
.YES_QUTEBTN {float: none; border: 1px solid #33cc33; padding: 4px 43px; border-radius: 5px; margin-top: 11px; display: inline-block; width: 183px; margin: auto; }
.modal-dialog.INSIDEDELIVERY_model_box {margin: 6% auto !important; }
.checkout-step-number {text-align: left; }
/*popupcss*/

}
@media only screen and (min-device-width:300px) and (max-device-width:768px) and (orientation:landscape){
.checkout_tittle h3 { font-size: 16px;}
.DESKTOP_CHECKOUT{display: none;}
.MOBILE_CHECKOUT{display: block;}
h5.PROMOCODE {font-size: 13px; font-weight: 500; }
section#CHECKOUT_NEW_SECTION {padding: 0 15px; }
.ChackOUT_NEW_CART_IMg {width: auto; }
.BDR {border-bottom: 1px solid #ccc; margin-bottom: 15px; display: block; }
.checkout-step-title {font-size: 16px; }
.checkout-step-number {font-size: 16px; }
.checkout-step-body {padding-top: 0; }
.FIFTY_BOX {width: 60%; }
.checout-address-step .form-group {margin-bottom: 8px; }
.FIFTY_BOX2 {float: left; width: 100%; }
h5.PRODUCT_FONT {font-size: 13px; line-height: 20px; }
.SHIPPING_PENL_BOX label {margin-right: 0; font-weight: normal; font-size: 13px; }
.checkout-step {padding: 10px 0px; }
.ChaT_NEW {float: left; line-height: 30px; margin: 0 10px; }
.chackout_penal_heading > h3 {padding: 5px 0px; }
.payment_chack_prop_bottom {padding: 0 0 0 26px !important; }
.EDITCHRCKOUT_NEW {border: 0px solid #007fff; color: #007fff; }
/*popupcss*/
.INSIDEDELIVERY .modal-title {float: left; width: 93%;font-size: 17px;line-height: 19px; }
.delivery_pop_footer {width: 100%; text-align: center; display: inline-block; }
.NOTHENKS_TItle { color: #cc0000; float: right; width: 100%; margin: 26px 0; line-height: 35px }
.YES_QUTEBTN {float: none; border: 1px solid #33cc33; padding: 4px 43px; border-radius: 5px; margin-top: 15px; display: inline-block; width: 183px; margin: auto; }
.modal-dialog.INSIDEDELIVERY_model_box {margin: 6% auto !important; }
/*popupcss*/

}
</style>
<div class="margen_top">
    <div class="container-fluid">
    </div>
</div>
<section id="CHECKOUT_NEW_SECTION">
    <div class="container">
        <div class="BORDER_CHACHOUT">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 PADDREmoVE">
                    <div class="INSIDEDELIVERY_model_box1">
                        <div class="modal-content1">
                            <div class="modal-header1">
                                <div class="INSIDEDELIVERY_auttoo">
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                                    <h2 class="modal-title HEADtext text-center">Did you know we offer inside delivery?</h2>
                                    <h4 class="modal-title_small HEADtext_small text-center">Just answer a few questions below and we can price it our in just a few hours.</h4>
                                </div>
                            </div>
                            <div class="modal-body INSIDEDELIVERY_boDy">
                                <div class="insidedelivery_bnr_img">
                                    <img class="img-responsive"  alt="inside_delivery" src="<?php echo base_url(); ?>/public/assets/images/inside-delivery.png">
                                </div>
                                <div class="row PADDCUT">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h2 class="OUESTION_TITLE">Questions</h2>
                                    </div>
                                </div>
                                <form method="POST" action="<?php echo base_url('Site/myorders');?>"> 
                                <div class="row PADDCUT">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row POpUP_CHECKOUT">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h4>Residential or Business</h4>
                                                <p class="text_shipping">Is the location where this sevice be performed a residential home or a business?</p>
                                                <div class="POPUP_Radio">
                                                    <label>
                                                        <input type="radio" name="colorRadio" value="Residential"> Residential
                                                    </label>
                                                </div>
                                                <div class="POPUP_Radio">
                                                    <label>
                                                        <input type="radio" name="colorRadio" value="Business"> Business
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h4>Tractor Trailer Accessible</h4>
                                                <p class="text_shipping">A Tractor trailer is a Semi-trailer truck and some roads prohibit access to these large vehicles. Is the address in question tractor trialor accessible?</p>
                                                <div class="POPUP_Radio">
                                                    <label>
                                                        <input type="radio" name="colorRadio1" value="Yes"> Yes</label>
                                                </div>
                                                <div class="POPUP_Radio">
                                                    <label>
                                                        <input type="radio" name="colorRadio1" value="No"> No</label>
                                                </div>
                                                <div class="POPUP_Radio">
                                                    <label>
                                                        <input type="radio" name="colorRadio1" value="Unsure"> Unsure</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row POpUP_CHECKOUT">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h4>Main Floor or Second/Third Floor</h4>
                                                <p class="text_shipping">Will the unit be installed on the ground floor of the building or are there stairs that would need to be cimbed in order to complete the service?</p>
                                                <div class="POPUP_Radio">
                                                    <label>
                                                        <input type="radio" name="colorRadio2" value="Ground Floor"> Ground Floor
                                                    </label>
                                                </div>
                                                <div class="POPUP_Radio">
                                                    <label>
                                                        <input type="radio" name="colorRadio2" value="Yes, there are stairs involved."> Yes, there are stairs involved.
                                                    </label>
                                                </div>
                                                <div class="POPUP_Radio">
                                                    <label>
                                                        <input class="form-control pop_input" type="text" name="stairs" value="" placeholder="How many stairs?">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h4>Doors at the Delivery Location</h4>
                                                <p class="text_shipping">Are the doors through wich the unit will go at the delivery location standard or double doors? </p>
                                                <div class="POPUP_Radio">
                                                    <label>
                                                        <input type="radio" name="colorRadio3" value="Standard Doors"> Std. Doors</label>
                                                </div>
                                                <div class="POPUP_Radio">
                                                    <label>
                                                        <input type="radio" name="colorRadio3" value="Double Doors"> Double Doors</label>
                                                </div>
                                                <div class="POPUP_Radio">
                                                    <label>
                                                        <input class="form-control pop_input" type="text" name="width" value="" placeholder="Width in Inches">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row PADDCUT">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="delivery_pop_footer">
                                            <h4 ><a class="NOTHENKS_TItle" href="<?php echo base_url();?>Site/myorders">No Thanks</a></h4>
                                            <div>
                                                <input  class="NEW_GREENCOLOR YES_QUTEBTN" type="submit" name="whiteGlove"  value="Yes Quote Me"></input>
                                                <!-- <a href="<?php echo base_url();?>Site/myorders"> Yes Quote Me </a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- /.modal-content -->
                    </div>
                </div>
                <!--end colm-->
            </div><!--end row-->
        </div>
    </div>
</section><!--end section-->