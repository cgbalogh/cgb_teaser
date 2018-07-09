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
 * GdprController
 */
class GdprController extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Last Name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $lastName = '';

    /**
     * First Name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $firstName = '';

    /**
     * Company
     *
     * @var string
     */
    protected $company = '';

    /**
     * Address
     *
     * @var string
     */
    protected $address = '';

    /**
     * Phone
     *
     * @var string
     */
    protected $phone = '';

    /**
     * Email
     *
     * @var string
     */
    protected $email = '';

    /**
     * Type
     *
     * @var int
     * @validate NotEmpty
     */
    protected $type = 0;

    /**
     * Joints
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\GdprRecord\Domain\Model\GdprController>
     * @cascade remove
     */
    protected $joints = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->joints = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the lastName
     *
     * @return string $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Sets the lastName
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Returns the firstName
     *
     * @return string $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Sets the firstName
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Returns the company
     *
     * @return string $company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Sets the company
     *
     * @param string $company
     * @return void
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the address
     *
     * @param string $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Returns the phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets the phone
     *
     * @param string $phone
     * @return void
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the type
     *
     * @return int $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param int $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Adds a GdprController
     *
     * @param \CGB\GdprRecord\Domain\Model\GdprController $joint
     * @return void
     */
    public function addJoint(\CGB\GdprRecord\Domain\Model\GdprController $joint)
    {
        $this->joints->attach($joint);
    }

    /**
     * Removes a GdprController
     *
     * @param \CGB\GdprRecord\Domain\Model\GdprController $jointToRemove The GdprController to be removed
     * @return void
     */
    public function removeJoint(\CGB\GdprRecord\Domain\Model\GdprController $jointToRemove)
    {
        $this->joints->detach($jointToRemove);
    }

    /**
     * Returns the joints
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\GdprRecord\Domain\Model\GdprController> $joints
     */
    public function getJoints()
    {
        return $this->joints;
    }

    /**
     * Sets the joints
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\GdprRecord\Domain\Model\GdprController> $joints
     * @return void
     */
    public function setJoints(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $joints)
    {
        $this->joints = $joints;
    }
}
