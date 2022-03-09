<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>
    <link href="{{ asset('/css/app.css') }}">
    {{ $styles ?? null }}
</head>
<body>

{{ $slot }}

<link href="{{ asset('/js/app.js') }}">
{{ $scripts ?? null }}
</body>
</html>
