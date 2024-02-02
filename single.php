<?php get_header(); ?>
<body>
	<?php require 'menuNavegacion.php'; ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!--Se encontro post-->
    <div class="featured-post single-article">
      <div class="container">
        <div class="post-slide single-page" style="background-image: url(<?php
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail_url('full');
						}
						?>);">
          <div class="text-wrap pb-5">
            <div class="share">
              <ul class="list-unstyled">
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><span class="icon-facebook"></span></a></li>
                <li><a href="https://twitter.com/share?url=<?php the_permalink();?>"><span class="icon-twitter"></span></a></li>
                <!--<li><a href=""><span class="icon-pinterest"></span></a></li>-->
              </ul>
            </div>
            <h2 class="text-black"><?php the_title(); ?></h2>
            <div class="meta">
              <span><?php echo get_the_date(); ?></span>
              <span>&bullet;</span>
              <span>By <?php echo get_the_author(); ?></span>
            </div>
          </div>
        </div> <!-- .post-slide -->

      </div>
    </div>
    <div class="container article">
      <div class="row justify-content-center align-items-stretch">
        <article class="col-lg-8 order-lg-2 px-lg-5">
          <?php the_content(); ?>
          <div class="pt-5 categories_tags ">
            <p>Categorias:  
              <?php
                $categories = get_the_category();
                foreach( $categories as $category ) {
                  echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>&nbsp;';
                }
              ?>
            </p>
          </div>
          <?php // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
          ?>
          <!-- END main-content -->
          <!--<div class="pt-5">
            <h3 class="mb-5">6 Comments</h3>
            <ul class="comment-list">
              <li class="comment">
                <div class="vcard bio">
                  <img src="images/person_6.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>Irish Smith</h3>
                  <div class="meta">January 9, 2018 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div>
              </li>

              <li class="comment">
                <div class="vcard bio">
                  <img src="images/person_5.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>Christine Stewart</h3>
                  <div class="meta">January 9, 2018 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div>

                <ul class="children">
                  <li class="comment">
                    <div class="vcard bio">
                      <img src="images/person_4.jpg" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3>Chintan Patel</h3>
                      <div class="meta">January 9, 2018 at 2:21pm</div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                      <p><a href="#" class="reply">Reply</a></p>
                    </div>


                    <ul class="children">
                      <li class="comment">
                        <div class="vcard bio">
                          <img src="images/person_3.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                          <h3>John Doe</h3>
                          <div class="meta">January 9, 2018 at 2:21pm</div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                          <p><a href="#" class="reply">Reply</a></p>
                        </div>

                          <ul class="children">
                            <li class="comment">
                              <div class="vcard bio">
                                <img src="images/person_2.jpg" alt="Image placeholder">
                              </div>
                              <div class="comment-body">
                                <h3>Ben Afflick</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                              </div>
                            </li>
                          </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="comment">
                <div class="vcard bio">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>Jean Doe</h3>
                  <div class="meta">January 9, 2018 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div>
              </li>
            </ul>              
            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <form action="#" class="">
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control" id="website">
                </div>

                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn btn-primary btn-md">
                </div>

              </form>
            </div>
          </div>-->
        </article>
        <div class="col-md-12 col-lg-1 order-lg-1">
          <div class="share sticky-top">
            <h3>Compartir</h3>
            <ul class="list-unstyled share-article">
              <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><span class="icon-facebook"></span></a></li>
              <li><a href="https://twitter.com/share?url=<?php the_permalink();?>"><span class="icon-twitter"></span></a></li>
              <!--<li><a href="#"><span class="icon-pinterest"></span></a></li>-->
            </ul>
          </div>
        </div>
        <div class="col-lg-3 mb-5 mb-lg-0 order-lg-3">
          <?php require 'newsletter.php'; ?>
        </div>
      </div>
    </div>
    <div class="section-latest-relacionados">
      <div class="container">
        <div class="row">
          <?php require 'post-relacionados.php'; ?>
        </div>
      </div>
    </div>
    <!--Fin del post-->
  <?php endwhile; else: ?>
    <h3>Error 404 no se encontro el post Solicitado.</h3>
  <?php endif; ?>
  <?php wp_reset_query();?>
  <?php get_footer(); ?>