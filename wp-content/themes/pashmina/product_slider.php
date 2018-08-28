<?php 
	 	$mprods =$prods = getProductByBrand(array('lakme','O3','ponds','kazima'),20,false);
	 	$cprods = array_chunk($prods,4);
	 ?>
<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
	<h2 class="align-self-center" style="text-align: center;">Spot it Shop it</h2>
<div  class="slide hidden-xs" id="proCarousel"  data-ride="carousel" style="height:250px">
  <div class="carousel-inner" role="listbox">
    
    <?php foreach($cprods as $key=>$prods): $class=$key==0?"active":""; ?>
    	<div class='item <?=$class?>'>
    		<div class="row">
    <?php foreach($prods as $pro): shuffle($pro);?>
    	<div class="col-md-3">
		
			<center>
			<a href="<?=$pro->guid?>" target="_blank">	
			<img src='<?=$pro->image?>' class='img-responsive' style="height:100px;" />
			</a>
			<h5 style="margin-bottom:5px"><?=$pro->name?></h5>
			<a href="<?=$pro->guid?>" target="_blank">
			<?=substr($pro->post_title,0,30)?>...
			</a>
			
			<a class="btn-amz-sucs btn-success" href='<?=$pro->detailUrl?>' target="_blank" ><span class="ambadge">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Explore on amazon</a>	
			</center>	
		
		</div>
		<?php endforeach;?>	
		</div>	
		</div>	
		<?php endforeach;?>	
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>	
 </div>
</div>
<div  class="slide hidden-md hidden-lg" id="mproCarousel"  data-ride="carousel" style="height:250px">
  <div class="carousel-inner" role="listbox">
    
    <?php foreach($mprods as $key=>$pro): $class=$key==0?"active":""; ?>
    	<div class='item <?=$class?>'>
    		
		
			<center>
			<a href="<?=$pro->guid?>" target="_blank">	
			<img src='<?=$pro->image?>' class='img-responsive' style="height:100px;" />
			</a>
			<h5 style="margin-bottom:5px"><?=$pro->name?></h5>
			<a href="<?=$pro->guid?>" target="_blank">
			<?=substr($pro->post_title,0,30)?>...
			</a>
			
			<a class="btn-amz-sucs btn-success" href='<?=$pro->detailUrl?>' target="_blank" ><span class="ambadge">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Explore on amazon</a>	
			</center>	
		
			
		</div>	
		<?php endforeach;?>		
 </div>
</div>
</div>