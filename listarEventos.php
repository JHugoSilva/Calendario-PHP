<?php
require_once('conexao.php');

$eventsQuery = "SELECT id, title, color, start, end FROM events";
$eventsResult = $db->prepare($eventsQuery);
$eventsResult->execute();

$events = [];

while($eventsRows = $eventsResult->fetch(PDO::FETCH_ASSOC)):
    $id = $eventsRows['id'];
    $title = $eventsRows['title'];
    $color = $eventsRows['color'];
    $start = $eventsRows['start'];
    $end = $eventsRows['end'];

    $events[] = [
        'id'=>$id,
        'title'=>$title,
        'color'=>$color,
        'start'=>$start,
        'end'=>$end
    ];
endwhile;

echo json_encode($events);