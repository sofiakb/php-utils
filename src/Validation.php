<?php
/**
 * Created by PhpStorm.
 * User: sofianeakbly
 * Date: 20/02/2019
 * Time: 15:59
 */

namespace Sofiakb\Utils;

/**
 * Class Validation
 * @package Sofiakb\Utils
 */
class Validation
{

    /**
     * Vérifie la requête
     *
     * @param $data
     * @return boolean
     */
    public static function valid($data): bool
    {
        return $data !== null && Helpers::toObject($data) !== null;
    }

    /**
     * @param $data
     * @param $values
     * @return bool
     */
    public static function required($data, $values, $strict = true): bool
    {
        foreach ($values as $value) {
            if ($strict && isset($data->$value))
                if (!(self::respectRequired($data, $value)))
                    return false;
        }
        return true;
    }

    /**
     * @param $data
     * @param $field
     * @return bool
     */
    public static function respectRequired($data, $field): bool
    {
        return isset($data->$field) && $data->$field !== null && $data->$field !== '';
    }

    /**
     * @param $data
     * @param $values
     * @return bool
     */
    public static function length($data, $values, $strict = true): bool
    {
        foreach ($values as $field => $length) {
            if ($strict && isset($data->$field))
                if (!(self::respectLength($data, $field, $length)))
                    return false;
        }
        return true;
    }

    /**
     * @param $data
     * @param $values
     * @return bool
     */
    public static function size($data, $values, $strict = true): bool
    {
        return self::length($data, $values, $strict);
    }

    /**
     * @param $data
     * @param $field
     * @param $length
     * @return bool
     */
    public static function respectLength($data, $field, $length): bool
    {
        return isset($data->$field) && strlen($data->$field) <= $length;
    }

    /**
     * @param $data
     * @param $values
     * @return bool
     */
    public static function regex($data, $values, $strict = true): bool
    {
        foreach ($values as $field => $regex) {
            if ($strict && isset($data->$field))
                if (!(self::respectRegex($data, $field, $regex)))
                    return false;
        }
        return true;
    }

    /**
     * @param $data
     * @param $field
     * @param $regex
     * @return bool
     */
    public static function respectRegex($data, $field, $regex): bool
    {
        return isset($data->$field) && preg_match($regex, $data->$field) === 1;
    }

    /**
     * @param $data
     * @param $values
     * @param $table
     * @return bool
     */
    public static function unique($data, $values, $table): bool
    {
        foreach ($values as $field) {
            if (!(self::respectUnique($data, $field, $table)))
                return false;
        }
        return true;
    }

    /**
     * @param $data
     * @param $field
     * @param $table
     * @return bool
     */
    public static function respectUnique($data, $field, $table): bool
    {
        return isset($data->$field) && ($table::where($field, $data->$field)->first() === null);
    }

    /**
     * @param $data
     * @param $values
     * @return bool
     */
    public static function integer($data, $values, $strict = true): bool
    {
        foreach ($values as $field) {
            if ($strict && isset($data->$field))
                if (!(self::respectInteger($data, $field)))
                    return false;
        }
        return true;
    }

    /**
     * @param $data
     * @param $field
     * @return bool
     */
    public static function respectInteger($data, $field): bool
    {
        return isset($data->$field) && is_int($data->$field);
    }

}
