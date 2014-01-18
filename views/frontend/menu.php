<div id="menu">
    menu
    <?php render($this->mainMenu); ?>
</div>



<?php
function render($menus, $parentId = 0, $level = 0) {
    echo '<ul>';
    foreach ($menus as $menu) {
        if ($menu["parentId"] == $parentId) {
            //display stuff

            echo '<li>';
            echo '<a href="' . URL . $menu["alias"] . '">' . $menu["title"] . '</a>';

            if (isset($menu["Children"])) {
                //item has child elements
                render($menu["Children"], $menu["id"], $level + 1);
            }

            echo '</li>';
        }
    }
    echo '</ul>';
}
