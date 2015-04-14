<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 13.04.2015
 * Time: 23:17
 */

namespace Redjik\Bundle\UnbTestBundle\DataParser;

use Redjik\Bundle\UnbTestBundle\ValueObject\Data;

interface DataParserInterface
{
    /**
     * Receives raw string data
     * Parses it into Data value object
     * @param string $rawData
     * @return Data
     * @throws ParseException
     */
    public function parse($rawData);
}