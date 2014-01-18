<?php
    foreach($this->articles as $article){
        echo "<h1>" . html_entity_decode($article["title"]) . "</h1>";
        echo html_entity_decode($article["content"]);
        echo '<br/>'; //optional
    }
?>