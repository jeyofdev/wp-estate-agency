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
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("agency_options_email", __("Email", "estateagency"), function () {
            ?>
                <input type="email" name="<?= self::EMAIL; ?>" id="<?= self::EMAIL; ?>" class="regular-text ltr" value="<?= esc_html(get_option(self::EMAIL)); ?>">
                <p class="description" id="phone-description"><?= __("Agency email (ex: monsite@contact.com).", "estateagency"); ?></p>
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
