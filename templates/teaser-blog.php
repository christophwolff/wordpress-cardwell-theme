<article class="blog-container teaser" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section id="post-content" class="teaser-item teaser-blog">
      <div class="row">
        <div class="col-12">
          <header id="post-header" class="mt-5">
          <?php \BR\WordPress\helper\br_posted_on(); ?>
            <h2 class="teaser-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>">
                  <div class="post-image alignwide">
                    <img class="img-fluid" src="<?php the_post_thumbnail_url('16-9-md'); ?>" />
                  </div>
                </a>            
              <?php endif; ?>
          </header>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="entry-excerpt">
            <?php the_content(''); ?>
          </div>
        </div>
      </div>
    </section>
  </article>
