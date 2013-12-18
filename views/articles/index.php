<h1>Articles</h1>
<a href="<?php echo URL; ?>articles/create">Create New Article</a><br/><br/>
<table>
    <tr><td>Id: </td><td>Title: </td><td>Category: </td></tr>
    <?php foreach ($this->articles as $article) { ?>
        <tr>
            <td><?php echo $article['id']; ?></td>
            <td><?php echo $article['title']; ?></td>
            <td><?php echo $article['category']; ?></td>
            <td>
                <a href="<?php echo URL; ?>articles/edit/<?php echo $article['id']; ?>">Edit</a>
            </td>
            <td>
                <a href="<?php echo URL; ?>articles/delete/<?php echo $article['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>