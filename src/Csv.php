<?php

namespace Sofiakb\Utils;

/**
 * Class Csv
 * @package Sofiakb\Utils
 */
class Csv
{
    /**
     * @param $source
     * @param $sourceDelimiter
     * @param $target
     * @param $targetDelimiter
     * @param bool $write
     * @return bool|string|string[]
     * @throws \Exception
     */
    public static function toCsv($source, $sourceDelimiter, $target, $targetDelimiter, $write = true)
    {
        if (!is_file($source) || !file_exists($source))
            throw new \Exception("Le chemin $source spécifié n'existe pas");
        if ((!is_dir(dirname($target)) && !mkdir(dirname($target))))
            throw new \Exception("Impossible de créer le fichier destination $target");
        if (!($content = file_get_contents($source)))
            throw new \Exception("Impossible de lire le fichier");

        $content = str_replace($sourceDelimiter, $targetDelimiter, $content);
        return $write ? !(file_put_contents($target, $content) === false) : $content;
    }


    /**
     * @param $path
     * @param string $delimiter
     * @return array
     * @throws \Exception
     */
    public static function toArray($path, $delimiter = ',')
    {
        if (!is_file($path) || !file_exists($path))
            throw new \Exception("Le chemin spécifié n'existe pas");

        if (!($content = file_get_contents($path)))
            throw new \Exception("Impossible de lire le fichier");

        if (count($lines = explode("\n", $content)) === 0)
            return [];

        $headers = explode($delimiter, $lines[0]);
        array_splice($lines, 0, 1);

        $result = [];
        foreach ($lines as $index => $line) {
            if ($line && trim($line) !== "" && count($splatLines = explode($delimiter, $line)) > 0) {
                $result[] = [];
                foreach ($splatLines as $itemIndex => $item) {
                    $result[$index][$headers[$itemIndex]] = $item;
                }
            }
        }

        return $result;
    }
}
