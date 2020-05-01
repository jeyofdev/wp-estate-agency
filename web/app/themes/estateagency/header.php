<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>

    <body class="<?php body_class(); ?>">
        <!-- Offcanvas Menu Section Begin -->
        <div class="offcanvas-menu-overlay"></div>
        <div class="canvas-open">
            <i class="icon_menu"></i>
        </div>
        <div class="offcanvas-menu-wrapper">
            <div class="canvas-close">
                <i class="icon_close"></i>
            </div>
            <div class="language-bar">
                <?php get_template_part("template-parts/header/header-languages"); ?>
                <div class="property-btn">
                    <a href="#" class="property-sub"><?= __("Submit Property", "estateagency"); ?></a>
                </div>
            </div>

            <?php
                wp_nav_menu([
                    "theme_location" => "header-menu",
                    "container" => "nav",
                    "container_class" => "main-menu",
                    "menu_class" => ""
                ]);
            ?>
        </div>
        <!-- Offcanvas Menu Section End -->

        <!-- Header Section Begin -->
        <header class="header-section">
            <div class="top-nav">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <?php
                                wp_nav_menu([
                                    "theme_location" => "header-menu",
                                    "container" => "nav",
                                    "container_class" => "main-menu",
                                    "menu_class" => ""
                                ]);
                            ?>
                        </div>
                        <div class="col-lg-5">
                            <div class="top-right">
                                <?php get_template_part("template-parts/header/header-languages"); ?>
                                <a href="#" class="property-sub"><?= __("Submit Property", "estateagency"); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->