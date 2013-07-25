<html>
<head>
	<title>NEW</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<script type="text/javascript" src='../assets/js/jquery.js'></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#add_poll').submit(function(){
				var form = $(this);
				$.post(form.attr('action'), form.serialize(), function(data){
					console.log(data);
					if(data.status)
						$("#notify").html(data.message)
					else
						$("#notify").html(data.errors)
				}, 'json');
				return false;
			});
		});
	</script>
</head>
<body>
<div class="row-fluid">
	<a class="btn btn-primary" href="<?= base_url(); ?>polls">View all Polls</a>
	<form class="form-horizontal" method="post" action="<?= base_url(); ?>polls/poll_new" id="add_poll">
		<fieldset>
			<div id="legend">
				<legend class="">Create New Poll</legend>
			</div>

			<div class="control-group">
				<label class="control-label" for="poll_title">Poll Title</label>
				<div class="controls">
					<input required type="text" id="poll_title" name="poll_title" placeholder="" class="input-xlarge">
					<input type="hidden" name="form_action" value="create_poll">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="poll_description">Poll Description</label>
				<div class="controls">
					<textarea required name="poll_description"></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="poll_choice1">Poll Choice 1: </label>
				<div class="controls">
					<input required type="text" name="poll_choice1">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="poll_choise2">Poll Choice 2: </label>
				<div class="controls">
					<input required type="text" name="poll_choice2">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="poll_choice3">Poll Choice 3: </label>
				<div class="controls">
					<input required type="text" name="poll_choice3">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="poll_choice4">Poll Choice 4: </label>
				<div class="controls">
					<input required type="text" name="poll_choice4">
				</div>
			</div>

			<!-- Submit -->
			<div class="control-group">
				<div class="controls">
					<button class="btn btn-success">Submit</button>
				</div>
			</div>

		</fieldset>
	</form>
	<div id="notify"> </div>
</div>
</body>
</html>