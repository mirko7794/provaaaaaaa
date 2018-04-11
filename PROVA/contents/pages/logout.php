<?php
$_SESSION['user']['id'] = '';
$_SESSION['user']['email'] = '';
$_SESSION['user']['username'] = '';
$_SESSION['user']['nome_visualizzato'] = '';
$_SESSION['user']['priority'] = 0;
redirect('login');