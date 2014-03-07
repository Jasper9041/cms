<form action="<?php echo URL; ?>albums/saveEdit" method="post">
    <h1>Edit Album</h1>
    <input type="hidden" name="id" value="<?php echo $this->album['id']; ?>"></input>
    <label>Name: </label><input type="text" name="name" value="<?php echo $this->album['name']; ?>"></input><br/>
    <textarea name="description"><?php echo html_entity_decode($this->album['description']); ?></textarea><br/>
    <input type="submit" name="save" value="Save"></input><br/>

</form>