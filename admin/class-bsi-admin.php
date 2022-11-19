<?php

namespace Tmeister\Bsi;

use ImagickDrawException;
use ImagickException;
use Intervention\Image\ImageManagerStatic as Image;
use WP_REST_Server;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://enriquechavez.co
 * @since      1.0.0
 *
 * @package    Bsi
 * @subpackage Bsi/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bsi
 * @subpackage Bsi/admin
 * @author     Enrique Chavez <tmeister@gmail.com>
 */
class Bsi_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param  string  $plugin_name  The name of this plugin.
     * @param  string  $version  The version of this plugin.
     *
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__).'css/bsi-admin.css', [], $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__).'js/bsi-admin.js', ['jquery'], $this->version, false);
    }

    // Add Custom rest api endpoints
    public function add_rest_endpoints()
    {
        // register endpoints
        // TODO: Add authentication callback
        register_rest_route('bsi/v1', 'image', [
            'methods'             => WP_REST_Server::CREATABLE,
            'callback'            => [$this, 'parse_generate_request'],
            'permission_callback' => '__return_true',
        ]);
    }

    /**
     * @throws ImagickException
     * @throws ImagickDrawException
     */
    public function parse_generate_request($request): array
    {
        $params     = $request->get_json_params();
        $width      = 900;
        $font_size  = 72;
        $padding    = 10;
        $font_file  = Bsi_Fonts::get_font_style_path('Mona Sans', 'SemiBold');
        $text_lines = Bsi_Text_Helpers::get_text_lines('10+ Best JavaScript Frameworks For Your Application In 2022', $width, $font_size, $font_file);

        $img = Image::canvas(1200, 630, '#ff000');
        foreach ($text_lines as $index => $text) {
            $y = (($index * $font_size) + $padding);
            $img->text($text, $padding, $y, function ($font) use ($font_file, $font_size) {
                $font->file($font_file);
                $font->size($font_size);
                $font->color('#fdf6e3');
                $font->align('left');
                $font->valign('top');
            });
        }

        echo $img->response('png');
    }

}
