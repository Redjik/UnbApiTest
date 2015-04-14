<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 13.04.2015
 * Time: 22:52
 */

namespace Redjik\Bundle\UnbTestBundle\ValueObject;

class Data implements \JsonSerializable
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

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    function jsonSerialize()
    {
        return array('success'=>$this->success,'locations'=>$this->locations);
    }
}