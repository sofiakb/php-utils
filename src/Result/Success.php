<?php
/**
 * This file contains Success class.
 * Created by PhpStorm.
 * User: Sofiakb <contact.sofiakb@gmail.com>
 * Date: 07/04/2021
 * Time: 10:29
 */

namespace Sofiakb\Utils\Result;


/**
 * Class Success
 * @package Sofiakb\Utils\Result
 * @author Sofiakb <contact.sofiak@gmail.com>
 */
class Success
{
    /**
     * @var mixed $code
     */
    public $code;
    /**
     * @var mixed $message
     */
    public $message;
    
    /**
     * Success constructor.
     * @param mixed $code
     * @param mixed $message
     */
    public function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
    }
    
    /**
     * @param $mixed
     * @return bool
     */
    public static function is($mixed): bool
    {
        return $mixed instanceof self;
    }
}
