<?php
/**
 * This file contains Error class.
 * Created by PhpStorm.
 * User: Sofiakb <contact.sofiakb@gmail.com>
 * Date: 07/04/2021
 * Time: 10:28
 */

namespace Sofiakb\Utils\Result;


class Error
{
    public $code;
    public $message;
    
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
