<?php get_header(); ?>
<!-- Content -->
<section class="col-md-8 content-container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article <?php post_class( 'card' ) ?> id="post-<?php the_ID(); ?>">

                <h2><?php the_title(); ?></h2>
                <div>
                    <span class="post-meta"><span class="fa fa-clock-o"></span>&nbsp;&nbsp; <?php the_date(); ?></span>
                    <span class="post-meta"><span class="fa fa-comments-o"></span>&nbsp;&nbsp; <?php comments_popup_link( __( 'No Comments yet', 'responsive-deluxe' ), __( 'One Comment', 'responsive-deluxe' ), __( '% Comments', 'responsive-deluxe' ) ); ?></span>
                    <span class="post-meta"><span class="fa fa-folder-open"></span>&nbsp;&nbsp;&nbsp;Posted in: <?php the_category(', ') ?></span>
                </div>

                <?php
                the_content();
                ?>

                <div><span class="post-meta"><span class="fa fa-tags"></span>&nbsp;&nbsp; <?php the_tags( __( 'Tags: ', 'responsive-deluxe' ), ', ', '' ); ?></span></div>
                <?php $options = get_option('deluxe_theme_options');
                if( isset( $options['author'] ) ){
                    if ( $options['author'] == 'on' ) {
                        get_template_part( 'author-bio' );
                    }
                } ?>
                <hr>
            <?php comments_template(); ?>
            </article>

    <?php endwhile;
endif; ?>

</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>