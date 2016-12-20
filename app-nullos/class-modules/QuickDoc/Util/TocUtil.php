<?php


namespace QuickDoc\Util;

class TocUtil
{

    public static function hasToc($file)
    {
        $hasToc = false;
        $content = file_get_contents($file);
        if (preg_match('!^\\[TOC\\]\s*$!m', $content)) {
            $hasToc = true;
        }
        return $hasToc;
    }


    /**
     * @return false|string
     */
    public static function getTocSymbolReplacedContent($file)
    {
        if (true === self::hasToc($file)) {
            $toc = self::getTocHtml($file);
            $content = file_get_contents($file);
            $content .= PHP_EOL;
            return preg_replace('!^\\[TOC\\]\s*$!m', $toc, $content);
        }
        return false;
    }

    public static function getTocHtml($file)
    {
        $s = '';
        $allTitles = [];
        $content = file_get_contents($file);


        //------------------------------------------------------------------------------/
        // H1
        //------------------------------------------------------------------------------/
        if (preg_match_all('!(.*)\n={3,}\s*$!m', $content, $matches, PREG_OFFSET_CAPTURE)) {
            $titles = array_map(function ($v) {
                $v[] = 'h1';
                return $v;
            }, $matches[1]);
            $allTitles = array_merge($allTitles, $titles);
        }


        //------------------------------------------------------------------------------/
        // H2
        //------------------------------------------------------------------------------/
        if (preg_match_all('!(.*)\n-{3,}\s*$!m', $content, $matches, PREG_OFFSET_CAPTURE)) {
            $titles = array_map(function ($v) {
                $v[] = 'h2';
                return $v;
            }, $matches[1]);
            $allTitles = array_merge($allTitles, $titles);
        }

        //------------------------------------------------------------------------------/
        // ANY TITLE
        //------------------------------------------------------------------------------/
        if (preg_match_all('!^(#+)(.*)\s*$!m', $content, $matches,
            PREG_OFFSET_CAPTURE | PREG_PATTERN_ORDER)) {
            $titles = [];
            foreach ($matches[2] as $k => $info) {
                $len = strlen($matches[1][$k][0]);
                $info[] = 'h' . $len;
                $titles[] = $info;
            }
            $allTitles = array_merge($allTitles, $titles);
        }


        usort($allTitles, function ($info1, $info2) {
            return $info1[1] > $info2[1];
        });


        //------------------------------------------------------------------------------/
        // COMPILE THE HTML TOC
        //------------------------------------------------------------------------------/
        $symbols = [
            '-',
            '*',
            '+',
            '-',
            '*',
            '+',
        ];
        foreach ($allTitles as $info) {
            $level = (int)substr($info[2], 1) - 1;
            $symbol = $symbols[$level];
            $title = trim($info[0]);
            $anchor = self::getAnchor($title);
            $s .=
                str_repeat(' ', $level) .
                $symbol .
                ' [' .
                $title .
                '](#' . $anchor . ')' . PHP_EOL;
        }
        return $s;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private static function getAnchor($title)
    {
        return strtolower(preg_replace('![^a-zA-Z0-9]+!', '-', $title));
    }

}