<?php


namespace Sofiakb\Utils;


/**
 * Class Helpers
 * @package Sofiakb\Utils
 * @author Sofiakb <contact.sofiak@gmail.com>
 */
class Helpers
{
    /**
     * @param $array
     * @return mixed
     */
    public static function toObject($array)
    {
        return json_decode(json_encode($array));
    }
    
    /**
     * @param ?mixed $size
     * @param bool $unit
     * @return string
     */
    public static function humanizeSize($size = null, bool $unit = true): string
    {
        return $size / 1000 < 1000
            ? number_format($size / 1000, 2) . ($unit ? ' Ko' : '')
            : ($size / 1000 / 1000 < 1000
                ? number_format($size / 1000 / 1000, 2) . ($unit ? ' Mo' : '')
                : number_format($size / 1000 / 1000 / 1000, 2) . ($unit ? ' Go' : ''));

    }

}