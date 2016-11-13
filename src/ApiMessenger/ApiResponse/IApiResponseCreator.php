<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 13.
 * Time: 13:46
 */

namespace ApiMessenger\ApiResponse;

/**
 * Interface IApiResponseCreator
 * @package ApiMessenger\ApiResponse
 */
interface IApiResponseCreator
{
    public function create($responseType, $content);
}
