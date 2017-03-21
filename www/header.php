<!DOCTYPE html>
<html>
	<head>
		<title>Naomi PI Loader</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" >
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

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
		<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/">
						Naomi Loader
					</a>
				</div>
			</div>
		</nav>

		<div class="container">
