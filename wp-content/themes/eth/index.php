<?php get_header();

while (have_posts()) : the_post(); ?>
    <article class="hotel-item">
        <div>
            <h3><?php the_title() ?></h3>
            <?php if (has_post_thumbnail()) the_post_thumbnail() ?>
            <p><?php the_content() ?></p>
            <p>Uploaded by <?php the_author() ?></p>
            <p>Uploaded at <?php the_date() ?></p>
        </div>
    </article>
<?php endwhile;

get_sidebar();
get_footer();
