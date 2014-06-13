<h1>Pictures</h1>
<a href="<?php echo URL; ?>pictures/create">Create New Picture</a>  -  <a href="<?php echo URL; ?>pictures/upload">Upload New Picture</a><br/><br/>
<select id="album-select">
    <option value="0">All albums</option>
    <?php foreach ($this->albums as $album){ ?>
        <option value="<?php echo $album["id"]; ?>"><?php echo $album["name"]; ?></option>
    <?php } ?>
</select>
<br/><br/>
<table id="content-table">
    <tr><td>Id: </td><td>Thumbnail</td><td>Title</td><td>Album</td><td>Description</td><td></td></tr>
    <?php foreach ($this->pictures as $picture) { ?>
        <tr>
            <td><?php echo $picture['id']; ?></td>
            <td><img src="<?php echo $picture['url']; ?>" style="max-width:300px;max-height:200px;"></img></td>
            <td><?php echo $picture['name']; ?></td>
            <td><?php echo $picture['albumName']; ?></td>
            <td><?php echo $picture['description']; ?></td>
            <td width="120px">
                <a href="<?php echo URL; ?>pictures/delete/<?php echo $picture['id']; ?>" class="delete-link"></a>
                <a href="<?php echo URL; ?>pictures/edit/<?php echo $picture['id']; ?>" class="edit-link"></a>
                <a href="<?php echo URL; ?>pictures/down/<?php echo $picture['id']; ?>" class="orderDown-link"></a>
                <a href="<?php echo URL; ?>pictures/up/<?php echo $picture['id']; ?>" class="orderUp-link"></a>
            </td>
        </tr>
    <?php } ?>
</table>
<script type="text/javascript">
    
    $(function(){
        var parts = document.location.href.split("/");
        var albumId = parts[parts.length - 1];
        $("#album-select").val(albumId);
        
        $("#album-select").change(function(){
            document.location.href = "<?php echo URL; ?>pictures/index/" + $(this).val();
        });
    });
    
</script>