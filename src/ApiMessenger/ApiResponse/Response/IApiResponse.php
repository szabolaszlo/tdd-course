<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 09.
 * Time: 19:50
 */

namespace ApiMessenger\ApiResponse\Response;

/**
 * Interface IApiResponse
 * @package ApiMessenger\ApiResponse\Response
 */
interface IApiResponse
{
    public function get($key);
}
