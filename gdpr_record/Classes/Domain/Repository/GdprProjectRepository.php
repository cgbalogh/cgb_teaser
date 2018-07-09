<?php
namespace CGB\GdprRecord\Domain\Repository;

/***
 *
 * This file is part of the "GDPR Record of Processing" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Christoph Balogh <cb@lustige-informatik.at>, DI Christoph Balogh e.U.
 *
 ***/

/**
 * The repository for GdprProjects
 */
class GdprProjectRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    ];
}
