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
     * @param string|null $message
     * @return Error|Success
     */
    public static function unauthorized(?string $message = null)
    {
        return self::toArray(401, $message ?? "Vous devez être connecté pour accéder aux informations");
    }
    
    /**
     * @param string|null $message
     * @return Error|Success
     */
    public static function forbidden(?string $message = null)
    {
        return self::toArray(403, $message ?? "Vous n'avez pas les droits pour effecuter cette opération");
    }
    
    /**
     * @param string|null $message
     * @return Error|Success
     */
    public static function badRequest(?string $message = null)
    {
        return self::toArray(400, $message ?? "Merci de bien vouloir remplir les informations");
    }
    
    /**
     * @param string|null $message
     * @return Error|Success
     */
    public static function notFound(?string $message = null)
    {
        return self::toArray(404, $message ?? "La page demandée n'existe pas");
    }
    
    /**
     * @param string|null $message
     * @param int $code
     * @return Error|Success
     */
    public static function error(?string $message = null, int $code = 500)
    {
        return Result::toArray($code, $message);
    }
    
    /**
     * @param string|null $message
     * @param int $code
     * @return Error|Success
     */
    public static function duplicate(?string $message = null, int $code = 419)
    {
        return self::toArray($code, $message ?? "Une ressource existe déjà avec cette valeur");
    }
    
    /**
     * @param $code
     * @param string|null $message
     * @param bool $error
     * @return Error|Success
     */
    public static function toArray($code, ?string $message = null, bool $error = true)
    {
        return $error ? new Error($code, $message) : new Success($code, $message);
    }
    
    /**
     * @param string $message
     * @param int $code
     * @return Error|Success
     */
    public static function success($message = 'OK', $code = 200)
    {
        return self::toArray($code, $message, false);
    }
    
}
