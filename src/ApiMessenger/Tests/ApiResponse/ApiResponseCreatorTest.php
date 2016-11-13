<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 13.
 * Time: 13:54
 */
namespace ApiMessenger\Tests\ApiResponse;

use ApiMessenger\ApiResponse\ApiResponseCreator;

/**
 * Class ApiResponseCreatorTest
 * @package ApiMessenger\Tests\ApiResponse
 */
class ApiResponseCreatorTest extends \PHPUnit_Framework_TestCase
{
    /** @var ApiResponseCreator object */
    protected $object;

    public function setUp()
    {
        $this->object = new ApiResponseCreator();
    }

    public function testCreate()
    {
        $this->assertInstanceOf(
            'ApiMessenger\ApiResponse\Response\IApiResponse',
            $this->object->create('json', 'json string')
        );

        $eMessage = null;
        try {
            $this->object->create('foo_bar', 'some string');
        } catch (\Exception $e) {
            $eMessage = $e->getMessage();
        }
        $this->assertEquals($eMessage, 'Not supported type: foo_bar');
    }
}
