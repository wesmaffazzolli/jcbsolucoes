    
 	<header class="section-header" style="margin-top: 50px;">
       <h3>Nossa História</h3>
    </header>
    <section id="cd-timeline" class="cd-container">

    	<?php 

    	$query = "SELECT * FROM timeline ORDER BY YEAR";

	    $select_timeline = mysqli_query($connection, $query); 
	    while($row = mysqli_fetch_assoc($select_timeline)) {
	        $timeline_title = $row['TITLE'];
	        $timeline_year = $row['YEAR'];
	        $timeline_status = $row['STATUS'];
	        $timeline_content = $row['CONTENT'];

    	?>

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-calendar">
				<!--<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-picture.svg" alt="Picture">-->
				<i class="material-icons">&#xE916;</i>
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2><?php if(!empty($timeline_title)){echo $timeline_title;}else{echo "";}?></h2>
				<p><?php if(!empty($timeline_content)){echo $timeline_content;}else{echo "";}?></p>
				<!--<a href="#0" class="cd-read-more">Read more</a>-->
				<span class="cd-date"><?php if(!empty($timeline_year)){echo $timeline_year;}else{echo "";}?></span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->
		<?php } ?> 
	</section> <!-- cd-timeline -->