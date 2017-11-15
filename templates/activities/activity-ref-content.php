<?php
/**
 * Activity reference content template.
 *
 * @link       https://anspress.io
 * @since      4.1.2
 * @license    GPL3+
 * @package    AnsPress
 * @subpackage Templates
 *
 * @global object $activities Activity query.
 */

if ( ! $this->has_action() ) {
	return;
}

$type = $this->object->action['ref_type'];

$post_id = $this->object->q_id;

if ( 'answer' === $type && ! empty( $this->object->a_id ) ) {
	$post_id = $this->object->a_id;
} elseif ( 'post' === $type && ! empty( $this->object->a_id ) ) {
	$post_id = $this->object->a_id;
}

if ( 'comment' === $type ) {
	echo get_comment_excerpt( $this->object->c_id ) . '<a href="' . get_comment_link( $this->object->c_id ) . '">' . __( 'View comment', 'anspress-question-answer' ) . '</a>';
} elseif ( ! empty( $post_id ) ) {
	echo '<a href="' . get_permalink( $post_id ) . '">' . get_the_title( $post_id ) . '</a>';
}
