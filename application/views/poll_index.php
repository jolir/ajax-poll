<html>
<head>
	<title>Poll</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
	<form action="" method="post">
		<button class="btn btn-primary" type="submit" >Add a Poll</button>
	</form>
<? 	foreach($polls as $poll) 
	{ ?>
		<div class="span9">
			<h5><?= $poll['title']; ?></h5>
			<p><?= $poll['description']; ?></p>
			<form action="votes/cast_vote" method="post">
<? 				foreach($choices as $choice)
		        {
		        	if($choice['poll_id'] == $poll['id'])
		        	{ ?>
						<label class="radio">
							<input type="radio" name="choice" id="optionsRadios1" value="<?= $choice['id']; ?>"><?= $choice['choice_text']; ?>
						</label>
<? 					}
				} ?>
				<button type="submit" class="btn btn-large btn-success">Vote</button>
			</form>

			<h4>Results:</h4>
<? 			foreach($choices as $choice)
			{
				if($choice['poll_id'] == $poll['id'])
				{ ?>
					<strong><?= $choice['choice_text']; ?></strong><span class="pull-right"><?= $choice['votes']; ?>%</span>
					<div class="progress progress-danger active">
						<div class="bar" style="width: <?= $choice['votes']; ?>0%;"></div>
					</div>
<? 				}
			} ?>
		</div>
<? 	} ?>
</body>
</html>