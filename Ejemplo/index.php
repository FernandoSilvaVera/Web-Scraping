<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container text-center mt-5">
		<img  src="./scraping.png" alt="">
		<h1>Web Scraping</h1>
		<div class="row mt-5">
			<div class="col-sm-6">
				<h2>AnimeFLV</h2>
				<form action="index.php" method="get" class="mt-2 mb-5">
					Anime <input type="text" name='animeflv'><br>
					Capítulo <input type="text" name='capitulo'><br>
					 <input type="submit" value="buscar">
				</form>
				<?php
				if(isset($_GET["animeflv"])){
					require('./AnimeFLV.php');
					echo '<iframe src="https://www.rapidvideo.com/e/' . $video . '" sandbox="allow-forms allow-pointer-lock allow-same-origin allow-scripts allow-top-navigation" allowfullscreen="" scrolling="no" frameborder="0"></iframe>';
				}
				?>
			</div>
			<div class="col-sm-6">
				<h2>MyAnimeList</h2>
				<form action="index.php" method="get" class="mt-2 mb-5">
					Anime <input type="text" name='myanimelist'><br>
				</form>
				<div class="container">
					<?php if(isset($_GET["myanimelist"])) :?>
					<table class="table table-striped">
						<tbody>
							<tr>
							<?PHP
								require("./MyAnimeList.php");
							?>
								<td>Capitulos</td>
								<td><?= $anime['chapters']?></td>
							</tr>
							<tr>
								<td>Estado</td>
								<td><?= $anime['state']?></td>
							</tr>
							<tr>
								<td>Temporada</td>
								<td><?= $anime['season']?></td>
							</tr>
							<tr>
								<td>Año</td>
								<td><?= $anime['year']?></td>
							</tr>
							<tr>
								<td>Géneros</td>
								<td>
									<?php 
										foreach ($anime['genres'] as $genre)
											echo $genre . " ";
										echo "<br>";
									?>
								</td>
							</tr>
						</tbody>
					</table>
					<?php endif?>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
