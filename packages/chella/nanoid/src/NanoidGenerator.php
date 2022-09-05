<?php

namespace Chella\Nanoid;

use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;

class NanoidGenerator
{
    private static $size;
    private static $prefix;
    private static $timestamp;
    private static $seperator;

    private static $alphabet = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    public function __construct()
    {
    }

    public static  function getNanoId()
    {
        self::$size = config('nanoid.size');

        self::$prefix = config('nanoid.prefix');
        self::$timestamp = config('nanoid.timestamp');
        self::$seperator = config('nanoid.seperator');

        $id = static::generateId(self::$size, self::$prefix, self::$seperator);
        return $id;
    }
    public static function  generateId($size, $prefix = null, $seperator = null, $timestamp = false)
    {
        $client = new client();
        $id = '';
        if (!empty($prefix)) {
            $id .= $prefix;
        }
        if (!empty($seperator)) {
            $id .= $seperator;
        }
        $id .= $client->formatedId(self::$alphabet, self::$size);


        return $id;
        // dd($this->size, $this->prefix, $this->timestamp);
    }
}
