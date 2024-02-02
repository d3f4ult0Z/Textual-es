<?php
/*
Template Name: Pagina principal
*/
?>
<?php get_header(); ?>
<body>
	<?php require 'menuNavegacion.php'; ?>
  <?php require 'carousel.php'; ?>
  <!-- <div class="container">
    <div class="row justify-content-center">
        <div class="advertising-leader-board">
          <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/Publicidad728x90_impar.gif" alt="Image" class="img-fluid rounded"></span> </a>
        </div>
    </div>
  </div> -->
  <div class="section-latest">
    <div class="container">
      <?php require 'seccion1.php'; ?>
      <div class="row">
        <?php require 'seccion2.php'; ?>
        <?php require 'seccion3.php'; ?>
      </div>
      <!-- <div class="row justify-content-center">
          <div class="advertising-leader-board">
            <h1>728 x 90</h1>
          </div>
      </div> -->
      <div class="row">
        <?php require 'seccion4.php'; ?>
        <?php require 'seccion5.php'; ?>
      </div>
      <!-- <div class="row justify-content-center">
          <div class="advertising-leader-board">
            <h1>728 x 90</h1>
          </div>
      </div> -->
    </div>
  </div>
  <?php get_footer(); ?>