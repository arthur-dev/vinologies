<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 12:31
 */

namespace Core\UtilsBundle\Model;

interface RichResourceInterface extends ResourceInterface
{
    /**
     * @param bool $deleted
     * @return mixed
     */
    public function setDeleted($deleted);

    /**
     * @return bool
     */
    public function isDeleted();

    /**
     * @param \DateTime $date
     * @return mixed
     */
    public function setDeletedAt(\DateTime $date);

    /**
     * @return \DateTime|null
     */
    public function getDeletedAt();

    /**
     * Renseigne la date de création, ou met à jour la date de mise à jour s'il y a déjà une date
     * de création
     */
    public function updateTimestamps();

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @return \DateTime
     */
    public function getUpdatedAt();
}