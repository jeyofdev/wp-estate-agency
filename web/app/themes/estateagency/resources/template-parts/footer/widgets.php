<?php

/**
 * Display the widgets in the footer
 */

?>


<?php
    $frontpageID = get_option("page_on_front");
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
        <div class="footer-text">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-logo">
                        <div class="logo">
                            <img src="<?= get_theme_mod("logo_footer"); ?>" alt="">
                        </div>
                    </div>
                </div>
                <?php get_sidebar("footer"); ?>
            </div>
        </div>

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