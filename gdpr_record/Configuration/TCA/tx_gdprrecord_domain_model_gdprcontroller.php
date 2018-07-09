<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:gdpr_record/Resources/Private/Language/locallang_db.xlf:tx_gdprrecord_domain_model_gdprcontroller',
        'label' => 'last_name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'last_name,first_name,company,address,phone,email,type,joints',
        'iconfile' => 'EXT:gdpr_record/Resources/Public/Icons/tx_gdprrecord_domain_model_gdprcontroller.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, last_name, first_name, company, address, phone, email, type, joints',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, last_name, first_name, company, address, phone, email, type, joints, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_gdprrecord_domain_model_gdprcontroller',
                'foreign_table_where' => 'AND tx_gdprrecord_domain_model_gdprcontroller.pid=###CURRENT_PID### AND tx_gdprrecord_domain_model_gdprcontroller.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'last_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gdpr_record/Resources/Private/Language/locallang_db.xlf:tx_gdprrecord_domain_model_gdprcontroller.last_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'first_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gdpr_record/Resources/Private/Language/locallang_db.xlf:tx_gdprrecord_domain_model_gdprcontroller.first_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'company' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gdpr_record/Resources/Private/Language/locallang_db.xlf:tx_gdprrecord_domain_model_gdprcontroller.company',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'address' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gdpr_record/Resources/Private/Language/locallang_db.xlf:tx_gdprrecord_domain_model_gdprcontroller.address',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'phone' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gdpr_record/Resources/Private/Language/locallang_db.xlf:tx_gdprrecord_domain_model_gdprcontroller.phone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gdpr_record/Resources/Private/Language/locallang_db.xlf:tx_gdprrecord_domain_model_gdprcontroller.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gdpr_record/Resources/Private/Language/locallang_db.xlf:tx_gdprrecord_domain_model_gdprcontroller.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['-- Label --', 0],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => 'required'
            ],
        ],
        'joints' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gdpr_record/Resources/Private/Language/locallang_db.xlf:tx_gdprrecord_domain_model_gdprcontroller.joints',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_gdprrecord_domain_model_gdprcontroller',
                'foreign_field' => 'gdprcontroller',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
    
        'gdprcontroller' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
