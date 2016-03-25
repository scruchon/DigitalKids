<?php
/**
 * Wanderer Shortcodes
 *
 * @package Wanderer
 */

/**
* Two Column
* @param $atts, $content
*/
function wanderer_two_column( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'last' => ''
        ), $atts) );
    if ( $last == 'yes' ) {
        $return_string = '<div class="shortcode-col span_6_of_12 last"><p>' . $content . '</p></div>';
        $return_string .= '</div>';
        return $return_string;
    } else {
        $return_string = '<div class="section group">';
        $return_string .= '<div class="shortcode-col span_6_of_12"><p>' . $content . '</p></div>';
        return $return_string;
    }
}
add_shortcode("two-column", "wanderer_two_column");

/**
* Three Column
* @param $atts, $content
*/
function wanderer_three_column( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'first' => '',
        'last' => ''
        ), $atts) );
    if ( $first == 'yes' ) {
        $return_string = '<div class="section group">';
        $return_string .= '<div class="shortcode-col span_4_of_12"><p>' . $content . '</p></div>';
        return $return_string;
    } elseif ($last == 'yes') {
        $return_string = '<div class="shortcode-col span_4_of_12 last"><p>' . $content . '</p></div>';
        $return_string .= '</div>';
        return $return_string;
    } else {
        $return_string = '<div class="shortcode-col span_4_of_12"><p>' . $content . '</p></div>';
        return $return_string;
    }
}
add_shortcode("three-column", "wanderer_three_column");

/**
* Four Column
* @param $atts, $content
*/
function wanderer_four_column( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'first' => '',
        'last' => ''
        ), $atts) );
    if ( $first == 'yes' ) {
        $return_string = '<div class="section group">';
        $return_string .= '<div class="shortcode-col span_3_of_12"><p>' . $content . '</p></div>';
        return $return_string;
    } elseif ($last == 'yes') {
        $return_string = '<div class="shortcode-col span_3_of_12 last"><p>' . $content . '</p></div>';
        $return_string .= '</div>';
        return $return_string;
    } else {
        $return_string = '<div class="shortcode-col span_3_of_12"><p>' . $content . '</p></div>';
        return $return_string;
    }
}
add_shortcode("four-column", "wanderer_four_column");

/**
* Separator
* @param $atts, $content
*/
function wanderer_separator( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'style' => 'solid',
        'color' => '#c5c5c6',
        'width' => '1',
        ), $atts) );

    $return_string = '<div class="separator" style="border-bottom: ' . $width . 'px ' . $style . ' ' . $color . ';"></div>';
    return $return_string;

}
add_shortcode("separator", "wanderer_separator");

/**
* Cite
* @param $atts, $content
*/
function wanderer_cite( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'color' => ''
        ), $atts) );

        $return_string = '<cite style="color: ' . $color . '">' . $content . '</cite>';
        return $return_string;
}
add_shortcode("cite", "wanderer_cite");
