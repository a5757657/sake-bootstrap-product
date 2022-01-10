<?php
require __DIR__ . '/parts/__connect_db.php';

$event_id = isset($_GET['event_id']) ? $_GET['event_id'] : '';

$pdo->query("DELETE FROM `event` WHERE `event_id` IN ($event_id)");

$come_from = $_SERVER['HTTP_REFERER'] ?? 'event.php';

header("Location: $come_from");
