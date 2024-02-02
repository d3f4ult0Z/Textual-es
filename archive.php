<?php
/**
 * The template for displaying Category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();?>
<body>
	<?php require 'menuNavegacion.php'; ?>
<?php if ( have_posts() ) :?>
    <div class="section-latest">
        <div class="container">
            <div class="row gutter-v1 align-items-stretch mb-5">
                <div class="col-12">
                    <h2 class="section-title"><?php
                    if ( is_category() ) {
                        single_cat_title( 'Entradas en categoria: ' );
                    } elseif ( is_tag() ) {
                        single_tag_title( 'Entradas en etiqueta: ' );
                    } elseif ( is_author() ) {
                        the_post();
                        echo 'Entradas para autor: ' . get_the_author();
                        rewind_posts();
                    } elseif ( is_day() ) {
                        echo 'Entradas del dia: ' . get_the_date();
                    } elseif ( is_month() ) {
                        echo 'Entradas del mes: ' . get_the_date( 'F Y' );
                    } elseif ( is_year() ) {
                        echo 'Entradas del año: ' . get_the_date( 'Y' );
                    } else {
                        echo 'Entradas: ';
                    }
                    ?></h2>
                </div>
                <div class="col-md-9 pr-md-5">
                    <div class="row">
                        <?php
                        while ( have_posts() ) : the_post(); ?>
                        <div class="col-12">
                            <div class="post-entry horizontal d-md-flex">
                                <div class="media">
                                <a href="<?php the_permalink();?>"><img src="<?php
                                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                        the_post_thumbnail_url('full');
                                    }
                                ?>" alt="Image" class="img-fluid"></a>
                                </div>
                                <div class="text">
                                <!--<div class="meta-cat"><a href="#">Business</a></div>-->
                                <h2><a href="<?php the_permalink();?>"><?php the_title() ?></a></h2>
                                <div class="meta mb-0">
                                    <span><?php echo get_the_date(); ?></span>
                                    <span>&bullet;</span>
                                    <span><?php 
                                        $cats = get_the_category();
                                        $firstCat = $cats[0];
                                        echo '<a href="'.esc_url(get_category_link($firstCat->cat_ID)).'">'.$firstCat->name.'</a>';
                                    ?></span>
                                </div>
                                <p><?php $extracto = get_the_content();
                                    $extracto = strip_tags($extracto);
                                    echo substr($extracto, 0, 200).'...'; ?>
                                </p>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;?>
                    </div>
                </div>

                <div class="col-md-3">
                    <?php require 'newsletter.php'; ?>
                </div>
            </div>

        </div>
    </div>

<?php else :
    echo '<p>There are no posts!</p>';
endif;?>
<?php 
// obtenemos el total de páginas
global $wp_query;
$total = $wp_query->max_num_pages;
// solo seguimos con el resto si tenemos más de una página
if ( $total > 1 )  {
    // obtenemos la página actual
    if ( !$current_page = get_query_var('paged') )
        $current_page = 1;
    // la estructura de “format” depende de si usamos enlaces permanentes "humanos"
    $format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
    echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => $format,
        'current' => $current_page,
        'prev_next' => True,
        'prev_text' => __('&laquo; Anterior'),
        'next_text' => __('Siguiente &raquo;'),
        'total' => $total,
        'mid_size' => 4,
        'type' => 'list'
    ));
}
?>
<?php get_footer(); ?>