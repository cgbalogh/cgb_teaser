<?php
defined('TYPO3_MODE') || die();

/*
 * no real extbase type. this was put in by extension builder, but we dont need it for a content element
if (!isset($GLOBALS['TCA']['tt_content']['ctrl']['type'])) {
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['tt_content']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_cgbteaser_tt_content = [];
    $tempColumnstx_cgbteaser_tt_content[$GLOBALS['TCA']['tt_content']['ctrl']['type']] = [
        'exclude' => true,
        'label'   => 'LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser.tx_extbase_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['',''],
                ['Content','Tx_CgbTeaser_Content']
            ],
            'default' => 'Tx_CgbTeaser_Content',
            'size' => 1,
            'maxitems' => 1,
        ]
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumnstx_cgbteaser_tt_content);
}
*/

/*
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    $GLOBALS['TCA']['tt_content']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['tt_content']['ctrl']['label']
);
*/

$tmp_cgb_teaser_columns = [

    'tx_cgbteaser_showpage' => [
        'exclude' => true,
        'label' => 'LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser_domain_model_content.tx_cgbteaser_showpage',
        'config' => [
			'type' => 'group',	
			'internal_type' => 'db',	
			'allowed' => 'pages',	
			'size' => 10,	
			'minitems' => 0,
			'maxitems' => 9999,
        ],
        
    ],
    'tx_cgbteaser_mode' => [
        'exclude' => true,
        'label' => 'LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser_domain_model_content.tx_cgbteaser_mode',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['-- Label --', 0],
            ],
            'size' => 1,
            'maxitems' => 1,
            'eval' => ''
        ],
    ],

];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content',$tmp_cgb_teaser_columns);

/* inherit and extend the show items from the parent class */
if (isset($GLOBALS['TCA']['tt_content']['types']['1']['showitem'])) {
    $GLOBALS['TCA']['tt_content']['types']['tx_cgbteaser_teaser']['showitem'] = $GLOBALS['TCA']['tt_content']['types']['1']['showitem'];
} elseif(is_array($GLOBALS['TCA']['tt_content']['types'])) {
    // use first entry in types array
    $tt_content_type_definition = reset($GLOBALS['TCA']['tt_content']['types']);
    $GLOBALS['TCA']['tt_content']['types']['tx_cgbteaser_teaser']['showitem'] = $tt_content_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['tt_content']['types']['tx_cgbteaser_teaser']['showitem'] = '';
}

/**
 * Teaser
 */
/***************
 * Configure element type
 */
$GLOBALS['TCA']['tt_content']['types']['tx_cgbteaser_teaser'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['tx_cgbteaser_teaser'],
    [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
                assets,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
        ',
    ]
);

$GLOBALS['TCA']['tt_content']['types']['tx_cgbteaser_teaser']['showitem'] .= ',--div--;LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser_domain_model_content,';
$GLOBALS['TCA']['tt_content']['types']['tx_cgbteaser_teaser']['showitem'] .= 'tx_cgbteaser_showpage, tx_cgbteaser_mode';


if (array_search(
    'LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbcontent',
    array_column($GLOBALS['TCA']['tt_content']['columns'][$GLOBALS['TCA']['tt_content']['ctrl']['type']]['config']['items'], 0)
) === false) {
    
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'CGB Content Elements',
            '--div--'
        ],
        'textmedia',
        'after'
    );
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tt_content.cgb_teaser',
        'tx_cgbteaser_teaser'
    ],
    'CGB Content Elements',
    'after'
);

// $GLOBALS['TCA']['tt_content']['columns'][$GLOBALS['TCA']['tt_content']['ctrl']['type']]['config']['items'];
// $GLOBALS['TCA']['tt_content']['columns'][$GLOBALS['TCA']['tt_content']['ctrl']['type']]['config']['items'][] = ['LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tt_content.cgb_teaser','tx_cgbteaser_teaser'];