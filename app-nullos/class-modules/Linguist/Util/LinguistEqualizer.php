<?php


namespace Linguist\Util;


use Bat\FileSystemTool;
use DirScanner\YorgDirScannerTool;
use Linguist\LinguistException;
use Tokens\TokenRepresentation\ReplacementSequence;
use Tokens\TokenRepresentation\ReplacementSequenceToken;
use Tokens\TokenRepresentation\TokenRepresentation;
use Tokens\Tokens;
use Tokens\Util\TokenUtil;

class LinguistEqualizer
{

    /**
     *
     * Basically, it's used as an "import from en" button in a gui.
     *
     * It will create the missing entries from the src dir into the dst dir.
     *
     *
     * - Will
     *      - copy files that are present in srcDir but not in dstDir
     *      - if file exist but is not complete (missing $defs entries)
     *              - the src file will be used as a model to complete the dst file
     *              - comments in the src file should be preserved, as they can serve organizational purposes
     *
     *
     * Note: the src dir is considered as THE ONLY reference.
     * If your dst dir contains extra definitions that are NOT in the src dir, they will be removed.
     *
     */
    public static function equalize($srcDir, $dstDir)
    {
        if (file_exists($srcDir)) {
            if (file_exists($dstDir)) {

                $files = YorgDirScannerTool::getFilesWithExtension($srcDir, 'php', false, true, true);

                foreach ($files as $relPath) {

                    $srcFile = $srcDir . "/" . $relPath;
                    $dstFile = $dstDir . "/" . $relPath;

                    if (file_exists($dstFile)) {
                        self::copyWithComments($srcFile, $dstFile);
                    } else {
                        FileSystemTool::mkdir(dirname($dstFile), 0777, true);
                        copy($srcFile, $dstFile);
                    }

                }
            } else {
                throw new LinguistException("dstDir does not exist: $dstDir");
            }
        } else {
            throw new LinguistException("srcDir does not exist: $srcDir");
        }
    }


    public static function equalizeByFile2Definitions($refDir, $dstDir, array $file2Definitions)
    {
        $ret = true;
        if (file_exists($refDir)) {
            if (file_exists($dstDir)) {


                foreach ($file2Definitions as $relPath => $defs) {

                    $srcFile = $refDir . "/" . $relPath;
                    $dstFile = $dstDir . "/" . $relPath;


                    // file2Definitionss comes from $_POST, just do basic checking...
                    if (FileSystemTool::existsUnder($srcFile, $refDir)) {
                        if (FileSystemTool::existsUnder($dstFile, $dstDir)) {
                            if (false === self::copyWithComments($srcFile, $dstFile, $defs)) {
                                $ret = false;
                            }
                        }
                    }
                }
            } else {
                throw new LinguistException("dstDir does not exist: $dstDir");
            }
        } else {
            throw new LinguistException("refDir does not exist: $refDir");
        }
        return $ret;
    }


    /**
     *
     * Will copy the srcFile's definitions into the dstFile, keeping comments.
     *
     *      - definitions is an array of key (identifier) => value (translated string)
     *
     *
     * The third parameter, defs, can be used to replace parts or all
     * of the dstFile definitions.
     *
     *
     * If a srcFile's definition is not present in the dstFile's definitions nor passed
     * with the defs parameter, then the original srcFile's definition value will
     * be used.
     *
     */
    public static function copyWithComments($srcFile, $dstFile, array $defs = [])
    {
        $_defs = $defs;
        $defs = [];
        require $dstFile;
        $defs = array_replace($defs, $_defs);


        $tokenIdentifiers = token_get_all(file_get_contents($srcFile));
        $representation = TokenRepresentation::create($tokenIdentifiers);

        $representation
            ->addReplacementSequence(
                ReplacementSequence::create()
                    ->addToken(
                        ReplacementSequenceToken::create()
                            ->matchIf(function (&$tokenIdentifier) {
                                return (is_array($tokenIdentifier) && T_CONSTANT_ENCAPSED_STRING === $tokenIdentifier[0]);
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
        return Tokens::toFile($newTokens, $dstFile);
    }


}