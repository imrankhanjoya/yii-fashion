<div class="container px-2 px-lg-3">
<div class="mb-2 cards-box mb-lg-0 mt-lg-3">
<div class="col-12 col-sm-12 col-md-12 col-lg-12">
<h2><?=$discussList['post_title']?></h2>
<p><?=$discussList['post_content']?></p>
<h6>Posted on <?=$discussList['post_date']?> By <a href="#">bySu Shatu</a></h6>
</div>
</div>

<div class="container px-2 px-lg-3">
<div class="mb-2 cards-box mb-lg-0 mt-lg-3">
<div class="col-12 col-sm-12 col-md-12 col-lg-12">
	<?PHP	

	echo $this->render('//partials/comment-view.php',array("allcomments"=>$discussList['postComments'],"parent"=>0));
	
	?>	
</div>
</div>
</div>

<?=$this->render('//partials/comment-form.php');?>