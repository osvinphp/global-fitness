<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Brand extends CI_Controller

	{
	function __construct()
		{
		parent::__construct();
		$this->load->model(array(
			"Site_model",
			"Admin_model"
		));
		$this->load->helper("url");
		}
	function index($name)
		{

		$name = str_replace("-", " ", $name);
		$name = str_replace("*", "-", $name);
		$this->Site_model->hitcount($name);
		$myQuery['myproduct'] = $this->Site_model->productSearchByBrand($name);
		$data['product'] = $myQuery['myproduct']['data'];
		$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
		$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
		$data['myprod'] = $this->Site_model->BrandPages($name);
		$data['title'] = $$data['myprod']->MetaPageTitle;
		$data['category_name'] = $name;
		$data['description'] = $data['myprod']->MetaPageDescription;
		$data['keywords'] = $data['myprod']->MetaPageKeywords;
		$data['detail'] = $data['product'];
		$data['mycategory'] = "1";
		$data['check_filter'] = $name;
		$data['menu'] = $this->Site_model->menusearch();
		$data['strength_equipment'] = 'brand';
		$data['availability'] = $this->Site_model->allrecord('zFitnessAvailability');
		$data['brand'][0] = $myQuery['myproduct']['data'][0];
		$data['condition'] = $myQuery['myproduct']['condition'];
		$data['mmcategory'] = $myQuery['myproduct']['category'];
		$data['piece'] = $myQuery['myproduct']['Piece'];
		$this->load->view('template/site/header', $data);
		$this->load->view('CardioFilter_view');
		$this->load->view('template/site/footer');
		}
		public function  googleapi(){
			 if(isset($_GET['pickup_lat'])){
				$pickup_lat = $_GET['pickup_lat'];
				$pickup_long = $_GET['pickup_long'];
				$dropoff_lat = $_GET['dropoff_lat'];
				$dropoff_long = $_GET['dropoff_long'];
				$language =$_GET['language'];
    $key = "AIzaSyB-nEUOm298Ps46jVn3csbuBByR7FFdxKo";
    /*$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&language='.$language.'';*/
     $url = 'https://maps.googleapis.com/maps/api/directions/json?origin='.trim($pickup_lat).','.trim($pickup_long).'&destination='.trim($dropoff_lat).','.trim($dropoff_long).'&key='.$key.'&mode=driving&language='.$language.'';
     $json = file_get_contents($url);
      $data = json_encode($json);
      return $json;
}
		}
	public function filter($name)
		{
		$data['categoryname'] = $name;
		$name = str_replace("-", " ", $name); //spinner like name exactly
		$name = str_replace("*", "-", $name);
		$data['product'] = $this->Site_model->productSearchByBrand($name);
		$data['category'] = $this->Site_model->categorySearch('zCardioMenu');
		$data['category2'] = $this->Site_model->categorySearch('zStrengthMenu');
		$data['title'] = $data['product'][0]->MetaDetailPageTitleTag;
		$data['description'] = $data['product'][0]->MetaDetailPageDescriptionTag;
		$data['keywords'] = $data['product'][0]->MetaDetailPageKeywordTag;
		$data['mycategory'] = "1";
		$data['check_filter'] = $name;
		$data['menu'] = $this->Site_model->menusearch();
		$data['strength_equipment'] = 'brand';
		$data['availability'] = $this->Site_model->allrecord('zFitnessAvailability');
		$data['amps'] = $this->Site_model->allrecord('zFitnessAmps');
		$data['voltage'] = $this->Site_model->allrecord('zFitnessVoltage');
		$data['condition'] = $this->Site_model->allrecord('zFitnessConditions');
		$data['strength_equipment'] = 'brand';
		$categoryDetails = $this->Site_model->categoryDetails($name);
		$data['brand'] = $this->Site_model->fetchBrand($name);
		$data['piece'] = $this->Site_model->fetchPiece($name);
		$data['mmcategory'][0]->Name = $name;
		$data['condition1'] = $this->Site_model->fetchCondition($name);
		$data['check_filter'] = $name;
		$data['title'] = "Product List";
		$data['menu'] = $this->Site_model->menusearch();
		$this->load->view('template/site/header', $data);
		$this->load->view('CardioFilter_view');
		$this->load->view('template/site/footer');
		}
	}