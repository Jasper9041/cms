<form action="<?php echo URL; ?>categories/saveEdit" method="post">
    <h1>Edit Category</h1>
    <input type="hidden" name="id" value="<?php echo $this->category['id']; ?>"></input>
    <label>Name: </label><input type="text" name="name" value="<?php echo $this->category['name']; ?>"></input><br/>
    <label>Description:</label><br/>
    <textarea name="description"><?php echo $this->category['description']; ?></textarea><br/>
    <input type="submit" name="save" value="Save"></input><br/>
</form>