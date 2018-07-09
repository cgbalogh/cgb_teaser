<?php

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

/**
 * general note:
 * 
 * The language file for the FE translations will be used here. 
 */


/**
 * adjust select values for gender
 */
$GLOBALS['TCA']['tx_gdprrecord_domain_model_gdprcontroller']['columns']['type']['config']['items'] = array(
    array('LLL:EXT:gdpr_record/Resources/Private/Language/locallang.xlf:tx_gdprrecord_general.select_from_list', 0),
    array('LLL:EXT:gdpr_record/Resources/Private/Language/locallang.xlf:tx_gdprrecord_domain_model_gdprcontroller.type.1', 1),
    array('LLL:EXT:gdpr_record/Resources/Private/Language/locallang.xlf:tx_gdprrecord_domain_model_gdprcontroller.type.2', 1),
    array('LLL:EXT:gdpr_record/Resources/Private/Language/locallang.xlf:tx_gdprrecord_domain_model_gdprcontroller.type.3', 1),
    array('LLL:EXT:gdpr_record/Resources/Private/Language/locallang.xlf:tx_gdprrecord_domain_model_gdprcontroller.type.4', 1),
    array('LLL:EXT:gdpr_record/Resources/Private/Language/locallang.xlf:tx_gdprrecord_domain_model_gdprcontroller.type.5', 1),
);

// hide table in list module
$GLOBALS['TCA']['tx_gdprrecord_domain_model_gdprcontroller']['ctrl']['hideTable'] = 1;