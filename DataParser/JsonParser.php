<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 13.04.2015
 * Time: 23:18
 */

namespace Redjik\Bundle\UnbTestBundle\DataParser;

use Redjik\Bundle\UnbTestBundle\ValueObject\Coordinates;
use Redjik\Bundle\UnbTestBundle\ValueObject\Data;
use Redjik\Bundle\UnbTestBundle\ValueObject\Location;

class JsonParser implements DataParserInterface
{
    /**
     * Receives raw string data
     * Parses it into Data value object
     * @param string $rawData
     * @return Data
     * @throws ParseException
     */
    public function parse($rawData)
    {

        $data = json_decode($rawData,true);

        if (!$data){
            throw new ParseException('Couldn\'t parse due to json error', json_last_error());
        }

        return $this->getData($data);

    }

    /**
     * Parser helper method
     * @param $data
     * @return Data
     */
    protected function getData($data)
    {
        if (isset($data['data']) && isset($data['success'])){
            return new Data((bool)$data['success'],$this->getLocations($data['data']));
        }

        return new Data();
    }

    /**
     * Parser helper method
     * @param $data
     * @return Location[]
     */
    protected function getLocations($data)
    {
        $locations = array();
        if (isset($data['locations'])){
            foreach ($data['locations'] as $location)
            {
                if (isset($location['name']) && isset($location['coordinates'])){
                    $locations[] = new Location($location['name'],$this->getCoordinates($location['coordinates']));
                }
            }
        }

        return $locations;
    }

    /**
     * Parser helper method
     * @param $data
     * @return Coordinates
     */
    protected function getCoordinates($data)
    {
        if (isset($data['lat']) && isset($data['long'])){
            return new Coordinates((float)$data['lat'],(float)$data['long']);
        }

        return new Coordinates();
    }
}