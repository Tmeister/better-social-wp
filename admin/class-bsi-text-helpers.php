<?php


namespace Tmeister\Bsi;


use Imagick;
use ImagickDraw;
use ImagickDrawException;
use ImagickException;

class Bsi_Text_Helpers
{
    /**
     * @throws ImagickException
     * @throws ImagickDrawException
     */
    public static function get_text_lines($text, $width, $size, $path): array
    {
        //-- Helpers
        $line  = [];
        $lines = [];

        //-- Loop through words
        foreach (explode(" ", $text) as $word) {
            //-- Add to line
            $line[] = $word;

            //-- Create new text query
            $im   = new Imagick();
            $draw = new ImagickDraw();
            $draw->setFont($path);
            $draw->setFontSize($size);
            $info = $im->queryFontMetrics($draw, implode(" ", $line));

            //-- Check within bounds
            if ($info['textWidth'] >= $width) {
                //-- We have gone to far!
                array_pop($line);
                $lines[] = implode(" ", $line);
                //-- Start new line
                unset($line);
                $line[] = $word;
            }
        }

        //-- We are at the end of the string
        $lines[] = implode(" ", $line);

        return $lines;
    }

}
