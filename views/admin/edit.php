<form action="<?php echo URL; ?>articles/saveEdit" method="post">
    <h1>Edit Article</h1>
    <input type="hidden" name="id" value="<?php echo $this->article['id']; ?>"></input><br/>
    <label>Title: </label><input type="text" name="title" value="<?php echo $this->article['title']; ?>"></input><br/>
    <label>Category: </label>
        <select name='category'>
            <?php foreach($this->categories as $category){ ?>
                <option value="<?php echo $category['id']; ?>" <?php echo ($category['id']==$this->article['category'] ? 'selected' : ''); ?> ><?php echo $category['name']; ?></option>
            <?php } ?>
        </select>
    <br/><br/>
    <textarea name="content"><?php echo html_entity_decode($this->article['content']); ?></textarea><br/>
    <input type="submit" name="save" value="Save"></input><br/>

</form>