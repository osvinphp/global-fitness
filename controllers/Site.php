<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Site extends CI_Controller {
	function __construct() {
    parent::__construct();
    $this->load->model(array("Site_model","Admin_model"));
    $this->load->library('session');
  }
  public function addingtocart($id,$data)
  {
    if($id!="" && $data!=''){

      $g = $_SESSION['upsellz'][$data];
      if(isset($_SESSION['productDetail']['myextracart'])){
        $_SESSION['productDetail']['myextracart'][] = $g;
        $_SESSION['productDetail']['counting'] += 1;
      }
      else{
        $hell = $_SESSION['upsellz'][$data];
        $_SESSION['productDetail']['myextracart'][] = $hell;
        $_SESSION['productDetail']['counting'] = 1;
      }
      redirect("/cart");
    }
    else
    {
      redirect("/cart");
    }
  }
  public function addcart($id)
  {
    if($id!=""){
      if(isset($_SESSION['productDetail']['addtocart'])){
        array_push($_SESSION['productDetail']['addtocart'],$id);
        $_SESSION['productDetail']['count'] += 1;
      }
      else{
        $_SESSION['productDetail']['addtocart'] = array($id);
        $_SESSION['productDetail']['count'] = 1;
      }
      redirect("/cart");
    }
    else
    {
     redirect("/cart");
   }
 }
 public function suggestion_live(){
  if (isset($_POST['data']))
  {
    $data = array(
      'key'=>'zFitnessPiece',
      'data1'=>$_POST['data']
      );
    $mylist = $this->Site_model->SuggestionList($data);
    echo json_encode($mylist);
  }
  if(isset($_POST['value'])){
    $data = array(
      'key'=>'zFitnessBrand',
      'data1'=>$_POST['value']
      );
    $mylist = $this->Site_model->SuggestionList($data);
    echo json_encode($mylist);
  }
}
public function step1(){
  if($this->session->userdata('userId')!=""){
   redirect("/cart");
 }
 else{
   $data['title'] ="Sign In | Global Fitness Checkout";
			//$data['category'] =  $this->Site_model->categorySearch();
   $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
   $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
   $data['menu']  = $this->Site_model->menusearch();
   $this->load->view('template/site/header',$data);
   $this->load->view('step1');
   $this->load->view('template/site/footer');
 }
}

public function shipingDetails()
{
    /*CONTROLLER:com.rdwy.ec.rexcommon.proxy.http.controller.ProxyApiController
    redir:/tfq561*/
    $LOGIN_USERID="test1234";
    $LOGIN_PASSWORD="testing";
    $BusId="67022240928";
    $BusRole="Shipper";
    $PaymentTerms="Prepaid";
    $OrigCityName="Akron";
    $OrigStateCode="OH";
    $OrigZipCode="44310";
    $OrigNationCode="USA";
    $DestCityName=$this->input->post('DestCityName');
    $DestStateCode=$this->input->post('DestStateCode');
    $DestZipCode=$this->input->post('DestZipCode');
    $DestNationCode="USA";
    $ServiceClass="STD";
    $PickupDate="20090128";
    $TypeQuery="QUOTE";
    $LineItemWeight1=$this->input->post('totalWeight');
    $LineItemNmfcClass1="70";
    $LineItemCount="1";
    $AccOption1="HOMD";
    $Acc="";
    $url = "https://my.yrc.com/dynamic/national/servlet?CONTROLLER=com.rdwy.ec.rexcommon.proxy.http.controller.ProxyApiController&redir=/tfq561&LOGIN_USERID=".$LOGIN_USERID."&LOGIN_PASSWORD=".$LOGIN_PASSWORD."&BusId=".$BusId."&BusRole=".$BusRole."&PaymentTerms=".$PaymentTerms."&OrigCityName=".$OrigCityName."&OrigStateCode=".$OrigStateCode."&OrigZipCode=".$OrigZipCode."&OrigNationCode=".$OrigNationCode."&DestCityName=".$DestCityName."&DestStateCode=".$DestStateCode."&DestZipCode=".$DestZipCode."&DestNationCode=".$DestNationCode."&ServiceClass=".$ServiceClass."&PickupDate=".$PickupDate."&TypeQuery=".$TypeQuery."&LineItemWeight1=".$LineItemWeight1."&LineItemNmfcClass1=".$LineItemNmfcClass1."&LineItemCount=".$LineItemCount."&AccOption1=".$AccOption1."&Acc";
          // $url = htmlentities($url);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transaction= curl_exec($curl);
    curl_close($curl);
    $transaction = simplexml_load_string($transaction);
    echo($transaction->BodyMain->RateQuote->RatedCharges->TotalCharges);
  }
  public function test(){
    $data['title'] ="Product Detail";
    $data['menu']  = $this->Site_model->menusearch();
    $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
    $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
    $this->load->view('template/site/header',$data);
    $this->load->view('test_view');
    $this->load->view('template/site/footer');
  }
  public function demo1(){
   $data['title'] ="demo1";
   $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
   $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
   $data['menu']  = $this->Site_model->menusearch();
   $this->load->view('template/site/header',$data);
   $this->load->view('demo1_view');
   $this->load->view('template/site/footer');
 }
 public function isdollaroff($discount, $ListID = NULL ){
   if(isset($ListID)){
    $ans = $this->Site_model->productdetail($ListID);
    if(empty($ans)){
      $discount = 0 ; 
    }
    else{
      $price = preg_replace('/[^A-Za-z0-9\-(.)]/', '', $ans[0]->Price);
      $discount = $price-$discount;
    }
  }
  $myamount = $_SESSION['totalPrice']-$discount;
  return $myamount;
}
public function ispercentoff($discount ,$ListID = NULL){
  $total1 = $_SESSION['totalPrice']* ($discount / 100);
  if(isset($ListID)){
    $ans = $this->Site_model->productdetail($ListID);
    if(empty($ans)){
      $total1 = 0;
    }else{
      $price = preg_replace('/[^A-Za-z0-9\-(.)]/', '', $ans[0]->Price);
      $total1 = $price* ($discount / 100);
    }
  }
  $myamount = $_SESSION['totalPrice'] - $total1;
  return $myamount;
}
  ///////// ajax for promocode /////////
public function mypromocode(){
  if (isset($_POST['PromoCode'])) {

    $mydate =  date("Y/m/d h:i");
    if(isset($_POST['PromoCode'])){
      $promocode = $_POST['PromoCode'];
      $total = $this->Site_model->checkpromo($promocode);
      $arrayProductPrice = $_SESSION['totalPrice'];
      $totalProductsPrice = str_replace(',', '', str_replace('$','',$arrayProductPrice));
      if(empty($total)){
       $_SESSION['display_message'] = "Invalid Promocode Entered" ;
       unset($_SESSION['PromoCode']);
     }
     elseif(!empty($total) && isset($_SESSION['PromoCode'])!=$total[0]->CoupnCode ){
      if(strtotime($total[0]->CouponStartDate) < strtotime($mydate) && strtotime($total[0]->CouponEndDate) > strtotime($mydate)){
        $_SESSION['PromoCode'] = $promocode;
        if(isset($total[0]->IsOrderSizeContingent) && $total[0]->IsOrderSizeContingent == 'Y'){
          $limit = $total[0]->ContingentLimit;
          if($limit <= $totalProductsPrice){
            if($total[0]->IsDollarOff == 'Y'){
              $discount = $total[0]->DollarOff;
              $result = $this->isdollaroff($discount,$ListID=NULL);
            }
            if($total[0]->IsPercentOff == 'Y'){
             $discount = $total[0]->PercentOff;
             $result = $this->ispercentoff($discount,$ListID=NULL);
           }else{
             $_SESSION['display_message'] = 'No Discount Available';

           }
           $_SESSION['totaldiscountPrice'] = $result;
         }
         else{
           $_SESSION['display_message'] = 'Please Purchase More';
         }
       }
       if(isset($total[0]->IsProductSpecific) && $total[0]->IsProductSpecific == 'Y'){
        $ListID = $total[0]->ProductListID;
        $products = $_SESSION['productDetail']['addtocart'];
        foreach ($products as  $value) {
          if($value == $ListID){
            if($total[0]->IsDollarOff == 'Y'){
              $discount = $total[0]->DollarOff;
              $result = $this->isdollaroff($discount,$ListID);
            }
            if($total[0]->IsPercentOff == 'Y'){
             $discount = $total[0]->PercentOff;
             $result = $this->ispercentoff($discount,$ListID);
           }
           else{
             $_SESSION['display_message'] = 'No Discount Available';
           }
         }
       }
       $_SESSION['totaldiscountPrice'] = $result;
     }
     if(isset($total[0]->IsCategorySpecific) && $total[0]->IsCategorySpecific == 'Y'){
      $ProductCategory = $total[0]->ProductCategory;
      if(isset($_SESSION['fitness_details']) && !empty($_SESSION['fitness_details'])){
        foreach ($_SESSION['fitness_details'] as $key ) {
          if($key->CategoryName == $ProductCategory){
            if($total[0]->IsDollarOff == 'Y'){
              $discount = $total[0]->DollarOff;
              $result = $this->isdollaroff($discount,$ListID=NULL);
            }
            if($total[0]->IsPercentOff == 'Y'){
             $discount = $total[0]->PercentOff;
             $result = $this->ispercentoff($discount,$ListID=NULL);
           }
           else{
             $_SESSION['display_message'] = 'No Discount Available';
           }
         }
       }
     }
     if(isset($_SESSION['strength_details']) && !empty($_SESSION['strength_details'])){
      foreach ($_SESSION['strength_details'] as $key ) {
        if($key->CategoryName == $ProductCategory){
          if($total[0]->IsDollarOff == 'Y'){
            $discount = $total[0]->DollarOff;
            $result = $this->isdollaroff($discount,$ListID=NULL);
          }
          if($total[0]->IsPercentOff == 'Y'){
           $discount = $total[0]->PercentOff;
           $result = $this->ispercentoff($discount,$ListID=NULL);
         }
         else{
           $_SESSION['display_message'] = 'No Discount Available';
         }
       }
     }
   }
   $_SESSION['totaldiscountPrice'] = $result;
 }
 if(isset($total[0]->IsBrandSpecific) && $total[0]->IsBrandSpecific == 'Y'){

   $ProductBrand = $total[0]->ProductBrand;
   if(isset($_SESSION['fitness_details']) && !empty($_SESSION['fitness_details'])){
    foreach ($_SESSION['fitness_details'] as $key ) {
      if($key->BrandName == $ProductBrand){
        if($total[0]->IsDollarOff == 'Y'){
          $discount = $total[0]->DollarOff;
          $result = $this->isdollaroff($discount,$ListID=NULL);
        }
        if($total[0]->IsPercentOff == 'Y'){
         $discount = $total[0]->PercentOff;
         $result = $this->ispercentoff($discount,$ListID=NULL);
       }
       else{
         $_SESSION['display_message'] = 'No Discount Available';
       }
     }
   }
 }
 if(isset($_SESSION['strength_details']) && !empty($_SESSION['strength_details'])){
  foreach ($_SESSION['strength_details'] as $key ) {
    if($key->BrandName == $ProductBrand){
      if($total[0]->IsDollarOff == 'Y'){
        $discount = $total[0]->DollarOff;
        $result = $this->isdollaroff($discount,$ListID=NULL);
      }
      if($total[0]->IsPercentOff == 'Y'){
       $discount = $total[0]->PercentOff;
       $result = $this->ispercentoff($discount,$ListID=NULL);
     }
     else{
       $_SESSION['display_message'] = 'No Discount Available';
     }
   }
 }
}
$_SESSION['totaldiscountPrice'] = $result;
}
if(($total[0]->IsOrderSizeContingent =='N') && ($total[0]->IsProductSpecific =='N') && ($total[0]->IsCategorySpecific =='N') && ($total[0]->IsBrandSpecific =='N')){
  if($total[0]->IsDollarOff == 'Y'){
    $discount = $total[0]->DollarOff;
    $result = $this->isdollaroff($discount,$ListID=NULL);
    $_SESSION['totaldiscountPrice'] = $result;
  }
  if($total[0]->IsPercentOff == 'Y'){
   $discount = $total[0]->PercentOff;
   $result = $this->ispercentoff($discount,$ListID=NULL);
   $_SESSION['totaldiscountPrice'] = $result;
 }
 else{
   $_SESSION['display_message'] = 'No Discount Available';
 }
}
}else{
 $_SESSION['display_message'] = 'Coupon Not Available';
}
}else{
  $_SESSION['display_message']  = "This Promo Code Is Used Once";
}
}
else{
  $_SESSION['display_message']  = "Coupon is already used";

}
}
if(isset($result)){
  $_SESSION['CouponVal'] = $result;
  $s = "$".number_format($result,2,".",",");
  $t = "$".number_format(($_SESSION['totalPrice'] - $result),2,".",",");
  echo '<div class="PRICE_BOX_NEW">
  <h5 class="HALF_PENAL H_TAG_NO_MGN">Discount</h5>
  <h5 class="HALF_PENAL H_TAG_NO_MGN">'.$t.'</h5>
</div>
<div class="PRICE_BOX_NEW">
  <h5 class="HALF_PENAL H_TAG_NO_MGN">Total</h5>
  <h5 class="HALF_PENAL H_TAG_NO_MGN" id="mytotal">'. $s.'</h5>
</div>';
}else{
  $t = "$".number_format($_SESSION['totalPrice'] ,2,".",",");
  echo '<div class="PRICE_BOX_NEW"><h5 style="color:red">'.$_SESSION['display_message'].'</h5></div><div class="PRICE_BOX_NEW">
  <h5 class="HALF_PENAL H_TAG_NO_MGN">Total</h5>
  <h5 class="HALF_PENAL H_TAG_NO_MGN">'.$t .'</h5>
</div>'  ;

}
}
  ///////// ajax for promocode /////////
public function shippingData(){
 if (isset($_POST['firstname'])) {
  $_SESSION['shipping'] = $_POST;
}
}
public function step2()
{
  if ($_SESSION['productDetail']['count'] > 0) {
    if (isset($_POST['firstname'])) {
      $_SESSION['shipping'] = $_POST;
      header("location:" . base_url('/site/payment'));
    }
    $data['title'] = "Shipping Details | Global Fitness Checkout";
    if (isset($_POST['submitpromo'])) {
      $mydate =  date("Y/m/d h:i");
      if(isset($_POST['PromoCode'])){
        $promocode = $_POST['PromoCode'];
        $total = $this->Site_model->checkpromo($promocode);
        if(empty($total)){
         $_SESSION['display_message']= "Please Enter the Correct Promo Code";
       }
       elseif(!empty($total) && isset($_SESSION['PromoCode'])!=$total[0]->CoupnCode ){
        if(strtotime($total[0]->CouponStartDate) < strtotime($mydate) && strtotime($total[0]->CouponEndDate) > strtotime($mydate)){
          $_SESSION['PromoCode'] = $promocode;
          if(isset($total[0]->IsOrderSizeContingent) && $total[0]->IsOrderSizeContingent == 'Y'){
            $limit = $total[0]->ContingentLimit;
            if($limit <= $_SESSION['totalPrice']){
              if($total[0]->IsDollarOff == 'Y'){
                $discount = $total[0]->DollarOff;
                $result = $this->isdollaroff($discount,$ListID=NULL);
              }
              if($total[0]->IsPercentOff == 'Y'){
               $discount = $total[0]->PercentOff;
               $result = $this->ispercentoff($discount,$ListID=NULL);
             }else{
               $_SESSION['display_message'] = 'No Discount Available';
             }
             $_SESSION['totaldiscountPrice'] = $result;
           }
           else{
             $_SESSION['display_message'] = 'Please Purchase More';
           }
         }
         if(isset($total[0]->IsProductSpecific) && $total[0]->IsProductSpecific == 'Y'){
          $ListID = $total[0]->ProductListID;
          $products = $_SESSION['productDetail']['addtocart'];
          foreach ($products as  $value) {
            if($value == $ListID){
              if($total[0]->IsDollarOff == 'Y'){
                $discount = $total[0]->DollarOff;
                $result = $this->isdollaroff($discount,$ListID);
              }
              if($total[0]->IsPercentOff == 'Y'){
               $discount = $total[0]->PercentOff;
               $result = $this->ispercentoff($discount,$ListID);
             }
             else{
               $_SESSION['display_message'] = 'No Discount Available';
             }
           }
         }
         $_SESSION['totaldiscountPrice'] = $result;
       }
       if(isset($total[0]->IsCategorySpecific) && $total[0]->IsCategorySpecific == 'Y'){
        $ProductCategory = $total[0]->ProductCategory;
        if(isset($_SESSION['fitness_details']) && !empty($_SESSION['fitness_details'])){
          foreach ($_SESSION['fitness_details'] as $key ) {
            if($key->CategoryName == $ProductCategory){
              if($total[0]->IsDollarOff == 'Y'){
                $discount = $total[0]->DollarOff;
                $result = $this->isdollaroff($discount,$ListID=NULL);
              }
              if($total[0]->IsPercentOff == 'Y'){
               $discount = $total[0]->PercentOff;
               $result = $this->ispercentoff($discount,$ListID=NULL);
             }
             else{
               $_SESSION['display_message'] = 'No Discount Available';
             }
           }
         }
       }
       if(isset($_SESSION['strength_details']) && !empty($_SESSION['strength_details'])){
        foreach ($_SESSION['strength_details'] as $key ) {
          if($key->CategoryName == $ProductCategory){
            if($total[0]->IsDollarOff == 'Y'){
              $discount = $total[0]->DollarOff;
              $result = $this->isdollaroff($discount,$ListID=NULL);
            }
            if($total[0]->IsPercentOff == 'Y'){
             $discount = $total[0]->PercentOff;
             $result = $this->ispercentoff($discount,$ListID=NULL);
           }
           else{
             $_SESSION['display_message'] = 'No Discount Available';
           }
         }
       }
     }
     $_SESSION['totaldiscountPrice'] = $result;
   }
   if(isset($total[0]->IsBrandSpecific) && $total[0]->IsBrandSpecific == 'Y'){
    $ProductBrand = $total[0]->ProductBrand;
    if(isset($_SESSION['fitness_details']) && !empty($_SESSION['fitness_details'])){
      foreach ($_SESSION['fitness_details'] as $key ) {
        if($key->BrandName == $ProductBrand){
          if($total[0]->IsDollarOff == 'Y'){
            $discount = $total[0]->DollarOff;
            $result   = $this->isdollaroff($discount,$ListID=NULL);
          }
          if($total[0]->IsPercentOff == 'Y'){
           $discount = $total[0]->PercentOff;
           $result = $this->ispercentoff($discount,$ListID=NULL);
         }
         else{
           $_SESSION['display_message'] = 'No Discount Available';
         }
       }
     }
   }
   if(isset($_SESSION['strength_details']) && !empty($_SESSION['strength_details'])){
    foreach ($_SESSION['strength_details'] as $key ) {
      if($key->BrandName == $ProductBrand){
        if($total[0]->IsDollarOff == 'Y'){
          $discount = $total[0]->DollarOff;
          $result = $this->isdollaroff($discount,$ListID=NULL);
        }
        if($total[0]->IsPercentOff == 'Y'){
         $discount = $total[0]->PercentOff;
         $result = $this->ispercentoff($discount,$ListID=NULL);
       }
       else{
         $_SESSION['display_message'] = 'No Discount Available';
       }
     }
   }
 }
 $_SESSION['totaldiscountPrice'] = $result;
}
if(($total[0]->IsOrderSizeContingent =='N') && ($total[0]->IsProductSpecific =='N') && ($total[0]->IsCategorySpecific =='N') && ($total[0]->IsBrandSpecific =='N')){
  if($total[0]->IsDollarOff == 'Y'){
    $discount = $total[0]->DollarOff;
    $result = $this->isdollaroff($discount,$ListID=NULL);
    $_SESSION['totaldiscountPrice'] = $result;
  }
  if($total[0]->IsPercentOff == 'Y'){
   $discount = $total[0]->PercentOff;
   $result = $this->ispercentoff($discount,$ListID=NULL);
   $_SESSION['totaldiscountPrice'] = $result;
 }
 else{
   $_SESSION['display_message'] = 'No Discount Available';
 }
}
}else{
 $_SESSION['display_message'] = 'Coupon Not Available';
}
}else{
  $_SESSION['display_message']= "This Promo Code Is Used Once";
}
}
else{
  $_SESSION['display_message']= "Coupon is already used";
}
}
$data['menu'] = $this->Site_model->menusearch();
$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
$this->load->view('template/site/header', $data);
$this->load->view('step2');
$this->load->view('template/site/footer');
}
else {
  redirect('/cart');
}
}

public function searchcity($keysearch){
  $keysearch= trim($_POST['keysearch']);
  $postXML = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:yrc="http://my.yrc.com/national/WebServices/YRCZipFinder_V2.wsdl">
  <soapenv:Header/>
  <soapenv:Body>
  <yrc:lookupCity soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
  <lookupCityRequest xsi:type="yrc:YRCLookupCityRequestV2" xmlns:yrc="http://my.yrc.com/national/WebServices/YRCZipFinderMessages_V2.xsd">
    <zipCode xsi:type="xsd:string">'.$keysearch.'</zipCode>
    <country xsi:type="yrc1:YRCCountryCode" xmlns:yrc1="http://my.yrc.com/national/WebServices/YRCCommonTypes_V2.xsd">USA</country>
  </lookupCityRequest>
</yrc:lookupCity>
</soapenv:Body>
</soapenv:Envelope>';
$url = "http://my.yrc.com/dynamic/national/webservice/YRCZipFinder_V2";
$CURL = curl_init();
curl_setopt($CURL, CURLOPT_URL, $url);
curl_setopt($CURL, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTREDIR, 3);
curl_setopt($CURL, CURLOPT_POSTFIELDS, $postXML);
curl_setopt($CURL, CURLOPT_HEADER, false);
curl_setopt($CURL, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($CURL, CURLOPT_HTTPHEADER, array('Accept: text/xml','Content-Type: text/xml'));
curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
$xmlResponse = curl_exec($CURL);
$xml = $xmlResponse;
$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
$xml = simplexml_load_string($xml);
$json = json_encode($xml);
$responseArray = json_decode($json,true);
$responseArray=$responseArray['envBody']['ns1City'];
if($responseArray[0]['name']!='')
{

 foreach($responseArray as $data)
 {
  if($data['name']!='')
  {
   ?>
   <tr style="padding:4px">
     <td style="padding:8px"><a onclick="AddCity('<?php echo $data['name']; ?>','<?php echo $data['state']; ?>','<?php  echo $keysearch;?>')" style="cursor:pointer"><?php echo $data['name']." (".$data['state'].")"; ?></a></td>
   </tr>
   <?php  } } }

   elseif(!empty($responseArray['name']))
    { ?>
  <tr style="padding:4px">
   <td style="padding:8px"><a onclick="AddCity('<?php echo $responseArray['name']; ?>','<?php echo $responseArray['state']; ?>','<?php echo $keysearch; ?>')" style="cursor:pointer"><?php echo $responseArray['name']." (".$responseArray['state'].")"; ?></a></td>
 </tr>
 <?php }
 else
 {
   echo "0";
 }
}
public function searchState(){
  $id= $_POST['id'];
  $result =  $this->Site_model->searchState($id);
  if(!empty($result))
  {
    print_r(json_encode($result));
  }
}
public function demo2(){
  $data['title'] ="demo2";
  $data['menu']  = $this->Site_model->menusearch();
  $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
  $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
  $this->load->view('template/site/header',$data);
  $this->load->view('demo2_view');
  $this->load->view('template/site/footer');
}

public function demo3(){
  $data['title'] ="demo3";
  $data['menu']  = $this->Site_model->menusearch();
  $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
  $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
  $this->load->view('template/site/header',$data);
  $this->load->view('demo3_view');
  $this->load->view('template/site/footer');
}
public function about(){
 $data['title'] = "About";
 $result =  $this->Admin_model->page_detail("About");
 $data['title'] = $result[0]->title;
 $data['description'] = $result[0]->description;
 $data['keywords'] = $result[0]->keywords;
 $data['result'] = $result;
 $data['menu']  = $this->Site_model->menusearch();
 $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
 $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
 $this->load->view('template/site/header',$data);
 $this->load->view('page/front_about');
 $this->load->view('template/site/footer');
}
public function privacy(){
  $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
  $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
  $result =  $this->Admin_model->page_detail("Privacy");
  $data['title'] = $result[0]->title;
  $data['description'] = $result[0]->description;
  $data['keywords'] = $result[0]->keywords;
  $data['result'] = $result;
  $data['menu']  = $this->Site_model->menusearch();
  $this->load->view('template/site/header',$data);
  $this->load->view('page/front_about');
  $this->load->view('template/site/footer');
}
public function term(){
  $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
  $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
  $result =  $this->Admin_model->page_detail("Term");
  $data['title'] = $result[0]->title;
  $data['description'] = $result[0]->description;
  $data['keywords'] = $result[0]->keywords;
  $data['result'] = $result;
  $data['menu']  = $this->Site_model->menusearch();
  $this->load->view('template/site/header',$data);
  $this->load->view('page/front_about');
  $this->load->view('template/site/footer');
}
public function liveinventory(){
  $data['menu']  = $this->Site_model->menusearch();
  $data['brand'] = $this->Site_model->allrecord('zFitnessBrand');
  $data['mmcategory'] = $this->Site_model->allrecord('zFitnessCategory');
  $data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
  $data['title'] = "Live Inventory Product";
  $data['menu']  = $this->Site_model->menusearch();
  $data['lproduct'] =  $this->Site_model->liveinventory();
  $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
  $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
  $this->load->view('template/site/header',$data);
  $this->load->view('live_inventory');
  $this->load->view('template/site/footer');
}
public function filter(){
  $data['brand'] = $this->Site_model->allrecord('zFitnessBrand');
  $data['mmcategory'] = $this->Site_model->allrecord('zFitnessCategory');
  $data['availability'] = $this->Site_model->allrecord('zFitnessAvailability');
  $data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
  $data['piece'] = $this->Site_model->allrecord('zFitnessPiece');
  $data['lproduct'] =  $this->Site_model->liveinventory();
  $data['strength_equipment'] ='Site';
  $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
  $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
  $data['menu']  = $this->Site_model->menusearch();
  $data['title'] = "Live Inventory Product";
  $this->load->view('template/site/header',$data);
  $this->load->view('filter_live');
  $this->load->view('template/site/footer');
}
public function addtocart(){
  if(isset($_POST['cartcheckout']))
  {
   $_SESSION['sale']= $_POST['quantity'];
   if(isset($_POST['quantities'])){
    $_SESSION['addon'] = $_POST['quantities'];

  }
  if($this->session->userdata('userId')!=""){
    redirect('/checkout');
  }
  else{
    redirect('/checkout/sign-in');
  }
}
$data['title'] = "My List";
$data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
$data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
$data['l_product'] = $this->Site_model->menudata();
$data['menu']  = $this->Site_model->menusearch();
$this->load->view('template/site/header',$data);
$this->load->view('cart');
$this->load->view('template/site/footer');
}
public function gymparts(){

  $record = $this->Site_model->newtable($_POST['record']);
  if(count($record)>0){
   foreach($record as $live){
    ?>
    <tr class="countTr">
      <td class="blank">
        <?php
        if( in_array($live->PartName , $_SESSION['mylistproducting']['listname']) )
        {
          ?>
          <img class="likeImageS" src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="1" data-name="<?php  echo $live->PartName;  ?>" data-src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
          <?php
        }
        else{
          ?>
          <img class="likeImageS" data-src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="0" data-name="<?php  echo $live->PartName;  ?>" src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
          <?php
        }
        ?>
      </td>
      <td class="min_first">
        <?php echo $live->PartName; ?>
      </td>
      <td class="mina">
        <?php echo $live->MPN; ?>
      </td>
      <td class="mina">
        <?php echo $live->Category ; ?>
      </td>
      <td class="mina">
        <?php
        if($live->QuantityOnHand<=0){
          ?><span class="outstock">Out of Stock</span>
          <?php
        }
        else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
          echo "Low Stock";
        }else{
          ?>
          <span class="inerstock">In Stock</span>
          <?php
        } ?>
      </td>
      <td class="mina">
        <table>
          <tr class="INNER_TABLE__penal">
            <td class="INNER_TABLE_PRICE" align="left">
              <?php if($live->Price!="Please Enquire"){ echo "$";} ?>
              <?php echo trim($live->Price,'$'); ?>
            </td>
            <td class="INNER_TABLE_BUTTON" align="right">
             <?php
             if($live->QuantityOnHand<=0){
              if($live->countwish==0){
                ?>
                <div class="outr">
                  <input type="button" <?php if($this->session->userdata('userId')==""){ echo 'data-toggle="modal" data-target="#myModal_login"'; }else{ echo 'class="clickwishlist"'; } ?> data-val="
                  <?php echo $live->ProductName; ?>" value="Wait List Me"></div>
                  <?php
                }
              }else{
                ?>
                <div class="filter">
                  <input type="button" value="Add to cart">
                </div>
                <?php
              } ?>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <?php
  }
}
else{
 return 0;
}
}

public function nextrecord(){
  $record = $this->Site_model->nextrecord($_POST['record'],$_POST['filter']);
  if(count($record)>0){
   foreach($record as $live){
    ?>
    <tr class="countTr">
      <td class="blank">
        <?php
        if( in_array($live->ProductName , $_SESSION['mylistproduct']['listname']) )
        {
          ?>
          <img class="likeImage" src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="1" data-name="<?php  echo $live->ProductName;  ?>" data-src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
          <?php
        }
        else{
          ?>
          <img class="likeImage" data-src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="0" data-name="<?php  echo $live->ProductName;  ?>" src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">  <?php
        }
        ?></td>
        <td class="min_first">
          <?php echo $live->ProductName; ?></td>
          <td class="mina"><?php echo $live->MPN; ?></td>
          <td class="mina"><?php echo $live->Piece ; ?></td>
          <td class="mina"><?php
            if($live->QuantityOnHand<=0){
              ?><span class="outstock">Out of Stock</span><?php
            }
            else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
              echo "Low Stock";
            }else{
              ?>
              <span class="inerstock">In Stock</span>
              <?php
            } ?></td>
            <td class="mina"><table><tr><td><?php if($live->Price!="Please Enquire"){ echo "$";} ?><?php echo trim($live->Price,'$'); ?></td><td>
            <?php
            if($live->QuantityOnHand<=0){
             if($live->countwish==0){
              ?><div class="outr"><input type="button"  <?php if($this->session->userdata('userId')==""){ echo 'data-toggle="modal" data-target="#myModal_login"';  }else{ echo 'class="clickwishlist"'; } ?>  data-val="<?php echo $live->ProductName; ?>" value="Wait List Me"></div><?php
            }

          }elseif($live->Price == 'Please Enquire'  && ($live->QuantityOnHand >= 3 || $live->QuantityOnHand < 3 ) ){
            echo   '<div class="filter"><input type ="button" value="Email me" data-toggle="modal" data-target="#myModal_email">
          </input></div>';
        }
        else{
          ?>
          <div class="filter"><input type="button" value="Add to cart"></div>
          <?php
        } ?></td></tr></table></td>
      </tr>
      <?php
    }
  }
  else{
   return 0;
 }
}

public function nextmobilerecord(){

  $jack = $_POST['record'];
  $jill=$_POST['filter'];
  $record = $this->Site_model->nextrecord($jack,$jill);
  if(count($record)>0){
   foreach($record as $live){
    $jack++;
    ?>
    <div class="panel panel-default dashd liveENVTRY">
      <div class="panel-heading">
        <h4 class="panel-title">
          <i class="indicator glyphicon glyphicon-chevron-up margn pull-left"></i>
          <a class="accordion-toggle Accccccc" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $jack; ?>">
            <?php echo $live->ProductName; ?>
          </a>
          <span class="stock "><?php
            if($live->QuantityOnHand<=0){
              ?>
              <span class="outstock">Out of Stock</span><?php
            }
            else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
              echo "<span class='lowstock'> Low Stock</span>";
            }else{
              ?>
              <span class="inerstock">In Stock</span>
              <?php
            } ?>
          </span>
        </h4>
      </div>
      <div id="collapse<?php echo $jack; ?>" class="panel-collapse collapse">
        <div class="panel-body">
         <div class="row inner_product_discription">
          <div class="row inner_product_container">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="small">
                <h5><?php echo $live->ProductName; ?></h5>
              </div><!--end of small-->
            </div>
            <div class="col-md-5 col-sm-5 col-md-offset-1">
              <div class="col-md-12 col-sm-12">
                <div class="product_penal_content">
                 <div class="product_penal_shiping2">
                  <?php
                  if($live->MPN!=""){
                    ?>
                    <div class="product_penal_shiping_left">MPN:</div>
                    <div class="product_penal_shiping_right"><?php echo $live->MPN; ?></div>
                    <?php }
                    if($live->Piece!=""){ ?>
                    <div class="product_penal_shiping_left">Piece:</div>
                    <div class="product_penal_shiping_right"><?php echo $live->Piece ; ?></div>
                    <?php }
                    if($live->QuantityOnHand!=""){ ?>
                    <div class="product_penal_shiping_left">QuantityOnHand</div>
                    <div class="product_penal_shiping_right"><?php
                      if($live->QuantityOnHand<=0){
                        ?><span class="outstock">Out of Stock</span><?php
                      }
                      else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
                        echo "<span class = 'lowstock'> Low Stock</span>";
                      }else{
                        ?>
                        <span class="inerstock">In Stock</span>
                        <?php
                      } ?></div>
                      <?php }
                      if($live->Price!=""){ ?>
                      <div class="product_penal_shiping_left">Price</div>
                      <div class="product_penal_shiping_right"><?php if($live->Price!="Please Enquire"){ echo "$";} ?><?php echo trim($live->Price,'$'); ?></div>
                      <?php } ?>
                    </div>
                    <div class="product_penal__question">
                      <div class="col-xs-6 padd">
                       <div class="question_heding">
                        <div class="requu">
                          <?php
                          if( in_array($live->ProductName , $_SESSION['mylistproduct']['listname']) )
                          {
                            ?>
                            <img class="likeImage" src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="1" data-name="<?php  echo $live->ProductName;  ?>" data-src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
                            <?php
                          }
                          else
                          {
                            ?>
                            <img class="likeImage" data-src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="0" data-name="<?php  echo $live->ProductName;  ?>" src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">  <?php
                          }
                          ?></div><!--end of requu--></div></div>
                          <div class="col-xs-6 padd">
                            <div class="filter_top">
                              <?php
                              if($live->QuantityOnHand<=0){
                               if($live->countwish==0){
                                ?><div class="outr"><input type="button"  <?php if($this->session->userdata('userId')==""){ echo 'data-toggle="modal" data-target="#myModal_login"';  }else{ echo 'class="clickwishlist"'; } ?>  data-val="<?php echo $live->ProductName; ?>" value="Wait List Me"></div><?php
                              }

                            }else{
                              ?>
                              <div class="filter"><input type="button" value="Add to cart"></div>
                              <?php
                            } ?>
                          </div><!--end filter--><!--HAVE--></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    }
    else{
     echo  0;
   }
 }
 public function addmylisting()
 {
  $name = $this->input->get("name");
  $status = $this->input->get("status");
  if($status=="0"){
    if(isset($_SESSION['mylistproducting']['listname'])){
      array_push($_SESSION['mylistproducting']['listname'],$name);
      $_SESSION['mylistproducting']['count'] += 1;
    }
    else{
      $_SESSION['mylistproducting']['listname'] = array($name);
      $_SESSION['mylistproducting']['count'] = 1;
    }
  }
  else{
   $_SESSION['mylistproducting']['listname'] = array_merge(array_diff($_SESSION['mylistproducting']['listname'],array($name)));
   $_SESSION['mylistproducting']['count'] -= 1;
 }
 echo $_SESSION['mylistproducting']['count'];
}
public function addmylist()
{
  $name = $this->input->post("name");
  $status = $this->input->post("status");
  if($status=="0"){
   if(isset($_SESSION['mylistproduct']['listname'])){
    array_push($_SESSION['mylistproduct']['listname'],$name);
    $_SESSION['mylistproduct']['count'] += 1;
  }
  else{
    $_SESSION['mylistproduct']['listname'] = array($name);
    $_SESSION['mylistproduct']['count'] = 1;
  }
}
else{
  $_SESSION['mylistproduct']['listname'] = array_merge(array_diff($_SESSION['mylistproduct']['listname'],array($name)));
  $_SESSION['mylistproduct']['count'] -= 1;
}
echo $_SESSION['mylistproduct']['count'];
}
public function mylist(){
  if(isset($_POST['email'])){
   $body = "<body><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff'>         <tr>
   <td>
    <table width='800' border='0' cellspacing='0' cellpadding='10' bgcolor='#A5A5A5' align='center'>
      <tr>
        <th width=20px></th>
        <th style=padding-top:30px;padding-bottom:30px;text-align:center;>
         <h2>Global Fitness Group</h2></th>
         <th width=20px></th>
       </tr>
       <tr>
        <td width=20px></td>
        <td bgcolor=#fff style=border-radius:10px;padding:20px;>
          <table width=100%;>
            <tr>
              <td style=text-align:left; padding:20px;>
                <h3>Dear ".$_POST['name'].", </h3>
              </td>
            </tr>
            <tr>
              <td style=font-size:16px;>
                <b>Email : </b>
                <span>".$_POST['email']."</span>
              </td>
            </tr>";
            if($_POST['number']!=""){
              $body.="<td style=font-size:16px;>
              <b>Telephone : </b>
              <span>".$_POST['number']."</span>
            </td>
          </tr>";
        }
        $body.="<tr>
        <td style=font-size:16px;>
          <h4><b>List of all Product</b></h4>
        </td>
      </tr>
      <tr>
        <td style=font-size:16px;>";
          if($_SESSION['mylistproduct']['count']>0){

            $body .='<table border="1px solid #000" width="100%" border="0" cellspacing="0" cellpadding="0" >
            <thead>
              <tr class="tb_hdr">
                <th >Sr. No.</th>
                <th >ProductName</th>
                <th >MPN</th>
                <th >Piece</th>
                <th >QuantityOnHand</th>
                <th >Price</th>
              </tr>
            </thead>
            <tbody>';
             $csvData=array();
             $csvData[0][0]="Sr. No.";
             $csvData[0][1]="ProductName";
             $csvData[0][2]="MPN";
             $csvData[0][3]="Piece";
             $csvData[0][4]="QuantityOnHand";
             $csvData[0][5]="Price";
             for($i=0; $i<$_SESSION['mylistproduct']['count'];$i++){
              $product = $this->Site_model->mylistmodel($_SESSION['mylistproduct']['listname'][$i]);
              foreach($product as $live){
               $csvData[$i+1][0]=$i+1;
               $csvData[$i+1][1]=$live->ProductName;
               $csvData[$i+1][2]=$live->MPN;
               $csvData[$i+1][3]=$live->Piece;
               $body.='<tr>
               <td>'.($i+1).'</td>
               <td>'.$live->ProductName.'</td>
               <td>'.$live->MPN.'</td>
               <td>'.$live->Piece.'</td> <td>';
               if($live->QuantityOnHand<=0)
               {
                $body.='Out of Stock';
                $csvData[$i+1][4]='Out of Stock';
              }
              else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
               $body.="Low Stock";
               $csvData[$i+1][4]='Low Stock';
             }else{
              $body.="In Stock";
              $csvData[$i+1][4]='In Stock';
            }
            $csvData[$i+1][5]=$live->Price;
            $body.='</td><td>$'.$live->Price.'</td></tr>';
          }
        }
        $body.='</tbody></table>';
      }
      else
      {
        $body.="<h4>No Records Found.</h4>";
      }

      $body.="</td></tr><tr>
      <td style=text-align:center; padding:20px;>
        <h3 style=margin-top:50px; font-size:29px;>Best Regards,</h3>
      </td>
    </tr>
  </table>
</td>
<td width=20px></td>
</tr>
<tr>
  <td width=20px></td>
  <td style=text-align:center; color:#fff; padding:10px;> Copyright © All Rights Reserved</td>
  <td width=20px></td>
</tr>
</table>
</td>
</tr>
</table>
</body>";
$body = "Dear ".$_POST['name'].",<br><br>
Attached is your custom list of Fitness Equipment you inquired about from globalfitness.com, our knowledgeable sales staff will be in touch within 24 hours.<br><br>
Best Regards,<br>
Global Fitness Team<br>
Copyright © All Rights Reserved";
$from = "support@globalfitness.net";
$to = $this->input->post('email');
$subject = 'Global Fitness Equipment Inquiry';
$this->send_csv_mail($csvData, $body, $to, $subject, $from);
$this->session->set_flashdata('fdsjfkjsdf', 'Thank you for your inquiry on those products. Your list has been email to the supplied address and our knowledgeable sales staff will be in touch within 24 hours.');

header('location:'.base_url('site/mylist'));
}
$data['title'] = "My List";
$data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
$data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
$data['menu']  = $this->Site_model->menusearch();
$this->load->view('template/site/header',$data);
$this->load->view('test_inventory');
$this->load->view('template/site/footer');
}
public function listing(){
  if(isset($_POST['email'])){
    $body = "<body><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff'>         <tr>
    <td>
      <table width='800' border='0' cellspacing='0' cellpadding='10' bgcolor='#A5A5A5' align='center'>
        <tr>
          <th width=20px></th>
          <th style=padding-top:30px;padding-bottom:30px;text-align:center;>
           <h2>Global Fitness Group</h2></th>
           <th width=20px></th>
         </tr>
         <tr>
          <td width=20px></td>
          <td bgcolor=#fff style=border-radius:10px;padding:20px;>
            <table width=100%;>
              <tr>
                <td style=text-align:left; padding:20px;>
                  <h3>Dear ".$_POST['name'].", </h3>
                </td>
              </tr>
              <tr>
                <td style=font-size:16px;>
                  <b>Email : </b>

                  <span>".$_POST['email']."</span>
                </td>
              </tr>";
              if($_POST['number']!=""){
                $body.="<td style=font-size:16px;>
                <b>Telephone : </b>
                <span>".$_POST['number']."</span>
              </td>
            </tr>";
          }
          $body.="<tr>
          <td style=font-size:16px;>
            <h4><b>List of all Product</b></h4>
          </td>
        </tr>

        <tr>
          <td style=font-size:16px;>";
            if($_SESSION['mylistproducting']['count']>0){

              $body .='<table border="1px solid #000" width="100%" border="0" cellspacing="0" cellpadding="0" >
              <thead>
                <tr class="tb_hdr">
                  <th >Sr. No.</th>
                  <th >ProductName</th>
                  <th >MPN</th>
                  <th >Piece</th>
                  <th >QuantityOnHand</th>
                  <th >Price</th>
                </tr>
              </thead>
              <tbody>';
               $csvData=array();
               $csvData[0][0]="Sr. No.";
               $csvData[0][1]="PartName";
               $csvData[0][2]="MPN";
               $csvData[0][3]="Category";
               $csvData[0][4]="QuantityOnHand";
               $csvData[0][5]="Price";
               for($i=0; $i<$_SESSION['mylistproducting']['count'];$i++){
                $product = $this->Site_model->mylistingmodel($_SESSION['mylistproducting']['listname'][$i]);
                foreach($product as $live){
                 $csvData[$i+1][0]=$i+1;
                 $csvData[$i+1][1]=$live->PartName;
                 $csvData[$i+1][2]=$live->MPN;
                 $csvData[$i+1][3]=$live->Price;
                 $body.='<tr>
                 <td>'.($i+1).'</td>
                 <td>'.$live->PartName.'</td>
                 <td>'.$live->MPN.'</td>
                 <td>'.$live->Category.'</td> <td>';
                 if($live->QuantityOnHand<=0)
                 {
                  $body.='Out of Stock';
                  $csvData[$i+1][4]='Out of Stock';
                }
                else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
                 $body.="Low Stock";
                 $csvData[$i+1][4]='Low Stock';
               }else{
                $body.="In Stock";
                $csvData[$i+1][4]='In Stock';
              }
              $csvData[$i+1][5]=$live->Price;
              $body.='</td><td>$'.$live->Price.'</td></tr>';
            }
          }
          $body.='</tbody></table>';
        }
        else
        {
          $body.="<h4>No Records Found.</h4>";
        }
        $body.="</td></tr><tr>
        <td style=text-align:center; padding:20px;>
          <h3 style=margin-top:50px; font-size:29px;>Best Regards,</h3>
        </td>
      </tr>
    </table>
  </td>
  <td width=20px></td>
</tr>
<tr>
  <td width=20px></td>
  <td style=text-align:center; color:#fff; padding:10px;> Copyright © All Rights Reserved</td>
  <td width=20px></td>
</tr>
</table>
</td>
</tr>
</table>
</body>";
$body = "Dear ".$_POST['name'].",<br><br>
Attached is your custom list of Fitness Equipment you inquired about from globalfitness.com, our knowledgeable sales staff will be in touch within 24 hours.<br><br>
Best Regards,<br>
Global Fitness Team<br>
Copyright © All Rights Reserved";
$from = "support@globalfitness.net";
$to = $this->input->post('email');
$subject = 'Global Fitness Equipment Inquiry';
$this->send_csv_mail($csvData, $body, $to, $subject, $from);
$this->session->set_flashdata('fdsjfkjsdf', 'Thank you for your inquiry on those products. Your list has been email to the supplied address and our knowledgeable sales staff will be in touch within 24 hours.');

header('location:'.base_url('site/mylist'));
}
$data['title'] = "My List";
    // $data['category'] =  $this->Site_model->categorySearch();
$data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
$data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
$data['menu']  = $this->Site_model->menusearch();
$this->load->view('template/site/header',$data);
$this->load->view('test_listpage');
$this->load->view('template/site/footer');
}

public function create_csv_string($data) {

  // Open temp file pointer
  if (!$fp = fopen('php://temp', 'w+')) return FALSE;

  // Loop data and write to file pointer
  foreach ($data as $line) fputcsv($fp, $line);

  // Place stream pointer at beginning
  rewind($fp);

  // Return the data
  return stream_get_contents($fp);

}

public function send_csv_mail ($csvData, $body, $to, $subject, $from) {

  // This will provide plenty adequate entropy
  $multipartSep = '-----'.md5(time()).'-----';
  $headers = array(
    "From: $from",
    "Reply-To: $from",
    "Cc: email@globalfitness.net",
    "Content-Type: multipart/mixed; boundary=\"$multipartSep\""
    );
  // Make the attachment
  $attachment = chunk_split(base64_encode($this->create_csv_string($csvData)));
  // Make the body of the message
  $body = "--$multipartSep\r\n"
  . "Content-type:text/html;charset=UTF-8\r\n"
  . "Content-Transfer-Encoding: 7bit\r\n"
  . "\r\n"
  . "$body\r\n"
  . "--$multipartSep\r\n"
  . "Content-Type: text/csv\r\n"
  . "Content-Transfer-Encoding: base64\r\n"
  . "Content-Disposition: attachment; filename=\"file.csv\"\r\n"
  . "\r\n"
  . "$attachment\r\n"
  . "--$multipartSep--";

   // Send the email, return the result
  return @mail($to, $subject, $body, implode("\r\n", $headers));
}
public function success(){
  $item_number = $_REQUEST['item_number'];
  $txn_id = $_REQUEST['txn_id'];
  $payment_gross = $_REQUEST['payment_gross'];
  $currency_code = $_REQUEST['mc_currency'];
  $payment_status = $_REQUEST['payment_status'];
  unset($_SESSION['productDetail']['addtocart'][array_search($item_number,$_SESSION['productDetail']['addtocart'])]);
  $_SESSION['productDetail']['addtocart']= array_merge($_SESSION['productDetail']['addtocart']);
  $_SESSION['productDetail']['count'] -= 1;
  $sql = "INSERT INTO customer_payments(item_number,txn_id,payment_gross,currency_code,payment_status,client_id,careted_date) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."','".$_SESSION['userId']."','".date("Y-m-d h:i:s")."')";
  $this->Site_model->insertcart($sql);
  redirect("/site/addtocart?sucess");
}


public function page($name){
     // print_r($name); die;
  $data['Author'] = "Global Fitness, Inc., support@globalfitness.us.com";
  if($name=='contact-us'){
    $text = 'General Inquiry | Contact Us';
  }elseif($name=='lease-gym-equipment'){
    $text = 'Lease Inquiry | Lease Gym Equipment';
  }elseif($name=='sell-fitness-equipment'){
    $text = 'Selling Inquiry | Sell Fitness Equipment';
  }
  else{
    $text = 'General Inquiry | Contact Us';
  }
  if(isset($_POST['message_contactus']) and $_POST['message_contactus']!='')
  {
    if(isset($_FILES['upload_image'])){
      $config['upload_path'] ="images-fitness-equipment-sale";
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '286449800000';
      $config['max_width']  = '10000';
      $config['max_height']  = '111111';
      $new_name = time().$_FILES["upload_image"]['name'];
      $config['file_name'] = $new_name;
                  // $config['file_name']  = $_FILES['upload_image']['name'];
      $path = 'images-fitness-equipment-sale/' . $config['file_name'];
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('upload_image'))
      {
        $error = array('error' => $this->upload->display_errors());
      }
      else
      {
        $pp =  $this->upload->data();
        $filename = $pp['file_name'];
      }
      $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>".$_POST['firstname_contactus']."</p>
      <p><strong>Last Name:</strong>".$_POST['lastname_contactus']."</p>
      <p><strong>Email:</strong> ".$_POST['email_contactus']."</p>
      <p><strong>Telephone:</strong>".$_POST['telephone_contactus']."</p>
      <p><strong>Subject:</strong>".$text."</p>
      <p><strong>Message:</strong> ".$_POST['message_contactus']."</p>
      <p>Thank You</p><img src='".base_url().$path."' width='150'>  ";
      $headers = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
      $from = "support@globalfitness.net";
      $to = "email@globalfitness.net";
      $subject = $text;
      $message = $body;
      $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
      mail($to,$subject,$message,$headers);
    }else{
      $filename = "";
      $from = "support@globalfitness.net";
      $to = "email@globalfitness.net";
      $subject = $text;
      $body = "<p><strong>Dear Webmaster,</strong></p>
      <p><strong>First Name:</strong>".$_POST['firstname_contactus']."</p>
      <p><strong>Last Name:</strong>".$_POST['lastname_contactus']."</p>
      <p><strong>Email:</strong> ".$_POST['email_contactus']."</p>
      <p><strong>Telephone:</strong>".$_POST['telephone_contactus']."</p>
      <p><strong>Subject:</strong>".$text."</p>
      <p><strong>Message:</strong> ".$_POST['message_contactus']."</p>
      <p>Thank You</p>";
      $message = $body;
      $headers = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
      $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
      $headers .= "Reply-To: support@globalfitness.net\r\n";
      $headers .= "Return-Path: support@globalfitness.net\r\n";
      $res = mail($to,$subject,$message,$headers);
      $from1 = "support@globalfitness.net";
      $to1 = $_POST['email_contactus'];
      $subject1 = 'Confirmation ! Global Fitness Equipment';
      $body2 = "<p><strong>Subject:</strong>".$subject1."</p><h4>Dear " . $_POST['firstname_contactus'] . "</h4>
      <p>We appreciate you contacting us. We try to respond as soon as possible so please look out for an email from one of our customer service colleagues that should get back to you within a few hours. </p>
      <p>Thank you for getting in touch and have a great day!</p>
      <p>Global Fitness Team</p>";
      $message1 = $body2;
      $headers1 = 'MIME-Version: 1.0' . "\r\n";
      $headers1 .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
      $headers1 .= "Reply-To: support@globalfitness.net\r\n";
      $headers1 .= "Return-Path: support@globalfitness.net\r\n";
      $headers1 .= 'From: ' . $from1 . "\r\n" . "X-Mailer: PHP/" . phpversion();
      $res2 = mail($to1, $subject1, $message1, $headers1);

    }
    $this->Site_model->contactformdata();
  }
  if(isset($_POST['sending_mails']) ){
    $data = array(
      'FirstName' =>$this->input->post('firstname_contactus'),
      'LastName' =>$this->input->post('lastname_contactus'),
      'Email' =>$this->input->post('email_contactus'),
      'TelephoneNumber' =>$this->input->post('telephone_contactus'),
      'Title' =>$this->input->post('title_contactus'),
      'BusinessName' =>$this->input->post('businessname_contactus'),
      'FederalTaxID' =>$this->input->post('taxid_contactus'),
      'BusinessAddressState' =>$this->input->post('address_contactus'),
      'NumberOfYearsInBusiness' =>$this->input->post('years_contactus'),
      'TypeOfBusiness' =>$this->input->post('type_contactus'),
      'EstimatedEquipmentCost' =>$this->input->post('estimate_contactus'),
      'UserIP' =>$this->input->ip_address()
      );
    $mydata = array_filter($data);
    $this->Site_model->insertformdata($mydata);
  }
  $old_name = $name;
  $name=  str_replace("-", " ",$name);
  $data['category'] =  $this->Site_model->categorySearch();

            // print_r(trim($name)); die;

  $result =  $this->Admin_model->page_detail(trim($name));

        // echo "<pre>"; print_r($result); die;
  $data['description'] = $result[0]->description;
  $data['keywords'] = $result[0]->keywords;
  $data['result'] = $result;
  $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
  $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
  $data['menu']  = $this->Site_model->menusearch();
  $data['detail'] = $this->Site_model->metaDataStaticPages($old_name);
  if(($name== 'about global fitness') ||  ($name== 'About Global Fitness')  ){
    $this->load->view('template/site/header',$data);
    $this->load->view('page/aboutus');
    $this->load->view('template/site/footer');
  }
      // elseif($name == 'privacy policy'){
      //  $this->load->view('template/site/header',$data);
      //  $this->load->view('hello_view');
      //  $this->load->view('template/site/footer');
      // }
      // elseif($name == 'terms-&-conditions'){
      //  $this->load->view('template/site/header',$data);
      //  $this->load->view('page/term');
      //  $this->load->view('template/site/footer');
      // }
      // elseif($name == 'legal'){
      //   // $data['title'] = "Legal | Global Fitness, Inc.";
      //  $this->load->view('template/site/header',$data);
      //  $this->load->view('page/term');
      //  $this->load->view('template/site/footer');
      // }
  elseif(($name== 'sell fitness equipment')){
       // $data['title'] = "How To Sell Your Used Fitness Equipment | Global Fitness, Inc.";
    $data['description'] = "Selling your used fitness equipment need not be an arduous process, whether you’re closing you gym or are upgrading your used gym equipment with newer models, we can accommodate your needs.";
    $data['keywords'] = "sell fitness equipment, sell used fitness equipment, sell gym equipment, sell used gym equipment, sell exercise equipment, sell used exercise equipment";

    $this->load->view('template/site/header',$data);
    $this->load->view('sellequipment');
    $this->load->view('template/site/footer');
  }
  elseif($name == 'lease gym equipment'){
   $this->load->view('template/site/header',$data);
   $this->load->view('page/financing');
   $this->load->view('template/site/footer');
 }
 elseif($name == 'replacement gym parts'){
  $table = "zFitnessParts";
  $data['replacement']  = $this->Site_model->selecttable($table);
  $this->load->view('template/site/header',$data);
  $this->load->view('page/gym_parts');
  $this->load->view('template/site/footer');
}
elseif($name == 'manuals & literature'){
  $table = "zFitnessUserManuals";
  $data['manuals']  = $this->Site_model->selectedtable($table);
  if(isset($_POST['submit_manual'])){
    unset($_POST['submit_manual']);
    unset($_POST['g-recaptcha-response']);
    $mytable ='zFitnessUserManualRequest';
    $result =$this->Site_model->insertData($mytable);
  }
  $this->load->view('template/site/header',$data);
  $this->load->view('page/manual');
  $this->load->view('template/site/footer');
}
elseif($name == 'international gym equipment sales'){
  $data['description'] = "Global Fitness inspires confidence with international buyers with our International Buyers Program developed to cover some of the cost for travel and accommodations to come and tour our factory";
         // $data['title'] = 'Used Fitness Equipment and Used Gym Equipment – Global Fitness';
  $data['keywords']= "Used fitness equipment, used exercise equipment, commercial fitness equipment, refurbished gym equipment, fitness equipment, used treadmill, life fitness treadmill, precor elliptical, elliptical trainer, used precor elliptical, global fitness, globalfitness, used gym equipment";
  $this->load->view('template/site/header',$data);
  $this->load->view('sales');
  $this->load->view('template/site/footer');
}
elseif($name == 'privacy-policy'){
        // $data['replacement']  = $this->Site_model->selecttable($table);
 $this->load->view('template/site/header',$data);
 $this->load->view('page/privacy');
 $this->load->view('template/site/footer');
}
else{
  $this->load->view('template/site/header',$data);
  $this->load->view('page/front_about');
  $this->load->view('template/site/footer');
}
}

function deleting($name){
  if($name!=""){
    unset($_SESSION['productDetail']['myextracart'][$name]);
     // remove item at index 0
    $_SESSION['productDetail']['myextracart'] = array_values($_SESSION['productDetail']['myextracart']);
    $_SESSION['productDetail']['counting'] -= 1;
    if(empty($_SESSION['productDetail']['myextracart'])){
      $_SESSION['productDetail']['counting'] = 0;
    }
  }
  redirect("/cart");
}

function delete($name){
  if($name!=""){
    $_SESSION['productDetail']['addtocart'] = array_merge(array_diff($_SESSION['productDetail']['addtocart'],array($name)));
    $_SESSION['productDetail']['count'] -= 1;
    if(empty($_SESSION['productDetail']['addtocart'])){
      $_SESSION['productDetail']['count'] = 0;
    }
  }
  redirect("/cart");
}

////////////////////// city if California selected ////////////////////////////
public function CityPercent(){
  if(isset($_POST['city'])){
    $_SESSION['shipping']['home'] = 2;
  }
  if(isset($_POST['data'])){
    $products = $_SESSION['productDetail']['myextracart'];
    $k = 0;
    $totalprice = 0;            
    foreach($products as $live){
      $thisPrice = $_SESSION['addon'][$k]*preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
      if($_POST['data'] =='CA'){
        $taxpclc = (9.25/100)*$thisPrice;
        $taxTotalS  = ceil((9.25/100)*$thisPrice);
        $taxTotal[] ="$".number_format($taxTotalS,2,".",",");
        $totalOccurTax = $totalOccurTax+$taxTotalS;
        $taxProduct = $thisPrice +$taxpclc;
        $totalprice = $totalprice+$taxProduct;
        $totalprice = ceil($totalprice);
        $_SESSION['totalPrice'] = "$".number_format($totalprice,2,".",",");
        $_SESSION['totalTaxOccur'] = ceil($totalOccurTax); 
        $_SESSION['statetax'] =  ceil($totalOccurTax); 
        $_SESSION['TaxPerProduct'][] = ceil($taxTotalS); 
      }else{
        unset($_SESSION['totalTaxOccur']);
        unset($_SESSION['TaxPerProduct']);
        unset($_SESSION['statetax']);
        $taxTotal[] = '.......';
        $taxProduct = $thisPrice +$taxpclc;
        $totalprice = $totalprice+$thisPrice;
        $totalprice = ceil($totalprice);
        $_SESSION['totalPrice'] = "$".number_format($totalprice,2,".",",");
      }
      $k++;
    }
    for($i=0; $i<$_SESSION['productDetail']['count'];$i++){
      $thisPrice = 0;
      $product = $this->Site_model->productdetail($_SESSION['productDetail']['addtocart'][$i]);
      foreach($product as $live){
        $thisPrice = $_SESSION['sale'][$i]*preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
        if($_POST['data'] =='CA'){
          $taxpclc = (9.25/100)*$thisPrice;
          $taxTotalS  = ceil((9.25/100)*$thisPrice);
          $taxTotal[] ="$".number_format($taxTotalS,2,".",",");
          $totalOccurTax = $totalOccurTax+$taxTotalS;
          $taxProduct = $thisPrice +$taxpclc;
          $totalprice = $totalprice+$taxProduct;
          $totalprice = ceil($totalprice);
          $_SESSION['statetax'] =  ceil($totalOccurTax); 
          $_SESSION['totalPrice'] = "$".number_format($totalprice,2,".",",");
          $_SESSION['totalTaxOccur'] = ceil($totalOccurTax); 
          $_SESSION['TaxPerProduct'][] = ceil($taxTotalS); 
        }else{
          unset($_SESSION['totalTaxOccur']);
          unset($_SESSION['TaxPerProduct']);
          unset($_SESSION['statetax']);
          $taxTotal[] = '.......';
          $taxProduct = $thisPrice +$taxpclc;
          $totalprice = $totalprice+$thisPrice;
          $totalprice = ceil($totalprice);
          $_SESSION['totalPrice'] = "$".number_format($totalprice,2,".",",");
        }
      }
    } 
    $taxTotal[] =$_SESSION['totalPrice'] ;
    $taxTotal[] = "$".number_format($totalOccurTax,2,".",",");
    echo  json_encode($taxTotal);
  }
}

////////////////////// City if California selected ////////////////////////////
  //////////////////////////// for shipping ajax check ///////////////////////////
public function shippingCharges(){

  if(isset($_POST['zipcode'])){
    $_SESSION['shipping']= $_POST;
  }
  $totalshipcharges = 0;
  $totalprice = 0;
  $totalWeight=0;
  $total_main_price = 0;
  $products = $_SESSION['productDetail']['myextracart'];

  $k = 0;
  $totalprice = 0;        
  foreach($products as $live){
    $thisPrice = $_SESSION['addon'][$k]*preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
    $totalprice= $totalprice+$thisPrice;
    $myproductCost = $myproductCost +$thisPrice;
    $_SESSION['mainCharge'] =   $myproductCost;
    $total_main_price+=$thisPrice;
    $Weight = $live->ShippingWeight;
    $thisWeight = $_SESSION['sale'][$i]*$Weight;
    $totalWeight = $totalWeight+$thisWeight;
    $LOGIN_USERID="globalfitness";
    $LOGIN_PASSWORD="d5nuspes";
    $BusId="73176053593";
    $BusRole="Shipper";
    $PaymentTerms="Prepaid";
    $OrigCityName="Gardena";
    $OrigStateCode="CA";
    $OrigZipCode="90249";
    $OrigNationCode="USA";
    $DestCityName=$_POST['city'];
    $DestStateCode=$_POST['state'];
    $DestZipCode=$_POST['zipcode'];
    $DestNationCode="USA";
    $ServiceClass="STD";
    $PickupDate=date("Ymd");
    $TypeQuery="QUOTE";
    $LineItemWeight1=$Weight;
    $LineItemNmfcClass1="70";
    $LineItemCount="1";
    $AccOption1="HOMD";
    $Acc="";
    $url = "https://my.yrc.com/dynamic/national/servlet?CONTROLLER=com.rdwy.ec.rexcommon.proxy.http.controller.ProxyApiController&redir=/tfq561&LOGIN_USERID=".$LOGIN_USERID."&LOGIN_PASSWORD=".$LOGIN_PASSWORD."&BusId=".$BusId."&BusRole=".$BusRole."&PaymentTerms=".$PaymentTerms."&OrigCityName=".$OrigCityName."&OrigStateCode=".$OrigStateCode."&OrigZipCode=".$OrigZipCode."&OrigNationCode=".$OrigNationCode."&DestCityName=".$DestCityName."&DestStateCode=".$DestStateCode."&DestZipCode=".$DestZipCode."&DestNationCode=".$DestNationCode."&ServiceClass=".$ServiceClass."&PickupDate=".$PickupDate."&TypeQuery=".$TypeQuery."&LineItemWeight1=".$LineItemWeight1."&LineItemNmfcClass1=".$LineItemNmfcClass1."&LineItemCount=".$LineItemCount."&AccOption1=".$AccOption1."&AccOptionCount=1&LineItemHandlingUnits1=1&LineItemPackageCode1=SKD&LineItemPackageLength1=48&LineItemPackageWidth1=48&LineItemPackageHeight1=48";

    $url = str_replace(' ', '%20', $url);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transaction= curl_exec($curl);
    curl_close($curl);
    $transaction = simplexml_load_string($transaction);
    $charges = $transaction->BodyMain->RateQuote->RatedCharges->TotalCharges;
    $mycharges =  number_format(($charges/100),2);
    /*Code added to deduct shipping factor from YRC API Freight*/
    $ShippingFactorCharge= ($mycharges)-$live->ShippingFactor;
    if($ShippingFactorCharge > 0){
      $mycharges= $ShippingFactorCharge;
    }else{
     $mycharges= 0;
   }
   /*Code end*/
   $thischarges = $mycharges*$_SESSION['sale'][$i];
   $totalprice+=$thischarges;
   $totalshipcharges+=$thischarges;
   $myarraY[] =  "$". number_format($thischarges,2,".",",");
   $_SESSION['ShipPricePerProduct'][] =$thischarges;

 }
 for($i=0; $i<$_SESSION['productDetail']['count'];$i++){
  $thisPrice = 0;
  $thisWeight=0;
  $product = $this->Site_model->productdetail($_SESSION['productDetail']['addtocart'][$i]);
  foreach($product as $live){
    $thisPrice = $_SESSION['sale'][$i]*preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
    $totalprice= $totalprice+$thisPrice;
    $myproductCost = $myproductCost +$thisPrice;
    $_SESSION['mainCharge'] =   $myproductCost;
    $total_main_price+=$thisPrice;
    $Weight = $live->ShippingWeight;
    $thisWeight = $_SESSION['sale'][$i]*$Weight;
    $totalWeight = $totalWeight+$thisWeight;
    $LOGIN_USERID="globalfitness";
    $LOGIN_PASSWORD="d5nuspes";
    $BusId="73176053593";
    $BusRole="Shipper";
    $PaymentTerms="Prepaid";
    $OrigCityName="Gardena";
    $OrigStateCode="CA";
    $OrigZipCode="90249";
    $OrigNationCode="USA";
    $DestCityName=$_POST['city'];
    $DestStateCode=$_POST['state'];
    $DestZipCode=$_POST['zipcode'];
    $DestNationCode="USA";
    $ServiceClass="STD";
    $PickupDate=date("Ymd");
    $TypeQuery="QUOTE";
    $LineItemWeight1=$Weight;
    $LineItemNmfcClass1="70";
    $LineItemCount="1";
    $AccOption1="HOMD";
    $Acc="";
    $url = "https://my.yrc.com/dynamic/national/servlet?CONTROLLER=com.rdwy.ec.rexcommon.proxy.http.controller.ProxyApiController&redir=/tfq561&LOGIN_USERID=".$LOGIN_USERID."&LOGIN_PASSWORD=".$LOGIN_PASSWORD."&BusId=".$BusId."&BusRole=".$BusRole."&PaymentTerms=".$PaymentTerms."&OrigCityName=".$OrigCityName."&OrigStateCode=".$OrigStateCode."&OrigZipCode=".$OrigZipCode."&OrigNationCode=".$OrigNationCode."&DestCityName=".$DestCityName."&DestStateCode=".$DestStateCode."&DestZipCode=".$DestZipCode."&DestNationCode=".$DestNationCode."&ServiceClass=".$ServiceClass."&PickupDate=".$PickupDate."&TypeQuery=".$TypeQuery."&LineItemWeight1=".$LineItemWeight1."&LineItemNmfcClass1=".$LineItemNmfcClass1."&LineItemCount=".$LineItemCount."&AccOption1=".$AccOption1."&AccOptionCount=1&LineItemHandlingUnits1=1&LineItemPackageCode1=SKD&LineItemPackageLength1=48&LineItemPackageWidth1=48&LineItemPackageHeight1=48";

    $url = str_replace(' ', '%20', $url);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transaction= curl_exec($curl);
    curl_close($curl);
    $transaction = simplexml_load_string($transaction);
    $charges = $transaction->BodyMain->RateQuote->RatedCharges->TotalCharges;
    $mycharges =  number_format(($charges/100),2);

    /*Code added to deduct shipping factor from YRC API Freight*/
    $ShippingFactorCharge= ($mycharges)-$live->ShippingFactor;
    if($ShippingFactorCharge > 0){
      $mycharges= $ShippingFactorCharge;
    }else{
     $mycharges= 0;
   }
   /*Code end*/
   $thischarges = $mycharges*$_SESSION['sale'][$i];
   $totalprice+=$thischarges;
   $totalshipcharges+=$thischarges;
   $myarraY[] =  "$".number_format($thischarges,2,".",",");
   $_SESSION['ShipPricePerProduct'][] =$thischarges;

 }
}

if(isset($_SESSION['totalTaxOccur'])){
  $_SESSION['totalPrice'] = $totalprice+ceil($_SESSION['totalTaxOccur']);
  $totalprice = $totalprice+ceil($_SESSION['totalTaxOccur']);
}else{
  $_SESSION['totalPrice'] = $totalprice;
}
$myarraY[] =  "$".number_format($totalprice,2,".",",");
$myarraY[] =  "$".number_format($totalshipcharges,2,".",",");
// print_r($myarraY); die;
echo json_encode($myarraY);
}

function payment(){
  if(isset($_SESSION['shipping'])){
    if(isset($_POST['firstname'])){
      $_SESSION['payment'] = $_POST;
      header("location:".base_url('/site/account'));
    }
    $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
    $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
    $data['title'] ="Payment Details | Global Fitness Checkout";
    $data['menu']  = $this->Site_model->menusearch();
    $this->load->view('template/site/header',$data);
    $this->load->view('payment');
    $this->load->view('template/site/footer');
  }
  else{
    redirect("/cart");
  }
}
function AJaxPayment(){
  if(isset($_POST['firstname'])){
    $_SESSION['payment'] = $_POST;
    print_r($_POST);
    echo "Payment Success";
  }
}

function tls(){

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://www.howsmyssl.com/a/check");
  curl_setopt($ch, CURLOPT_SSLVERSION, 6);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
  $tlsVer = json_decode($response, true);
  echo "<h1>Your TLS version is: <u>" . ( $tlsVer['tls_version'] ? $tlsVer['tls_version'] : 'no TLS support' );

  echo phpinfo();

}



function pay_test()
{
//echo phpinfo();die;
  if(isset($_POST['cardnumber'])){  $_SESSION['payment'] = $_POST;}
    $LOGINKEY = "9sa4Y2yXz";// x_login
    $TRANSKEY = "52Y4D4Rau35ZeByu";//x_tran_key
    $firstName =urlencode( $_POST['firstname']);
    $lastName =urlencode($_POST['lastnames']);
    // $creditCardType =urlencode( $_POST['cardtype']);
    $creditCardNumber = urlencode($_POST['cardnumber']);
    $expDateMonth =urlencode( $_POST['cardmonth']);
    // Month must be padded with leading zero
    $padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);
    $expDateYear =urlencode( $_POST['cardyear']);
    $cvv2Number = urlencode($_POST['cardcvv']);
    $address1 = ($_POST['streetadd']);
    $city = urlencode($_POST['city']);
    $state =urlencode( $_POST['states']);
    $zip = urlencode($_POST['zipcode']);
    //give the actual amount below
    $amount = $_POST['totalPrice'];    
    $user_email = $_SESSION['payment']['email'];
    $user_phone = $_SESSION['payment']['primaryphone'];
    $currencyCode="USD";
    $paymentType="Sale";
    $date = $expDateMonth.$expDateYear;
    $post_values = array(
      "x_login"     => "$LOGINKEY",
      "x_tran_key"    => "$TRANSKEY",
      "x_version"     => "3.1",
      "x_delim_data"    => "TRUE",
      "x_delim_char"    => "|",
      "x_relay_response"  => "FALSE",
            //"x_market_type"   => "2",
      "x_device_type"   => "1",
              //"x_type"      => "AUTH_ONLY",
      "x_type"      => "AUTH_CAPTURE",
      "x_method"      => "CC",
      "x_card_num"    => $creditCardNumber,
            //"x_exp_date"    => "0115",
      "x_exp_date"    => $date,
      "x_amount"      => $amount,
            //"x_description"   => "Sample Transaction",
      "x_first_name"    => $firstName,
      "x_last_name"   => $lastName,
      "x_address"     => $address1,
      "x_state"     => $state,
      "x_response_format" => "1",
      "x_zip"       => $zip,
      "x_email" =>$user_email, 
      "x_phone" =>$user_phone
    // Additional fields can be added here as outlined in the AIM integration
    // guide at: http://developer.authorize.net
      );
    $post_string = "";
    foreach( $post_values as $key => $value )$post_string .= "$key=" . urlencode( $value ) . "&";
    $post_string = rtrim($post_string,"& ");

    $post_url = "https://test.authorize.net/gateway/transact.dll";
    //for live use this url
    // $post_url = "https://secure.authorize.net/gateway/transact.dll";
   // $post_url = "https://secure.authorize.net/gateway/transact.dll";
//you need to have at least cURL version 7.34.0 in order to support TLS 1.2.
    $request = curl_init($post_url);
    curl_setopt($request, CURLOPT_HEADER, 0);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($request, CURLOPT_POSTFIELDS, $post_string);
    curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($request, CURLOPT_SSLVERSION, 6);
    $post_response = curl_exec($request);

    if(curl_error($request))
    {
      echo curl_error($request);
    }else
    {
      print_r($post_response);
    }
    die;
    curl_close ($request);
    $response_array = explode($post_values["x_delim_char"],$post_response);

    //print_r($response_array);
    if(isset($post_response) and !empty($post_response))
    {
     if($response_array[0]==1 and $response_array[6]!='')
     {
      $ptid = $response_array[6];
        //$ptidmd5 = $response_array[7];
      $_SESSION['shipping']['transactionId']=$ptid ;
      echo $response_array[3];
      echo "Payment Success"; 
    }
    else
    {
       //echo "Please Enter The Correct Card Details";
     echo $response_array[3];
   }
 }else
 {
  echo "Something went wrong, Please try again";
}

}


function pay(){
  if(isset($_POST['firstname'])){  $_SESSION['payment'] = $_POST;}
    $LOGINKEY = "globalfitness1";// x_login
    $TRANSKEY = "3Q42aDYenm2b36MR";//x_tran_key
    $firstName =urlencode( $_POST['firstname']);
    $lastName =urlencode($_POST['lastnames']);
    // $creditCardType =urlencode( $_POST['cardtype']);
    $creditCardNumber = urlencode($_POST['cardnumber']);
    $expDateMonth =urlencode( $_POST['cardmonth']);
    // Month must be padded with leading zero
    $padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);
    $expDateYear =urlencode( $_POST['cardyear']);
    $cvv2Number = urlencode($_POST['cardcvv']);
    $address1 = ($_POST['streetadd']);
    $city = urlencode($_POST['city']);
    $state =urlencode( $_POST['states']);
    $zip = urlencode($_POST['zipcode']);
    //give the actual amount below
    $amount =  $_SESSION['totalPrice'];    
    $user_email = $_SESSION['payment']['email'];
    $user_phone = $_SESSION['payment']['primaryphone'];
    $currencyCode="USD";
    $paymentType="Sale";
    $date = $expDateMonth.$expDateYear;
    $post_values = array(
      "x_login"     => "$LOGINKEY",
      "x_tran_key"    => "$TRANSKEY",
      "x_version"     => "3.1",
      "x_delim_data"    => "TRUE",
      "x_delim_char"    => "|",
      "x_relay_response"  => "FALSE",
            //"x_market_type"   => "2",
      "x_device_type"   => "1",
              //"x_type"      => "AUTH_ONLY",
      "x_type"      => "AUTH_CAPTURE",
      "x_method"      => "CC",
      "x_card_num"    => $creditCardNumber,
            //"x_exp_date"    => "0115",
      "x_exp_date"    => $date,
      "x_amount"      => $amount,
            //"x_description"   => "Sample Transaction",
      "x_first_name"    => $firstName,
      "x_last_name"   => $lastName,
      "x_address"     => $address1,
      "x_state"     => $state,
      "x_response_format" => "1",
      "x_zip"       => $zip,
      "x_email" =>$user_email, 
      "x_phone" =>$user_phone
    // Additional fields can be added here as outlined in the AIM integration
    // guide at: http://developer.authorize.net
      );
    $post_string = "";
    foreach( $post_values as $key => $value )$post_string .= "$key=" . urlencode( $value ) . "&";
    $post_string = rtrim($post_string,"& ");

   //$post_url = "https://test.authorize.net/gateway/transact.dll";
    //for live use this url
    $post_url = "https://secure.authorize.net/gateway/transact.dll";
   // $post_url = "https://secure.authorize.net/gateway/transact.dll";

    $request = curl_init($post_url);
    curl_setopt($request, CURLOPT_HEADER, 0);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($request, CURLOPT_POSTFIELDS, $post_string);
    curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
    $post_response = curl_exec($request);
    curl_close ($request);
    $response_array = explode($post_values["x_delim_char"],$post_response);

   // echo '<br><br> Response Array'; print_r($response_array);
    if($response_array[0]==2||$response_array[0]==3)
    {
      echo "Please Enter The Correct Card Details";
      // echo '<br><b>Reason</b>: '.$response_array[3];
    }
    else
    {
      $ptid = $response_array[6];
      //$ptidmd5 = $response_array[7];
      $_SESSION['shipping']['transactionId']=$ptid ;
      echo "Payment Success";
    }
  }

  public function account(){
    if(isset($_SESSION['payment'])){
      if($this->session->userdata('userId')!="" || isset($_POST['dataTest'])){

       $this->Site_model->storeallpayment();
       redirect('/site/orderall');
     }
     else{
      $data['title'] ="Create Account | Global Fitness Checkout";
      $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
      $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
      $data['menu']  = $this->Site_model->menusearch();
      $this->load->view('template/site/header',$data);
      $this->load->view('account');
      $this->load->view('template/site/footer');
    }
  }
  else{
    redirect("/cart");
  }
}

  ///////// ajax function //////////////
public function myaccount(){
  if(isset($_SESSION['payment'])){
    if($this->session->userdata('userId')!="" || isset($_POST['dataTest'])) {
     $result = $this->Site_model->storeallpayment();
     print_r('work');
   }
   else{
     echo "nodata";
   }
 }
 else{
  echo "nodatastored";
}
}
  ///////// ajax function //////////////
public function soapclient(){
  $client = new SoapClient("http://my.yrc.com/myyrc-api/national/WebServices/YRCZipFinder_V2.wsdl", array('trace' => 1));
  echo "<pre>";
  print_r($client->__getFunctions());
  print_r($client->__getTypes());
  echo "REQUEST:\n" . $client->__getLastRequest() . "\n";
}

public function orderall(){
  if($this->session->userdata('userId')!="" || $this->session->userdata('userId')==0){
    $data['order'] = $this->Site_model->orderall();
    $data['menu']  = $this->Site_model->menusearch();
    $data['title'] = "Order Successful | Global Fitness Checkout";
    $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
    $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
    $this->load->view('template/site/cartheader',$data);
    $this->load->view('order_detail');
    $this->load->view('template/site/cartfooter');
  }
  else{
    redirect("/cart");
  }
}
public function myorders(){
  if(isset($_POST['whiteGlove'])){
    $body = "<p>Thank you for placing your order with Global Fitness!</p>
    <p style=''>This email is to confirm your recent order.</p>
    <p>  Date ".date('m/d/Y')."</p>
    <p><b> Order Number : </> ".$_SESSION['insert_id']."</p>";
    if($_SESSION['shipping']['home']!=2)

      {        $body.="<p><b>Shipping address</b></p>
    <p>".$_SESSION['shipping']['firstname']." ".$_SESSION['shipping']['lastname']."</p>
    <p>".$_SESSION['shipping']['areacode']."-".$_SESSION['shipping']['primaryphone']."</p>
    <p style=''>".$_SESSION['shipping']['companyname']."</p>
    <p>".$_SESSION['shipping']['streetadress']."</p>
    <p>".$_SESSION['shipping']['state'].", ".$_SESSION['shipping']['city']."  ".$_SESSION['shipping']['zipcode']."</p>
    <p></p>";
  } 
  $body.="<p><b>Billing address</b></p>
  <p>".$_SESSION['payment']['firstname']." ".$_SESSION['payment']['lastnames']."</p>
  <p>".$_SESSION['payment']['areacodes']."-".$_SESSION['shipping']['primaryphone']."</p>
  <p style=''>".$_SESSION['payment']['companys']."</p>
  <p>".$_SESSION['payment']['streetadress']."</p>
  <p>".$_SESSION['payment']['states'].", ".$_SESSION['payment']['city']."  ".$_SESSION['payment']['zipcode']."</p>
  <p></p>";
  $body .=  "<p><b> White Glove Delivery Details</b></p>
  <p> <b>Residential or Business? - </b>".$_POST['colorRadio']."</p>
  <p> <b>Main Floor or Second/Third Floor? - </b>".$_POST['colorRadio2']."- <b>Stairs? -</b> ".$_POST['stairs']."</p>
  <p><b> Tractor Trailer Accessible? - </b>".$_POST['colorRadio1']."</p>
  <p> <b>Doors at the Delivery Location? - </b>".$_POST['colorRadio3']."</p>
  <p><b> Width?  - </b>".$_POST['width']."</p>
  <p></p>";  
  for($i=0; $i<$_SESSION['productDetail']['count'];$i++){
   $product = $this->Site_model->productdetail($_SESSION['productDetail']['addtocart'][$i]);
   foreach($product as $live){
    $thisPrice = preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
    $body.="<p style=''>".$_SESSION['sale'][$i]."x ".$live->ProductName." for $".$thisPrice." each</p>";
  }
}
$body.="
<p style=''>Shipping  : $".$_SESSION['payment']['allshipcharge']." USD</p>";

$body.="<p style=''>Total    : $".$_SESSION['totalPrice']." USD</p>
<p> Please allow 1 - 2 business days to process through our warehouse.  Please note that most U.S. orders ship within 3-7 business days from receipt unless contacted by our staff otherwise.   </p>" ;
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
$from = "support@globalfitness.net";
if (isset($_SESSION['email'])) {
  $to = $_SESSION['email'];
}else{
  $to = $_SESSION['payment']['email'];
}
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
$from = "support@globalfitness.net";
$to = "email@globalfitness.net";
$subject = 'Global Fitness White Glove Delivery';
$message = $body;
    // More headers
$headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
$headers .= 'Bcc: '.$to."\r\n";
mail($to,$subject,$message,$headers); }
if($this->session->userdata('userId')!="" || $this->session->userdata('userId')==0){
  unset($_SESSION['productDetail']);
      // unset($_SESSION['sale']);
      // unset($_SESSION['shipping']);
      // unset($_SESSION['payment']);
      // unset($_SESSION['totalPrice']);
      // unset($_SESSION['ShipPricePerProduct']);
      // unset($_SESSION['totalTaxOccur']);
      // unset($_SESSION['statetax']);
      // unset($_SESSION['TaxPerProduct']);
  unset($_SESSION['upsellz']);
      // unset($_SESSION['strength_details']);
  unset($_SESSION['upsell']);
      // unset($_SESSION['fitness_details']);
  $data['order'] = $this->Site_model->orderall();
  $data['menu']  = $this->Site_model->menusearch();
  $data['title'] = "Order Successful | Global Fitness Checkout";
  $data['category'] =  $this->Site_model->categorySearch('zCardioMenu');
  $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
  $this->load->view('template/site/cartheader',$data);
  $this->load->view('order_details1');
  $this->load->view('template/site/cartfooter');
}
else{
  redirect("/cart");
}
}
public
//////////////////////////////// test header function ///////////////
function testheader()
{
  $data['product'] = $this->Site_model->productSearch("Cardio");
  $data['model_obj'] = $this->Site_model;
  $data['category'] = $this->Site_model->categorySearch('zCardioMenu');
  $data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
  $data['brand'] = $this->Site_model->allrecord('zFitnessBrand');
  $mydata['promo1'] = $this->Site_model->PromoData();
  $mydata['promo2'] = $this->Site_model->PromoData1();
  $mydata['promo3'] = $this->Site_model->PromoData2();
  $mydata['promo4'] = $this->Site_model->PromoData3();
  $mydata['promo5'] = $this->Site_model->PromoData4();
  $data['Author']  ='Global Fitness, Inc., support@globalfitness.us.com';
  $data['description'] = 'Browse the largest inventory of used fitness equipment and refurbished gym equipment for your gym or home. We ship all commercial brands of used gym equipment worldwide from our factory in Los Angeles';
  $data['keywords'] = 'Used fitness equipment, used exercise equipment, commercial fitness equipment, refurbished gym equipment, fitness equipment, used treadmill, life fitness treadmill, precor elliptical, elliptical trainer, used precor elliptical, global fitness, globalfitness, used gym equipment';
  $data['ptype'] = "0";
  $data['title'] = "Used Fitness Equipment and Used Gym Equipment – Global Fitness";
  $data['menu'] = $this->Site_model->menusearch();
  $this->load->view('template/site/test_header', $data);
  $this->load->view('home_new', $mydata);
  $this->load->view('template/site/footer');
}
  //////////////////// test header function/////////////
/******** Function to give results for main header search bar *********/
public function AutoSearching(){
  if(isset($this->session->abc)){
    unset($this->session->abc);
  }
  $data['model_obj'] =  $this->Site_model;
  $data['category']  =  $this->Site_model->categorySearch('zCardioMenu');
  $data['category2'] =  $this->Site_model->categorySearch('zStrengthMenu');
  $data['ptype'] = "0";
  $data['title'] = "Product List";
  $data['menu']  = $this->Site_model->menusearch();
  $data['products'] =  $this->Site_model->typeSearch();
  $this->session->set_userdata('abc',$data['products']);
  $data['product'] = $this->session->abc;
        // echo "<pre>"; print_r($data['products']); die;
  if(!empty($data['product'])){
    $this->load->view('template/site/header',$data);
    $this->load->view('searchalldata');
    $this->load->view('template/site/footer');
  }
  else{
    redirect("/home");
  }
}
public function autosearch(){
  if(isset($_POST['searchword']) && !empty($_POST['searchword'])){
    $search = $this->Site_model->ajaxsearching();
    echo  json_encode($search);
  }
  else{
    echo "1";
  }
}
public function searchajax(){
  $search = $this->Site_model->ajaxsearch();
  if(count($search)>0){
    foreach($search as $products){
      $link  = str_replace("-", "*",$products->ProductName);
      $link  = str_replace(" ", "-",$link);
      $link = strtolower($link);
      if($products->Kingdom=="Cardio"){
        ?>
        <div class="display_box" align="left">
          <a class="searchanchor" href="<?php echo base_url('/cardio').'/'.$link; ?>">

           <?php echo $products->ProductName; ?><br/>
         </a>
       </div>
       <?php
     }
     else
     {
      ?>
      <div class="display_box" align="left">
       <a class="searchanchor" href="<?php echo base_url('strength').'/'.$link; ?>">
        <?php  if(file_exists(getcwd().'/'.$products->ImageURL)){ ?>
        <img src="<?php echo base_url().'/'.$products->ImageURL; ?>"  title="<?php echo $products->MetaDetailPageTitleTag; ?>" alt="<?php echo $products->ProductName; ?>" style="width:30px; float:left; margin-right:6px" />    <?php } ?>
        <?php echo $products->ProductName; ?><br/>

      </a>
    </div>
    <?php
  }
}
}
else
{
  ?>
  <div class="display_box" align="left">
    No records Found
  </div>
  <?php
}
}

function add_wish(){
  $this->Site_model->insert_wish();
}

public function pagination( $offset = 0 ) {
  $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
  $config['total_rows'] = $this->Site_model->total_count();
  $config['per_page']= 4;
  $config['first_link'] = 'First';
  $config['last_link'] = 'Last';
  $config['uri_segment'] = 3;
  $config['base_url']= base_url().'Site/';
  $config['suffix'] = '?'.http_build_query($_GET, '', "&");
  print_r( $config );die();
  $this->pagination->initialize($config);
  $this->data['paginglinks'] = $this->pagination->create_links();
        // Showing total rows count
  if($this->data['paginglinks']!= '') {
    $this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->pagination->total_rows;
  }
  $this->data['result'] = $this->pag->get_users($config["per_page"], $offset);
  $this->load->view('mypagination', $this->data);
}

function twilliocalling(){
  require "twilio/Services/Twilio.php";
  $version = "2010-04-01";
  $AccountSid = "AC4f0016ca2e29ac109f7b9975156f8a78";
  $AuthToken = "3b7ef149c8abe245fa36b3d47599735d";
  $client = new Services_Twilio($AccountSid, $AuthToken);
  try {
    $call = $client->account->calls->create(
        "+13108569484", // The number of the phone initiating the call
        $_GET['number'], // The number of the phone receiving call
        'http://twimlets.com/forward?PhoneNumber=3108080888' // The URL Twilio will request when the call is answered
        );
    $_SESSION['errorto'] = 1;
  } catch (Exception $e) {
    $_SESSION['errorto'] = 'Error: ' . $e->getMessage();

  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}


public function downexcel(){

  redirect("site/mylist");

  $content= '<html xmlns:x="urn:schemas-microsoft-com:office:excel"><head> <!--[if gte mso 9]><xml> <x:ExcelWorkbook> <x:ExcelWorksheets> <x:ExcelWorksheet> <x:Name>Sheet 1</x:Name> <x:WorksheetOptions> <x:Print> <x:ValidPrinterInfo/> </x:Print> </x:WorksheetOptions> </x:ExcelWorksheet> </x:ExcelWorksheets> </x:ExcelWorkbook> </xml> <![endif]--> </head> <body> <table> <thead> <tr> <th >Sr. No.</th> <th >ProductName</th> <th >MPN</th> <th >Piece</th> <th >QuantityOnHand</th> <th >Price</th> </tr> </thead> <tbody>';

  for($i=0; $i<$_SESSION['mylistproduct']['count'];$i++){
    $product = $this->Site_model->mylistmodel($_SESSION['mylistproduct']['listname'][$i]);
    foreach($product as $live){
     $content.='<tr>
     <td>'.($i+1).'</td>
     <td>'.$live->ProductName.'</td>
     <td>'.$live->MPN.'</td>
     <td>'.$live->Piece.'</td> <td>';
     if($live->QuantityOnHand<=0){
      $content.='Out of Stock';
    }
    else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
     $content.="Low Stock";
   }else{
    $content.="In Stock";
  }
  $content.='</td><td>$'.$live->Price.'</td></tr>';
}
}

$content.='</tbody></table></body></html>';

}
}
