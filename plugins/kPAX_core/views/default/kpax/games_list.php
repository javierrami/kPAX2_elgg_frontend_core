<?php
if ($vars['objGameList']) {
    ?>
    <p>&nbsp;</p>
    <h4><?= elgg_echo('kPAX:play'); ?></h4>
    <div class='score' style='border:1px solid #cccccc; padding:5px; padding-left: 12px; text-align:left;width: 220px;'>
        <p><b>Id - Game - Category</b></p>
        <hr>
        <?php
        foreach ($vars['objGameList'] as $game) {
            echo "<p>" . $game->guid . " - " . "<a href=view/" . $game->guid . "> $game->name </a>" . $game->category . "</p>";
        }
        ?>
    </div>
    <?php
}
else { 
	elgg_echo('kPAX:noGames');
}
?> 