<?php

function debugstop($variable) : string {
	echo "<pre>";
	var_dump($variable);
	echo "</pre>";
	exit;
}

function debug($variable) {
	echo "<pre>";
	var_dump($variable);
	echo "</pre>";
}

// Escapa / Sanitizar el HTML
function sanitizeHTML($html) : string {
	$s = htmlspecialchars($html);
	return $s;
}

// Redireccionar a una url
function redirect($url){
	header("Location: " . $_ENV['HOST'] . $url);
}