<?php

require_once "inc/supports.php";
require_once "inc/assets.php";
require_once "inc/menus.php";
require_once "inc/images.php";
require_once "inc/text.php";
require_once "inc/post-types.php";
require_once "inc/comments.php";
require_once "inc/customize.php";
require_once "inc/admin.php";

require_once "class/helpers/class_estateagency_format_helpers.php";
require_once "class/options/class_estateagency_option_agency.php";
require_once "class/class_estateagency_title.php";
require_once "class/walkers/class_estateagency_comment_walker.php";
require_once "class/walkers/class_estateagency_contract_types_radio_walker.php";

EstateAgencyOptionAgency::register();