<?php
	/**
	 * This runs an application and returns the process and the pipes in the given array
	 * Returns true/false on successful execution
	 *
	 * $process['pipes'][0] is stdin
	 * $process['pipes'][1] is stdout
	 *
	 * @param $path Command to run.
	 * @param $proc Array to put descriptors in.
	 */
	function appexec($path, &$process) {
		$descriptorspec = array(0 => array("pipe", "r"),1 => array("pipe", "w"),2 => array("file", "/dev/null", "a"));
		$process = array();
		$process['process'] = proc_open($path, $descriptorspec, $process['pipes']);

		return is_resource($process['process']);
	}

	/**
	 * Run the given commmands, outputing their output to the browser, and
	 * returning it to the caller.
	 *
	 * @param $cmds Array of commands, or a string for a single command to be run
	 * @return A String containing the output of all commands run.
	 */
	function runCmd($cmds) {
		if (!is_array($cmds)) { $cmds = array($cmds); }

		$all = '';
		foreach ($cmds as $cmd) {
			$preid = uniqid('pre_' . abs(crc32($cmd)) . '_');


			echo '<br><hr>', "\n";
			echo '<script>', "\n";
			echo '  var autoscroll_', $preid, ' = true;', "\n";
			echo '  var interval_', $preid, ' = setInterval(function() {', "\n";
			echo '    var elem = document.getElementById("', $preid, '");', "\n";
			echo '    if (elem != undefined) {', "\n";
//			echo '      autoscroll_', $preid, ' = elem.scrollHeight - elem.clientHeight <= elem.scrollTop + 1;', "\n";
			echo '      if (autoscroll_', $preid, ' === true) {', "\n";
			echo '	elem.scrollTop = elem.scrollHeight;', "\n";
			echo '      }', "\n";
			echo '    }', "\n";
			echo '  }, 10);', "\n";
			echo '</script>', "\n";
			echo '<pre id="', $preid, '" style="max-height: 500px; overflow: auto; border: 1px solid black; background: black; color: #B2B2B2">', "\n";
			echo '<strong style="color: white">', htmlentities($cmd), '</strong>', "\n\n";
			appexec($cmd, $proc);
			fclose($proc['pipes'][0]);

			// Now close the process handle
			while (!feof($proc['pipes'][1])) {
				$bit = fread($proc['pipes'][1], 512);
				echo $bit;
				$all .= $bit;
				flush();
			}

			fclose($proc['pipes'][1]);
			$returnCode = proc_close($proc['process']);
			echo '</pre>';
			echo '<script>';
			echo '  clearInterval(interval_', $preid, ');';
			echo '  var elem = document.getElementById("', $preid, '");';
			if ($returnCode == 0) {
				echo '  elem.style.borderColor = "#00AA00";';
			} else if ($returnCode == 1) {
				echo '  elem.style.borderColor = "#AA0000";';
			} else {
				echo '  elem.style.borderColor = "#AAAA00";';
			}
			echo '  elem.style.borderWidth = "3px";';
			echo '</script>';
		}
		return array($returnCode, $all);
	}

?>
