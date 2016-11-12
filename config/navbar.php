<?php
/**
 * Config-file for navigation bar.
 */

$menuItems = [
    "index" => [
        "text"  => t("Hem"),
        "url"   => $this->di->get("url")->create(""),
        "title" => t("Första sidan"),
        "mark-if-parent" => true,
    ],

    "report" => [
        "text"  => t("Redovisningar"),
        "url"   => $this->di->get("url")->create("report"),
        "title" => t("Redovisningar av kursmoment"),
        "mark-if-parent" => true,
    ],

    "test" => [
        "text"  => t("Tester"),
        "url"   => $this->di->get("url")->create("test"),
        "title" => t("Sida för diverse tester"),
        "mark-if-parent" => true,
    ],

    "about" => [
        "text"  => t("Om"),
        "url"   => $this->di->get("url")->create("about"),
        "title" => t("Om denna webbplats"),
        "mark-if-parent" => true,
    ]
];

return [

    // Name of this menu
    "navbarTop" => [
        // Use for styling the menu
        "wrapper" => null,
        "class" => "rm-default rm-desktop",

        // Here comes the menu structure
        "items" => $menuItems,
    ],

    // Name of this menu
    "navbarMax" => [
        // Use for styling the menu
        "id" => "rm-menu",
        "wrapper" => null,
        "class" => "rm-default rm-mobile",

        // Here comes the menu structure
        "items" => $menuItems,
    ],

/*
    // Used as menu together with responsive menu
    // Name of this menu
    "navbarMax" => [
        // Use for styling the menu
        "id" => "rm-menu",
        "wrapper" => null,
        "class" => "rm-default rm-mobile",

        // Here comes the menu structure
        "items" => [

            "report" => [
                "text"  => t("Report"),
                "url"   => $this->di->get("url")->create("report"),
                "title" => t("Reports from kmom assignments"),
                "mark-if-parent" => true,
            ],

            "about" => [
                "text"  => t("About"),
                "url"   => $this->di->get("url")->create("about"),
                "title" => t("About this website")
            ],
        ],
    ],
*/


    /**
     * Callback tracing the current selected menu item base on scriptname
     *
     */
    "callback" => function ($url) {
        return !strcmp($url, $this->di->get("request")->getCurrentUrl(false));
    },



    /**
     * Callback to check if current page is a decendant of the menuitem,
     * this check applies for those menuitems that has the setting
     * "mark-if-parent" set to true.
     *
     */
    "is_parent" => function ($parent) {
        $url = $this->di->get("request")->getCurrentUrl(false);
        return !substr_compare($parent, $url, 0, strlen($parent));
    },



   /**
     * Callback to create the url, if needed, else comment out.
     *
     */
     /*
    "create_url" => function ($url) {
        return $this->di->get("url")->create($url);
    },*/
];
