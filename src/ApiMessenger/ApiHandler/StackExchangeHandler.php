<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 09.
 * Time: 19:46
 */

namespace ApiMessenger\ApiHandler;
use ApiMessenger\ApiResponse\IApiResponseCreator;

/**
 * Class StackExchangeApiHandler
 * @package ApiMessenger\ApiHandler
 */
class StackExchangeHandler implements IApiHandler
{
    protected $apiDomain = 'http://api.stackexchange.com';

    /** @var  IApiResponseCreator */
    protected $responseCreator;

    /**
     * StackExchangeHandler constructor.
     * @param IApiResponseCreator $apiResponseCreator
     */
    public function __construct(IApiResponseCreator $apiResponseCreator)
    {
        $this->responseCreator = $apiResponseCreator;
    }

    /**
     * @param $responseType
     * @param $url
     * @return mixed
     */
    public function getResponse($responseType, $url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->apiDomain . $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_USERAGENT, 'cURL');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_ENCODING , "gzip");

        $result = curl_exec($curl);
        curl_close($curl);

        return $this->responseCreator->create($responseType, $result);
    }
}
