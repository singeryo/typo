<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'OLIVER.' . $_EXTKEY,
	'Display',
	array(
		'Titre' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Titre' => 'create, update, delete',
		
	)
);
