<?php
class Site_model extends CI_Model {
	public function productSearch($kingdom){
		$query = $this->db->query("SELECT TOP 8 * 	 FROM [dbo].[zItemInventoryDetailAll] where Kingdom='".$kingdom."' ORDER BY QuantityOnHand DESC, TimeCreated DESC")->result();
		return $query;
	}
	public function GetVideo($video){
		$result = $this->db->query("SELECT * FROM [dbo].[RefurbishedVideosByMPN] WHERE [ListID] = '".$video."'")->result();
		return $result;

	}
	public function productSearchrecommand($kingdom){
		$query = $this->db->query("SELECT TOP 30 * 	 FROM [dbo].[zItemInventoryDetailAll] where Kingdom='".$kingdom."' ORDER BY ListID DESC")
		->result();
		return $query;
	}
	public function GetName($var){
		if($var!=""){
			$query = $this->db->query("SELECT Name FROM [dbo].[zMetaDataCategory] where ConanicalURL like '%".$var."%'")->row();
			return $query;
		}
	}
	public function categorySearch($menu){
		if($menu!=""){
			$query = $this->db->query("SELECT *,(select ConanicalURL from [dbo].[zMetaDataCategory] where [dbo].[zMetaDataCategory].[Name] =  [dbo].[$menu].[Name] ) as URL FROM [dbo].[$menu] ORDER BY MenuName ASC")->result();
			return $query;
		}
	}
	public function PromoData(){
		$query = $this->db->query("SELECT  * FROM [dbo].[zIndexPagePromo1] where IsActive = 1")->result();
		return $query;
	}
	public function PromoData1(){
		$query = $this->db->query("SELECT  * FROM [dbo].[zIndexPagePromo2] where IsActive = 1")->result();
		return $query;
	}
	public function PromoData2(){
		$query = $this->db->query("SELECT  * FROM [dbo].[zIndexPagePromo3] where IsActive = 1")->result();
		return $query;
	}
	public function PromoData3(){
		$query = $this->db->query("SELECT  * FROM [dbo].[zIndexPromoVideo] where IsActive = 1")->result();
		return $query;
	}
	public function PromoData4(){
		$query = $this->db->query("SELECT  * FROM [dbo].[zIndexPageCarousel] where IsActive = 1");
		$query1['data'] = $query->result();
		$query1['rows'] = $query->num_rows();
		return $query1;
	}
	public function BrandSearch(){
		$result = $this->db->query('select * from [dbo].[zMetaDataBrandPages]')->result();
		return $result;
	}
	public function metaDataStaticPages($name){
		$result = $this->db->query("select * from [dbo].[zMetaDataStatic] where ConanicalURL like '%".$name."%'")->result();
		return $result;
	}
	public function checkpromo($data){
		$result =	$this->db->query("SELECT  * FROM [dbo].[zFitnessCoupons] where (CoupnCode ='".$data."')")->result();
		return $result;
	}
	function category_listing1($name,$Kingdom){
		$query = $this->db->query("SELECT  * FROM [dbo].[zFitnessCategory] where Name='".$name."' and Kingdom='".$Kingdom."' ORDER BY ID OFFSET 0 ROWS FETCH NEXT 24 ROWS ONLY")->result();
		return $query;
	}
	function category_listing($name){
		$query = $this->db->query("SELECT  * FROM [dbo].[zFitnessCategory] where Name='".$name."' ORDER BY ID OFFSET 0 ROWS FETCH NEXT 24 ROWS ONLY")->result();
		return $query;
	}
	public function categorymetadata($name){
		$name = str_replace(" ", "-", $name);
		$url = $_SERVER['HTTP_HOST']."/".$this->uri->segment(1)."/".$name; 
		$query = $this->db->query("select * FROM [dbo].[zMetaDataCategory] where ConanicalURL like '%".$url."%'")->result();
		return $query;
	}
	public function selecttable($table){
		$query = $this->db->query("SELECT * FROM [dbo].[".$table."]   ORDER BY PartName OFFSET 0 ROWS FETCH NEXT 25 ROWS ONLY")->result();

		return $query;
	}
	public function selectedtable($table){
		$query = $this->db->query("SELECT  * FROM [dbo].[".$table."]")->result();
		return $query;
	}
	public function newtable($limit){
		$query = $this->db->query("SELECT * FROM [dbo].[zFitnessParts]  ORDER BY PartName ASC OFFSET $limit ROWS FETCH NEXT 25 ROWS ONLY")->result();
		return $query;
	}
	public function productdetailbyname($id){
		unset($_SESSION['letssEE']);
		$query = $this->db->query("SELECT  * FROM [dbo].[zCircuitDetail] where ProductName='".$id."'")->result();
		if(empty($query)){
			$_SESSION['letssEE'] = 'yes';
			$query = $this->db->query("SELECT * , (SELECT AVG(cast(star_rate as float)) FROM [dbo].[customer_rating] where [dbo].[customer_rating].product_id= [dbo].[zItemInventoryDetailAll].ListID ) as star_rate ,(SELECT count(cast(star_rate as float))
				FROM [dbo].[customer_rating] where [dbo].[customer_rating].product_id= [dbo].[zItemInventoryDetailAll].ListID ) as star_count FROM [dbo].[zItemInventoryDetailAll] where ProductName = '".$id."'")->result();
		}
		return $query;
	}

	public function productdetailbyMPN($id){
		$query = $this->db->query("SELECT * FROM [dbo].[RelatedStrengthCircuitGroupDetail] where iMPN='".$id[0]->MPN."'")->result();
		return $query;
	}
	public function productSearchBycategory1($id,$cate){
		if($id == 'Other Cardio Machine'){
			$where = " ([dbo].[zItemInventoryDetailAll].[CategoryName] = N'Treadclimber') OR ([dbo].[zItemInventoryDetailAll].[CategoryName] = N'Vibration Platform') OR
			([dbo].[zItemInventoryDetailAll].[CategoryName] = N'Treadwall') ";
		}
		elseif($id == 'OtherStrengthEquipment'){
			$where = "([dbo].[zItemInventoryDetailAll].[CategoryName] = 'Strength Platform') OR
			([dbo].[zItemInventoryDetailAll].[CategoryName] = 'Vertical Knee Raise') OR
			([dbo].[zItemInventoryDetailAll].[CategoryName] = 'Synrgy360') OR
			([dbo].[zItemInventoryDetailAll].[CategoryName] = 'Other Strength Machine')";
		}
		elseif($id == 'Multi Gym'){
			$where = "([dbo].[zItemInventoryDetailAll].[CategoryName] = N'Multi-Gym') OR
			([dbo].[zItemInventoryDetailAll].[CategoryName] = N'Multi-Station')";
		}
		elseif($id == 'Other Strength Machine'){
			$where = " ([dbo].[zItemInventoryDetailAll].[CategoryName] = N'Other Strength Machine') OR
			([dbo].[zItemInventoryDetailAll].[CategoryName] = N'Hydraulic Station') OR
			([dbo].[zItemInventoryDetailAll].[CategoryName] = N'Synrgy360') OR
			([dbo].[zItemInventoryDetailAll].[CategoryName] = N'Strength Platform') ";
		}
		elseif($id == 'Plate Loaded Circuit'){
			$where = " ([dbo].[zItemInventoryDetailAll].[CategoryName] = N'Plate Loaded Station')";
		}
		else{
			$where = "[dbo].[zItemInventoryDetailAll].[CategoryName] = '".$id."'";
		}
		if(isset($_GET['search'])){
			$where.=" and [dbo].[zItemInventoryDetailAll].[ProductName] like '%".$_GET['search']."%'";
		}
		if($id == 'Selectorized Station'){
			$query1 = $this->db->query("SELECT TOP (100) PERCENT dbo.zBrandGroupedSelectorizedStation.*
				FROM dbo.zBrandGroupedSelectorizedStation
				ORDER BY BrandRank")->num_rows();	
		}else{
			$query1 = $this->db->query("SELECT * FROM [dbo].[zItemInventoryDetailAll] where  ".$where."")->num_rows();
		}

		if($query1 % 4 == 0 ){
			$rows = $query1;
		}else{
			$remainder = $query1 % 4;
			$rows = $query1-$remainder ;
		}
		if($id == 'Selectorized Station'){
			$query = $this->db->query("SELECT TOP (100) PERCENT dbo.zBrandGroupedSelectorizedStation.* FROM dbo.zBrandGroupedSelectorizedStation ORDER BY BrandRank")->result();				}
			elseif($id == 'Selectorized Circuit'){
				$query = $this->db->query("SELECT * FROM [dbo].[zCircuitDetail]
					ORDER BY QuantityOnHand DESC")->result();	
			}
			else{
				$query = $this->db->query("SELECT * FROM [dbo].[zItemInventoryDetailAll] where  ".$where." and Kingdom = '".$cate."' ORDER BY QuantityOnHand DESC OFFSET 0 ROWS FETCH NEXT $rows ROWS ONLY")->result();
			}
			return $query;
		}
		public function BrandPages($id){
			$name = str_replace(" ", "-", $id);
			$url = $_SERVER['HTTP_HOST']."/".$this->uri->segment(1)."/".$name; 
			$result = $this->db->query("select * FROM [dbo].[zMetaDataBrandPages] where ConanicalURL like '%".$url."%'")->row();
			return $result;
		}
		public function productSearchByBrand($id){
			$name = str_replace(" ", "-", $id);
			$url = $_SERVER['HTTP_HOST']."/".$this->uri->segment(1)."/".$name; 
			$forbrac = " ";
			$brac = " ";
			$querys  = explode('&', $_SERVER['QUERY_STRING']);
			$params = array();
			foreach( $querys as $param )
			{
				list($name, $value) = explode('=', $param, 2);
				$params[urldecode($name)][] = urldecode($value);
			}
			$result = $this->db->query("select * FROM [dbo].[zMetaDataBrandPages] where ConanicalURL like '%".$url."%'")->row();
			$where = "WHERE 1=1";
			$here =" ORDER BY QuantityOnHand DESC";
			if(isset($_GET['availability'])){
				if ($_GET['availability'] == 'in-stock') {
					$where .="  and cast(QuantityOnHand as float) > 0 ";
				}
			}  if(isset($_GET['price'])){
				if ($_GET['price'] == 'ascending') {
					$here = "ORDER BY Prices ASC";
				}elseif($_GET['price'] == 'descending'){
					$here = "ORDER BY Prices DESC";
				}
			}
			if(isset($_GET['category'])){
				$helloS = str_replace('-',' ',$_GET['category']);
				$where.=" and CategoryName like '%".$helloS."%'";
			}
			if(isset($_GET['piece'])){
				$idata = 0;
				$counter = count($params['piece']);
				foreach($params['piece'] as $helloS){
					$helloS = str_replace('-',' ',$helloS);
					$forbrac = " ( ";
					$brac = " ) ";
					$idata ++;
					if($idata >1){
						$where.=" or Piece like '%".$helloS."%'";
					}else{
						$where.=" and ".$forbrac." Piece like '%".$helloS."%'";
					}
				}
				if($idata == $counter ){
					$where .= " ) ";
				}
			}	
			$query1 = $this->db->query("select *,cast((REPLACE(REPLACE(REPLACE(Price,'$', ''),',',''),'Please Enquire','0.00')) as float) as Prices FROM [dbo].[".$result->PageDataSource."] $where  $here ");
			$query2 = $query1->result();
			$num    = $query1->num_rows();
			if($num % 3 == 0 ){
				$rows = 0;
			}else{
				$remainder = $num % 3;
				$rows = $remainder ;
			} 
			$query['data'] = array_slice($query2, ($rows));			
			$query['Piece'] = $this->db->query("select distinct [dbo].[".$result->PageDataSource."].[Piece] as Name   FROM [dbo].[".$result->PageDataSource."] ")->result();
			$query['category'] = $this->db->query("select distinct [dbo].[".$result->PageDataSource."].[CategoryName] as Name  FROM [dbo].[".$result->PageDataSource."] ")->result();
			$query['condition'] = $this->db->query("select distinct [dbo].[".$result->PageDataSource."].[Condition] as Name FROM [dbo].[".$result->PageDataSource."] ")->result();	
			return $query;
		}
		public function productSearchBycategory($id){
			if($id == 'Other Cardio Machine'){
				$where = " (CategoryName = N'Treadclimber') OR (CategoryName = N'Vibration Platform') OR
				(CategoryName = N'Treadwall') ";
			}
			elseif($id == 'Other Strength Equipment'){
				$where = "(CategoryName = 'Strength Platform') OR
				(CategoryName = 'Vertical Knee Raise') OR
				(CategoryName = 'Synrgy360') OR
				(CategoryName = 'Other Strength Machine')";
			}
			elseif($id == 'Multi Gym'){
				$where = "(CategoryName = N'Multi-Gym') OR
				(CategoryName = N'Multi-Station')";
			}
			elseif($id == 'Other Strength Machine'){
				$where = " (CategoryName = N'Other Strength Machine') OR
				(CategoryName = N'Hydraulic Station') OR
				(CategoryName = N'Synrgy360') OR
				(CategoryName = N'Strength Platform') ";
			}
			elseif($id == 'Plate Loaded Circuit'){
				$where = " (CategoryName = N'Plate Loaded Station')";
			}

			elseif($id == 'Used Gym Flooring Or Mats'){
				$where = " (CategoryName = N'Flooring & Mats')";
			}			
			else{
				$where = "CategoryName = '".$id."'";
			}
			if(isset($_GET['search'])){
				$where.=" and ProductName like '%".$_GET['search']."%'";
			}
			$query1 = $this->db->query("SELECT * FROM [dbo].[zItemInventoryDetailAll] where  ".$where."")->num_rows();
			if($query1 % 4 == 0 ){
				$rows = $query1;
			}else{
				$remainder = $query1 % 4;
				if($query >= 4){
					$rows = $query1-$remainder ;
				}
				else
				{
					$rows = $remainder;
				}
			}	
			if($rows == 0){
				$string = '';
			}else{
				$string = ' OFFSET 0 ROWS FETCH NEXT '.$rows.' ROWS ONLY'	;

			}
			$query = $this->db->query("SELECT * FROM [dbo].[zItemInventoryDetailAll]
				where  ".$where." ORDER BY QuantityOnHand DESC $string")->result();
			return $query;
		}
		public function productingdetail($id){
			$query = $this->db->query("SELECT * FROM [dbo].[zCartUpsells] where ListID = '".$id."'")->result();
			return $query;
		}
		public function checkpassword($id, $password) {
			$this->db->select('Email');
			$this->db->from('dbo.customer_user');
			$this->db->where('ID', $id);
			$this->db->where('Password', md5($password));
			$query = $this->db->get();
			if($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}
		public function Changepassword($attribute) {
			$data = array(
				'Password' => md5($attribute['password'])
				);
			$this->db->where('ID', $attribute['id']);
			$query = $this->db->update('dbo.customer_user', $data);
			if ($query) {
				$this->session->set_flashdata('msg', 'Password Updated Successfully');
				redirect("updatepassword");
			} else {
				$this->session->set_flashdata('msg', 'Error in Updating Password');
				redirect("updatepassword");
			}
		}
		public function productSearchfilter($kingdom){
			$query  = explode('&', $_SERVER['QUERY_STRING']);
			$params = array();
			foreach( $query as $param )
			{
				list($name, $value) = explode('=', $param, 2);
				$params[urldecode($name)][] = urldecode($value);
			}
			$where='';
			$here="ORDER BY QuantityOnHand DESC";
			if(isset($_GET['Availability']))
			{
				if ($_GET['Availability'] == 'In Stock') {
					$where .=" and  cast(QuantityOnHand as float) != 0 ";
				}
			}
			if(isset($_GET['condition'])){
				$where .=" and Condition like '".$_GET['condition']."'";
			}
			if(isset($_GET['brand'])){ 
				foreach($params['brand'] as $helloS){
					$idata ++;
					if($idata >1){
						$values = " or ";
						$mycode = " ) ";
					}else{
						$values = " and ( ";
						$counter = count($params['brand']);
						if($counter < 2){
							$mycode = " )  ";
						}
						else{
							$mycode = " ";
						}
					}
					$where.=" $values BrandName like '".$helloS."' ".$mycode." ";
				}
			}
			if(isset($_GET['category'])){ 
				$where .=" and CategoryName like '".$_GET['category']."'";
			}
			if(isset($_GET['piece'])){
				$idataS = 0;
				foreach($params['piece'] as $hellodataS){
					$idataS ++;
					if($idataS >1){
						$values = " or ";
						$mycode = " ) ";
					}else{
						$values = " and ( ";
						$counter = count($params['piece']);
						if($counter < 2){
							$mycode = " )  ";
						}
						else{
							$mycode = " ";
						}
					}
					$where.=" $values Piece like '".$hellodataS."' ".$mycode." ";
				}
			}
			if(isset($_GET['price'])){
				if ($_GET['price'] == 'ascending') {
					$here = "ORDER BY Prices ASC";
				}elseif($_GET['price'] == 'descending'){
					$here = "ORDER BY Prices DESC";
				}
			}
			if(isset($_GET['Rating'])){
				if($_GET['Rating'] == 'ascending') {
					$here = "ORDER BY star_rate ASC";
				}elseif($_GET['Rating'] == 'descending'){
					$here = "ORDER BY star_rate DESC";
				}
			}
			$query = $this->db->query("SELECT TOP 9 * ,cast((REPLACE(REPLACE(REPLACE(Price,'$', ''),',',''),'Please Enquire','0.00')) as float) as Prices, (SELECT AVG(cast(star_rate as float))
				FROM [dbo].[customer_rating] where [dbo].[customer_rating].product_id= [dbo].[zItemInventoryDetailAll].ListID ) as star_rate FROM [dbo].[zItemInventoryDetailAll] where Kingdom='".$kingdom."' $where $here")->result();
			return $query;
		}
		public function menudata(){
			$count = $_SESSION['productDetail']['count'];
			$i = 0;
			foreach ($_SESSION['productDetail']['addtocart'] as $key => $ListID) {
				if($i==0){
					$mydata = " where (ListID = '".$ListID."')";}
					else{
						$mydata .= " or (ListID = '".$ListID."')";
					}
					$i++;
				}
				$result = $this->db->query("SELECT TOP 4 [id],[ListID],[idListID],[ProductName],[Name],[Sku],[Description],[Price],[Expr1],[Weight],[NMFCCode],[IsHandling],[IsWarranty],[ConditionContingent],[CategoryContingent],[KingdomContingent] FROM [dbo].[zCartUpsells] $mydata" );
				$result1 = $result->result();
				$data = $result->result_array();
				$_SESSION['upsellz'] = $result1;
				$_SESSION['upsell'] =$data;
				return $result1;
			}
			public function menusearch(){
				$result = $this->db->query("SELECT DISTINCT [dbo].[zMobileMenuStage1].[Name],[dbo].[zMobileMenuStage1].[MenuName],[dbo].[zMobileMenuStage1].[LandingPage],[dbo].[zMobileMenuStage1].[LinkTitleTag],[dbo].[zMobileMenuStage1].[Description],[dbo].[zMobileMenuStage1].[Keywords],[dbo].[zMobileMenuStage1].[ID],[dbo].[zMetaDataCategory].[ConanicalURL] FROM [dbo].[zMetaDataCategory]  INNER JOIN  [dbo].[zMobileMenuStage1] ON [dbo].[zMetaDataCategory].[Name] = [dbo].[zMobileMenuStage1].[Name] ORDER BY ID DESC, MenuName")->result();
				return $result;
			}
			public function SuggestionList($data){
				if(isset($_POST['categories']) == 'category'){
					if($CategoryName == 'Other Cardio Machine'){
						$hello = " or (CategoryName = N'Treadclimber') OR(CategoryName = N'Vibration Platform') OR
						(CategoryName = N'Treadwall') ";
					}
					elseif($CategoryName == 'Multi Gym'){
						$hello = " or (CategoryName = N'Multi-Gym') OR
						(CategoryName = N'Multi-Station')";
					}
					else{
						$hello = " ";
					}
					$result = $this->db->query("SELECT Distinct TOP 10 BrandName as Name, BrandRank, [dbo].[zFitnessBrand].[ID]  FROM [dbo].[zItemInventoryDetailAll] JOIN [dbo].[zFitnessBrand] ON  [dbo].[zItemInventoryDetailAll].[BrandName] = [dbo].[zFitnessBrand].[Name]  WHERE [dbo].[zItemInventoryDetailAll].[BrandName] like '%".$data['data1']."%' ".$hello." Order By BrandRank  ")->result();
				}
				else{
					$result = $this->db->query(" SELECT TOP 10 [Name]
						FROM [GlobalFitnessInventory].[dbo].[".$data['key']."]
						WHERE [Name] like '%".$data['data1']."%'")->result();
				}
				return $result;
			}
			public function SuggestionLive($data){
				$result = $this->db->query(" SELECT TOP 10 [ID]
					,[Name]	FROM [GlobalFitnessInventory].[dbo].[zFitnessBrand]	where [Name] like '%".$data."%'	ORDER BY [BrandRank]")->result();
				return $result;
			}
			public function productSearchBycategoryfilter2($id){
				$id = str_replace("-", " ", $id);
				$id = str_replace("*", "-", $id);
				$forbrac = " ";
				$brac = " ";
				$query  = explode('&', $_SERVER['QUERY_STRING']);
				$params = array();
				foreach( $query as $param )
				{
					list($name, $value) = explode('=', $param, 2);
					$params[urldecode($name)][] = urldecode($value);
				}
				if($id == 'Other Cardio Machine'){
					$bracket =" ( ";
					$hello = " or (CategoryName = N'Treadclimber') OR (CategoryName = N'Vibration Platform') OR
					(CategoryName = N'Treadwall')) ";
				}
				elseif($id == 'Multi Gym'){
					$bracket =" ( ";
					$hello = " or (CategoryName = N'Multi-Gym') OR
					(CategoryName = N'Multi-Station')";
				}
				elseif($id == 'Other Strength Machine'){
					$bracket =" ( ";
					$hello = " or  (CategoryName = N'Other Strength Machine') OR
					(CategoryName = N'Hydraulic Station') OR
					(CategoryName = N'Synrgy360') OR
					(CategoryName = N'Strength Platform') ) ";
				}
				elseif($id == 'Plate Loaded Circuit'){
					$hello = " or  (CategoryName = N'Plate Loaded Station')";
				}
				else{
					$hello = " ";
					$bracket =" ";
				}
				$where ='';
				$here =" ORDER BY QuantityOnHand DESC";
				if(isset($_GET['availability']))
				{
					if ($_GET['availability'] == 'in-stock') {
						$where .="  and cast(QuantityOnHand as float) != 0 ";
					}
				}
				if(isset($_GET['condition'])){
					$where.=" and Condition like '%".$_GET['condition']."%'";
				}
				if(isset($_GET['brand'])){
					$idata = 0;
					$counter = count($params['brand']);
					foreach($params['brand'] as $helloS){
						$forbrac = " ( ";
						$brac = " ) ";
						$idata ++;
						if($idata >1){
							$where.=" or BrandName like '".$helloS."' ";
						}else{
							$where.=" and ".$forbrac." BrandName like '".$helloS."' ";
						}
					}
					if($idata == $counter ){
						$where .= " ) ";
					}
				}
				if(isset($_GET['category'])){
					$where.=" and CategoryName like '%".$_GET['category']."%'";
				}
				if(isset($_GET['search'])){
					$where.=" and ProductName like '%".$_GET['search']."%'";
				}
				if(isset($_GET['piece'])){
					$idata = 0;
					$counter = count($params['piece']);
					foreach($params['piece'] as $helloS){
						$forbrac = " ( ";
						$brac = " ) ";
						$idata ++;
						if($idata >1){
							$where.=" or Piece like '".$helloS."' ";
						}else{
							$where.=" and ".$forbrac." Piece like '".$helloS."' ";
						}
					}
					if($idata == $counter ){
						$where .= " ) ";
					}
				}
				if(isset($_GET['price'])){
					if ($_GET['price'] == 'ascending') {
						$here = "ORDER BY Prices ASC";
					}elseif($_GET['price'] == 'descending'){
						$here = "ORDER BY Prices DESC";
					}
				}
				if(isset($_GET['Rating'])){
					if ($_GET['Rating'] == 'ascending') {
						$here = "ORDER BY star_rate ASC";
					}elseif($_GET['Rating'] == 'descending'){
						$here = "ORDER BY star_rate DESC";
					}
				}
				$query = $this->db->query("SELECT *,cast((REPLACE(REPLACE(REPLACE(Price,'$', ''),',',''),'Please Enquire','0.00')) as float) as Prices,(SELECT AVG(cast(star_rate as float)) FROM [dbo].[customer_rating] where [dbo].[customer_rating].product_id= [dbo].[zItemInventoryDetailAll].ListID )
					as star_rate  FROM [dbo].[zItemInventoryDetailAll] where ".$bracket." CategoryName = '".$id."'
					$hello $where $here OFFSET 0 ROWS FETCH NEXT 100 ROWS ONLY")->result();
				return $query;
			}
			public function productSearchBycategoryfilter1($id,$cate){
				$id = str_replace("-", " ", $id);
				$id = str_replace("*", "-", $id);
				$forbrac = " ";
				$brac = " ";
				$query  = explode('&', $_SERVER['QUERY_STRING']);
				$params = array();
				foreach( $query as $param )
				{
					list($name, $value) = explode('=', $param, 2);
					$params[urldecode($name)][] = urldecode($value);
				}
				if($id == 'Other Cardio Machine'){
					$bracket =" ( ";
					$hello = " or (CategoryName = N'Treadclimber') OR (CategoryName = N'Vibration Platform') OR
					(CategoryName = N'Treadwall')) ";
				}
				elseif($id == 'Multi Gym'){
					$bracket ="  ";
					$hello = " or (CategoryName = N'Multi-Gym') OR
					(CategoryName = N'Multi-Station')";
				}
				elseif($id == 'Other Strength Machine'){
					$bracket =" ( ";
					$hello = " or  (CategoryName = N'Other Strength Machine') OR
					(CategoryName = N'Hydraulic Station') OR
					(CategoryName = N'Synrgy360') OR
					(CategoryName = N'Strength Platform') ) ";
				}
				elseif($id == 'Plate Loaded Circuit'){
					$hello = " or  (CategoryName = N'Plate Loaded Station')";
				}
				else{
					$hello = " ";
					$bracket =" ";
				}
				$where ='';
				$here =" ORDER BY QuantityOnHand DESC";
				if(isset($_GET['availability']))
				{
					if ($_GET['availability'] == 'in-stock') {
						$where .="  and cast(QuantityOnHand as float) != 0 ";
					}
				}
				if(isset($_GET['condition'])){
					$helloS = str_replace('-',' ',$_GET['condition']);
					$where.=" and Condition like '%".$helloS."%'";
				}
				if(isset($_GET['brand'])){
					$idata = 0;
					$counter = count($params['brand']);
					foreach($params['brand'] as $helloS){
						$helloS = str_replace('-',' ',$helloS);
						$forbrac = " ( ";
						$brac = " ) ";
						$idata ++;
						if($idata >1){
							$where.=" or BrandName like  '%".$helloS."%'";
						}else{
							$where.=" and ".$forbrac." BrandName like  '%".$helloS."%'";
						}
					}
					if($idata == $counter ){
						$where .= " ) ";
					}
				}
				if(isset($_GET['category'])){
					$helloS = str_replace('-',' ',$_GET['category']);
					$where.=" and CategoryName like '%".$helloS."%'";
				}
				if(isset($_GET['search'])){
					$helloS = str_replace('-',' ',$_GET['search']);

					$where.=" and ProductName like '%".$helloS."%'";
				}
				if(isset($_GET['piece'])){
					$idata = 0;
					$counter = count($params['piece']);
					foreach($params['piece'] as $helloS){
						$helloS = str_replace('-',' ',$helloS);
						$forbrac = " ( ";
						$brac = " ) ";
						$idata ++;
						if($idata >1){
							$where.=" or Piece like '%".$helloS."%'";
						}else{
							$where.=" and ".$forbrac." Piece like '%".$helloS."%'";
						}
					}
					if($idata == $counter ){
						$where .= " ) ";
					}
				}
				if(isset($_GET['price'])){
					if ($_GET['price'] == 'ascending') {
						$here = "ORDER BY Prices ASC";
					}elseif($_GET['price'] == 'descending'){
						$here = "ORDER BY Prices DESC";
					}
				}
				if(isset($_GET['rating'])){
					if ($_GET['rating'] == 'ascending') {
						$here = "ORDER BY star_rate ASC";
					}elseif($_GET['rating'] == 'descending'){
						$here = "ORDER BY star_rate DESC";
					}
				}
				if($id == 'Selectorized Station' && empty($_GET)){
					$query = $this->db->query("SELECT TOP (100) PERCENT dbo.zBrandGroupedSelectorizedStation.* FROM dbo.zBrandGroupedSelectorizedStation ORDER BY BrandRank");
					$query1 = $query->result();
					$num   = $query->num_rows();
				}
				elseif($id == 'Selectorized Circuit' && empty($_GET) ){
					$query = $this->db->query("SELECT * FROM [dbo].[zCircuitDetail] ORDER BY QuantityOnHand DESC");
					$query1 = $query->result();
					$num   = $query->num_rows();	
				}else{
					$query = $this->db->query("SELECT *,
						cast((REPLACE(REPLACE(REPLACE(Price,'$', ''),',',''),'Please Enquire','0.00')) as float) as Prices,
						(SELECT AVG(cast(star_rate as float)) FROM [dbo].[customer_rating] where
						[dbo].[customer_rating].product_id= [dbo].[zItemInventoryDetailAll].ListID )
						as star_rate  FROM [dbo].[zItemInventoryDetailAll] where ".$bracket."
						CategoryName = '".$id."'  and Kingdom = '".$cate."' $hello $where $here");
					$query1 = $query->result();
					$num   = $query->num_rows();
				}

				/********  Code commented to display only 2 products********/

// echo "<pre>";print_r($num);die;



				if($num == 2 )
				{
					if($num % 2 == 0 ){	$rows = 0;}
					else{
						$remainder = $num % 2;
						$rows = $remainder ;
					}
				}else{
					if($num % 3 == 0 ){
						$rows = 0;
					}else if($num % 3 == 2)
					{
		// $remainder = $num % 3;
						$rows = 0;
					} else{
						$remainder = $num % 3;
						$rows = $remainder ;
					}
				}
				// echo $rows;
				$array = array_slice($query1, ($rows));
				return $array;
			}
			public function selectwithwhere( $num,$table, $where ,$val){
				$result = $this->db->query("SELECT ".$num." FROM [dbo].[".$table."] where [".$where."] = '".$val."'")->result();
				return $result;

			}
			public function productSearchBycategoryfilter($id){
				$forbrac = " ";
				$brac = " ";
				$query  = explode('&', $_SERVER['QUERY_STRING']);
				$params = array();
				foreach( $query as $param )
				{
					list($name, $value) = explode('=', $param, 2);
					$params[urldecode($name)][] = urldecode($value);
				}
				if($id == 'Other Cardio Machine'){
					$bracket =" ( ";
					$hello = " or (CategoryName = N'Treadclimber') OR (CategoryName = N'Vibration Platform') OR
					(CategoryName = N'Treadwall')) ";
				}
				elseif($id == 'Multi Gym'){
					$bracket =" ( ";
					$hello = " or (CategoryName = N'Multi-Gym') OR
					(CategoryName = N'Multi-Station')";
				}
				elseif($id == 'Other Strength Machine'){
					$bracket =" ( ";
					$hello = " or  (CategoryName = N'Other Strength Machine') OR
					(CategoryName = N'Hydraulic Station') OR
					(CategoryName = N'Synrgy360') OR
					(CategoryName = N'Strength Platform') ) ";
				}
				elseif($id == 'Plate Loaded Circuit'){
					$hello = " or  (CategoryName = N'Plate Loaded Station')";
				}
				else{
					$hello = " ";
					$bracket =" ";
				}
				$where ='';
				$here =" ORDER BY QuantityOnHand DESC";
				if(isset($_GET['availability']))
				{
					if ($_GET['availability'] == 'In Stock') {
						$where .="  and cast(QuantityOnHand as float) != 0 ";
					}
				}
				if(isset($_GET['condition'])){
					$where.=" and Condition like '%".$_GET['condition']."%'";
				}
				if(isset($_GET['brand'])){
					$idata = 0;
					$counter = count($params['brand']);
					foreach($params['brand'] as $helloS){
						$forbrac = " ( ";
						$brac = " ) ";
						$idata ++;
						if($idata >1){
							$where.=" or BrandName like '".$helloS."' ";
						}else{
							$where.=" and ".$forbrac." BrandName like '".$helloS."' ";
						}
					}
					if($idata == $counter ){
						$where .= " ) ";
					}
				}
				if(isset($_GET['category'])){
					$where.=" and CategoryName like '%".$_GET['category']."%'";
				}
				if(isset($_GET['search'])){
					$where.=" and ProductName like '%".$_GET['search']."%'";
				}
				if(isset($_GET['piece'])){
					$idata = 0;
					$counter = count($params['piece']);
					foreach($params['piece'] as $helloS){
						$forbrac = " ( ";
						$brac = " ) ";
						$idata ++;
						if($idata >1){
							$where.=" or Piece like '".$helloS."' ";
						}else{
							$where.=" and ".$forbrac." Piece like '".$helloS."' ";
						}
					}
					if($idata == $counter ){
						$where .= " ) ";
					}
				}
				if(isset($_GET['price'])){
					if ($_GET['price'] == 'ascending') {
						$here = "ORDER BY Prices ASC";
					}elseif($_GET['price'] == 'descending'){
						$here = "ORDER BY Prices DESC";
					}
				}
				if(isset($_GET['Rating'])){
					if ($_GET['Rating'] == 'ascending') {
						$here = "ORDER BY star_rate ASC";
					}elseif($_GET['Rating'] == 'descending'){
						$here = "ORDER BY star_rate DESC";
					}
				}
				$query = $this->db->query("SELECT *,cast((REPLACE(REPLACE(REPLACE(Price,'$', ''),',',''),'Please Enquire','0.00')) as float) as Prices, (SELECT AVG(cast(star_rate as float)) FROM [dbo].[customer_rating] where [dbo].[customer_rating].product_id= [dbo].[zItemInventoryDetailAll].ListID ) as star_rate  FROM [dbo].[zItemInventoryDetailAll] where ".$bracket." CategoryName = '".$id."' $hello $where $here OFFSET 0 ROWS FETCH NEXT 25 ROWS ONLY")->result();
				return $query;
			}
			public function liveinventory(){
				$mydata = " ";
				$checkdata = " ";
				$query  = explode('&', $_SERVER['QUERY_STRING']);
				$params = array();
				foreach( $query as $param )
				{
					list($name, $value) = explode('=', $param, 2);
					$params[urldecode($name)][] = urldecode($value);
				}
				$where = "WHERE 1=1";
				$order="ORDER BY QuantityOnHand DESC, TimeCreated DESC";
				if(isset($_GET['condition'])){
					$where .= " and Condition like '%".$_GET['condition']."%'";
				}
				if(isset($_GET['Availability']))
				{
					if ($_GET['Availability'] == 'In Stock') {
						$where .= " and cast(QuantityOnHand as float) > 0 ";
					}
				}
				if(isset($_GET['price'])){
					if ($_GET['price'] == 'ascending') {
						$order = "ORDER BY Price ASC";
					}elseif($_GET['price'] == 'descending'){
						$order = "ORDER BY Price DESC";
					}
				}
				if(isset($_GET['rating'])){
					if ($_GET['rating'] == 'ascending') {
						$order = "ORDER BY star_rate ASC";
					}elseif($_GET['rating'] == 'descending'){
						$order = "ORDER BY star_rate DESC";
					}
				}
				if(isset($_GET['brand'])){
					$idata = 0;
					foreach($params['brand'] as $helloS){
						$idata ++;
						if($idata >1){
							$values = " or ";
							$mycode = " ) ";
						}else{
							$values = " and ( ";
							$counter = count($params['brand']);
							if($counter < 2){
								$mycode = " )  ";
							}
							else{
								$mycode = " ";
							}
						}
						$where.=" $values BrandName like '".$helloS."' ".$mycode." ";
					}
				}
				if(isset($_GET['category'])){
					$where .= " and CategoryName like '%".$_GET['category']."%'";
				}
				if(isset($_GET['search'])){
					$where .= " and ProductName like '%".$_GET['search']."%'";
				}
				if(isset($_GET['piece'])){
					$idataS = 0;
					$counter = count($params['piece']);
					foreach($params['piece'] as $hellodataS){
						$idataS ++;
						if($idataS >1){
							$values = " or ";
							$mycode = "  ";
							if($idataS == $counter){
								$mycode = " ) ";
							}
						}else{
							$values = " and ( ";
							if($counter == $idataS){
								$mycode = " )  ";
							}
							else{
								$mycode = " ";
							}
						}
						$where.=" $values Piece like '".$hellodataS."' ".$mycode." ";
					}
				}
				$query = $this->db->query("SELECT *,(SELECT count(*) FROM [dbo].[wish_list] WHERE [dbo].[wish_list].UserID='".$_SESSION['userId']."' AND [dbo].[wish_list].ProductName = [dbo].[zLiveInventoryAll].ProductName) as countwish, (SELECT AVG(cast(star_rate as float)) FROM [dbo].[customer_rating] where [dbo].[customer_rating].product_id= [dbo].[zLiveInventoryAll].ListID ) as star_rate  FROM [dbo].[zLiveInventoryAll] $where $order  OFFSET 0 ROWS FETCH NEXT 1500 ROWS ONLY")->result();

				return $query;
			}
			public function NextCategoryRecord($limit,$filter,$Category){
				$where = "";
				$order="ORDER BY QuantityOnHand DESC, TimeCreated DESC";
				if(isset($filter['Availability']))
				{
					if ($filter['Availability'] == 'In Stock') {
						$where = " where cast(QuantityOnHand as float) != 0 ";
					}
				}
				if(isset($filter['Price'])){
					if ($filter['Price'] == 'ascending') {
						$order = "ORDER BY Prices ASC";
					}elseif($filter['Price'] == 'descending'){
						$order = "ORDER BY Prices DESC";
					}
				}
				if(isset($filter['condition'])){
					$where = " where Condition like '%".$filter['condition']."%'";
				}
				if(isset($filter['brand'])){
					$where = " where BrandName like '%".$filter['brand']."%'";
				}
				if(isset($filter['category'])){
					$where = " where CategoryName like '%".$filter['category']."%'";
				}
				if(isset($filter['piece'])){
					$where = " where Piece like '%".$filter['piece']."%'";
				}
				if(isset($filter['search'])){
					$where = " where ProductName like '%".$filter['search']."%'";
				}
				$query = $this->db->query("SELECT *,cast((REPLACE(REPLACE(REPLACE(Price,'$', ''),',',''),'Please Enquire','0.00')) as float) as Prices, (SELECT AVG(cast(star_rate as float)) FROM [dbo].[customer_rating] where [dbo].[customer_rating].product_id= [dbo].[zItemInventoryDetailAll].ListID ) as star_rate  FROM [dbo].[zItemInventoryDetailAll] where  CategoryName = '".$Category."'  $where $order OFFSET $limit ROWS FETCH NEXT 25 ROWS ONLY")->result();
				return $query;
			}
			public function nextrecord($limit,$filter){
				$where = "";
				$order="ORDER BY QuantityOnHand DESC, TimeCreated DESC";
				if(isset($filter['Availability']))
				{
					if($filter['Availability'] == 'In Stock') {
						$where = " where cast(QuantityOnHand as float) != 0 ";
					}
				}
				if(isset($filter['Price'])){
					if($filter['Price'] == 'ascending') {
						$order = "ORDER BY Prices ASC";
					}elseif($filter['Price'] == 'descending'){
						$order = "ORDER BY Prices DESC";
					}
				}
				if(isset($filter['condition'])){
					$where = " where Condition like '%".$filter['condition']."%'";
				}
				if(isset($filter['brand'])){
					$where = " where BrandName like '%".$filter['brand']."%'";
				}
				if(isset($filter['category'])){
					$where = " where CategoryName like '%".$filter['category']."%'";
				}
				if(isset($filter['piece'])){
					$where = " where Piece like '%".$filter['piece']."%'";
				}
				if(isset($filter['search'])){
					$where = " where ProductName like '%".$filter['search']."%'";
				}
				$query = $this->db->query("SELECT *,cast((REPLACE(REPLACE(REPLACE(Price,'$', ''),',',''),'Please Enquire','0.00')) as float) as Prices,(SELECT count(*) FROM [dbo].[wish_list] WHERE [dbo].[wish_list].UserID='".$_SESSION['userId']."' AND [dbo].[wish_list].ProductName = [dbo].[zLiveInventoryAll].ProductName) as countwish,(SELECT AVG(cast(star_rate as float)) FROM [dbo].[customer_rating] where [dbo].[customer_rating].product_id= [dbo].[zLiveInventoryAll].ListID ) as star_rate  FROM [dbo].[zLiveInventoryAll] $where $order OFFSET $limit ROWS FETCH NEXT 25 ROWS ONLY")->result();
				return $query;
			}
			public function insertcart($sql){
				$this->db->query($sql);
			}
			public function mylistmodel($id){
				$query = $this->db->query("SELECT * FROM [dbo].[zLiveInventoryAll] where ProductName = '".$id."'")->result();
				return $query;
			}
			public function mylistingmodel($id){
				$query = $this->db->query("SELECT * FROM [dbo].[zFitnessParts] where PartName = '".$id."'")->result();
				return $query;
			}
			public function searchcity($key){
				$query = $this->db->query("SELECT * FROM [dbo].[zip_code] where zip LIKE '%".$key."%'")->result();
				return $query;
			}
			public function searchState($id){
				$query = $this->db->query("SELECT * FROM [dbo].[zip_code] where zip = '$id'")->result();
				return $query;
			}
			public function customepagedetail(){
				$query = $this->db->query("SELECT * FROM [dbo].[custom_page] where Id>22 ")->result();
				return $query;
			}
			public function rate($id){
				$query = $this->db->from("dbo.customer_rating")
				->where("customer_id",$this->session->userdata("userId"))
				->where("product_id",$id)
				->get()->result();
				if(count($query)==0){
					$data = array(	
						"customer_id"=>$this->session->userdata("userId"),
						"star_rate"=>$this->input->post("star"),
						"brief"=>$this->input->post("brief"),
						"description"=>$this->input->post("review"),
						"product_id"=>$id,
						"created"=>date("Y-m-d h:i:s")
						);
					$this->db->insert("dbo.customer_rating",$data);
				}
				else
				{
					$data = array(
						"star_rate"=>$this->input->post("star"),
						"brief"=>$this->input->post("brief"),
						"description"=>$this->input->post("review"),
						"created"=>date("Y-m-d h:i:s")
						);
					$this->db->where("customer_id",$this->session->userdata("userId"))
					->where("product_id",$id);
					$this->db->update("dbo.customer_rating",$data);
				}
			}
			public function getreviews($id){
				if($this->session->userdata('userId')==""){
					$sql=0;
				}
				else{
					$sql = "SELECT COUNT(*) from [dbo].[review_help] where [dbo].[review_help].[review_id] = [dbo].[customer_rating].[ID] AND [dbo].[review_help].[customer_id] = '".$this->session->userdata('userId')."'";
				}
				$query = $this->db->select("dbo.customer_rating.*,dbo.customer_user.FirstName,dbo.customer_user.MiddleName,dbo.customer_user.LastName,(SELECT COUNT(*) from [dbo].[review_help] where [dbo].[review_help].[review_id] = [dbo].[customer_rating].[ID]) as total, (SELECT COUNT(*) from [dbo].[review_help] where [dbo].[review_help].[review_id] = [dbo].[customer_rating].[ID] AND [dbo].[review_help].[action] = 'Yes') as totalhelp ,($sql) as myhelp")
				->from("dbo.customer_rating")
				->join("dbo.customer_user","dbo.customer_user.ID=dbo.customer_rating.customer_id")
				->where("dbo.customer_rating.product_id = '".$id."'")
				->where("dbo.customer_rating.admin_status",1)
				->order_by("dbo.customer_rating.created","DESC")
				->get()->result();
				return $query;
			}
			public function help(){
				$data = array("customer_id"=>$this->session->userdata("userId"),
					"review_id"=>$this->input->post("review_id"),
					"action"=>$this->input->post("action")
					);
				$this->db->insert("dbo.review_help",$data);
			}
			public function hitcount($cat){
				mysqli_real_escape_string($this->db->query("UPDATE [dbo].[zFitnessCategory] SET [ClickCount] = (SELECT [ClickCount] From [dbo].[zFitnessCategory] WHERE [Name] = '".$cat."')+1 WHERE [Name] = '".$cat."'"));
			}
			public function allrecord($table_name){

				if($table_name=="zFitnessBrand"){
					$order_by = " ORDER BY BrandRank ASC ";
				}
				else{
					$order_by = " ORDER BY Name ASC ";
				}
				$query = $this->db->query("SELECT * FROM [dbo].[$table_name] $order_by")->result();
				return $query;
			}
			public function allrecord1($table_name){
				if($table_name=="zFitnessBrand"){
					$order_by = " ORDER BY BrandRank DESC ";
				}
				elseif($table_name =="zBrandFilterStrength" || $table_name=="zBrandFilterCardio"){
					$order_by = " ORDER BY BrandRank ";
				}
				else{
					$order_by = " ORDER BY Name ASC ";
				}
				$query = $this->db->query("SELECT TOP 11 * FROM [dbo].[".$table_name."] $order_by")->result();
				return $query;
			}
			public function storeallpayment(){
				if(isset($_SESSION['productDetail']['myextracart']) && !empty($_SESSION['productDetail']['myextracart'])){
					foreach ($_SESSION['productDetail']['myextracart'] as $key => $value) {
						$datS[]  = $value->idListID;
						$Jus = array_merge($datS,$_SESSION['productDetail']['addtocart']);
						$Jus1 = array_merge($_SESSION['addon'],$_SESSION['sale']);
					}
				}
				else{		
					$Jus = $_SESSION['productDetail']['addtocart'];
					$Jus1 = $_SESSION['sale'];	 
				}
				$piece = implode(",,,,",$Jus1);
				$products= implode(",,,,",$Jus);
				$userId = $_SESSION['userId'];
				$last_id = $this->db->query("SELECT ID FROM dbo.order_detail ORDER BY ID DESC OFFSET 0 ROWS FETCH NEXT 1 ROWS ONLY")->row();
				$new_id   = $last_id->ID +1;
				if(empty($userId) || $userId == 0){
					$userId  = 0;
					$_SESSION['userId']  = 0;
				}
				$link  = str_replace("$", "",$_SESSION['payment']['allpayment']);
				$_SESSION['payment']['allpayment'] = str_replace(",", "",$link);
				$link  = str_replace("$", "",$_SESSION['payment']['allshipcharge']);
				$_SESSION['payment']['allshipcharge'] = str_replace(",", "",$link);
				$link  = str_replace("$", "",$_SESSION['payment']['allmainpayment']);
				$_SESSION['payment']['allmainpayment'] = str_replace(",", "",$link);

	//$newstring = substr($_SESSION['payment']['cardnumber'], -4);
				$newstring = $_SESSION['payment']['cardnumber'];

				if(!isset($_SESSION['TaxPerProduct']) || empty($_SESSION['TaxPerProduct'])){
					$TaxPerProduct = 0;
				}else{
					$newArray = array_slice($array, 0, 3);
					$TaxPerProduct= implode(",,,,",$_SESSION['TaxPerProduct']);
				}
				$data = array(
					'guest_userid'=>$new_id,
					"order_date"=>date("Y-m-d h:i:s"),
					"ListID"=>$products,
					"UserId"=>$userId,
					"piece"=>$piece,
					"shippingfirstname"=>$_SESSION['shipping']['firstname'],
					"shippinglastname"=>$_SESSION['shipping']['lastname'],
					"shippingcompanyname"=>$_SESSION['shipping']['companyname'],
					"shippingareacode"=>$_SESSION['shipping']['areacode'],
					"shippingprimaryphone"=>$_SESSION['shipping']['primaryphone'],
					"shippingstreetadress"=>$_SESSION['shipping']['streetadress'],
					"shippingstate"=>$_SESSION['shipping']['state'],
					"shippingcity"=>$_SESSION['shipping']['city'],
					"shippingzipcode"=>$_SESSION['shipping']['zipcode'],
					"shippinghome"=>$_SESSION['shipping']['home'],
					"transactionId"=>$_SESSION['shipping']['transactionId'],
					"billingfirstname"=>$_SESSION['payment']['firstname'],
					"billinglastnames"=>$_SESSION['payment']['lastnames'],
					"billingareacodes"=>$_SESSION['payment']['areacodes'],
					"billingprimaryphone"=>$_SESSION['payment']['primaryphone'],
					"billingemail"=>$_SESSION['payment']['email'],
					"billingcompanys"=>$_SESSION['payment']['companys'],
					"billingstreetadd"=>$_SESSION['payment']['streetadd'],
					"billingsuite"=>$_SESSION['payment']['suite'],
					"billingstates"=>$_SESSION['payment']['states'],
					"billingcity"=>$_SESSION['payment']['city'],
					"billingzipcode"=>$_SESSION['payment']['zipcode'],
					"billingallpayment"=>$_SESSION['payment']['allpayment'],
					"paymenttype"=>$_SESSION['payment']['paymenttype'],
					"cardtype"=>$_SESSION['payment']['cardtype'],
					"cardholder"=>$_SESSION['payment']['cardholder'],
					"cardnumber"=>$newstring,
					"cardcvv"=>$_SESSION['payment']['cardcvv'],
					"cardmonth"=>$_SESSION['payment']['cardmonth'],
					"cardyear"=>$_SESSION['payment']['cardyear'],
					"allshipcharge"=>$_SESSION['payment']['allshipcharge'],
					"allmainpayment"=>$_SESSION['payment']['allmainpayment'],
					"salestax" => $TaxPerProduct,
					);
				if(isset($_SESSION['shipping']['buisness'])){
					$data['buisness'] = 1;
				}
				else{
					$data['buisness'] = 0;
				}
				$this->db->insert("dbo.order_detail",$data);
				$_SESSION['insert_id'] = $this->db->insert_id();
				$order = $this->orderall();
				$body = "<p>Thank you for placing your order with Global Fitness!</p>
				<p style=''>This email is to confirm your recent order.</p>
				<p>  Date ".date('m/d/Y')."</p>
				<p> Order Number : ".$order[0]->ID." </p>
				";
				if($_SESSION['shipping']['home']!=2)
				{
					$body.="<p><b>Shipping address</b></p>
					<p>".$_SESSION['shipping']['firstname']." ".$_SESSION['shipping']['lastname']."</p>
					<p>".$_SESSION['shipping']['areacode']."-".$_SESSION['shipping']['primaryphone']."</p>
					<p style=''>".$_SESSION['shipping']['companyname']."</p>
					<p>".$_SESSION['shipping']['streetadress']."</p>
					<p>".$_SESSION['shipping']['state'].", ".$_SESSION['shipping']['city']."  ".$_SESSION['shipping']['zipcode']."</p>
					<p>United States</p>
					<p></p>";
				}
				$body.="<p><b>Billing address</b></p>
				<p>".$_SESSION['payment']['firstname']." ".$_SESSION['payment']['lastnames']."</p>
				<p>".$_SESSION['payment']['areacodes']."-".$_SESSION['shipping']['primaryphone']."</p>
				<p style=''>".$_SESSION['payment']['companys']."</p>
				<p>".$_SESSION['payment']['streetadress']."</p>
				<p>".$_SESSION['payment']['states'].", ".$_SESSION['payment']['city']."  ".$_SESSION['payment']['zipcode']."</p>
				<p>United States</p>
				<p></p>";
				for($i=0; $i<$_SESSION['productDetail']['count'];$i++){
					$product = $this->Site_model->productdetail($_SESSION['productDetail']['addtocart'][$i]);
					foreach($product as $live){
						$thisPrice = preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
						$body.="<p style=''>".$_SESSION['sale'][$i]."x ".$live->ProductName." for $".$thisPrice." each</p>";
					}
				}
				$body.="<p style=''>Subtotal  : $".$_SESSION['payment']['allmainpayment']." USD</p>
				<p style=''>Shipping  : $".$_SESSION['payment']['allshipcharge']." USD</p>";
				if($_SESSION['shipping']['home']=="0"){
					$body.="<p style=''>$300 USD White Glove Delivery</p>";
				}
				$body.="<p style=''>Total    : $".$_SESSION['payment']['allpayment']." USD</p>
				<p> Please allow 1 - 2 business days to process through our warehouse.  Please note that most U.S. orders ship within 3-7 business days from receipt unless contacted by our staff otherwise.   </p><p><a href='".base_url('site/myorders?orderID=').base64_encode($_SESSION['insert_id'])."'>View Your Order Here.</a></p>" ;
				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
				$from = "support@globalfitness.net";
				if (isset($_SESSION['email'])) {
					$to = $_SESSION['email'];
				}else{
					$to = $_SESSION['payment']['email'];
				}
				$subject = 'Global Fitness Order Confirmation';
				$message = $body;
				$headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
				$headers .= 'Bcc: '.$to."\r\n";
				mail($to,$subject,$message,$headers);
				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
				$from = "support@globalfitness.net";
				$to = "email@globalfitness.net";
				$subject = 'Online Order Confirmation';
				$message = $body;
    // More headers
				$headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
				$headers .= 'Bcc: '.$to."\r\n";
				mail($to,$subject,$message,$headers);
			}
			public function productdetail($id){
				$query = $this->db->query("SELECT * FROM [dbo].[zItemInventoryDetailAll] where ListID = '".$id."'")->result();
				if(empty($query)){
					$query = $this->db->query("SELECT * FROM [dbo].[zCartUpsells] where idListID = '".$id."'")->result();
				}
				return $query;
			}

			public function orderall(){
				/*Toget order details of guest user */	
				if (isset($_GET['orderID'])) {
					/*To get order details of email link*/
					$myid = base64_decode($_GET['orderID']);
					if (is_numeric($myid)) {
						$user = 'guest_userid';
						$query =$this->db->select("dbo.order_detail.*")
						->from("dbo.order_detail")
						->where("dbo.order_detail.ID",$myid
							)
						->get()->result();
					}
				}		elseif (isset($_SESSION['insert_id'])) {
					/*To get order details of email link*/
					$myid = $_SESSION['insert_id'];
					if (is_numeric($myid)) {
						$user = 'guest_userid';
						$query =$this->db->select("dbo.order_detail.*")
						->from("dbo.order_detail")
						->where("dbo.order_detail.ID",$myid
							)
						->get()->result();
					}
				} elseif(isset($_SESSION['userId']) && $_SESSION['userId'] == 0 ){
					/*To get order details of guest user after payment*/
					$myid = $_SESSION['insert_id'];
					$user = 'guest_userid';
					$query =$this->db->select("dbo.order_detail.*")
					->from("dbo.order_detail")
					->where("dbo.order_detail.ID",$myid)
					->get()->result();
				}else{
					/*To get order details of registerd user*/
					$myid = $_SESSION['userId'];
					$user = 'ID';
					$query =$this->db->select("dbo.order_detail.*,dbo.customer_user.FirstName,dbo.customer_user.MiddleName,dbo.customer_user.LastName")
					->from("dbo.order_detail")
					->join("dbo.customer_user","dbo.customer_user.ID=dbo.order_detail.UserId")
					->where("dbo.order_detail.UserId",$myid)
					->order_by("dbo.order_detail.order_date","DESC")
					->get()->result();
				}
				return $query;
			}
			public function insertData($table){
				$result = $this->db->insert("$table",$_POST);
				return $result;
			}
			public function register(){
				$newdata = array(
					"FirstName"=>$_SESSION['shipping']['firstname'],
					"MiddleName"=>"",
					"LastName"=>$_SESSION['shipping']['lastname'],
					"Email"=>$_SESSION['payment']['email'],
					"Password"=>md5($this->input->post("password")),
					"Title"=>$this->input->post("title"),
					"UserName"=>$_SESSION['payment']['email'],
					"UserRole"=>"0",
					"CreateDate"=>date("Y-m-d h:i:s"),
					"ModifyDate"=>date("Y-m-d h:i:s"),
					"Is_Active"=>"1"
					);
				$this->db->insert("dbo.customer_user",$newdata);
				$last_id = $this->db->insert_id();
				$query = $this->db->query("SELECT * FROM [dbo].[customer_user] where ID = '".$last_id."' ")->result();
				foreach($query as $q){
					$dat['userId']=$q->ID;
					$dat['userRole']=$q->UserRole;
					$dat['email']=$q->Email;
					$dat['title']=$q->Title;
					$dat['username']=$q->UserName;
					$dat['firstname']=$q->FirstName;
					$dat['middlename']=$q->MiddleName;
					$dat['lastname']=$q->LastName;
					break;
				}
				$this->session->set_userdata($dat);
			}

			public function typesearch(){
	// previous used table- zUnionLiveInventory_InventoryDetail
				if(isset($_POST['search'])){
					$data = $_POST['search'];
				}else{
					$data = $_POST['searchkeyword'];
				}
				$query = $this->db->query("SELECT TOP 10 * FROM [dbo].[zItemInventoryDetailAll] where [ProductName] LIKE '%".$data."%' ")->result();
				return $query;
			}

			public function ajaxsearching(){
				$q=$_POST['searchword'];
				$query = $this->db->query("SELECT TOP 10 ProductName,ImageURL,Kingdom FROM [dbo].[zUnionLiveInventory_InventoryDetail] where [ProductName] LIKE '%".$q."%' ")->result();
				return $query;
			}
			public function ajaxsearch(){
				$q=$_POST['searchword'];
				$query = $this->db->query("SELECT TOP 4 ProductName,ImageURL,Kingdom FROM [dbo].[zUnionLiveInventory_InventoryDetail] where [ProductName] LIKE '%".$q."%' ")->result();
				return $query;
			}

			public function insert_wish(){
				$data = array('UserID'=>$_SESSION['userId'],'ProductName'=>$this->input->post('value'));
				$this->db->insert("dbo.wish_list",$data);
			}
			public function getrating($id){
				$query = $this->db->select("*")
				->from("dbo.customer_rating")
				->where("dbo.customer_rating.product_id = '".$id."'")
				->where("dbo.customer_rating.admin_status",1)
				->get()->result();
				return $query;
			}
			public function fetchBrand($CategoryName)
			{
				if($CategoryName == 'Other Cardio Machine'){
					$hello = " or (CategoryName = N'Treadclimber') OR(CategoryName = N'Vibration Platform') OR
					(CategoryName = N'Treadwall') ";
				}
				elseif($CategoryName == 'Multi Gym'){
					$hello = " or (CategoryName = N'Multi-Gym') OR
					(CategoryName = N'Multi-Station')";
				}
				else{
					$hello = " ";
				}
				$query = $this->db->query("SELECT Distinct BrandName, BrandRank, [dbo].[zFitnessBrand].[ID] FROM [dbo].[zItemInventoryDetailAll] JOIN [dbo].[zFitnessBrand] ON  [dbo].[zItemInventoryDetailAll].[BrandName] = [dbo].[zFitnessBrand].[Name]  WHERE [dbo].[zItemInventoryDetailAll].[CategoryName] = '".$CategoryName."' ".$hello." Order By BrandRank ")->result();
				return $query;
			}
			public function fetchCondition($CategoryName)
			{
				$query = $this->db->query("SELECT Distinct Condition, [dbo].[zFitnessConditions].[ID] FROM [dbo].[zItemInventoryDetailAll] LEFT JOIN [dbo].[zFitnessConditions] ON  [dbo].[zItemInventoryDetailAll].[Condition] = [dbo].[zFitnessConditions].[WebsiteConditionName] WHERE [dbo].[zItemInventoryDetailAll].[CategoryName] = '".$CategoryName."'")->result();
				return $query;
			}
			public function contactform(){
				$ip = $this->input->ip_address();
				$data = array(
					'FirstName'=>$_POST['firstname'],
					'LastName'=>$_POST['lastname'],
					'Email'=>$_POST['email_address'],
					'TelephoneNumber'=>$_POST['phone_number'],
					'EmailSubject'=>"Inquiry Email",
					'Message'=>$_POST['message'],
					'ProductSKU'=>$_POST['sku'],
					'UserIP'=>$ip,
					);
				$this->db->insert("dbo.zFitnessContactFormData",$data);
			}
			public function insertformdata($data)
			{
				$this->db->insert("dbo.zFitnessLeaseFormData",$data);
			}
			public function contactformdata(){
				$ip = $this->input->ip_address();
				$data = array(
					'FirstName'=>$_POST['firstname_contactus'],
					'LastName'=>$_POST['lastname_contactus'],
					'Email'=>$_POST['email_contactus'],
					'TelephoneNumber'=>$_POST['telephone_contactus'],
					'EmailSubject'=>"Inquiry Email",
					'Message'=>$_POST['message_contactus'],
					'UserIP'=>$ip,
					);
				$this->db->insert("dbo.zFitnessContactFormData",$data);
			}
			public function SaveWaitList($listId,$email,$telephoneNo,$message,$firstName,$lastName){
				$data = array(
					'ListID'=>$listId,
					'userEmail'=>$email,
					'telephoneNo'=>$telephoneNo,
					'message'=>$message,
					'firstName'=>$firstName,
					'lastName'=>$lastName,
					'status'=>"1",
					'date'=>date("Y-m-d h:i:s"),
					);


				$this->db->insert("dbo.waitlist",$data);
				$query = $this->db->query("SELECT  * FROM [dbo].[waitlist] where ListID='$listId' and status='1'")->result();

				return $query;
			}
			public function CheckWaitList($listId,$email){
				$query = $this->db->query("SELECT  * FROM [dbo].[waitlist] where CONVERT(VARCHAR, ListID)='".$listId."' AND userEmail= '".$email."' AND status='1'")->result();
				return $query;
			}
			public function SaveRentProduct($listId,$email,$telephoneNo,$message,$firstName,$lastName){
				$data = array(
					'ListID'=>$listId,
					'userEmail'=>$email,
					'telephoneNo'=>$telephoneNo,
					'message'=>$message,
					'firstName'=>$firstName,
					'lastName'=>$lastName,
					'status'=>"1",
					'date'=>date("Y-m-d h:i:s"),
					);
				$this->db->insert("dbo.rentProduct",$data);
				$query = $this->db->query("SELECT  * FROM [dbo].[rentProduct] where ListID='$listId' and status='1'")->result();
				return $query;
			}
			public function CheckRentProduct($listId,$email){
				$query = $this->db->query("SELECT  * FROM [dbo].[rentProduct] where CONVERT(VARCHAR, ListID)='".$listId."' AND userEmail= '".$email."' AND status='1'")->result();
				return $query;
			}
			public function CheckGenProduct($listId,$email){
				$query = $this->db->query("SELECT  * FROM [dbo].[generalProduct] where CONVERT(VARCHAR, ListID)='".$listId."' AND userEmail= '".$email."' AND status='1'")->result();
				return $query;
			}
			public function SaveGenProduct($listId,$email,$telephoneNo,$message,$firstName,$lastName){
				$data = array(
					'ListID'=>$listId,
					'userEmail'=>$email,
					'telephoneNo'=>$telephoneNo,
					'message'=>$message,
					'firstName'=>$firstName,
					'lastName'=>$lastName,
					'status'=>"1",
					'date'=>date("Y-m-d h:i:s"),
					);
				$this->db->insert("dbo.generalProduct",$data);
				$query = $this->db->query("SELECT  * FROM [dbo].[generalProduct] where ListID='$listId' and status='1'")->result();
				return $query;
			}	
			public function SaveSellProduct($listId,$email,$telephoneNo,$message,$firstName,$lastName,$zip){
				$data = array(
					'ListID'=>$listId,
					'userEmail'=>$email,
					'telephoneNo'=>$telephoneNo,
					'message'=>$message,
					'firstName'=>$firstName,
					'lastName'=>$lastName,
					'zipCode'=>$lastName,
					'status'=>"1",
					'date'=>date("Y-m-d h:i:s"),
					);
				$this->db->insert("dbo.sellProduct",$data);
				$query = $this->db->query("SELECT  * FROM [dbo].[sellProduct] where ListID='$listId' and status='1'")->result();
				return $query;
			}
			public function CheckSellProduct($listId,$email){
				$query = $this->db->query("SELECT  * FROM [dbo].[sellProduct] where CONVERT(VARCHAR, ListID)='".$listId."' AND userEmail= '".$email."' AND status='1'")
				->result();
				return $query;
			}
			public function productSearchF($kingdom){
				$query = $this->db->query("SELECT TOP 30 * FROM [dbo].[zItemInventoryDetailAll] where Kingdom='".$kingdom."' AND Price != 'Please Enquire' ORDER BY QuantityOnHand DESC, TimeCreated DESC")->result();
				return $query;
			}
			public function categoryDetails($name)
			{
				$query = $this->db->query(" SELECT  * FROM [dbo].[zFitnessCategory] where Name='$name' ")->row();
				return $query;
			}
			public function fetchPiece($CategoryName)
			{
				if($CategoryName == 'Other Cardio Machine'){
					$hello = " or (CategoryName = N'Treadclimber') OR(CategoryName = N'Vibration Platform') OR
					(CategoryName = N'Treadwall') ";
				}
				elseif($CategoryName == 'Multi Gym'){
					$hello = " or (CategoryName = N'Multi-Gym') OR
					(CategoryName = N'Multi-Station')";
				}
				else{
					$hello = " ";
				}
				$query = $this->db->query("SELECT Distinct Piece , [dbo].[zFitnessPiece].[ID]
					FROM [dbo].[zItemInventoryDetailAll]
					JOIN [dbo].[zFitnessPiece]
					ON [dbo].[zItemInventoryDetailAll].[Piece] = [dbo].[zFitnessPiece].[Name]
					WHERE [dbo].[zItemInventoryDetailAll].[CategoryName] = '".$CategoryName."' ".$hello."")->result();
				return $query;
			}
			public function record_count($table_name) {
				return $this->db->count_all($table_name);
			}
			public function fetch_all($limit, $start, $table_name) {
				$query = $this->db->query("SELECT * FROM [dbo].$table_name order by TimeCreated asc OFFSET $start ROWS FETCH NEXT $limit rows only")->result();
				if (count($query)<1) {
					return false;
				}
				return $query;
			}


/*
New functions  added for new home page
Author: Dhirendra
*/

public function SelectData($table_name) {
	$query = $this->db->query("SELECT  * FROM [dbo].[".$table_name."]")->result();
	return $query;
}


/***** Function to get active promotional data *******/
public function PromotionalData($table_name){
	$query = $this->db->query("SELECT  * FROM [dbo].[zHomePagePromotionalData] where IsActive = 1 ORDER BY OrderLeftToRightTopToBottom ASC")->result();
	return $query;
}

/***** Function to get active promotional data *******/
public function CarouselData($table_name){
	$query = $this->db->query("SELECT  * FROM [dbo].[zHomePageCarouselData]  ORDER BY SlideOrder ASC")->result();
	return $query;
}
}
?>