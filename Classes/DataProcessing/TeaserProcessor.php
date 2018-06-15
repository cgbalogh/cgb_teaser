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

/**
 * Class for data processing for the content element "Teaser"
 */
class TeaserProcessor implements DataProcessorInterface
{

   /**
    * Process data for the content element "Teaser"
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
        $pagesArray = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $cObj->data['tx_cgbteaser_showpage'], 1);
        $pages = [];
        foreach ($pagesArray as $id) {
            $pageRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Frontend\Page\PageRepository');
            $page = $pageRepository->getPage($id);
            
            $contentElements = $pageRepository->getRecordsByField(
                'tt_content',
                'pid',
                $id,
                'bodytext <> \'\' AND NOT deleted AND NOT hidden AND CType IN(\'image\',\'text\',\'textpic\')',
                '',
                'sorting',
                '1'
            );
            
            $pages[] = [
                'page' => $page,
                'ce' => $contentElements[0],
            ];
        }
       
       
       
      $processedData['pages'] = $pages;

      return $processedData;
   }
}