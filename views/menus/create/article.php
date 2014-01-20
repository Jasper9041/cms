<form class="rememberData" action="<?php echo URL; ?>menus/saveCreate" method="post">
    <h1>Create New Menu Item</h1>
    <input type="hidden" name="type" value="<?php echo $this->type; ?>">
    <label>Title: </label><input type="text" name="title" value="<?php if(isset($this->menu['title'])) echo $this->menu['title']; ?>"></input><br/>
    <label>Alias: </label><input type="text" name="alias" value="<?php if(isset($this->menu['alias'])) echo $this->menu['alias']; ?>"></input><br/>
    <label>Type: </label>
        <select name='type' id="typeSelect" onchange="typeChangedCreate('<?php echo URL; ?>')">
            <?php foreach($this->types as $typeTMP){ ?>
                <option value="<?php echo $typeTMP; ?>" <?php echo (strtolower($typeTMP) == strtolower($this->type)) ? "selected" : "";  ?> ><?php echo $typeTMP; ?></option>
            <?php } ?>
        </select>
    <br/>
    <label>Article: </label>
    <select name='articleId'>
        <?php foreach($this->data as $article){ ?>
            <option value="<?php echo $article["id"] ?>"><?php echo $article["title"]; ?></option>
        <?php } ?>
    </select>
    <br/>
    <label>Parent: </label>
        <select name='parentId'>
            <?php foreach ($this->parents as $parent) { ?>
                <?php if ($parent['id'] != $this->menu['id']) { ?>
                    <?php if (isset($this->menu)) { ?>
                        <option value="<?php echo $parent['id']; ?>" <?php echo ($parent['id'] == $this->menu['parentId'] ? 'selected' : ''); ?> ><?php echo $parent['title']; ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $parent['id']; ?>"><?php echo $parent['title']; ?></option>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </select>
    <br/>
    <input type="submit" name="save" value="Save"></input><br/>
</form>
