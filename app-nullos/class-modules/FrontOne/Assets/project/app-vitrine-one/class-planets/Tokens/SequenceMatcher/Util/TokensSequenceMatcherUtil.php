<?php



namespace Tokens\SequenceMatcher\Util;


use Tokens\Util\TokenUtil;

class TokensSequenceMatcherUtil
{


    /**
     * Take SequenceMatcher's callback markers as input, and return a marker array,
     * which keys are the marker names, and which values are the string representation
     * of the marker value.
     *
     *
     */
    public static function detokenizeMarkers(array $markers)
    {
        $ret = [];
        foreach ($markers as $id => $allInfo) {
            foreach ($allInfo as $tokenIdentifier) {
                if (is_string($tokenIdentifier)) {
                    $ret[$id][] = $tokenIdentifier;
                } else {
                    $ret[$id][] = TokenUtil::deEncapsulate($tokenIdentifier[1]);
                }
            }
        }
        return $ret;
    }
}