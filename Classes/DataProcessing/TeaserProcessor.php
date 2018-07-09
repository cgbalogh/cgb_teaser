<?php
namespace CGB\CgbTeaser\DataProcessing;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

define('WHERE', 'bodytext <> \'\' AND NOT deleted AND NOT hidden AND CType IN(\'image\',\'text\',\'textpic\')');

/**
 * Class for data processing for the content element "Teaser"
 */
class TeaserProcessor implements DataProcessorInterface
{

    /**
     * Holds the FIlesProcessor to fetch the images from the content elements
     * 
     * @var \TYPO3\CMS\Frontend\DataProcessing\FilesProcessor 
     */
    protected $filesProcessor;
    
    /**
     *
     * @var \TYPO3\CMS\Frontend\Page\PageRepository
     */
    protected $pageRepository;
    
    
    /**
     * Initializes the object and the FilesProcessor
     */
    public function __construct(){
        $this->pageRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Frontend\Page\PageRepository::class);
        $this->filesProcessor = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Frontend\DataProcessing\FilesProcessor::class);
    }
    
   /**
    * Process data for the content element "Teaser"
    * 
    * The CE will be scanned for the page ids which should be listed as teasers.
    *
    * @param ContentObjectRenderer $cObj The data of the content element or page
    * @param array $contentObjectConfiguration The configuration of Content Object
    * @param array $processorConfiguration The configuration of this processor
    * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
    * @return array the processed data as key/value store
    */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    )
    {
        // The array of page ids from tx_cgbteaser_showpage
        $pagesArray = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $cObj->data['tx_cgbteaser_showpage'], 1);
        $pages = [];
        
        // cycle the array and fetch the content elements from the pages ordered by sorting
        foreach ($pagesArray as $pid) {
            $page = $this->pageRepository->getPage($pid);
            
            // select the content elements
            $contentElements = $this->pageRepository->getRecordsByField('tt_content', 'pid', $pid, \WHERE, '', 'sorting', '1');

            // clone the $cObj and replace the data
            // it will be needed to pass the correct uid to the filesProcessor
            $tempCObj = clone $cObj;

            // take first content element and fetch related images if there is anything to fetch
            if ($page['tx_cgbteaser_teasertext']) {
                $processorConfiguration['references.']['fieldName'] = 'tx_cgbteaser_teaserimage';
                $processorConfiguration['references.']['table'] = 'pages';
                $processorConfiguration['as'] = 'images';

                $tempCObj->data = $page;
                
                $files = $this->filesProcessor->process( $tempCObj, $contentObjectConfiguration, $processorConfiguration, $page );
                
                $pages[] = [
                    'uid' => $page['uid'],
                    'teasertext' => $page['tx_cgbteaser_teasertext'],
                    'image' => $files['images'][0],
                ];
                
            } elseif (is_array($contentElements[0])) {
                $processorConfiguration['references.']['fieldName'] = 'image';
                $processorConfiguration['references.']['table'] = 'tt_content';
                $processorConfiguration['as'] = 'images';

                $tempCObj->data = $contentElements[0];

                $files = $this->filesProcessor->process( $tempCObj, $contentObjectConfiguration, $processorConfiguration, $contentElements[0] );
                
                // append to pages array array
                $pages[] = [
                    'uid' => $page['uid'],
                    'teasertext' => $contentElements[0]['bodytext'],
                    'header' => $contentElements[0]['header'],
                    'image' => $files['images'][0],
                ];
            }
        }

       
        $processedData['pages'] = $pages;

        // map the additional settings needed for correct rendering
        $processedData['settings'] = [
            'flex' => $cObj->data['tx_cgbteaser_flex'],
            'mode' => $cObj->data['tx_cgbteaser_mode'],
            'height' => $cObj->data['tx_cgbteaser_height'],
            'width' => $cObj->data['tx_cgbteaser_width'],
        ];
        return $processedData;
    }
}
