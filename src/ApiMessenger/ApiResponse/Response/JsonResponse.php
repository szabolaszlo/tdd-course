<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 09.
 * Time: 19:52
 */

namespace ApiMessenger\ApiResponse\Response;

/**
 * Class JsonResponse
 * @package ApiMessenger\ApiResponse\Response
 */
class JsonResponse implements IApiResponse
{
    /**
     * @var string
     */
    protected $json;

    /**
     * @var array
     */
    protected $decodedJson;

    /**
     * JsonResponse constructor.
     * @param $json
     */
    public function __construct($json)
    {
        $this->json = $json;
        $this->decodedJson = json_decode($json, true);
    }

    /**
     * @param $key
     * @return bool|mixed
     */
    public function get($key)
    {
        return ($this->decodedJson[$key])
            ? $this->decodedJson[$key]
            : false;
    }
}
