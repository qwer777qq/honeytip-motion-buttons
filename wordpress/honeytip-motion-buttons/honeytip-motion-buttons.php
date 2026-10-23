<?php
/**
 * Plugin Name: Honeytip Motion Buttons
 * Description: Adds four editable, centered motion button patterns to the Gutenberg inserter.
 * Version: 1.0.0
 * Author: Honeytip Magazine
 * Text Domain: honeytip-motion-buttons
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'enqueue_block_assets', function () {
    wp_enqueue_style(
        'honeytip-motion-buttons',
        plugins_url( 'buttons.css', __FILE__ ),
        array(),
        '1.0.0'
    );
} );

add_action( 'init', function () {
    if ( ! function_exists( 'register_block_pattern' ) ) {
        return;
    }

    register_block_pattern_category( 'honeytip-motion', array( 'label' => '움직이는 버튼' ) );

    $patterns = array(
        'coral-bounce' => array( '버튼 · 코랄 점프', 'hmb-coral hmb-bounce' ),
        'amber-sweep' => array( '버튼 · 앰버 빛 스윕', 'hmb-amber hmb-sweep' ),
        'mint-arrow' => array( '버튼 · 민트 화살표', 'hmb-mint hmb-arrow' ),
        'rose-fill' => array( '버튼 · 로즈 채움', 'hmb-rose hmb-fill' ),
    );

    foreach ( $patterns as $slug => $pattern ) {
        $title   = $pattern[0];
        $classes = $pattern[1];
        $markup  = '<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"hmb-wrap"} -->'
            . '<div class="wp-block-buttons is-content-justification-center hmb-wrap">'
            . '<!-- wp:button {"className":"hmb-button ' . esc_attr( $classes ) . '"} -->'
            . '<div class="wp-block-button hmb-button ' . esc_attr( $classes ) . '">'
            . '<a class="wp-block-button__link wp-element-button">자세히 보기</a>'
            . '</div><!-- /wp:button --></div><!-- /wp:buttons -->';

        register_block_pattern( 'honeytip-motion/' . $slug, array(
            'title'       => $title,
            'description' => $title . ' 패턴. 문구와 링크를 글마다 바꿀 수 있습니다.',
            'categories'  => array( 'honeytip-motion', 'buttons' ),
            'keywords'    => array( '버튼', '움직이는 버튼', 'CTA' ),
            'content'     => $markup,
        ) );
    }
} );
