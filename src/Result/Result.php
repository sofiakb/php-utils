<?php
/**
 * Created by PhpStorm.
 * User: sofianeakbly
 * Date: 27/06/2019
 * Time: 15:43
 */

namespace Sofiakb\Utils\Result;

/**
 * Class Result
 * @package Sofiakb\Utils\Result
 * @author Sofiakb <contact.sofiak@gmail.com>
 */
class Result
{
    /**
     * @param null $message
     * @return array
     */
    public static function unauthorized($message = null)
    {
        return self::toArray(401, $message ?? "Vous devez être connecté pour accéder aux informations");
    }
    
    /**
     * @param null $message
     * @return array
     */
    public static function forbidden($message = null)
    {
        return self::toArray(403, $message ?? "Vous n'avez pas les droits pour effecuter cette opération");
    }
    
    /**
     * @param null $message
     * @return array
     */
    public static function badRequest($message = null)
    {
        return self::toArray(400, $message ?? "Merci de bien vouloir remplir les informations");
    }
    
    /**
     * @param null $message
     * @return array
     */
    public static function notFound($message = null)
    {
        return self::toArray(404, $message ?? "La page demandée n'existe pas");
    }
    
    /**
     * @param null $message
     * @param int $code
     * @return array
     */
    public static function error($message = null, $code = 500)
    {
        return Result::toArray($code, $message);
    }
    
    /**
     * @param null $message
     * @param int $code
     * @return array
     */
    public static function duplicate($message = null, $code = 419)
    {
        return self::toArray($code, $message ?? "Une ressource existe déjà avec cette valeur");
    }
    
    /**
     * @param $code
     * @param null $message
     * @param bool $error
     * @return array
     */
    public static function toArray($code, $message = null, $error = true)
    {
        return $error ? new Error($code, $message) : new Success($code, $message);
    }
    
    /**
     * @param string $message
     * @param int $code
     * @return array|Error|Success
     */
    public static function success($message = 'OK', $code = 200)
    {
        return self::toArray($code, $message, false);
    }
    
}
