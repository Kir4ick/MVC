<?php

namespace Src\Contracts\Routing;

interface Routing
{
    public static function post(string $uri, $function);
    public static function get(string $uri, $function);
    public static function put(string $uri, $function);
    public static function patch(string $uri, $function);
    public static function delete(string $uri, $function);
}