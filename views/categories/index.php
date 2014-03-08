<h1>Categories</h1>
<a href="<?php echo URL; ?>categories/create">Create New Category</a><br/><br/>
<table>
    <tr><td>Id: </td><td>Title: </td><td>Description: </td></tr>
    <?php foreach ($this->categories as $category) { ?>
        <tr>
            <td><?php echo $category['id']; ?></td>
            <td><?php echo $category['name']; ?></td>
            <td><?php echo $category['description']; ?></td>
            <td>
                <a href="<?php echo URL; ?>categories/edit/<?php echo $category['id']; ?>">Edit</a>
            </td>
            <td>
                <a href="<?php echo URL; ?>categories/delete/<?php echo $category['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>