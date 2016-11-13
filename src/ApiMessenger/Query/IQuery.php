<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 11. 13.
 * Time: 21:14
 */

namespace ApiMessenger\Query;

/**
 * Interface IQuery
 * @package ApiMessenger\Query
 */
interface IQuery
{
    public function getResult($responseType, $query);
}
