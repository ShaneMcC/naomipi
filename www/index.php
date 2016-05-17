<?php require_once(dirname(__FILE__) . '/config.php'); ?>
<?php require_once(dirname(__FILE__) . '/header.php'); ?>
			<?php
				if (file_exists($gamesDir . '/current.bin') && is_link($gamesDir . '/current.bin')) {
					$file = basename(readlink($gamesDir . '/current.bin'));

					$name = (isset($names[$file]) ? $names[$file] : $file);
					$img = (file_exists($images . '/' . $file . '.jpg') ? $images . '/' . $file . '.jpg' : $images . '/none.jpg');

					echo '<div style="text-align: center">';
					echo '<H2>Currently Playing: </H2>';
					echo '<img class="CurrentGameLogo" src="', $img, '" alt="', $name, '">';
					echo '<H3>', $name, '</H3>';
					echo '</div>';
					echo '<br>';
 					echo '<hr>';
				}

				echo '<div style="text-align: center">';
				echo '<H2>Available Games</H2>';
				echo '<br>';
				echo '</div>';

				echo '<table class="table table-striped table-bordered">';
				// Ignore directrory entries.
				$ignoredFiles[] = '.';
				$ignoredFiles[] = '..';
				foreach (scandir($gamesDir) as $file) {
					if (is_link($gamesDir . '/' . $file)) { continue; }
					$file = basename($file);
					if (in_array($file, $ignoredFiles)) { continue; }
					if ($file == $current) { continue; }

					$name = (isset($names[$file]) ? $names[$file] : $file);
					$img = (file_exists($images . '/' . $file . '.jpg') ? $images . '/' . $file . '.jpg' : $images . '/none.jpg');

					echo '<tr>';
					echo '<td class="image"><img class="ListLogo" src="', $img, '" alt="', $name, '"></td>';
					echo '<td class="actions">';
					echo '<img class="InlineLogo" src="', $img, '" alt="', $name, '">';
					echo '<br class="InlineLogo"><br class="InlineLogo">';
					echo '<strong>', $name, '</strong>';
					echo '<br><br>';
					echo '<a href="/load.php?file=', urlencode($file), '" class="btn btn-primary btn-lg">Load Game</a>';
					echo '</td>';
					echo '</tr>';
				}
			?>
			</table>
<?php require_once(dirname(__FILE__) . '/footer.php'); ?>
