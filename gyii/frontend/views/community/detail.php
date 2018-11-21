<?PHP
use yii\helpers\Url;
//print_r($discussList['tags']);

?>

<div class="container px-2 px-lg-3 mb-5 mb-lg-0">

<div class="row  ">
    <div class="col-lg-9 px-2 px-lg-3 ">

    	<!-- MAIN CONTAINER -->
    	<div class="mb-2 cards-box mb-lg-0 mt-lg-3">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<h2><?=$discussList['post_title']?></h2>
        <?PHP
        if(!empty($discussList['tags'])){
          echo "<ul>";
          foreach ($discussList['tags'] as $key => $value) {
            echo "<li><a href='".Url::to(["/community","key"=>$value['slug']])."'>".$value['name']."</a></li>";
          }
          echo "</ul>";
        }
        ?>
				<p><?=$discussList['post_content']?></p>
				<h6>Posted on <?=$discussList['post_date']?> By <a href="#">bySu Shatu</a></h6>
			</div>
		</div>

		<div class="mb-2 cards-box mb-lg-0 mt-lg-3">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<?PHP	

				echo $this->render('//partials/comment-view.php',array("allcomments"=>$discussList['postComments'],"parent"=>0));
				
				?>	
			</div>
		</div>

		<?=$this->render('//partials/comment-form.php',['model'=>$model]);?>
    	<!-- MAIN CONTAINER -->





    </div>
    <div class="col-lg-3 col-12 mt-2 mt-lg-5 px-2 px-lg-3 mb-5 mb-lg-0">
    

    	<div class="p-2 p-lg-0 cards-box mb-2 mb-lg-0">
             <h4><B>RECENT TOP DISCUSSION</B></h4>
             <ul class="p-0">
                <?PHP foreach ($mostecommented as $key => $value): ?>
                   <li class="d-block text-secondary p-1"><a href="<?=Url::to(['community/detail',"slug"=>$value['post_name']]);?>"><?=$value['post_title']?></a></li>
                <?PHP endforeach;?>  
             </ul>
       </div>
       <div class="p-2 p-lg-0 cards-box mb-2 mb-lg-0">
       		<h4><B>Unanswered Talks</B></h4>
             <ul class="p-0">
                <?PHP foreach ($nocomment as $key => $value): ?>
                   <li class="d-block text-secondary p-1"><a href="<?=Url::to(['community/detail',"slug"=>$value['post_name']]);?>"><?=$value['post_title']?></a></li>
                <?PHP endforeach;?>  
             </ul>
       </div>       




    </div>
</div>







</div>