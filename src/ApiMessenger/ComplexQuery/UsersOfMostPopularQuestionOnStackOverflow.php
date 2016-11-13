<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 13.
 * Time: 21:57
 */
namespace ApiMessenger\ComplexQuery;

use ApiMessenger\ApiHandler\IApiHandler;
use ApiMessenger\ApiResponse\IApiResponseCreator;
use ApiMessenger\ApiResponse\Response\IApiResponse;
use ApiMessenger\Query\IQuery;
use ApiMessenger\Query\Query;

/**
 * Class UsersOfMostPopularQuestionOnStackOverflow
 * @package ApiMessenger\ComplexQuery
 */
class UsersOfMostPopularQuestionOnStackOverflow
{
    /**
     * @var IQuery
     */
    protected $query;

    /**
     * @var array
     */
    protected $result = array();

    /**
     * UsersOfMostPopularQuestionOnStackOverflow constructor.
     * @param IApiResponseCreator $responseCreator
     * @param IApiHandler $apiHandler
     */
    public function __construct(IApiResponseCreator $responseCreator, IApiHandler $apiHandler)
    {
        $this->query = new Query($responseCreator, $apiHandler);
        $this->buildResult();
    }

    protected function buildResult()
    {
        /** @var IApiResponse $response */
        $response = $this->query->getResult('json', '/2.2/questions/featured?order=desc&sort=votes&site=stackoverflow');

        $items = $response->get('items');
        $questionId = $items[0]['question_id'];

        /** @var IApiResponse */
        $response = $this->query->getResult(
            'json',
            '/2.2/questions/' . $questionId . '/answers?order=desc&sort=activity&site=stackoverflow'
        );

        $items = $response->get('items');

        foreach ($items as $item) {
            $this->result[] = $item['owner']['user_id'];
        }
    }

    /**
     * @return array
     */
    public function getResult()
    {
        return $this->result;
    }
}
