<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="app-version" content="{{ config('app.version') }}">
  <link type="image/x-icon" href="/favicon.svg" rel="icon">

  @vite('src/main.ts')
</head>

<body class="antialiased">
  <noscript>
    <strong>
      We're sorry but this app doesn't work properly without JavaScript enabled. Please enable it to continue.
    </strong>
  </noscript>

  <div id="app"></div>
</body>

</html>
