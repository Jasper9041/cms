<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo (isset($this->title) ? $this->title : 'CMS Admin Panel') ?></title>
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" src="<?php echo URL; ?>libs/tinymce/tinymce.min.js"></script>
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

