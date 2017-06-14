<?php

require 'rb.php';
R::setup( 'mysql:host=localhost;dbname=apartment',
    'root', 'root' );
R::debug(false);