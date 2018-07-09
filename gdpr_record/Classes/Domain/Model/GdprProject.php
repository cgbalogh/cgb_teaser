<?php
namespace CGB\GdprRecord\Domain\Model;

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
 * Project
 */
class GdprProject extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * Conttroller
     *
     * @var \CGB\GdprRecord\Domain\Model\GdprController
     */
    protected $controller = null;

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the controller
     *
     * @return \CGB\GdprRecord\Domain\Model\GdprController $controller
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Sets the controller
     *
     * @param \CGB\GdprRecord\Domain\Model\GdprController $controller
     * @return void
     */
    public function setController(\CGB\GdprRecord\Domain\Model\GdprController $controller)
    {
        $this->controller = $controller;
    }
}
