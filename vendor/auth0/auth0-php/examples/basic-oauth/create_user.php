<?php

if (isset($_REQUEST['create'])) {

    $app_token = getenv('AUTH0_APPTOKEN');
    $domain = getenv('AUTH0_DOMAIN');

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $color = $_REQUEST['color'];

    echo '<pre>';
    $auth0Api = new \Auth0\SDK\Auth0Api($app_token, $domain);

    $response = $auth0Api->users->create([
        'email' => $email,
        'password' => $password,
        'connection' => 'Username-Password-Authentication',
        'user_metadata' => [
            'color' => $color,
        ]
    ]);

    var_dump($response);
    echo '</pre>';
}
?>


<form action="?create-user" method="POST">

    <label for="email">Email</label>
    <input type="email" name="email" id="email" />

    <label for="password">Password</label>
    <input type="password" name="password" id="password" />

    <label for="color">Color</label>
    <input type="color" name="color" id="color" />

    <input type="submit" name="create" value="Create" />

</form>
