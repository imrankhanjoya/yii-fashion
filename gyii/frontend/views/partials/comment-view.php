<?PHP
use yii\helpers\Url;

foreach($allcomments as $comment){



	if($parent==$comment['comment_parent']){
		echo '<div class="col-12 col-sm-12 col-md-12 col-lg-12" id="idi_'.$comment['comment_ID'].'">';
		
		

		echo '<div class="mt-2">';
			echo  '<span class="float-left mr-3">';
			echo "<img class='rounded-circle user-profile' src='".$comment['userimage']."'>";
			echo '</span>';
			echo '<a href="" class="ml-auto mr-3">'.$comment['comment_author'].'</a>';
			echo  '<span class="float-right ml-auto">';
			echo 	$comment['comment_date'];
			echo "<br><a class='rmcommnet' d-href='".Url::to(['ajax/delete-comment','cid' =>$comment['comment_ID']])."'>delete</a>";
			echo '</span>';
		echo '</div>';
		if($comment['url']!=''){
			echo "<img src='".$comment['url']."' /><br>";
		}
		print_r($comment['comment_content']);
		
		echo "<hr>";
			echo "<div style='margin-left:50px;'>";
			echo $this->render('//partials/comment-view.php',array("allcomments"=>$allcomments,"parent"=>$comment['comment_ID']));
			echo "</div>";
		echo "</div>";
	}
}

?>


                     