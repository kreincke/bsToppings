<?php

/**
 * Template Name: mylap (my landing page)
 * 
 * Derived from default page Template: 
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */
get_header();
?>
<div id="content" class="site-content container py-5 mt-4">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>

    <main id="main" class="site-main">
      <!-- Header -->
      <div class="row">
        <div class="d-flex flex-row justify-content-center align-items-center horizontal mb-3 mt-4">
          <div class="col-sm-3 col-md-2 col-lg-2"> 
              <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/logo/logo-sm.svg" width="100%" alt="small bootscore logo"  class="logo sm">
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="text-center">
              <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/logo/logo.svg" width="100%" alt="large bootsore logo"  class="logo md">
              <p class="lead"><?php bloginfo('description'); ?></p>          
            </div>
          </div>
        </div>
      </div>

     <!-- Post List -->

      <div class="row">
        <div class="col col-md-8 col-xxl-9">
          <?php 
            $lpArgs = array(
              'post_type' => 'post',
              'post_status' => 'publish',
              'posts_per_page' => 1,
              'order'=>'DESC',
              'orderby'=>'ID',
              'ignore_sticky_posts' => 1
            );
            $lpQuery = new WP_Query($lpArgs);
            while ($lpQuery->have_posts()) : $lpQuery->the_post(); ?>
              <div class="card horizontal mb-4">
                <div class="row">
                  <!-- Featured Image-->
                  <?php if (has_post_thumbnail())
                    echo '<div class="card-img-left-md col-lg-5">' . get_the_post_thumbnail(null, 'medium') . '</div>';
                  ?>
                  <div class="col">
                    <div class="card-body">
                      <!-- Title -->
                      <h2 class="blog-post-title">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_title(); ?>
                        </a>
                      </h2>
                      <!-- Meta -->
                      <?php if ('post' === get_post_type()) : ?>
                        <small class="text-muted mb-2">
                          <?php
                          bootscore_date();
                          bootscore_author();
                          ?>
                        </small>
                      <?php endif; ?>
                      <!-- Excerpt & Read more -->
                      <div class="card-text mt-auto">
                        <?php the_content(); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
        </div>
        <!-- col -->
        <?php get_sidebar(); ?>
      </div>
      <!-- row -->
    </main><!-- #main -->

  </div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
