<html>
<head>
	<title>Poll</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.cast_vote').submit(function(){
				var form = $(this);
				$.post(form.attr('action'), form.serialize(), function(data){
					if(data.status)
						form.siblings('.percentage').eq(0).html(data.html);
				}, 'json');
				return false;
			});
		});
	</script>
</head>
<body>
	<p><a class="btn btn-primary" type="submit" href="polls/poll_new">Add a Poll</a></p>
<? 	foreach($polls as $poll) 
	{ ?>
	<div class="span9">
		<h5><?= $poll['title']; ?></h5>
		<p><?= $poll['description']; ?></p>
		<form class="cast_vote" action="polls/cast_vote" method="post">
			<input type="hidden" name="form_action" value="vote">
			<input type="hidden" name="poll_id" value="<?= $poll['id']; ?>">
<?  $total = NULL; ?>
<? 	foreach($choices as $choice)
	{
		if($choice['poll_id'] == $poll['id'])
		{ 
		    $total += $choice['votes']; ?>
			<label class="radio">
				<input type="radio" name="choice" id="optionsRadios1" value="<?= $choice['id']; ?>"><?= $choice['choice_text']; ?>
			</label>
<? 		}
	} ?>
			<input type="hidden" name="total_votes" value="<?= $total; ?>">
			<button type="submit" class="btn btn-large btn-success">Vote</button>
		</form>

		<h4>Results:</h4>
		<div class="percentage">
<? 	foreach($choices as $choice)
	{
		if($choice['poll_id'] == $poll['id'])
		{ 
			if($total == 0)
				$percentage_formatted = 0;
			else
			{
				$percentage = ($choice['votes'] / $total) * 100;
				$percentage_formatted = number_format($percentage, 2, '.', '');
			} ?>
			<strong><?= $choice['choice_text']; ?></strong><span class="pull-right"><b><?= $choice['votes']; ?> votes / </b><?= $percentage_formatted; ?>%</span>
			<div class="progress progress-danger active">
				<div class="bar" style="width: <?= $percentage_formatted; ?>%;"></div>
			</div>
<? 		}
	} ?>
		</div>
	</div>
<? 	} ?>
</body>
</html>