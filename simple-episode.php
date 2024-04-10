<?php

global $Wcms;

include_once("class.SimpleEpisode.php");

$SimpleEpisode = new SimpleEpisode(true);
$SimpleEpisode->init();
$SimpleEpisode->attach();

?>
