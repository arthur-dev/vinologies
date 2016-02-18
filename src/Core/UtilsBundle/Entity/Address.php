<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 16:52
 */

namespace Core\UtilsBundle\Entity;

use Core\UtilsBundle\Model\AddressInterface;
use Core\UtilsBundle\Entity\RichResource;

/**
 * Class Address
 * @package Core\CustomerBundle\Entity
 */
class Address extends RichResource implements AddressInterface
{

    /**
     * @var string
     */
    protected $street;

    /**
     * @var string
     */
    protected $complement;

    /**
     * @var int
     */
    protected $postalCode;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $canonicalCity;

    /**
     * @var string
     */
    protected $canonicalCountry;

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function getEvents()
    {
        //TODO remplir les champs canonical avec un event
        //et enlever le nullable a true dans la config doctrine
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $complement
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;
    }

    /**
     * @return string
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param int $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return int
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function getCanonicalCity()
    {
        return $this->canonicalCity;
    }

    /**
     * @param string $canonicalCity
     */
    public function setCanonicalCity($canonicalCity)
    {
        $this->canonicalCity = $canonicalCity;
    }

    /**
     * @return string
     */
    public function getCanonicalCountry()
    {
        return $this->canonicalCountry;
    }

    /**
     * @param string $canonicalCountry
     */
    public function setCanonicalCountry($canonicalCountry)
    {
        $this->canonicalCountry = $canonicalCountry;
    }


}