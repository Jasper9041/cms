<form action="<?php echo URL; ?>menus/saveCreate" method="post">
    <h1>Create New Menu Item</h1>
    <label>Title: </label><input type="text" name="title" value=""></input><br/>
    <label>Parent: </label>
        <select name='parentId'>
            <?php foreach($this->parents as $parent){ ?>
                <option value="<?php echo $parent['id']; ?>"><?php echo $parent['title']; ?></option>
            <?php } ?>
        </select>
    <br/>
    <label>Alias: </label><input type="text" name="alias" value=""></input><br/>
    <label>Link: </label><input type="text" name="link" value=""></input><br/>
    <input type="submit" name="save" value="Save"></input><br/>

</form>