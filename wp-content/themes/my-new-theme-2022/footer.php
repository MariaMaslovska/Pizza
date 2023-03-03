<footer class="site-footer">
        <div class="footer-container">
            <div class="footer-col col1">
                <h1 class="home-link-footer">
                    <a href="<?php echo get_site_url(); ?>">Garibaldi's Pizza</a>
                </h1>
                <p><?php the_field('phone_number', 20); ?></p>
            </div>

            <div class="footer-col col2">
                <nav class="nav-list">
                    <ul>
                        <li><a href="<?php echo site_url('/about'); ?>">About</a></li>
                        <li><a href="<?php echo site_url('/contact'); ?>">Contact</a></li>
                        <li><a href="<?php echo site_url('/careers'); ?>">Careers</a></li>
                        <li><a href="<?php echo site_url('/faqs'); ?>">FAQs</a></li>
                        <li><a href="<?php echo site_url('/privacy-policy'); ?>">Privacy</a></li>
                    </ul>
                </nav>
            </div>

            <div class="footer-col col3">
                <h3>Find Us Here</h3>
                <ul class="social-icons-list">
                    <li title="Facebook">
                        <a target="_blank" href="<?php the_field('facebook_link', 20); ?>" class="social color-facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li title="Instagram">
                        <a target="_blank" href="<?php the_field('instagram_link', 20); ?>" class="social color-instagram"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
<?php
    wp_footer();
?>
</body>
</html>