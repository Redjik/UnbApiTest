<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 14.04.2015
 * Time: 16:14
 */

namespace Redjik\Bundle\UnbTestBundle\ResponseFactory;

use Symfony\Component\HttpFoundation\Response;

class ResponseFactory
{
    /**
     * @param string $content
     * @param int $status
     * @return Response
     */
    public function getJsonResponse($content = '',$status = 200)
    {
        $response = new Response($content,$status);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}