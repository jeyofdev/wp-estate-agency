<?php

/**
 * Class that manages the agency panel in the administration settings
 */
class EstateAgencyOptionAgency
{
    CONST GROUP = "agence_options";
    CONST SECTION_SLUG = "agency_options_section";

    CONST PHONE = "agency_phone";
    CONST ADDRESS = "agency_address";
    CONST EMAIL = "agency_email";
    CONST FACEBOOK = "agency_facebook";
    CONST TWITTER = "agency_twitter";
    CONST INSTAGRAM = "agency_instagram";
    CONST OPENING_HOURS = "agency_opening_hours";



    /**
     * Save a new item to the admin panel
     */
    public static function register () : void
    {
        add_action("admin_menu", [self::class, "addmenu"]);
        add_action("admin_init", [self::class, "registerSettings"]);
    }



    /**
     * Create the form that manages the options
     */
    public static function registerSettings () : void
    {
        register_setting(self::GROUP, self::PHONE);
        register_setting(self::GROUP, self::ADDRESS);
        register_setting(self::GROUP, self::EMAIL);
        register_setting(self::GROUP, self::FACEBOOK);
        register_setting(self::GROUP, self::TWITTER);
        register_setting(self::GROUP, self::INSTAGRAM);
        register_setting(self::GROUP, self::OPENING_HOURS);
        add_settings_section(self::SECTION_SLUG, null, null, self::GROUP);

        add_settings_field("agency_options_phone", __("Phone", "estateagency"), function () {
            ?>
                <input type="text" name="<?= self::PHONE; ?>" id="<?= self::PHONE; ?>" class="regular-text" value="<?= esc_html(get_option(self::PHONE)); ?>">
                <p class="description" id="phone-description"><?= __("Agency phone number (ex: 01 12 34 56 78).", "estateagency"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("agency_options_address", __("Address", "estateagency"), function () {
            ?>
                <input type="text" name="<?= self::ADDRESS; ?>" id="<?= self::ADDRESS; ?>" class="regular-text" value="<?= esc_html(get_option(self::ADDRESS)); ?>">
                <p class="description" id="addess-description"><?= __("Agency address (ex: 16 Creek Ave. Farming, NY).", "estateagency"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("agency_options_email", __("Email", "estateagency"), function () {
            ?>
                <input type="email" name="<?= self::EMAIL; ?>" id="<?= self::EMAIL; ?>" class="regular-text ltr" value="<?= esc_html(get_option(self::EMAIL)); ?>">
                <p class="description" id="email-description"><?= __("Agency email (ex: monsite@contact.com).", "estateagency"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("agency_options_facebook", __("Facebook", "estateagency"), function () {
            ?>
                <input type="url" name="<?= self::FACEBOOK; ?>" id="<?= self::FACEBOOK; ?>" class="regular-text ltr" value="<?= esc_html(get_option(self::FACEBOOK)); ?>">
                <p class="description" id="facebook-description"><?= __("Lien Facebook (ex: https://www.facebook.com/pseudo).", "estateagency"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("agency_options_twitter", __("Twitter", "estateagency"), function () {
            ?>
                <input type="url" name="<?= self::TWITTER; ?>" id="<?= self::TWITTER; ?>" class="regular-text ltr" value="<?= esc_html(get_option(self::TWITTER)); ?>">
                <p class="description" id="twitter-description"><?= __("Lien Twitter (ex: https://twitter.com/pseudo).", "estateagency"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("agency_options_instagram", __("Instagram", "estateagency"), function () {
            ?>
                <input type="url" name="<?= self::INSTAGRAM; ?>" id="<?= self::INSTAGRAM; ?>" class="regular-text ltr" value="<?= esc_html(get_option(self::INSTAGRAM)); ?>">
                <p class="description" id="agency_options_instagram-description"><?= __("Lien Instagram (ex: https://www.instagram.com/pseudo).", "estateagency"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("agency_options_opening_hours", __("Opening hours", "estateagency"), function () {
            ?>
                <input type="text" name="<?= self::OPENING_HOURS; ?>" id="<?= self::OPENING_HOURS; ?>" class="regular-text ltr" value="<?= esc_html(get_option(self::OPENING_HOURS)); ?>">
                <p class="description" id="agency_options_opening_hours-description"><?= __("opening_hours (ex: Mon - Sat, 08 AM - 06 PM).", "estateagency"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);
    }



    /**
     * Add submenu Agency to the Settings main menu
     *
     * @return void
     */
    public static function addmenu () : void
    {
        add_options_page(
            __("Agency information", "estateagency"),
            __("Agency", "estateagency"),
            "manage_options",
            self::GROUP,
            [self::class, "render"]
        );
    }



    /**
     * Display the informations
     *
     * @return void
     */
    public static function render () : void
    {
        ?>
        <div class="wrap">
            <h1><?= __("Agency information", "estateagency"); ?></h1>
        </div>

        <form action="options.php" method="post">
            <?php settings_fields(self::GROUP); ?>
            <?php do_settings_sections(self::GROUP); ?>
            <?php submit_button(); ?>
        </form>

        <?php 
    }
}
