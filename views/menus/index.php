<h1>Menu Items</h1>
<a href="<?php echo URL; ?>menus/create">Create New Menu Item</a><br/><br/>
<table id="content-table">
    <tr><td>Id</td><td>Title</td><td>Alias</td><td>Link</td><td>ParentId</td><td></td><td></td></tr>
    <?php render($this->menus); ?>
</table>

<?php
    
    function render($menus,$parentId = 0,$level = 0){
        $uri = URL;
        foreach ($menus as $menu) {
            $spacer = str_repeat("-", $level)." ";
            if($menu["parentId"] == $parentId){
                //display stuff
                
                $content = <<<CONTENT
                        
                <tr>
                    <td>{$spacer}{$menu['id']}</td>
                    <td>{$menu['title']}</td>
                    <td>{$menu['alias']}</td>
                    <td>{$menu['link']}</td>
                    <td>{$menu['parentId']}</td>
                    <td>
                        <a href="{$uri}menus/edit/{$menu['id']}">Edit</a>
                    </td>
                    <td>
                        <a href="{$uri}menus/delete/{$menu['id']}">Delete</a>
                    </td>
                </tr>
                        
CONTENT;
                echo $content;
                if(isset($menu["Children"])){
                    //item has child elements
                    render($menu["Children"],$menu["id"],$level + 1);
                }
                
                
            }
        }
    }