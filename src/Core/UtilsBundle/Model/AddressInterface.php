<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 16:54
 */

namespace Core\UtilsBundle\Model;


interface AddressInterface
{
    /**
     * @param string $street
     */
    public function setStreet($street);

    /**
     * @return string
     */
    public function getStreet();

    /**
     * @param string $complement
     */
    public function setComplement($complement);

    /**
     * @return string
     */
    public function getComplement();

    /**
     * @param string $city
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $country
     */
    public function setCountry($country);

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param int $postalCode
     */
    public function setPostalCode($postalCode);

    /**
     * @return int
     */
    public function getPostalCode();
}