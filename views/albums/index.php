<h1>Albums</h1>
<a href="<?php echo URL; ?>albums/create">Create New Album</a><br/><br/>
<table id="content-table">
    <tr><td>Id</td><td>Name</td><td>Description</td><td></td><td></td></tr>
    <?php foreach ($this->albums as $album) { ?>
        <tr>
            <td><?php echo $album['id']; ?></td>
            <td><?php echo $album['name']; ?></td>
            <td><?php echo $album['description']; ?></td>
            <td>
                <a href="<?php echo URL; ?>albums/edit/<?php echo $album['id']; ?>">Edit</a>
            </td>
            <td>
                <a href="<?php echo URL; ?>albums/delete/<?php echo $album['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
