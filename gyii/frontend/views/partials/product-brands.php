<?php
use yii\helpers\Url;
$brands = array('bobbi-brown' =>'BobbiBrown','o3' =>'O3','kazima' =>'Kazima','lotus' =>'Lotus','nivea' =>'Nivea','olay' =>'Olay' ,'mcaffeine' =>'MCaffeine' ,'lakme' =>'Lakme','paris' =>'Paris','brezzycloud' =>'Brezzycloud','ponds' =>'POND\'S' ,'loreal' =>'L\'Oreal','nyx'=>"NYX" );

?>
<nav class="navbar navbar-expand-sm d-none d-lg-block">
         <ul class="nav p-0">
            <?php foreach($brands as $key=>$val):?>
            <li class="nav-item">
               <h5 class=""><a class="nav-link" href="<?=Url::to(['products/brand','brand' =>$key]);?>"><?=$val?></a></h5>
            </li>
         <?php endforeach;?>
            
         </ul>
      </nav>