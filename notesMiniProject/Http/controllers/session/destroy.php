<?php

$auth = new \Core\Authenticator();
$auth->logout();

redirect('/');
