<?php

	if (session_status() == PHP_SESSION_NONE) 
	{
    	session_start();
	}

	include 'lib/http_request.php';
	include 'lib/tests.php';
	include 'lib/data.php';
	head();