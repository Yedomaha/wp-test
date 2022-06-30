<?php

$title       = get_field( 'title' );
$text        = get_field( 'text' );
$description = get_field( 'description' );
$image       = get_field( 'image' );

?>

<section class="hero">
    <div class="container">
        <div class="hero__inner">
            <div class="hero__col">
                <div class="hero__content">

					<?php if ( ! empty( $title ) ): ?>

                        <h1 class="hero__title"><?php echo $title ?></h1>

					<?php endif; ?>

					<?php if ( ! empty( $text ) ): ?>

                        <div class="hero__text"><?php echo $text ?></div>

					<?php endif; ?>

					<?php if ( ! empty( $description ) ): ?>

                        <div class="hero__description"><?php echo $description ?></div>

					<?php endif; ?>

                </div>
            </div>
            <div class="hero__col">
                <div class="hero__img-wrap">
                    <img class="hero__img" <?php echo wpTestHelperClass::get_image_attributes_by_id( $image['id'], 2000 ); ?>>
                </div>
            </div>
        </div>
    </div>
</section>
