<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 14.04.2015
 * Time: 0:37
 */

namespace Redjik\Bundle\UnbTestBundle\Transport;


use Guzzle\Http\Client;

class GuzzleTransportAdapter implements TransportInterface
{

    /**
     * @param $url
     * @return mixed
     */
    public function get($url)
    {
        $client = new Client();
        $request = $client->get($url);
        $response = $request->send();
        return $response->getBody(true);
    }
}