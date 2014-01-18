<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo (isset($this->title) ? $this->title : 'CMS Admin Panel') ?></title>
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea"
            });
        </script>
        <?php
            foreach ($this->_headerData as $data){
                echo $data;
            }
        ?>
    </head>
    <body>
        <div id="navigation">
            <ul style="list-style-type: none;margin: 0;padding: 0;">
                <li style="display: inline;padding-right:15px;"><a href="<?php echo URL; ?>admin/">Control Panel</a></li>
                <li style="display: inline;padding-right:15px;"><a href="<?php echo URL; ?>articles/">Article Manager</a></li>
                <li style="display: inline;padding-right:15px;"><a href="<?php echo URL; ?>categories/">Article Category Manager</a></li>
                <li style="display: inline;padding-right:15px;"><a href="<?php echo URL; ?>menus/">Menu Item Manager</a></li>
                <li style="display: inline;padding-right:15px;">  ---  </li>
                <li style="display: inline;"><a href="<?php echo URL; ?>logout/logout/">Logout</a></li>
            </ul>
        </div>
