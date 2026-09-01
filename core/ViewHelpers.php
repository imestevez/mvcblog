<?php
// file: /core/ViewHelpers.php
/**
* @author imestevez <i.martinezestevez@gmail.com>
*/

/*
* Escapes a value for safe output in the view.
*
* @param mixed $value The value to escape.
* @return string The escaped value.
*/
function e($value) {
	return htmlspecialchars(
		(string) $value,
		ENT_QUOTES | ENT_SUBSTITUTE,
		'UTF-8'
	);
}