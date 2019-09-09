<?php 
include('inc/header.php');
?>
<link rel="stylesheet" href="css/style.css" />
	<?php
	include ('Voting.php');        
	$voting = new Voting();
	$pollData = $voting->getPollDetails();
	foreach($pollData as $poll) {
		echo '<div class="panel panel-primary"><div class="panel-heading">';
		echo '<h3 class="panel-title">';
		echo '<span class="glyphicon"></span>Poll Voting Results: '.$poll['question'].'</h3>';
		echo '</div></div>';
		$pollOptions = explode("||||", $poll['options']);
		$votes = explode("||||", $poll['votes']);
			$maxVote = $votes[0];
		for( $i = 0; $i<count($pollOptions); $i++ ) {
			$vote = 0;			
			if($votes[$i] && $poll['voters']) {
				$vote = $votes[$i];
				$vote = !empty($vote)?$vote.'%':0;
			}			
			


if($votes[$i]>$maxVote)
			   {
			   	$maxVote = $votes[$i];
			   	echo '<div class="progress">';
			echo '<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="'.$vote.'" style="width: '.$vote.';">';
			echo '<span class="sr-only">'.$vote.' Complete</span>';
			echo '</div>';
			echo '<span class="progress-type">'.$pollOptions[$i].'</span>';
			$vote = $votes[$i];
			echo '<span class="progress-completed">'.$vote.'</span>';
			echo '</div>';

		      }

else
{
	echo '<div class="progress">';
			echo '<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="'.$vote.'" style="width: '.$vote.';">';
			echo '<span class="sr-only">'.$vote.' Complete</span>';
			echo '</div>';
			echo '<span class="progress-type">'.$pollOptions[$i].'</span>';
			$vote = $votes[$i];
			echo '<span class="progress-completed">'.$vote.'</span>';
			echo '</div>';
}

			}
		} 
	?>		
	<a class="btn btn-default read-more" href="http://localhost/OpinionPoll/">Back to Poll</a>	
</div>