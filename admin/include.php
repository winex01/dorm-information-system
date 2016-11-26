<?php 
$include = glob('include/*.php');
foreach ($include as $i) {
	include_once($i);
}

