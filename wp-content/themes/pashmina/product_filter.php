<div class="col-md-12">
<div class="row product_cat">
    <div class="col-lg-2 col-xs-6 text-center top-ttl panel-body" style="background-color:#92FFD8">
        <a href="/products-for/lip/" class="top-ttl-heddng">
        <span>LIPSTICK</span>
        <img class="picon" src="<?= get_template_directory_uri();?>/images/lipstick.svg">
        </a>
    </div>
      <div class="col-lg-2 col-xs-6 text-center top-ttl panel-body" style="background-color:#FFDFCA">
        <a href="/products-for/eye/" class="top-ttl-heddng">
        <span>Eyes</span>
        <img class="picon" src="<?= get_template_directory_uri();?>/images/eye-shadow.svg">
        </a>
    </div>
    <div class="col-lg-2 col-xs-6 text-center top-ttl panel-body" style="background-color:#92FFD8">
        <a href="/products-for/nail/" class="top-ttl-heddng">
        <span>Nail-Polish</span>
        <img class="picon" src="<?= get_template_directory_uri();?>/images/nail-polish.svg">
        
        </a>
    </div>
    <div class="col-lg-2 col-xs-6 text-center top-ttl panel-body" style="background-color:#FFDFCA">
        <a href="/products-for/hair/" class="top-ttl-heddng">
        <span>hair</span>
        <img class="picon" src="<?= get_template_directory_uri();?>/images/woman-with-long-hair.svg">
        </a>
    </div>
    <div class="col-lg-2 col-xs-6 text-center top-ttl panel-body" style="background-color:#92FFD8">
        <a href="/products-for/skin/" class="top-ttl-heddng">
        <span>facial</span>
        <img class="picon" src="<?= get_template_directory_uri();?>/images/facial-treatment.svg">
        </a>
    </div>
    <div class="col-lg-2 col-xs-6 text-center top-ttl panel-body" style="background-color:#FFDFCA">
        <a href="/products-for/cream/" class="top-ttl-heddng">
        <span>cream</span>
        <img class="picon" src="<?= get_template_directory_uri();?>/images/cream.svg">
        </a>
    </div>
    

</div>
</div>
<div style="clear:both"></div>
    
<nav class="navbar">
  <div class="container-fluid">
    <div id="navbar" class="product-dtl-list">
      <ul class="nav navbar-nav">
        <?php foreach($brands as $key=>$val): $cID = get_cat_ID($key); $key==$findKey?$class='active':$class='';  ?>
        <li ><a  alt="<?=$key?>" class="<?=$class?>" href="<?php echo esc_url( get_category_link($cID) ); ?>"><?=esc_html($val)?></a></li>
        <?PHP endforeach;?>
      </ul>
     
    </div>
  </div>
</nav>

