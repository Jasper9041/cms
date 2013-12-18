<form action="<?php echo URL; ?>articles/saveCreate" method="post">
    <h1>Create Article</h1>
    <label>Title: </label><input type="text" name="title" value=""></input><br/>
    <label>Category: </label>
        <select name='category'>
            <?php foreach($this->categories as $category){ ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php } ?>
        </select>
    <br/><br/>
    <textarea name="content"></textarea><br/>
    <input type="submit" name="save" value="Save"></input><br/>

</form>