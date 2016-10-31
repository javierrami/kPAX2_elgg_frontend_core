


<?php

$title = elgg_echo('kpax:all');

elgg_register_title_button();

$content = elgg_list_entities(array(
    'types' => 'object',
    'subtypes' => 'kpax',
    'limit' => 10,
    'full_view' => false,
        ));
if (!$content) {
    $content = '<p>' . elgg_echo('kpax:none') . '</p>';
}

$body = elgg_view_layout('content', array(
    'filter_context' => 'all',
    'content' => $content,
    'title' => $title,
    'sidebar' => elgg_view('kpax/sidebar'),
        ));

echo elgg_view_page($title, $body);



?>

//NO TINC CLAR QUÈ HA D'ANAR AQUÍ

/*
$title = elgg_echo('kpax:all');

$content = elgg_list_entities(array(
    'types' => 'object',
    'subtypes' => 'kpax',
    'limit' => 10,
    'full_view' => false,
        ));
if (!$content) {
    $content = '<p>' . elgg_echo('kpax:none') . '</p>';
}

$body = elgg_view_layout('content', array(
    'filter_context' => 'play',
    'content' => $content,
    'title' => $title,
    'sidebar' => elgg_view('kpax/sidebar'),
        ));

//NOU
//Begin Author: rviguera
//GETTING THE GAME LIST FROM SRVKPAX

$objKpax = new kpaxSrv(elgg_get_logged_in_user_entity()->username);

//Parameters
$idFilterer = $_SESSION['gameListFilter'];
$idOrderer = $_SESSION['gameListOrder'];
$fields = $_SESSION['gameListFields'];
$values = $_SESSION['gameListValues'];

if(!isset($idFilterer))
{
    $idFilterer = 0; //Default filterer: do not filter.
    $_SESSION['gameListFilter'] = $idFilterer;
}
if(!isset($idOrderer))
{
    $idOrderer = 0; //Default orderer: do not order.
    $_SESSION['gameListOrder'] = $idOrderer;
}
if(!isset($fields))
{
    $fields = array(); //Default fields array: no fields.
    $values = array(); //Default fields array: no fields.

    $_SESSION['gameListFields'] = $fields;
    $_SESSION['gameListValues'] = $values;
}

$gameList = $objKpax->getListGames($_SESSION["campusSession"], $idOrderer, $idFilterer, $fields, $values);
if(isset($gameList))
{
    system_message(elgg_echo('kpax:list:success'));
    /*
     * Adding the gameIds to the elgg list.
     * 
     * Forcing elgg to list the games in the same
     * order as gotten from srvKpax. Not by default
     * elgg order (time_created desc).
     */
  /*  $where = array();
    $orderBy = ' CASE ';
    for($i = 0, $size = sizeof($gameList); $i < $size; ++$i)
    {
        $idGame = $gameList[$i]->idGame;
        
        $where[] = $idGame;
        $orderBy = $orderBy . " WHEN e.guid = " . $idGame . " THEN " . ($i + 1);
    }
    $options = array_merge($options, array('guids' => $where));
    $orderBy = $orderBy . " END ";
    $options = array_merge($options, array('order_by' => $orderBy));
}
else
    register_error(elgg_echo('kpax:list:failed'));

//LISTING THE GAMES. All games by default when srvKpax fails.
$content = elgg_list_entities($options);

if (!$content) {
    $content = '<p>' . elgg_echo('kpax:none') . '</p>';
}

$body = elgg_view_layout('content', array(
    'filter_context' => 'all',
    'content' => $content,
    'title' => $title,
    'sidebar' => elgg_view('kpax/sidebar'),
        ));
echo elgg_view('input/hidden', array('name' => 'container_guid', 'value' => $container_guid));
//FI NOU

echo elgg_view_page($title, $body);
*/
?>
