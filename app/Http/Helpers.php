<?php

if (!function_exists('_getBaseURL')) :
    function _getBaseURL()
    {
        $root = (_isHttps() ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return $root;
    }
endif;

if (!function_exists('_isHttps')) :
    function _isHttps()
    {
        return !empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']);
    }
endif;