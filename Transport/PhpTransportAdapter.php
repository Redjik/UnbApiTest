<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 14.04.2015
 * Time: 16:28
 */

namespace Redjik\Bundle\UnbTestBundle\Transport;


class PhpTransportAdapter implements TransportInterface
{

    /**
     * @param $url
     * @return mixed
     * @throws TransportFailureException
     */
    public function get($url)
    {
        if ($content = $this->runWithErrorHandler($url)){
            return $content;
        }

        throw new TransportFailureException('PhpTransport couldn\'t open the url '.$url);
    }

    /**
     * Wrapper for file_get_contents
     *
     * @param $url
     * @return mixed
     */
    protected function runWithErrorHandler($url)
    {
        set_error_handler(function($errno, $errstr) use ($url){
            throw new TransportFailureException('PhpTransport couldn\'t open the url '.$url.' due to '.$errstr,$errno);
        });
        $result = file_get_contents($url);
        restore_error_handler();
        return $result;
    }
}