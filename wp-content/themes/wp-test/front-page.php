<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-test
 */

get_header();

$course_campuses = get_categories( [
	'taxonomy'   => 'course_campus',
	'hide_empty' => true,
] );

$course_types = get_categories( [
	'taxonomy'   => 'course_type',
	'hide_empty' => true,
] );

//$posts_per_page = get_option( 'posts_per_page' );
$posts_per_page = 9;

if ( get_query_var( 'paged' ) ) {
	$paged = get_query_var( 'paged' );
} else if ( get_query_var( 'page' ) ) {
	$paged = get_query_var( 'page' );
} else {
	$paged = 1;
}

$args = array(
	'paged'          => $paged,
	'posts_per_page' => $posts_per_page,
	'post_type'      => 'courses',
	'orderby'        => 'date',
	'post_status'    => 'publish',
);

$courses_query = new WP_Query( $args );
$posts_count   = $courses_query->found_posts;

?>

    <main>

		<?php the_content(); ?>

        <section class="courses">
            <div class="container">
                <div class="courses__inner">
                    <aside class="courses__filter">

                        <div class="courses__filter-dd-wrap">

							<?php if ( $course_campuses && count( $course_campuses ) > 0 ): ?>

                                <div data-drop-down class="drop-down courses__drop-down">
                                    <div data-drop-down-trigger
                                         class="drop-down__header"><?php _e( 'Filter by campus', 'lang-td' ) ?></div>
                                    <div class="drop-down__list-wrap">
                                        <ul class="drop-down__list">

											<?php foreach ( $course_campuses as $item ): ?>

                                                <li class="drop-down__item">
                                                    <label class="checkbox drop-down__checkbox"><?php echo $item->name ?>
                                                        <input data-filter="campus"
                                                               data-value="<?php echo $item->term_id ?>"
                                                               data-name="<?php echo $item->name ?>"
                                                               type="checkbox"
                                                               class="checkbox__input">
                                                        <span class="checkbox__span"></span>
                                                    </label>
                                                </li>

											<?php endforeach; ?>

                                        </ul>
                                    </div>
                                </div>

							<?php endif; ?>

							<?php if ( $course_types && count( $course_types ) > 0 ): ?>

                                <div data-drop-down class="drop-down courses__drop-down">
                                    <div data-drop-down-trigger
                                         class="drop-down__header"><?php _e( 'Filter by course type', 'lang-td' ) ?></div>
                                    <div class="drop-down__list-wrap">
                                        <ul class="drop-down__list">

											<?php foreach ( $course_types as $item ): ?>

                                                <li class="drop-down__item">
                                                    <label class="checkbox drop-down__checkbox"><?php echo $item->name ?>
                                                        <input data-filter="campus"
                                                               data-value="<?php echo $item->term_id ?>"
                                                               data-name="<?php echo $item->name ?>"
                                                               type="checkbox"
                                                               class="checkbox__input">
                                                        <span class="checkbox__span"></span>
                                                    </label>
                                                </li>

											<?php endforeach; ?>

                                        </ul>
                                    </div>
                                </div>

							<?php endif; ?>

                        </div>

                        <div class="courses__filter-btn-wrap">
                            <button class="button-1 courses__filter-btn">Apply now</button>
                        </div>

                    </aside>

                    <div class="courses__grid-wrap">
                        <div class="courses__grid">

							<?php if ( $courses_query->have_posts() ) : ?>
								<?php while ( $courses_query->have_posts() ) : $courses_query->the_post(); ?>
									<?php get_template_part( 'template-parts/loop/cpt-item' ) ?>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php else: ?>

                                <din class="courses__no-posts"><?php _e( 'No posts found.', 'lang-td' ) ?></din>

							<?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

<?php get_footer(); ?>