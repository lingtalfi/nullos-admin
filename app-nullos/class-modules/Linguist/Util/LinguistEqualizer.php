<?php


namespace Linguist\Util;


use Bat\FileSystemTool;
use DirScanner\YorgDirScannerTool;
use Linguist\LinguistException;
use Tokens\TokenRepresentation\ReplacementSequence;
use Tokens\TokenRepresentation\ReplacementSequenceToken;
use Tokens\TokenRepresentation\TokenRepresentation;
use Tokens\Tokens;

class LinguistEqualizer
{

    private $_key;


    public static function create()
    {
        return new self();
    }

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
    public function equalize($srcDir, $dstDir)
    {
        if (file_exists($srcDir)) {
            if (file_exists($dstDir)) {

                $files = YorgDirScannerTool::getFilesWithExtension($srcDir, 'php', false, true, true);

                foreach ($files as $relPath) {

                    $srcFile = $srcDir . "/" . $relPath;
                    $dstFile = $dstDir . "/" . $relPath;

                    if (file_exists($dstFile)) {
                        $this->copyWithComments($srcFile, $dstFile);
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


    public function equalizeByFile2Definitions($refDir, $dstDir, array $file2Definitions)
    {
        if (file_exists($refDir)) {
            if (file_exists($dstDir)) {


                /**
                 * Todo, invert the loops:
                 * should start from file2Defs, not Yorg files
                 */

                $files = YorgDirScannerTool::getFilesWithExtension($refDir, 'php', false, true, true);

                foreach ($files as $relPath) {

                    $srcFile = $refDir . "/" . $relPath;
                    $dstFile = $dstDir . "/" . $relPath;
                    $defs = null;
                    if (array_key_exists($relPath, $file2Definitions)) {

                        $defs = $file2Definitions[$relPath];
                        a($defs);
                    } else {
                        a($refDir, $dstDir);
                        a($relPath);
                        a($file2Definitions);
                        az("no");
                    }
                    $this->copyWithComments($srcFile, $dstFile, $defs);
                }
            } else {
                throw new LinguistException("dstDir does not exist: $dstDir");
            }
        } else {
            throw new LinguistException("refDir does not exist: $refDir");
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function copyWithComments($srcFile, $dstFile, array $defs = null)
    {
        if (null === $defs) {
            $defs = [];
            require $dstFile;
        }


        $tokenIdentifiers = token_get_all(file_get_contents($srcFile));
        $representation = TokenRepresentation::create($tokenIdentifiers);
        $this->_key = null;

        $representation->addReplacementSequence(
            ReplacementSequence::create()
                ->addToken(
                    ReplacementSequenceToken::create()
                        ->matchIf(function (&$tokenIdentifier) {
                            $ret = false;
                            if (is_array($tokenIdentifier)) {
                                if (T_CONSTANT_ENCAPSED_STRING === $tokenIdentifier[0]) {
                                    $ret = true;
                                    $this->_key = $tokenIdentifier[1];
                                }
                            }
                            return $ret;
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
                            $ret = (is_array($tokenIdentifier) && T_CONSTANT_ENCAPSED_STRING === $tokenIdentifier[0]);
                            if (true === $ret) {
                                $trueKey = $this->deEncapsulate($this->_key);
                                if (array_key_exists($trueKey, $defs)) {
                                    $tokenIdentifier[1] = $this->encapsulate($defs[$trueKey]);
                                }
                            }
                            return $ret;
                        })
                )
        );
        $newTokens = $representation->getTokens();
        Tokens::toFile($newTokens, $dstFile);

    }


    private function deEncapsulate($string)
    {
        $quoteType = substr($string, 0, 1);
        $inner = substr($string, 1, -1);
        return str_replace('\\' . $quoteType, $quoteType, $inner);
    }

    private function encapsulate($string)
    {
        return '"' . str_replace('"', '\"', $string) . '"';
    }


}