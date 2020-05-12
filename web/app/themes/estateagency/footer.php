        <!-- Partner section -->
        <div class="partner-section">
            <div class="container">
                <div class="partner-carousel owl-carousel">
                    <?php
                    $query = new WP_Query([
                        "post_type" => "partner"
                    ]);
                    ?>
                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <a href="#" class="partner-logo">
                                <div class="partner-logo-tablecell">
                                    <?= estateagency_post_thumbnail($post, "partner_thumbnail", 65, 65); ?>
                                </div>
                            </a>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Partner section end -->

        <?php
            $frontpageID = get_option( 'page_on_front' );
            $query = new WP_Query([
                "post_type" => "page",
                "page_id" => $frontpageID
            ]);
        ?>

        <!-- Footer Section Begin -->
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php if (!is_null(get_field("background-footer")["sizes"]["footer_background"])) : ?>
                    <footer class="footer-section set-bg" data-setbg="<?= get_field("background-footer")["sizes"]["footer_background"]; ?>">
                <?php else : ?>
                    <footer class="footer-section set-bg" data-setbg="">
                <?php endif; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
            <!-- <div class="mask"></div> -->
            <div class="container">
                <div class="copyright-text">
                    <p>
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </p>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

    <?php wp_footer(); ?>
    </body>

</html>