<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 09.
 * Time: 19:43
 */

namespace ApiMessenger\ApiHandler;

/**
 * Interface IApiHandler
 * @package ApiMessenger\ApiHandler
 */
interface IApiHandler
{
    public function getResponse($responseType, $url);
}
