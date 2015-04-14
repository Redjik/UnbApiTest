<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 13.04.2015
 * Time: 22:52
 */

namespace Redjik\Bundle\UnbTestBundle\ValueObject;

class Data
{
    /**
     * @var bool
     */
    private $success;

    /**
     * @var Location[]
     */
    private $locations = array();

    /**
     * @param bool $success
     * @param array|Location[] $locations
     */
    public function __construct($success = false, array $locations = array())
    {
        $this->success = $success;
        $this->locations = $locations;
    }

    /**
     * @return Location[]
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->success;
    }
}