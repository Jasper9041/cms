<h1>Pictures</h1>
<a href="<?php echo URL; ?>pictures/create">Create/Upload New Picture</a><br/><br/>
<table>
    <tr><td>Id: </td><td>Thumbnail: </td><td>Title: </td><td>Album: </td><td>Description: </td></tr>
    <?php foreach ($this->pictures as $picture) { ?>
        <tr>
            <td><?php echo $picture['id']; ?></td>
            <td><img src="<?php echo $picture['url']; ?>"></img></td>
            <td><?php echo $picture['name']; ?></td>
            <td><?php echo $picture['albumName']; ?></td>
            <td><?php echo $picture['description']; ?></td>
            <td>
                <a href="<?php echo URL; ?>pictures/edit/<?php echo $picture['id']; ?>">Edit</a>
            </td>
            <td>
                <a href="<?php echo URL; ?>pictures/delete/<?php echo $picture['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
