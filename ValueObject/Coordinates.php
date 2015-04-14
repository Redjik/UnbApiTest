<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 13.04.2015
 * Time: 22:52
 */

namespace Redjik\Bundle\UnbTestBundle\ValueObject;

class Coordinates
{
    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    public function __construct($latitude = null, $longitude = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    public function isNull()
    {
        return (is_null($this->latitude) || is_null($this->longitude));
    }

}