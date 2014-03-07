<form action="<?php echo URL; ?>pictures/saveEdit" method="post">
    <h1>Edit Picture</h1>
    <input type="hidden" name="id" value="<?php echo $this->picture['id']; ?>"></input><br/>
    <label>Name: </label><input type="text" name="name" value="<?php echo $this->picture['name']; ?>"></input><br/>
    <label>Album: </label>
        <select name='album'>
            <?php foreach($this->albums as $album){ ?>
                <option value="<?php echo $album['id']; ?>" <?php echo ($album['id']==$this->picture['album'] ? 'selected' : ''); ?> ><?php echo $album['name']; ?></option>
            <?php } ?>
        </select>
    <br/>
    <label>Url: </label><input type="text" name="url" value="<?php echo $this->picture['url']; ?>"></input><br/>
    <textarea name="description"><?php echo html_entity_decode($this->picture['description']); ?></textarea><br/>
    <input type="submit" name="save" value="Save"></input><br/>

</form>