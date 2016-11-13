<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 13.
 * Time: 21:29
 */
namespace ApiMessenger\Tests\Query;

use ApiMessenger\Query\IQuery;
use ApiMessenger\Query\Query;

/**
 * Class QueryTest
 * @package ApiMessenger\Tests\Query
 */
class QueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var IQuery
     */
    protected $object;

    public function setUp()
    {
        $responseCreator = $this->getMockBuilder('ApiMessenger\ApiResponse\ApiResponseCreator')
            ->disableOriginalConstructor()
            ->getMock();

        $apiHandler = $this->getMockBuilder('ApiMessenger\ApiHandler\StackExchangeHandler')
            ->disableOriginalConstructor()
            ->setMethods(array('getResponse'))
            ->getMock();

        $response = $this->getMockBuilder('ApiMessenger\ApiResponse\Response\JsonResponse')
            ->disableOriginalConstructor()
            ->getMock();

        $apiHandler->expects($this->once())->method('getResponse')->will($this->returnValue($response));

        $this->object = new Query($responseCreator, $apiHandler);
    }

    public function testGetResult()
    {
        $this->assertInstanceOf(
            'ApiMessenger\ApiResponse\Response\IApiResponse',
            $this->object->getResult('json', 'Some Query')
        );
    }
}
