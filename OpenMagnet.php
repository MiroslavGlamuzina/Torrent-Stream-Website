<?php
/**
 * Created by PhpStorm.
 * User: miroslav
 * Date: 17/02/16
 * Time: 8:59 PM
 */
$MAGNET = $_GET['magnet'];
shell_exec("nodejs app.js '".$MAGNET."' --webplay");
