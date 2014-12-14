<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * @package maera
 */

/**
* Test if all required plugins are installed.
* If they are not then then do not proceed with the template loading.
* Instead display a custom template file that urges users to visit their dashboard to install them.
*/

if ( 'bad' == Maera::test_missing() ) {
	get_template_part( 'lib/required-error' );
	return;
}

$context = Maera_Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

Maera_Timber::render(
	array(
		'page-' . $post->post_name . '.twig',
		'page-' . $post->slug . '.twig',
		'page-' . $post->ID . '.twig',
		'page.twig'
	),
	$context,
	apply_filters( 'maera/timber/cache', false )
);
