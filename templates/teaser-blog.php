<article class="blog-container teaser" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section id="post-content" class="teaser-item teaser-blog">
      <div class="row">
        <div class="col-12">
          <header id="post-header">
            <h2 class="teaser-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <span class="author"><?php \BR\WordPress\helper\br_posted_on(); ?></span>
            <div class="post-image alignwide">
              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>">
                  <img class="img-fluid" src="<?php the_post_thumbnail_url('16-9-md'); ?>" />
                </a>
              <?php endif; ?>
            </div>
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
