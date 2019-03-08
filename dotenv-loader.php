<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */
// Read .env
try {
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();
} catch (InvalidArgumentException $ex) {
    // Ignore if no dotenv
}


