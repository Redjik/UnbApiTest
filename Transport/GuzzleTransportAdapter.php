<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 14.04.2015
 * Time: 0:37
 */

namespace Redjik\Bundle\UnbTestBundle\Transport;


use Guzzle\Http\Client;
use Guzzle\Http\Exception\RequestException;

class GuzzleTransportAdapter implements TransportInterface
{
    /**
     * @param $url
     * @return string
     * @throws TransportFailureException
     */
    public function get($url)
    {
        $client = new Client();
        $request = $client->get($url);
        try{
            $response = $request->send();
        }catch (RequestException $e){
            throw new TransportFailureException('GuzzleTransport couldn\'t open the url .'.$url . ' due to '.$e->getMessage(), $e->getCode());
        }
        return $response->getBody(true);
    }
}