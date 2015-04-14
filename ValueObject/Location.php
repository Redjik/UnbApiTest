<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 13.04.2015
 * Time: 22:51
 */

namespace Redjik\Bundle\UnbTestBundle\ValueObject;

class Location
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Coordinates
     */
    private $coordinates;


    public function __construct($name, Coordinates $coordinates)
    {
        $this->name = $name;
        $this->coordinates = $coordinates;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }
}