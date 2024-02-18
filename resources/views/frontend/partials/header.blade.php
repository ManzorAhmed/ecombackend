

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Top Bar Styles */
        .top-bar {
            background-color: #ffffff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            box-shadow: 0px 2px 0px 0px #dadce5;
        }

        .top-bar .branding {
            display: flex;
            justify-content: space-between;
            box-shadow: 0px 1px 0px 0px #000000;
            align-items: center;
        }

        .top-bar #site-title, .top-bar #site-description {
            display: none;
        }

        .top-bar .branding a {
            margin: 0 10px;
        }

        .top-bar .branding img {
            max-width: 50%;
            height: auto;
            margin-left: 200px; /* Adjusted margin */
            padding-top: 10px; /* Adjusted padding */
            padding-bottom: 10px; /* Adjusted padding */
        }

        .top-bar .mini-widgets {
            display: flex;
            color: #66d14d;
            text-decoration: underline;
            padding-top: 26px;
            margin-right: 200px;
        }

        .top-bar .text-area {
            font-size: 27px;
            line-height: 30px;
            font-weight: bold;
            text-align: center;
            margin-right: 20px;
        }

        .top-bar .text-area a {
            color: #66d14d;
            text-decoration: underline;
        }

        /* Header Styles */
        .header-bar {
            background-color: #ffffff;
            color: #95a6ad;
            text-align: center;
            padding: 3px 0;
        }

        .header-bar a {
            color: #8c95a2;
            font: normal 700 17px / 26px "Roboto Condensed", Helvetica, Arial, Verdana, sans-serif;
            font-weight: 600;
            text-transform: uppercase;
        }

        .navigation {
            display: flex;
            justify-content: center;
            margin-top: 8px;
        }

        .navigation ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .navigation li {
            display: inline-block;
            margin: 0 25px;
            position: relative;
        }

        .navigation li ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1;
            width: 200px; /* Adjusted width */
        }

        .navigation li:hover > ul {
            display: block;
        }

        .navigation li ul li {
            display: block;
            width: 100%;
            text-align: left;
            margin: 0;
            padding: 10px;
            border-bottom: 1px solid #95a6ad;
        }

        .navigation li ul li:last-child {
            border-bottom: none;
        }

        /* Main navigation item hover color */
        .navigation li:hover > a {
            color: #08214f; /* Change the hover color for main items */
            text-decoration: underline #15b043;

        }
        /* Sub-menu item hover color */
        .navigation li ul li > a {
            color: #0e0c0c; /* Change the hover color for sub-menu items */
            text-decoration: none;
        }
        /* Sub-menu item hover color */
        .navigation li ul li:hover > a {
            color: #15b043; /* Change the hover color for sub-menu items */
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="top-bar">
    <div class="branding">
        <div>
            <a href="https://airrite.ae/newweb/">
                <img class="preload-me" src="https://airrite.ae/newweb/wp-content/uploads/2023/04/AIR-RITE-WEB-LOGO-PNG-EDITED.png" alt="AirRite">
            </a>
        </div>
        <div class="mini-widgets">
            <div class="text-area show-on-desktop in-menu-first-switch hide-on-second-switch first last">
                <p>
                    <span style="font-size: 26px; line-height: 22px; text-decoration: none; text-align: center;">
                        <a href="tel:+971 50 851 1091">+971 50 851 1091</a>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>

<header class="header-bar">
    <nav class="navigation">
        <ul id="primary-menu" class="main-nav underline-decoration upwards-line level-arrows-on">
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1831 first depth-0">
                <a href="https://airrite.ae/newweb/about" data-level="1">
                    <span class="menu-item-text"><span class="menu-text">About Us</span></span>
                </a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1831 first depth-0">
                <a href="https://airrite.ae/newweb/about" data-level="1">
                    <span class="menu-item-text"><span class="menu-text">Services</span></span>
                </a>
                <ul class="dropdown">
                    <li><a href="#">Duct Cleaning</a></li>
                    <li><a href="#">Maintenance</a></li>
                    <!-- Add more sub-menu items as needed -->
                </ul>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1831 first depth-0">
                <a href="https://airrite.ae/newweb/about" data-level="1">
                    <span class="menu-item-text"><span class="menu-text">Annual Maintenance Contract</span></span>
                </a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1831 first depth-0">
                <a href="https://air

rite.ae/newweb/about" data-level="1">
                    <span class="menu-item-text"><span class="menu-text">ACFAQS</span></span>
                </a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1831 first depth-0">
                <a href="https://airrite.ae/newweb/about" data-level="1">
                    <span class="menu-item-text"><span class="menu-text">Contact Us</span></span>
                </a>
            </li>
        </ul>
    </nav>
</header>

<!-- Your page content goes here -->

</body>
</html>


