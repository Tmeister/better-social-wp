<?php


namespace Tmeister\Bsi;


class Bsi_Fonts
{
    public static array $fonts = [
        'Mona Sans' => [
            'Black Italic'             => 'Mona-Sans-Black-Italic.ttf',
            'Black Narrow-Italic'      => 'Mona-Sans-Black-Narrow-Italic.ttf',
            'Black Narrow'             => 'Mona-Sans-Black-Narrow.ttf',
            'Black Wide Italic'        => 'Mona-Sans-Black-Wide-Italic.ttf',
            'Black Wide'               => 'Mona-Sans-Black-Wide.ttf',
            'Black'                    => 'Mona-Sans-Black.ttf',
            'Bold Italic'              => 'Mona-Sans-Bold-Italic.ttf',
            'Bold Narrow Italic'       => 'Mona-Sans-Bold-Narrow-Italic.ttf',
            'Bold Narrow'              => 'Mona-Sans-Bold-Narrow.ttf',
            'Bold Wide Italic'         => 'Mona-Sans-Bold-Wide-Italic.ttf',
            'Bold Wide'                => 'Mona-Sans-Bold-Wide.ttf',
            'Bold'                     => 'Mona-Sans-Bold.ttf',
            'ExtraBold Italic'         => 'Mona-Sans-ExtraBold-Italic.ttf',
            'ExtraBold Narrow Italic'  => 'Mona-Sans-ExtraBold-Narrow-Italic.ttf',
            'ExtraBold Narrow'         => 'Mona-Sans-ExtraBold-Narrow.ttf',
            'ExtraBold Wide Italic'    => 'Mona-Sans-ExtraBold-Wide-Italic.ttf',
            'ExtraBold Wide'           => 'Mona-Sans-ExtraBold-Wide.ttf',
            'ExtraBold'                => 'Mona-Sans-ExtraBold.ttf',
            'Light Italic'             => 'Mona-Sans-Light-Italic.ttf',
            'Light Narrow Italic'      => 'Mona-Sans-Light-Narrow-Italic.ttf',
            'Light Narrow'             => 'Mona-Sans-Light-Narrow.ttf',
            'Light Wide Italic'        => 'Mona-Sans-Light-Wide-Italic.ttf',
            'Light Wide'               => 'Mona-Sans-Light-Wide.ttf',
            'Light'                    => 'Mona-Sans-Light.ttf',
            'Medium Italic'            => 'Mona-Sans-Medium-Italic.ttf',
            'Medium Narrow Italic'     => 'Mona-Sans-Medium-Narrow-Italic.ttf',
            'Medium Narrow'            => 'Mona-Sans-Medium-Narrow.ttf',
            'Medium Wide Italic'       => 'Mona-Sans-Medium-Wide-Italic.ttf',
            'Medium Wide'              => 'Mona-Sans-Medium-Wide.ttf',
            'Medium'                   => 'Mona-Sans-Medium.ttf',
            'Regular Italic'           => 'Mona-Sans-Regular-Italic.ttf',
            'Regular Narrow Italic'    => 'Mona-Sans-Regular-Narrow-Italic.ttf',
            'Regular Narrow'           => 'Mona-Sans-Regular-Narrow.ttf',
            'Regular Wide Italic'      => 'Mona-Sans-Regular-Wide-Italic.ttf',
            'Regular Wide'             => 'Mona-Sans-Regular-Wide.ttf',
            'Regular'                  => 'Mona-Sans-Regular.ttf',
            'SemiBold Italic'          => 'Mona-Sans-SemiBold-Italic.ttf',
            'SemiBold Narrow Italic'   => 'Mona-Sans-SemiBold-Narrow-Italic.ttf',
            'SemiBold Narrow'          => 'Mona-Sans-SemiBold-Narrow.ttf',
            'SemiBold Wide Italic'     => 'Mona-Sans-SemiBold-Wide-Italic.ttf',
            'SemiBold Wide'            => 'Mona-Sans-SemiBold-Wide.ttf',
            'SemiBold'                 => 'Mona-Sans-SemiBold.ttf',
            'UltraLight Italic'        => 'Mona-Sans-UltraLight-Italic.ttf',
            'UltraLight Narrow Italic' => 'Mona-Sans-UltraLight-Narrow-Italic.ttf',
            'UltraLight Narrow'        => 'Mona-Sans-UltraLight-Narrow.ttf',
            'UltraLight Wide Italic'   => 'Mona-Sans-UltraLight-Wide-Italic.ttf',
            'UltraLight Wide'          => 'Mona-Sans-UltraLight-Wide.ttf',
            'UltraLight'               => 'Mona-Sans-UltraLight.ttf',
        ],
    ];


    public static function get_font_styles($font_name): array
    {
        if ( ! isset(self::$fonts[$font_name])) {
            return [];
        }

        return self::$fonts[$font_name];
    }

    public static function get_font_style_path($family, $type): string
    {
        $font_family = self::get_font_styles($family);
        if ( ! isset($font_family[$type])) {
            return false;
        }

        return BSI_FONTS_DIR.strtolower(str_replace(" ", "-", $family)).'/'.$font_family[$type];
    }
}
