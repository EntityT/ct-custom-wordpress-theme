<?php
/*
Template Name: Homapage
*/
get_header();

?>
<!-- Breadcrumb Navigation -->
<div class="breadcrumb ">
    <div class="container">
        <p><a href="<?php echo home_url(); ?>">Home</a> / Who we are / <a class="active">Contact</a></p>
    </div>
</div>

<section class="contact-page">
    <div class="container">
     
        <?php
            // Fetch the custom title from custom fields
            $custom_title = get_post_meta( get_the_ID(), 'custom_page_title', true );

            if ( $custom_title ) {
                // Display the custom title if it exists
                echo '<h1>' . esc_html( $custom_title ) . '</h1>';
            } else {
                // Fallback to the default page title if no custom title is set
                the_title( '<h1>', '</h1>' );
            }
        ?>
       
           <?php
            while ( have_posts() ) : the_post();
                the_content();  // This displays the content you added in the WordPress editor
            endwhile;
        ?>

    </div>
</section>

<?php
get_footer();
?>

