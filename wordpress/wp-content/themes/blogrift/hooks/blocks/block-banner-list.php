<?php $blogus_slider_category = blogus_get_option('select_slider_news_category');
$blogus_number_of_slides = blogus_get_option('number_of_slides');
$blogus_all_posts_main = blogus_get_posts($blogus_number_of_slides, $blogus_slider_category);
$blogus_count = 1;

if ($blogus_all_posts_main->have_posts()) :
    while ($blogus_all_posts_main->have_posts()) : $blogus_all_posts_main->the_post();
    global $post;
    $blogus_url = blogus_get_freatured_image_url($post->ID, 'blogus-slider-full');
    $slider_meta_enable = get_theme_mod('slider_meta_enable','true'); ?>
    
      <div class="swiper-slide">
        <div class="bs-blog-post list-blog"> 
          <div class="bs-blog-thumb lg back-img" style="background-image: url('<?php echo esc_url($blogus_url); ?>');">
            <a href="<?php the_permalink(); ?>" class="link-div"></a>
          </div>
          <article class="small">
            <?php if($slider_meta_enable == true) { blogus_post_categories(); } ?>
            <h4 class="title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php if($slider_meta_enable == true) { blogus_post_meta(); } ?>
            <p><?php esc_attr(blogrift_limit_content_chr( get_the_content(), 200 )); ?></p>
          </article>
        </div>
      </div> <?php 
    endwhile;
endif;
wp_reset_postdata(); ?>