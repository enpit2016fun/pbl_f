<?php
// カウント数取得関数
function get_count($file) {
	$filename = 'data/'.$file.'.dat';
	$fp = @fopen($filename, 'r');
	if ($fp) {
		$vote = fgets($fp, 9182);
	} else {
		$vote = 0;
	}
	return $vote;
}
?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<title>IBY</title>
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/vote.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
	$(function() {
		allowAjax = true;
		$('.btn_vote').click(function() {
			if (allowAjax) {
				allowAjax = false;
				$(this).toggleClass('on');
				var id = $(this).attr('id');
				$(this).hasClass('on') ? Vote(id, 'plus') : Vote(id, 'minus');
			}
		});
	});
	function Vote(id, plus) {
		cls = $('.' + id);
		cls_num = Number(cls.html());
		count = plus == 'minus' ? cls_num - 1 : cls_num + 1;
		$.post('vote.php', {'file': id, 'count': count}, function(data) {
			if (data == 'success') cls.html(count);
			setTimeout(function() {
				allowAjax = true;
			}, 1000);
		});
	}
	</script>
</head>

<body>
	<div id="header">IBY -I'm Begging You!-</div>
	<article>
		<section>
			<p><iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQO1WySCYsB8cecHi60ms71c6ecn8NIABJnjcr8gjSskwTiiozNttfPhHq6kjLBYIdRw66eq2fGQcjp/embed?start=false&loop=false&delayms=3000" frameborder="0" width="600" height="480" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe></p>
			<div class="btn_area">
				<p class="ico_heart vote_01"><?= get_count('vote_01') ?></p>
				<p class="btn_vote" id="vote_01"></p>
			</div>
		</section>
		<!-- <section>
			<p><a href="https://goo.gl/OdFUC0" target="_blank"><img src="img/slide_img.PNG" width="100%" alt=""></a></p>
			<div class="btn_area">
				<p class="ico_heart vote_01"><?= get_count('vote_01') ?></p>
				<p class="btn_vote" id="vote_01"></p>
			</div>
		</section> -->
		<section>
			<p><iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQO1WySCYsB8cecHi60ms71c6ecn8NIABJnjcr8gjSskwTiiozNttfPhHq6kjLBYIdRw66eq2fGQcjp/embed?start=false&loop=false&delayms=3000" frameborder="0" width="600" height="480" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe></p>
			<div class="btn_area">
				<p class="ico_heart vote_02"><?= get_count('vote_02') ?></p>
				<p class="btn_vote" id="vote_02"></p>
			</div>
		</section>
		<a id="back" href="index.html">BACK</a>
	</article>
	<div id="footer"><p>-Team Kinty-</p></div>
</body>
</html>
