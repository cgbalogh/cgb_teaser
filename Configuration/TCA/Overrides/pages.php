<?php
defined('TYPO3_MODE') || die();

$tmp_cgb_teaser_columns = [

    'tx_cgbteaser_teaserimage' => [
        'exclude' => true,
        'label' => 'LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser_domain_model_page.teaserimage',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'tx_cgbteaser_teaserimage',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                ],
                'foreign_types' => [
                    '0' => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ]
                ],
                'maxitems' => 1
            ],
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
    ],
    'tx_cgbteaser_teasertitle' => [
        'exclude' => true,
        'label' => 'LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser_domain_model_page.teasertitle',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim',
        ],
        
    ],
    'tx_cgbteaser_teasertext' => [
        'exclude' => true,
        'label' => 'LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser_domain_model_page.teasertext',
        'config' => [
            'type' => 'text',
            'enableRichtext' => true,
            'richtextConfiguration' => 'default',
            'fieldControl' => [
                'fullScreenRichtext' => [
                    'disabled' => false,
                ],
            ],
            'cols' => 40,
            'rows' => 15,
            'eval' => 'trim',
        ],
        
    ],
    'tx_cgbteaser_textonly' => [
        'exclude' => true,
        'label' => 'LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser_domain_model_page.textonly',
        'config' => [
            'type' => 'check',
            'items' => [
                '1' => [
                    '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                ]
            ],
            'default' => 0,
        ]
    ],
    'tx_cgbteaser_teasertype' => [
        'exclude' => true,
        'label' => 'LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser_domain_model_page.teasertype',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['--', 0],
                ['LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser_domain_model_page.teasertype.1', 1, 'EXT:cgb_teaser/Resources/Public/Icons/movie.png'],
                ['LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser_domain_model_page.teasertype.2', 2, 'EXT:cgb_teaser/Resources/Public/Icons/image.png'],
                ['LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser_domain_model_page.teasertype.3', 3, 'EXT:cgb_teaser/Resources/Public/Icons/pdf.png'],
                ['LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tx_cgbteaser_domain_model_page.teasertype.4', 4, 'EXT:cgb_teaser/Resources/Public/Icons/text.png'],
            ],
            'showIconTable' => 1,
            'size' => 1,
            'maxitems' => 1,
            'eval' => ''
        ],
    ],

];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages',$tmp_cgb_teaser_columns);

/* inherit and extend the show items from the parent class */

// Make fields visible in the TCEforms:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
  'pages', 
  '--div--;Teaser,tx_cgbteaser_teasertitle,'.
  '--palette--;LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tt_content.palette.override;tx_cgbteaser_overrides,'.
  '--palette--;LLL:EXT:cgb_teaser/Resources/Private/Language/locallang_db.xlf:tt_content.palette.mode;tx_cgbteaser_mode', 
  '1', // List of specific types to add the field list to. (If empty, all type entries are affected)
  'after:category' // Insert fields before (default) or after one, or replace a field
);

// Add the new palette:
$GLOBALS['TCA']['pages']['palettes']['tx_cgbteaser_overrides'] = array(
  'showitem' => 'tx_cgbteaser_teaserimage,tx_cgbteaser_teasertext'
);

$GLOBALS['TCA']['pages']['palettes']['tx_cgbteaser_mode'] = array(
  'showitem' => 'tx_cgbteaser_textonly,tx_cgbteaser_teasertype'
);