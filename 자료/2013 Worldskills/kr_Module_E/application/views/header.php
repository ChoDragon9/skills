<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="<?php echo BASE;?>src/css/core.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE;?>src/css/principal.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE;?>src/css/nav.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE;?>src/css/content.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE;?>src/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE;?>src/css/footer.css" />

        <title>WorldSkills Leipzig / Leipziger Verkehrsbetriebe</title>

    </head>

    <body>

        <div class="container" id="page">

            <a href="index.html">
                <div id="header">
                    <div id="logo"><!--WorldSkills Leipzig / Leipziger Verkehrsbetriebe--></div>
                </div></a>

            <div id="mainmenu">

                <ul>

                    <li>
                        <a href="<?php echo HOME;?>line/manage" title="Line"><span style="background-image: url('<?php echo BASE;?>src/images/line.png')"></span><!--Line--></a>
                    </li>
                    <li>
                        <a href="<?php echo HOME;?>station/manage" title="Station"><span style="background-image: url('<?php echo BASE;?>src/images/station.png')"></span><!--Station--></a>
                    </li>
                    <li>
                        <a href="<?php echo HOME;?>vehicle/manage" title="Vehicle"><span style="background-image: url('<?php echo BASE;?>src/images/vehicle.png')"></span><!--Vehicle--></a>
                    </li>
                    <li>
                        <a href="<?php echo HOME;?>driver/manage" title="Driver"><span style="background-image: url('<?php echo BASE;?>src/images/driver.png')"></span><!--Driver--></a>
                    </li>
                    <li>
                        <a href="<?php echo HOME;?>xml_create" title="XML-XSD"><span style="background-image: url('<?php echo BASE;?>src/images/xml.png')"></span><!--XML Schema--></a>
                    </li>
                    <li>
                        <a href="<?php echo HOME;?>" title="User"><span style="background-image: url('<?php echo BASE;?>src/images/user.png')"></span><!--User--></a>
                    </li>
                </ul>

                <!-- Login / Logout -->
                <div id='access'>
                    <div>Webmaster (<a href="<?php echo HOME.$login;?>"><?php echo $login;?></a>)</div> 
                </div>
            </div>

            <!-- mainmenu -->
            <div class="breadcrumbs">
                <a href="<?php echo HOME;?>">Home</a><!-- &raquo; <a href="#">Station</a> &raquo; <span>Create</span>--></div><!-- breadcrumbs -->

            <div class="span-19">
                <div id="content">

                    <h1><?php echo $title;?></h1>