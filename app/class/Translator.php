<?php


class Translator
{
    public static function init()
    {

        function __($identifier, $context = 'default')
        {
            static $terms = [];


            // load definitions for the given context
            if (array_key_exists($context, $terms)) {
                $defs = $terms[$context];
            } else {
                $defs = [];
                require_once APP_DICTIONARY_PATH . '/' . $context . '.php';
                $terms[$context] = $defs;
            }


            // use the loaded definitions and check if there is a matching identifier
            if (array_key_exists($identifier, $defs)) {
                return $defs[$identifier];
            } else {
                // error?
                throw new \Exception("__ error: dictionary term not found: " . $identifier);
//                return $identifier;
            }
        }

        function ___()
        {
            return htmlspecialchars(call_user_func_array('__', func_get_args()));
        }

    }
}