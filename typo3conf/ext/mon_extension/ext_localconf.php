<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'OLIVER.' . $_EXTKEY,
	'Admin',
	array(
		'Titre' => 'list, delete',
		
	),
	// non-cacheable actions
	array(
		'Titre' => 'delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'OLIVER.' . $_EXTKEY,
    'Create',
    array(
        'Titre' => 'list, new, create, edit, update',

    ),
    // non-cacheable actions
    array(
        'Titre' => 'show, new, create, edit, update',

    )
);