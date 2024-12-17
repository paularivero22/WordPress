<?php
/**
 * The template for displaying the content.
 * @package Blogrift
 */
while(have_posts()){ the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class("bs-blog-post list-blog"); ?>>
        <?php  
        $url = blogus_get_freatured_image_url($post->ID, 'blogus-medium');
        blogus_post_image_display_type($post); 
        ?>
        <article class="small col text-xs">
            <?php 
            $blogus_global_category_enable = get_theme_mod('blogus_global_category_enable','true');
            if($blogus_global_category_enable == 'true') { ?>
                <?php blogus_post_categories(); ?>
            <?php } ?>
            <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
            <?php blogus_posted_content(); blogrift_post_meta(); ?>
        </article>
    </div>
<?php }
blogus_page_pagination();