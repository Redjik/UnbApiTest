<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 14.04.2015
 * Time: 16:09
 */

namespace Redjik\Bundle\UnbTestBundle\Action;

use Redjik\Bundle\UnbTestBundle\ResponseFactory\ResponseFactory;
use Redjik\Bundle\UnbTestBundle\Service\DataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class TestAction
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var ResponseFactory
     */
    private $responseFactory;
    /**
     * @var DataCollector
     */
    private $collector;

    public function __construct(RequestStack $requestStack, DataCollector $collector, ResponseFactory $responseFactory)
    {

        $this->request = $requestStack->getCurrentRequest();
        $this->responseFactory = $responseFactory;
        $this->collector = $collector;
    }

    public function run()
    {
        $dataObject = $this->collector->getData($this->request->request->get('file','default'));
        return $this->responseFactory->getJsonResponse(json_encode($dataObject));
    }
}