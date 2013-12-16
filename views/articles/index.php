<h1>Articles</h1>
<table>
    <tr><td>Id: </td><td>Title: </td></tr>
    <?php foreach ($this->articles as $article) { ?>
        <tr>
            <td><?php echo $article['id']; ?></td>
            <td><?php echo $article['title']; ?></td>
            <td>
                <a href="<?php echo URL; ?>articles/edit/<?php echo $article['id']; ?>">Edit</a>
            </td>
            <td>
                <a href="<?php echo URL; ?>articles/delete/<?php echo $article['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>