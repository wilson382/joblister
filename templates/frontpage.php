<?php
	include("inc/header.php");
?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Find a Job!</h1>
		<form method='get' action='index.php'>
			<select name='category' class='form-control'>
				<option value='0'>Choose a category!</option>
				<?php foreach($categories as $category):?>
				<option value="<?php echo $category->id;?>">
				<?php echo $category->name;?></option>
				<?php endforeach;?>
			</select>
			<br/>
			<button type='submir' class='btn btn-lg btn-success'>Find!</button>
		</form>
    </div>
  </div>

  <div class="container">
	<h2><?php echo $title;?></h2>
    <!-- Example row of columns -->

	<?php foreach($jobs as $job):?>
    <div class="row form-group">
		  <div class="col-md-8">
			<h4><?php echo $job->job_title;?></h4>
			<p><?php echo $job->description;?></p>
		  </div>
		  <div class="col-md-2">
			<a class="btn btn-secondary" href="job.php?id=<?php echo $job->id;?>" role="button">View</a>
		  </div>
      </div>
	<?php endforeach;?>

    <hr>
  </div> <!-- /container -->

</main>

<?php
	include("inc/footer.php");
?>