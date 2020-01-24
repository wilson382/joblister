<?php include("inc/header.php"); ?>

<h2 class='page-header'><?php echo $job->job_title. " ({$job->location})"; ?></h2>
<small>Posted by <?php echo $job->contact_user;?> on <?php echo $job->post_date;?></small>
<hr>
<p class='lead'><?php echo $job->description;?></p>
<ul>
	<li class='list-group-item'>Company <?php echo $job->company;?></li>
	<li class='list-group-item'>Salay <?php echo $job->salary;?></li>
	<li class='list-group-item'>Contact User <?php echo $job->contact_user;?></li>
	<li class='list-group-item'>Contact Email <?php echo $job->contact_email;?></li>
</ul>
<br>
<a href='index.php'>Go back</a>
<br><br><br>
<div class='well'>
	<a href='edit.php?id=<?php echo $job->id; ?>' class='btn btn-warning'>Edit</a>
	<form method='post' style='display:inline' action='job.php'>
		<input type='hidden' name='del_id' value='<?php echo $job->id; ?>'>
		<input type='submit' class='btn btn-danger' value='Delete'>
	</form>
</div>
<br>
<?php include("inc/footer.php"); ?>