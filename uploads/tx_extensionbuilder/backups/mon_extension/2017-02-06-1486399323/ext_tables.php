<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'OLIVER.' . $_EXTKEY,
	'Display',
	'Mon extension'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Mon-extension');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_monextension_domain_model_titre', 'EXT:mon_extension/Resources/Private/Language/locallang_csh_tx_monextension_domain_model_titre.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_monextension_domain_model_titre');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_monextension_domain_model_auteur', 'EXT:mon_extension/Resources/Private/Language/locallang_csh_tx_monextension_domain_model_auteur.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_monextension_domain_model_auteur');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_monextension_domain_model_commentaire', 'EXT:mon_extension/Resources/Private/Language/locallang_csh_tx_monextension_domain_model_commentaire.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_monextension_domain_model_commentaire');
