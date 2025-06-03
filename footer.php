<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <?php
            $email = get_theme_mod('footer_email', 'info@gerejakami.org');
            $fb    = get_theme_mod('footer_facebook_link', '#');
            $ig    = get_theme_mod('footer_instagram_link', '#');
            ?>

            <!-- Sosial Media -->
            <div class="col-md-6 d-flex align-items-start flex-column gap-2">
                <div>
                    <i class="bi bi-envelope-fill me-2"></i> <?php echo esc_html($email); ?>
                </div>
                <div>
                    <i class="bi bi-facebook me-2"></i> <a href="<?php echo esc_url($fb); ?>" class="text-white text-decoration-none">Facebook</a>
                </div>
                <div>
                    <i class="bi bi-instagram me-2"></i> <a href="<?php echo esc_url($ig); ?>" class="text-white text-decoration-none">Instagram</a>
                </div>
            </div>

            <!-- Tentang Kami -->
            <div class="col-md-6 text-md-end mt-4 mt-md-0">
                <h6 class="fw-bold">Tentang Kami</h6>
                <p class="mb-0">Gereja Kami adalah komunitas rohani yang terbuka untuk semua umat. Mari bergabung dan bertumbuh bersama dalam kasih dan pelayanan.</p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center pt-4 mt-4 border-top border-secondary">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> - Semua hak dilindungi.
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>