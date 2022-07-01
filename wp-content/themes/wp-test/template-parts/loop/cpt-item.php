<?php
$term = get_field( 'term' );

$course_types  = get_the_terms( get_the_ID(), 'course_type' );
$types_to_show = wpTestHelperClass::get_terms_string( $course_types, ', ' );

$course_campuses = get_the_terms( get_the_ID(), 'course_campus' );

$featured_img_id = get_post_thumbnail_id( get_the_ID() );

?>

<article class="cpt-item">
    <div class="cpt-item__inner">
        <div class="cpt-item__img-wrap">
            <img class="cpt-item__img" <?php echo wpTestHelperClass::get_image_attributes_by_id( $featured_img_id, 500 ); ?>>
            <a href="<?php the_permalink() ?>"></a>
        </div>
        <div class="cpt-item__body">
            <h3 class="cpt-item__title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
            <div class="cpt-item__info">

				<?php if ( $types_to_show ): ?>

                    <span class="cpt-item__info-el"><?php echo $types_to_show ?></span>

				<?php endif; ?>

				<?php if ( ! empty( $term ) ): ?>

                    <span class="cpt-item__info-el"><?php echo $term ?></span>

				<?php endif; ?>

            </div>
        </div>

		<?php if ( $course_campuses && count( $course_campuses ) > 0 ): ?>

            <div class="cpt-item__footer">
                <ul class="cpt-item__footer-list">

					<?php foreach ( $course_campuses as $i => $item ): ?>
						<?php
						$name         = $item->name;
						$name_letters = wpTestHelperClass::get_first_letters( $name, 2 );
						?>

                        <li class="tag-item cpt-item__footer-item">
                            <div class="tag-item__info">
                                <span class="tag-item__info-text"><?php echo $item->name ?></span>
                                <div class="tag-item__info-arrow"></div>
                            </div>
                            <div class="tag-item__el"><?php echo $name_letters ?></div>
                        </li>

					<?php endforeach; ?>
                </ul>
            </div>

		<?php endif; ?>

    </div>
</article>