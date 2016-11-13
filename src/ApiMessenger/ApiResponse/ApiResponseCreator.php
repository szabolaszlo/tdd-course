<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 13.
 * Time: 13:41
 */

namespace ApiMessenger\ApiResponse;

/**
 * Class ApiResponseCreator
 * @package ApiMessenger\ApiResponse
 */
class ApiResponseCreator implements IApiResponseCreator
{
    /**
     * @param $responseType
     * @param $content
     * @return mixed
     * @throws \Exception
     */
    public function create($responseType, $content)
    {
        $responseClassName = 'ApiMessenger\ApiResponse\Response\\' . $responseType . 'Response';

        if(!class_exists($responseClassName)){
            throw new \Exception('Not supported type: ' . $responseType);
        }

        return new $responseClassName($content);
    }
}
