<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
// echo "<pre>";
// print_r($topList);
// echo "</pre>";
// exit;
?>
<div class="col-lg-12">
     <div class="row">
        <div class="col-lg-6 col-6 text-center py-3" style="background-color: #92FFD8;">
           <a href="" class="">
        <h2 class="text-uppercase"><b>Gloat.Me Pick</b></h2>
        <h4 class="mt-1">Products collection by Glaot.Me! to add to your beauty and looks</h4>
        </a>
        </div>
         <div class="col-lg-6 col-6 text-center py-3" style="background-color: #FFDFCA;">
           <a href="" class="">
        <h2 class="text-uppercase"><b>Gloat.Me Pick</b></h2>
        <h4 class="mt-1">Products collection by Glaot.Me! to add to your beauty and looks</h4>
        </a>
        </div>


     </div>
 </div>

 <div class="container px-2 px-lg-3">
         <div class="p-2 p-lg-0 cards-box mb-2 mb-lg-0">
            <div class="col-lg-12 mt-5 mb-2 text-center">
               <h2><b>Editor's Pick</b></h2>
               <h3>Here are the best products that will make you look & feel good!</h3>
            </div>
            <div class="row">
               
              <?PHP
              foreach($topList as $topItem){
                
                echo $this->render('//partials/top-topic.php',$topItem);  
              }
              ?>
                
               
            </div>
          
         </div>
      </div>
