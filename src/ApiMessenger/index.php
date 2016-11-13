<?php
namespace ApiMessenger;
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 13.
 * Time: 23:03
 */

use ApiMessenger\ApiHandler\StackExchangeHandler;
use ApiMessenger\ApiResponse\ApiResponseCreator;
use ApiMessenger\ComplexQuery\UsersOfMostPopularQuestionOnStackOverflow;

require_once '/../../vendor/autoload.php';

$responseCreator = new ApiResponseCreator();
$apiHandler = new StackExchangeHandler($responseCreator);

$complexQuery = new UsersOfMostPopularQuestionOnStackOverflow($responseCreator, $apiHandler);

var_dump($complexQuery->getResult());