<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="app-version" content="{{ config('app.version') }}">

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

  @vite('src/main.ts')
</head>

<body class="antialiased bg-slate-100">
  <noscript>
    <strong>
      We're sorry but this app doesn't work properly without JavaScript enabled. Please enable it to continue.
    </strong>
  </noscript>

  <div id="app"></div>
</body>

</html>
