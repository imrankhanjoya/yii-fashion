<?PHP


$post = get_post();
?>
<div class="container">

<div class="row">
	<div class="col-md-12" style="text-align: center; margin-top:2%; margin-bottom:2%">
	<h1><?=the_title()?></h1>
	<p>description</p>
	</div>
	<div class="col-md-8 col-md-offset-2">

		<div class="col-md-6" style="background-image:url('http://www.gloat.me/wp-content/uploads/2018/07/myg.png'); background-position: center; height: 400px; text-align: center;">
				<button type="submit" class="" style="margin-top:50%">Choose Photo</button>
		</div>
		<div class="col-md-6">
			
			<h2>Awesome lets start to win!</h2>
			<form action="/action_page.php">
			<div class="form-group">
			<input type="text" name="title" value="" placeholder="Say some thing about your style" class="form-control" id="title">
			</div>
			<div class="form-group">
			<textarea class="form-control" name="detail" placeholder="Say some thing about your style"></textarea>
			</div>
			<button type="submit" >Submit</button>
			</form>

		</div>

		
	</div>


	<div class="col-md-8 col-md-offset-2" style="text-align: center; margin-top:2%; margin-bottom:2%">
	<h2>Tag products used in above photo</h2>
	
		<form action="/action_page.php">
		<div class="form-group">
		<input type="text" name="title" value="" placeholder="Enter product/brand name" class="form-control" id="title">
		</div>
		</form>

	</div>


</div>


</div>