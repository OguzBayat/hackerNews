<?php require "fonksiyon.php" ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Hacker New Clone</title>
	<link rel="stylesheet" href="style.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	
</head>
<body>

<div id="head">
	<div class="box">
		<h3 style="cursor:pointer"><i class="fa fa-bars" ></i> Hacker News</h3>
	</div>
</div>
<br>
<span>
	<div id="main">
		
		<?php 
		
		$Baglan = Baglan("https://news.ycombinator.com/newest");
		preg_match('#<span class="rank">(.*?)<tr class="morespace"#',$Baglan,$haberler);
		preg_match_all('#<td class="title"><a href="(.*?)" class="storylink"(.*?)>(.*?)</a>#',$haberler[1],$haber);			
		preg_match_all('#<span class="score" id="score_(.*?)">(.*?)</span> by <a href="(.*?)" class="hnuser">(.*?)</a> <span class="age"><a href="(.*?)">(.*?)</a></span> <span id="unv#',$haberler[1],$ayrinti);
						
		$haberLink = $haber[1];
		$haberBaslik = $haber[3];
		$puan=$ayrinti[2];
		$yazarLink = $ayrinti[3];
		$yazarAd = $ayrinti[4];
		$saatLink = $ayrinti[5];
		$saatSaat = $ayrinti[6];
		
		
		?>
		<div class="box">
			<ul>
			<?php
			for($i = 0; $i<count($haberBaslik); $i++){
				if($i==20) break;
				$newLink=$haberLink[$i];
				$new=$haberBaslik[$i];
				$authorLink=$yazarLink[$i];
				$author=$yazarAd[$i];
				$timeLink=$saatLink[$i];
				$time=$saatSaat[$i];
				$point=$puan[$i];
			
			?>
				<li>
					<div class="count"><h4><?php echo $i+1 ?></h4></div>
					<h4><a href="<?php echo $newLink?>"><?php echo $new ?></a></h4>
					<div class="detail">
					
					<?php echo $point ?> <?php echo $time ?> by <?php echo $author ?>
					</div>
				</li>
		<?php }
		?>
			</ul>
		</div>
	</div>
</span>
<script language="javascript">

	 $(document).ready(function(){
    $("h3").click(function(){
        $("span").toggle();
    });
});

</script>
</body>
</html>
