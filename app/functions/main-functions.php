<?php


function url($url, array $params = null, $mergeParams = true)
{
    if (null === $params) {
        $ret = URL_PREFIX . $url;
    } else {
        if (true === $mergeParams) {
            $params = array_replace($_GET, $params);
        }
        $ret = URL_PREFIX . $url . '?' . http_build_query($params);
    }
    return htmlspecialchars($ret);
}


function __($identifier, $context = 'default', array $tags = [])
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
        $value = $defs[$identifier];
        if (count($tags) > 0) {
            $ks = array_map(function ($v) {
                return '{' . $v . '}';
            }, array_keys($tags));
            $vs = array_values($tags);
            $value = str_replace($ks, $vs, $value);
        }
        return $value;
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


/**
 *
 * This function simplify the sending of a simple email.
 * It depends on SwiftMailer.
 *
 * Also, you need to define those constants before you call the function:
 *
 * - MAIL_HOST
 * - MAIL_PORT
 * - MAIL_USER
 * - MAIL_PASS
 * - MAIL_FROM
 *
 *
 * - subject: string
 * - msg: string | array (0 => plainMsg, 1 => htmlMsg)
 *          if it's a string, only the plain message will be sent
 * - to: string | array, accept whatever SwiftMailer's to field accepts:
 *          More info here: http://swiftmailer.org/docs/sending.html
 *
 *
 */
function sendMailTo($subject, $msg, $to)
{
    $msgHtml = null;
    if (is_array($msg)) {
        $msg = $msg[0];
        $msgHtml = $msg[1];
    }

    $transport = Swift_SmtpTransport::newInstance(MAIL_HOST, MAIL_PORT)
        ->setUsername(MAIL_USER)
        ->setPassword(MAIL_PASS)
        ->setEncryption("ssl");
    $mailer = Swift_Mailer::newInstance($transport);

    // Create a message
    $message = Swift_Message::newInstance($subject)
        ->setFrom(MAIL_FROM)
        ->setTo($to)
        ->setBody($msg, 'text/plain');


    if (null !== $msgHtml) {
        $message->addPart($msgHtml, 'text/html');
    }
    $result = $mailer->send($message);
    return $result;
}

