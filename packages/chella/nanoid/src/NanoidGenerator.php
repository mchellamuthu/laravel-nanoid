<?php

namespace Chella\Nanoid;

use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;

class NanoidGenerator
{

    private static $alphabet = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    public static function  generateId($size = null, $prefix = null, $seperator = null, $timestamp = false)
    {
        $size = empty($size) ? config('nanoid.size') : $size;
        $prefix = empty($prefix) ? config('nanoid.prefix') : $prefix;
        $seperator = empty($seperator) ? config('nanoid.seperator') : $seperator;
        $client = new client();
        $formatted_id = $client->formatedId(self::$alphabet, $size);
        $id = $prefix . $seperator . $formatted_id;
        return $id;
    }
}
