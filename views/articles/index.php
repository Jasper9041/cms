<h1>Articles</h1>
<a href="<?php echo URL; ?>articles/create">Create New Article</a><br/><br/>
<table id="content-table">
    <tr><td>Id</td><td>Title</td><td>Category</td><td></td></tr>
    <?php foreach ($this->articles as $article) { ?>
        <tr>
            <td><?php echo $article['id']; ?></td>
            <td><?php echo $article['title']; ?></td>
            <td><?php echo $article['categoryName']; ?></td>
            <td width="60px">
                <a href="<?php echo URL; ?>articles/delete/<?php echo $article['id']; ?>" class="delete-link"></a>
                <a href="<?php echo URL; ?>articles/edit/<?php echo $article['id']; ?>" class="edit-link"></a>
            </td>
        </tr>
    <?php } ?>
</table>