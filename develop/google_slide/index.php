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
			<p><iframe src="https://onedrive.live.com/embed?cid=43C211A1CBC7933E&resid=43C211A1CBC7933E%21409&authkey=ANNHj_cxt2BTx1k&em=2" width="600" height="400" frameborder="0" scrolling="no"></iframe></p>
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
			<p><iframe src="https://onedrive.live.com/embed?cid=43C211A1CBC7933E&resid=43C211A1CBC7933E%21409&authkey=ANNHj_cxt2BTx1k&em=2" width="600" height="400" frameborder="0" scrolling="no"></iframe></p>
			<div class="btn_area">
				<p class="ico_heart vote_02"><?= get_count('vote_02') ?></p>
				<p class="btn_vote" id="vote_02"></p>
			</div>
		</section>
		<a href="index.html">BACK</a>
	</article>
</body>
</html>
