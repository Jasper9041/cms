<form action="<?php echo URL; ?>menus/saveCreate" method="post">
    <h1>Create New Menu Item</h1>
    <input type="hidden" name="type" value="<?php echo $this->type; ?>">
    <label>Title: </label><input type="text" name="title" value=""></input><br/>
    <label>Alias: </label><input type="text" name="alias" value=""></input><br/>
    <label>Type: </label>
        <select name='type' id="typeSelect" onchange="typeChanged('<?php echo URL; ?>menus/create/')">
            <?php foreach($this->types as $typeTMP){ ?>
                <option value="<?php echo $typeTMP; ?>" <?php echo (strtolower($typeTMP) == strtolower($this->type)) ? "selected" : "";  ?> ><?php echo $typeTMP; ?></option>
            <?php } ?>
        </select>
    <br/>
    <?php
        switch ($this->type){
            case null:
                echo '<label>Link: </label><input type="text" name="link" value=""></input><br/>';
                break;
            case "":
                echo '<label>Link: </label><input type="text" name="link" value=""></input><br/>';
                break;
            case "link":
                echo '<label>Link: </label><input type="text" name="link" value=""></input><br/>';
                break;
            case "archive":
                echo "<label>Category: </label>";
                echo "<select name='categoryId'>";
                foreach($this->data as $category){
                    echo '<option value="' . $category["id"] . '">' . $category["name"] . '</option>';
                }
                echo "</select>";
                echo "<br/>";
                break;
                
            case "article":
                echo "<label>Article: </label>";
                echo "<select name='articleId'>";
                foreach($this->data as $article){
                    echo '<option value="' . $article["id"] . '">' . $article["title"] . '</option>';
                }
                echo "</select>";
                echo "<br/>";
                break;
                
        }
    ?>
    <label>Parent: </label>
        <select name='parentId'>
            <?php foreach($this->parents as $parent){ ?>
                <option value="<?php echo $parent['id']; ?>"><?php echo $parent['title']; ?></option>
            <?php } ?>
        </select>
    <br/>
    <input type="submit" name="save" value="Save"></input><br/>

</form>
