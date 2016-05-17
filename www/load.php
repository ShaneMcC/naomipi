<?php
	require_once(dirname(__FILE__) . '/config.php');
	require_once(dirname(__FILE__) . '/functions.php');

	$file = basename($_REQUEST['file']);

	if (file_exists($gamesDir . '/' . $file)) {
		$name = (isset($names[$file]) ? $names[$file] : $file);
		$img = (file_exists($images . '/' . $file . '.jpg') ? $images . '/' . $file . '.jpg' : $images . '/none.jpg');
	}

	// Ensure output to browser is as-it-happens
	header('Content-Encoding: none');
	if (function_exists('apache_setenv')) { @apache_setenv('no-gzip', '1'); }
	ini_set('output_buffering', 'off');
	ini_set('zlib.output_compression', false);
	while (@ob_end_flush());
	ini_set('implicit_flush', true);
	ob_implicit_flush(true);
?>
<?php require_once(dirname(__FILE__) . '/header.php'); ?>

			<div style="text-align: center">
			<H1>Loading:</H1>
			<img class="CurrentGameLogo" src="<?=$img;?>" alt="<?=$name;?>">
			<H3><?=$name;?></H3>
			<br><br>
			<a href="/" class="btn btn-primary">Back to games list</a>
			</div>
			<?php
				echo str_pad("",1048," "), "\n"; // Used to ensure output is unbuffered as desired.

				$foo = runCmd(array($cmd . ' ' . escapeshellarg($ip) . ' ' . escapeshellarg($gamesDir . '/' . $file) . ' ' . escapeshellarg($gamesDir . '/current.bin') . ' 2>&1'));
			?>

<?php require_once(dirname(__FILE__) . '/footer.php'); ?>
