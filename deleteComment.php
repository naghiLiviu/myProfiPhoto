<?php
use Utils\Db;
$commentId = $_GET["commentId"];
$topicId = $_GET["topicId"];
$mysqli->query("UPDATE Comment SET CommentStatus='Deleted' WHERE CommentId=$commentId");
header("Location: comment.php?topicId=$topicId");