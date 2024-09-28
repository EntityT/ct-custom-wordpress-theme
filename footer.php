<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

?>

	</div><!-- #content -->
<footer class="main-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="contact-form-footer">
                <h2>Contact Us</h2>
				<hr>

                <?php echo do_shortcode( '[contact-form-7 id="123" title="Contact form 1"]' ); ?>
            </div>
            
            <div class="reach-us">
                <h2>Reach Us</h2>
				<hr>

                <p><?php echo esc_html( get_theme_mod( 'mytheme_address_1', 'No address set' ) ); ?></p>
                <p>
					<?php echo esc_html( get_theme_mod( 'mytheme_address_2', 'No address set' ) ); ?><br/>
					<?php echo esc_html( get_theme_mod( 'mytheme_address_3', 'No address set' ) ); ?>
				</p>
                <p>
					Phone: <?php echo esc_html( get_theme_mod( 'mytheme_phone_number', 'No phone number set' ) ); ?><br/>
					Fax: <?php echo esc_html( get_theme_mod( 'mytheme_fax', 'No fax set' ) ); ?>
				</p>
                
                <div class="social-media">
					<a href="<?php echo esc_url( get_theme_mod( 'mytheme_facebook' ) ); ?>" target="_blank">
						<i class="fab fa-facebook-f"></i>
					</a>
					<a href="<?php echo esc_url( get_theme_mod( 'mytheme_twitter' ) ); ?>" target="_blank">
						<i class="fab fa-twitter"></i>
					</a>
					<a href="<?php echo esc_url( get_theme_mod( 'mytheme_linkedin' ) ); ?>" target="_blank">
						<i class="fab fa-linkedin-in"></i>
					</a>
					<a href="<?php echo esc_url( get_theme_mod( 'mytheme_pinterest' ) ); ?>" target="_blank">
						<i class="fab fa-pinterest"></i>
					</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
