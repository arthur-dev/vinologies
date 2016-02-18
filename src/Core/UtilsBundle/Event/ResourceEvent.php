<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 16:14
 */

namespace Core\UtilsBundle\Event;


use Core\UtilsBundle\Model\ResourceInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ResourceEvent
 * @package Core\RestBundle\Event
 */
class ResourceEvent extends Event
{
    /**
     * @var ResourceInterface
     */
    public $resource;

    public function __construct(ResourceInterface $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return ResourceInterface
     */
    public function getResource()
    {
        return $this->resource;
    }

}