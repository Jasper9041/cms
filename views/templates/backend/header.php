<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo (isset($this->title) ? $this->title : 'CMS Admin Panel') ?></title>
        <link rel="stylesheet" href="<?php echo URL; ?>views/templates/backend/css/backend.css" />
        <link href="//fonts.googleapis.com/css?family=Muli:300italic,300,400italic,400" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <?php
            foreach ($this->_headerData as $data){
                echo $data;
            }
        ?>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea"
            });
        </script>
    </head>
    <body>
        <table id="body-table">
            <tr id="body-table">
                <td id="menu">
                    <h1>Admin Panel</h1>
                    <div id="navigation">
                        <ul>
                            <li><a href="<?php echo URL; ?>admin/">Control Panel</a></li>
                            <li><a href="<?php echo URL; ?>articles/">Article Manager</a></li>
                            <li><a href="<?php echo URL; ?>categories/">Article Category Manager</a></li>
                            <li><a href="<?php echo URL; ?>menus/">Menu Item Manager</a></li>
                            <li><a href="<?php echo URL; ?>pictures/">Pictures Manager</a></li>
                            <li><a href="<?php echo URL; ?>albums/">Albums Manager</a></li>
                            <li> <a></a>  </li>
                            <li><a href="<?php echo URL; ?>" target="_BLANK">View Site</a></li>
                            <li><a href="<?php echo URL; ?>logout/logout/">Logout</a></li>
                        </ul>
                    </div>
                </td>
                <td id="content">
                
            
