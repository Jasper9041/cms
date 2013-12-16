<form action="<?php echo URL; ?>articles/saveEdit" method="post">
    <h1>Edit Article</h1>
    <input type="hidden" name="id" value="<?php echo $this->article['id']; ?>"></input>
    <label>Title: </label><input type="text" name="title" value="<?php echo $this->article['title']; ?>"></input><br/>
    <textarea name="content"><?php echo html_entity_decode($this->article['content']); ?></textarea><br/>
    <input type="submit" name="save" value="Save"></input><br/>

</form>