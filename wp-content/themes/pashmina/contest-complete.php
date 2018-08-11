<?php
$post_ID;
$post->post_parent = $post_ID;
global $wpdb;

$query =  "select posts.ID,posts.post_date,posts.post_content,posts.post_title,posts.guid,meta.meta_value, metaw.meta_value as winner from $wpdb->posts as posts 
left join $wpdb->postmeta as meta on meta.post_id = posts.ID and meta_key = 'image'
inner join $wpdb->postmeta as metaw on metaw.post_id = posts.ID and metaw.meta_key = 'winner' and metaw.meta_value != ''
where posts.post_parent = $post_ID and posts.post_type= 'contest_replay' and posts.post_status = 'publish' order by winner asc  ";


$results = $wpdb->get_results($query, ARRAY_A );

?>
<div class="row">
	<div class="col-md-12 text-center">
		<h1>Winner of <?php the_title()?></h1>
	</div>
</div>
<div class="row">
	<div class="col-md-offset-1 col-md-10 " style="height: auto" >

	<?php foreach($results as $row):?>
		<div class="col-md-4 text-center">
		<img src="<?php echo $row['meta_value']; ?>" class="img-thumbnail" />
		</div>
	<?php endforeach; ?>
	</div>
</div>

<div class="row">
<div class="col-md-offset-1 col-md-10 " style="background-color:rgb(0,0,0,0.8); color: #fff" >
	<div class="col-md-8">
	<h2 style="font-family: 'Tangerine', cursive; font-size: 45px;">Dont Miss out contest</h2>
	</div>
	<div class="col-md-4 text-center">
		<a href="" class="btn btn-getfree" style="border:1px solid #fff; margin-top:10px;">Stay Updated</a>
	</div>
</div>
<div class="col-md-offset-1 col-md-10 " style="height: auto" >
	<?PHP include('contest-participant.php'); ?>
</div>
</div>