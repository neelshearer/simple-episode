<?php

define("PHPUNIT_TESTING", true);

include_once("../../index.php");

$Wcms = new Wcms();
$Wcms->init();

$SimpleEpisode = new SimpleEpisode(false);
$SimpleEpisode->init();

$requestToken = $_POST['token'] ?? $_GET['token'] ?? null;
if(!$Wcms->loggedIn
    || $_SESSION['token'] !== $requestToken
    || !$Wcms->hashVerify($requestToken))
    die("Please login first.");

if(!isset($_GET["page"])) die("Please specify key and value");

$slug = $Wcms->slugify($_GET["page"]);

if(empty($slug)) die("Please specify all the fields");

$posts = (array)$SimpleEpisode->get("posts");

if(isset($posts[$slug]))
    unset($posts[$slug]);

$SimpleEpisode->set("posts", $posts);

header("location: " . $Wcms->url("../../{$SimpleEpisode->slug}"));

?>
