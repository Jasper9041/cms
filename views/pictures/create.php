<form action="<?php echo URL; ?>pictures/saveCreate" method="post">
    <h1>Create Picture</h1>
    <label>Name: </label><input type="text" name="name" value=""></input><br/>
    <label>Album: </label>
        <select name='album'>
            <?php foreach($this->albums as $album){ ?>
                <option value="<?php echo $album['id']; ?>"><?php echo $album['name']; ?></option>
            <?php } ?>
        </select>
    <br/>
    <label>Url: </label><input type="text" name="url" value=""></input><br/>
    <textarea name="description"></textarea><br/>
    <input type="submit" name="save" value="Save"></input><br/>

</form>