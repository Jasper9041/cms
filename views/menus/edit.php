<form action="<?php echo URL; ?>menus/saveEdit" method="post">
    <h1>Edit Menu Item</h1>
    <input type="hidden" name="id" value="<?php echo $this->menu['id']; ?>"></input><br/>
    <label>Title: </label><input type="text" name="title" value="<?php echo $this->menu['title']; ?>"></input><br/>
    <label>Parent: </label>
        <select name='parentId'>
            <?php foreach($this->parents as $parent){ ?>
                <?php if($parent['id'] != $this->menu['id']){ ?>
                    <option value="<?php echo $parent['id']; ?>" <?php echo ($parent['id']==$this->menu['parentId'] ? 'selected' : ''); ?> ><?php echo $parent['title']; ?></option>
                <?php } ?>
            <?php } ?>
        </select>
    <br/>
    <label>Alias: </label><input type="text" name="alias" value="<?php echo $this->menu['alias']; ?>"></input><br/>
    <label>Link: </label><input type="text" name="link" value="<?php echo $this->menu['link']; ?>"></input><br/>
    <input type="submit" name="save" value="Save"></input><br/>

</form>