<?php
/**
 * Created by PhpStorm.
 * User: Ivan Matveev
 * Date: 13.04.2015
 * Time: 23:51
 */

namespace Redjik\Bundle\UnbTestBundle\Service;

use Redjik\Bundle\UnbTestBundle\DataParser\DataParserInterface;
use Redjik\Bundle\UnbTestBundle\Transport\TransportInterface;
use Redjik\Bundle\UnbTestBundle\ValueObject\Data;

class DataCollector
{
    /**
     * Usually we wake custom API realisation this way
     * So for different Application different const Url
     */
    const URL = 'http://symfony.dev';

    /**
     * @var TransportInterface
     */
    private $transport;
    /**
     * @var DataParserInterface
     */
    private $parser;

    public function __construct(TransportInterface $transport, DataParserInterface $parser)
    {
        $this->transport = $transport;
        $this->parser = $parser;
    }

    /**
     * @param $param
     * @return Data
     */
    public function getData($param)
    {
        $rawData = $this->transport->get($this->getUrl($param));
        return $this->parser->parse($rawData);
    }

    /**
     * Realisation for test purposes only
     *
     * @param $param
     * @return string
     */
    protected function getUrl($param)
    {
        return self::URL.'/'.$param;
    }
}