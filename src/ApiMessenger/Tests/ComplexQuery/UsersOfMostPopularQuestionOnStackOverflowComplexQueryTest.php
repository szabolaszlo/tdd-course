<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 13.
 * Time: 22:26
 */
namespace ApiMessenger\Tests\ComplexQuery;

use ApiMessenger\ApiResponse\ApiResponseCreator;
use ApiMessenger\ComplexQuery\UsersOfMostPopularQuestionOnStackOverflow;

/**
 * Class UsersOfMostPopularQuestionOnStackOverflowComplexQueryTest
 * @package ApiMessenger\Tests\ComplexQuery
 */
class UsersOfMostPopularQuestionOnStackOverflowComplexQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UsersOfMostPopularQuestionOnStackOverflow
     */
    protected $object;

    /**
     * @var array
     */
        protected $testArray = array(
            0 => 123432,
            1 => 232343,
            2 => 234434,
        );

    public function setUp()
    {
        $responseCreator = new ApiResponseCreator();
        $apiHandler = $this->getMockBuilder('ApiMessenger\ApiHandler\StackExchangeHandler')
            ->disableOriginalConstructor()
            ->setMethods(array('getResponse'))
            ->getMock();

        $response = $this->getMockBuilder('ApiMessenger\ApiResponse\Response\JsonResponse')
            ->disableOriginalConstructor()
            ->setMethods(array('get'))
            ->getMock();

        $response->expects($this->at(1))
            ->method('get')
            ->will($this->returnValue(array(
                0 => array('owner' => array('user_id' => $this->testArray[0])),
                1 => array('owner' => array('user_id' => $this->testArray[1])),
                2 => array('owner' => array('user_id' => $this->testArray[2])),
            )));


        $apiHandler
            ->expects($this->exactly(2))
            ->method('getResponse')
            ->will($this->returnValue($response));

        $this->object = new UsersOfMostPopularQuestionOnStackOverflow($responseCreator, $apiHandler);
    }

    public function testGetResult()
    {
        $this->assertEquals(
            $this->testArray,
            $this->object->getResult()
        );
    }
}
