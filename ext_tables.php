<?php
/**
 * TYPO3 Extension configuration for the tx_phpmyadmin Extension
 *
 * @author		mehrwert <typo3@mehrwert.de>
 * @package		TYPO3
 * @subpackage	tx_phpmyadmin
 * @license		GPL
 * @version		$Id: ext_tables.php 35 2008-11-01 18:56:35Z ak $
 */

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

// If the backend is loaded, add the module
if (TYPO3_MODE == 'BE') {
	t3lib_extMgm::addModule('tools', 'txphpmyadmin', '', t3lib_extMgm::extPath($_EXTKEY) . 'modsub/');
}

// Require the utilities class and define logoff method for hook
@require_once(t3lib_extMgm::extPath('phpmyadmin').'res/class.tx_phpmyadmin_utilities.php');
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_userauth.php']['logoff_post_processing'][] = 'tx_phpmyadmin_utilities->pmaLogOff';

// The subdirectory where the pMA source is located (used for cookie removal and script inclusion)
$TYPO3_CONF_VARS['EXTCONF']['phpmyadmin']['pmaDirname'] = 'phpMyAdmin-2.11.9.4-all-languages';

?>