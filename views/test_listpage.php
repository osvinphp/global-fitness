
<section>
    <div class="container">
   <div class="row">
      <div class="col-md-6 col-sm-6">
         <h2>Items in MyList</h2>
      </div><!--end of colm-->  
      <div class="col-md-6 col-sm-6">
   <!--  <form method="post" action="" > -->
       <div class="col-md-9 col-sm-9">
      <div class="col-md-3 col-sm-3 padding">
        <div class="search">
          <p></p>
        </div>
      </div>
  
       </div>
      <div class="col-md-3 col-sm-3">
        <div class="filter_top">
          <input data-toggle="modal" data-target="#myproductlist" href="" type="submit" value="Download">
        </div>
      </div>
    </form>
      </div>    
    </div><!--end of row-->  

    <?php if($this->session->flashdata('fdsjfkjsdf')): ?>
        <div class="alert alert-success  alert-block fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="fa fa-times"></i>
                    </button>
                    <h4>
                      <i class="fa fa-ok-sign"></i>
                      <?php echo $this->session->flashdata('fdsjfkjsdf'); ?>
                    </h4>
              </div>
     
      <?php endif; ?>
  </div><!--end of container-->
  <div class="container">
  <div class="row">
  <div class="col-md-12 col-sm-12">
  <div class="table-responsive">
     <?php
 if($_SESSION['mylistproducting']['count']>0){
    ?>
<table width="865" class="table">
  <thead>
    <tr class="tb_hdr">

      <TH width="44" class="blank"> </TH>
      <TH width="480" class="min_first">PartName</TH>
      <TH width="71"  class="min">MPN</TH>
      <TH width="84"  class="min">Category</TH>
      <TH width="141"  class="min">Availability</TH>
      <TH width="118"  class="min">Price</TH>
    </tr>
   </thead>
<tbody> 
<?php
   for($i=0; $i<$_SESSION['mylistproducting']['count'];$i++){
        $product = $this->Site_model->mylistingmodel($_SESSION['mylistproducting']['listname'][$i]);
        // print_r($product);die();
        foreach($product as $live){
          ?>
          <tr class="countTr">
            <td class="blank">
              <?php echo $i+1 ; ?>
           </td>
            <td class="min_first">
              <?php echo $live->PartName; ?></td>
            <td class="mina"><?php echo $live->MPN; ?></td>
            <td class="mina"><?php echo $live->Category ; ?></td>
            <td class="mina"><?php
              if($live->QuantityOnHand<=0){
                ?><span class="outstock">Out of Stock</span><?php
              }
              else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
                echo "< 3";
              }else{
                ?>
                <span class="inerstock">In Stock</span>
              <?php 
              } ?></td>
            <td class="mina">

              <table><tr><td><?php if($live->Price!="Please Enquire"){ echo "$";} ?><?php echo trim($live->Price,'$'); ?></td>
              
           </tr></table></td>
          </tr>

          <?php
        }
    }
?> 
</tbody>
</table>
  <?php  
    }
    else
    {
      echo "<h4>No Records Found.</h4>";
    }
  ?> 
</div>
<!--end of glob-->
  </div><!--end col12-->
  </div><!--end of row-->
  </div>
</section>