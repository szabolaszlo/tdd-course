<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 09.
 * Time: 20:33
 */
namespace ApiMessenger\Tests\ApiResponse;

use ApiMessenger\ApiResponse\Response\JsonResponse;

/**
 * Class JsonResponseTest
 * @package ApiMessenger\Tests\ApiResponse
 */
class JsonResponseTest extends \PHPUnit_Framework_TestCase
{
    /** @var  JsonResponse */
    protected $object;

    /**
     * @var string
     */
    protected $testKey = 'test_key';

    /**
     * @var string
     */
    protected $testValue = 'test_value';

    /**
     *  Prepare object
     */
    public function setUp()
    {
        $testJson = json_encode(array($this->testKey => $this->testValue));

        $this->object = new JsonResponse($testJson);
    }

    public function testGet()
    {
        $this->assertEquals(
            $this->testValue,
            $this->object->get($this->testKey)
        );
    }
}
