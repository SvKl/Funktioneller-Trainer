<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Kevin Henry - Wilkommen !</title>
    </head>
	
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8&appId=1971930789703935";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<header>
			<?php include("header.php"); ?>
		</header>
		
		<nav>
			<?php include("menu.php"); ?>
		</nav>
		
        <section class=bild>
        	<h1>Season 2014</h1>
			<img src="cowboys_mini.jpg" alt="Oline Munich Cowboys" />
		</section>
		
		<section class=highlights>
			<h1>Highlights 2016</h1>
			<video src="highlights.mp4" controls poster="sintel.jpg" width="600"></video>
		</section>

		<section class=MCTV>
			<h1>Munich Cowboys TV</h1>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/YVpNxMW8rxE" frameborder="0" allowfullscreen></iframe>
		</section>

		<section class=details>
			<h1>Unser Programm
				<h2>Unsere Vorteile
					<ul>
						<li>Vorteil 1</li>
						<li>Vorteil 2</li>
					</ul>
				</h2>
				<h2>Persönliche Lösung
					<ul>
						<li>Punkt A</li>
						<li>Punkt B</li>
					</ul>
				</h2>
			</h1>
		</section>	

		<section class=facebook_link>
			<div class="fb-page" data-href="https://www.facebook.com/MunichCowboys/" data-tabs="timeline, events" data-width="500" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MunichCowboys/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MunichCowboys/">Munich Cowboys</a></blockquote></div>
		</section>
	
		<footer>
			<?php include("footer.php"); ?>
		</footer>
	
	</body>
	
</html>