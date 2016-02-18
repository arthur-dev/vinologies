<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 12:29
 */

namespace Core\UtilsBundle\Entity;

use Core\UtilsBundle\Model\RichResourceInterface;

/**
 * Class RichResource
 * @package Core\UtilsBundle\Entity
 */
class RichResource extends Resource implements RichResourceInterface
{
    /**
     * @var bool
     */
    protected $deleted;

    /**
     * @var \DateTime
     */
    protected $deletedAt;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    public function __construct()
    {
        $this->deleted = false;
        $this->updateTimestamps();
    }

    /**
     * @return bool
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     * @return bool
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime $deletedAt
     * @return mixed|void
     */
    public function setDeletedAt(\DateTime $deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function updateTimestamps()
    {
        if(is_null($this->createdAt))
            $this->createdAt = new \DateTime();
        else
            $this->updatedAt = new \DateTime();
    }
}