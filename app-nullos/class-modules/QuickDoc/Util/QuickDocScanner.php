<?php



namespace QuickDoc\Util;


use DirScanner\YorgDirScannerTool;
use Tokens\TokenRepresentation\ReplacementSequence;
use Tokens\TokenRepresentation\ReplacementSequenceToken;
use Tokens\TokenRepresentation\TokenRepresentation;

class QuickDocScanner
{

    /**
     * Search the given dir recursively,
     * and return an array of context => identifiers[]
     */
    public static function findTranslateIdentifiers($dir)
    {
        $files = YorgDirScannerTool::getFiles($dir, true, false);
        foreach ($files as $file) {

            // TODO...
            throw new \Exception("Todo: here");


            $tokenIdentifiers = token_get_all(file_get_contents($file));
            $representation = TokenRepresentation::create($tokenIdentifiers);

            $representation
                ->addReplacementSequence(
                    ReplacementSequence::create()
                        ->addToken(
                            ReplacementSequenceToken::create()
                                ->matchIf(function (&$tokenIdentifier) {
                                    return (is_array($tokenIdentifier) && T_STRING === $tokenIdentifier[0] && ('__' === $tokenIdentifier[1] || '___' === $tokenIdentifier[1]));
                                })
                        )
                        ->addToken(
                            ReplacementSequenceToken::create()
                                ->optional()
                                ->matchIf(function ($tokenIdentifier) {
                                    return (is_array($tokenIdentifier) && T_WHITESPACE === $tokenIdentifier[0]);
                                })
                        )
                        ->addToken(
                            ReplacementSequenceToken::create()
                                ->matchIf(function ($tokenIdentifier) {
                                    return (is_array($tokenIdentifier) && T_DOUBLE_ARROW === $tokenIdentifier[0]);
                                })
                        )
                        ->addToken(
                            ReplacementSequenceToken::create()
                                ->optional()
                                ->matchIf(function ($tokenIdentifier) {
                                    return (is_array($tokenIdentifier) && T_WHITESPACE === $tokenIdentifier[0]);
                                })
                        )
                        ->addToken(
                            ReplacementSequenceToken::create()
                                ->matchIf(function (&$tokenIdentifier) use ($defs) {
                                    return (is_array($tokenIdentifier) && T_CONSTANT_ENCAPSED_STRING === $tokenIdentifier[0]);
                                })
                        )
                )
                ->onSequenceMatch(function ($newSeq) use ($defs) {
                    $key = $newSeq[0][1];
                    $trueKey = TokenUtil::deEncapsulate($key);
                    if (array_key_exists($trueKey, $defs)) {
                        $newSeq[4][1] = TokenUtil::encapsulate($defs[$trueKey]);
                    }
                    return $newSeq;
                });
            $newTokens = $representation->getTokens();


        }
    }

}