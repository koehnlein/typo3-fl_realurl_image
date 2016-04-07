<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.hook_tslib_fe.php']['connectToDB']['tx_flrealurlimage'] = 'FRUIT\\FlRealurlImage\\Hook\\TypoScriptFrontend->checkImageDecode';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['fl_realurl_image'] = array('frontend' => 'FRUIT\\FlRealurlImage\\Cache\\UriFrontend');

$xClass = array(
    'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer'      => 'Frontend\\ContentObject\\ContentObjectRenderer',
    'TYPO3\\CMS\\Frontend\\ContentObject\\ImageResourceContentObject' => 'Frontend\\ContentObject\\ImageResource',
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\MediaViewHelper'                 => 'Fluid\\ViewHelpers\\MediaViewHelper',
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\ImageViewHelper'                 => 'Fluid\\ViewHelpers\\ImageViewHelper',
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\ImageViewHelper'            => 'Fluid\\ViewHelpers\\Uri\\ImageViewHelper',
);

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('vhs')) {
    $xClass['FluidTYPO3\\Vhs\\ViewHelpers\\Media\\PictureViewHelper'] = 'Vhs\\ViewHelpers\\Media\\PictureViewHelper';
    $xClass['FluidTYPO3\\Vhs\\ViewHelpers\\Media\\SourceViewHelper'] = 'Vhs\\ViewHelpers\\Media\\SourceViewHelper';
}

foreach ($xClass as $source => $target) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][$source] = array('className' => 'FRUIT\\FlRealurlImage\\Xclass\\' . $target);
}
