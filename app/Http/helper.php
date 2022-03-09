<?php

function user() {
    return auth()->user();
}

function package_path($package , $path,  $config = false) {
    return $config ? base_path("packages/{$package}/{$path}") : base_path("packages/{$package}/src/{$path}");
}
