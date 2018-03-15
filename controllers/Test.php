  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  error_reporting(0);

  class Test extends CI_Controller {
   function __construct() {
    parent::__construct();
    $this->load->model(array("Site_model","Admin_model"));
    $this->load->library('session');
  }
 

  public function shippingCharges(){

        $_POST['city']="Gardena"; 
    $_POST['state']="CA";
    $_POST['zipcode']=90248;

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
      $thisPrice = $_SESSION['addon'][$k]*preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->NewPrice);
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
     // echo "<pre>"; print_r($product); die;
      foreach($product as $live){
        $thisPrice = $_SESSION['sale'][$i]*preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->NewPrice);
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
        $ShippingFactorCharge= ($mycharges)-$live->ShippingFactor;
        if($ShippingFactorCharge > 0){
          $mycharges= $mycharges;
        }else{
         $mycharges= 0;
        }
        // print_r($mycharges); die;
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
    echo "<pre>"; print_r($myarraY); die;
    echo json_encode($myarraY);
  }


}
