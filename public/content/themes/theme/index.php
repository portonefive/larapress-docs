<?php

/*----------------------------------------------------*/
// Run application.
/*----------------------------------------------------*/

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();
$kernel->terminate($request, $response);
