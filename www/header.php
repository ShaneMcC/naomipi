<!DOCTYPE html>
<html>
	<head>
		<title>Naomi PI Loader</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<style>
			body {
				font: 13px/1.7em Helvetica, Arial, sans-serif;
				background: #FFFFFF;
				padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}

			/** Default. */
			img.CurrentGameLogo {
				width: 480px;
				height: 270px;
			}

			img.ListLogo {
				width: 240px;
				height: 135px;
			}

			img.InlineLogo, br.InlineLogo {
				display: none;
			}

			td, th {
				text-align: center;
			}

			th.image, td.image {
				width: 20px;
			}

			/** Mobile. */
			@media all and (max-width: 768px) {
				img.CurrentGameLogo {
					width: 240px;
					height: 135px;
				}

				img.ListLogo {
					width: 120px;
					height: 67px;
				}

				th.image, td.image {
					display: none;
				}

				img.InlineLogo, br.InlineLogo {
					display: inline;
				}

				img.InlineLogo {
					width: 240px;
					height: 135px;
				}
			}
		</style>
	</head>
	<body>
    <!-- Fixed navbar -->
		<nav class="navbar navbar-inverse navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/">
						Naomi Loader
					</a>
				</div>
			</div>
		</nav>

		<div class="container">
