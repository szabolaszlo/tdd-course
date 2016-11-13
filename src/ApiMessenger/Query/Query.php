<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 13.
 * Time: 21:13
 */
namespace ApiMessenger\Query;

use ApiMessenger\ApiHandler\IApiHandler;
use ApiMessenger\ApiResponse\IApiResponseCreator;
use ApiMessenger\ApiResponse\Response\IApiResponse;

/**
 * Class Query
 * @package ApiMessenger\Query
 */
class Query implements IQuery
{
    /**
     * @var IApiResponseCreator
     */
    protected $responseCreator;

    /**
     * @var IApiHandler
     */
    protected $apiHandler;

    /**
     * Query constructor.
     * @param IApiResponseCreator $responseCreator
     * @param IApiHandler $apiHandler
     */
    public function __construct(IApiResponseCreator $responseCreator, IApiHandler $apiHandler)
    {
        $this->apiHandler = $apiHandler;
        $this->responseCreator = $responseCreator;
    }

    /**
     * @param $responseType
     * @param $query
     * @return IApiResponse
     */
    public function getResult($responseType, $query)
    {
        return $this->apiHandler->getResponse($responseType, $query);
    }
}
