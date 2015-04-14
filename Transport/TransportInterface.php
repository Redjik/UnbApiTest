<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 13.04.2015
 * Time: 23:51
 */

namespace Redjik\Bundle\UnbTestBundle\Transport;


interface TransportInterface
{
    /**
     * @param $url
     * @return mixed
     */
    public function get($url);
}