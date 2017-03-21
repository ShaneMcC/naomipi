<?php
	/** IP of Naomi. */
	$ip = '192.168.0.20';

	/** Path to loader script. */
	$cmd = dirname(__FILE__) . '/../load.sh';

	/** Path to games. */
	$gamesDir = dirname(__FILE__) . '/../roms/';

	/** Path to images (This should be relative, and within the webroot as this is used in html as well as to check if the image exists.) */
	$images = './images/';

	/** Rom Names to Game Names mapping. */
	$names = array();
	$names['Capcom_Vs_SNK_2_Millionaire_Fighting_2001.bin'] = 'Capcom vs. SNK 2: Millionaire Fighting 2001';
	$names['Capcom_vs_SNK_Millenium_Fight_2000_Pro.bin'] = 'Capcom vs. SNK Millenium Fight 2000 Pro';
	$names['DeadOrAlive2Millenium.bin'] = 'Dead Or Alive 2 Millenium';
	$names['GuiltyGearXX.bin'] = 'GuiltyGearXX';
	$names['PowerStone2.bin'] = 'PowerStone';
	$names['Powerstone-alt.BIN'] = 'PowerStone 2';
	$names['StreetFighterZero3Upper.bin'] = 'Street Fighter Zero3 Upper';
	$names['UnderDefeat_v3.bin'] = 'UnderDefeat V3';
	$names['VirtuaFighter4FinalTuned.bin'] = 'Virtua Fighter 4';
	$names['VirtuaTennis2.bin'] = 'Virtua Tennis 2';
	$names['VirtuaTennis.bin'] = 'Virtua Tennis';
	$names['ZeroGunner2.bin'] = 'Zero Gunner 2';

	/** Game files to ignore in game list. */
	$ignoredFiles = array();

	/** User Specific Config. */
	if (file_exists(dirname(__FILE__) . '/config.local.php')) {
		require_once(dirname(__FILE__) . '/config.local.php');
	}
