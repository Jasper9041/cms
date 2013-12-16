<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo (isset($this->title) ? $this->title : 'CMS Admin Panel') ?></title>
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" src="<?php echo URL; ?>libs/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea"
            });
        </script>
    </head>
    <body>

