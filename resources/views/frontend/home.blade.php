<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preload" href="assets/fonts/Pixelar Regular.woff2" as="font" crossorigin="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Welcome to gotchiminer ⛏️</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.6.1-rc.0/web3.min.js" integrity="sha512-+4Gl8sbHe5qD5EQiPtIva4be9TwUmmzgYJUdGbhsLYNegQw4Quda/4QdZpJzx8cHq2s1F4PoIpAnERQ0hHTcNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/phaser/3.55.2/phaser.min.js" integrity="sha512-kg6fSrg6FkD9Ua02PzuA289KatVkTp6HdiFrSKwnz1bKBeKe5JG54rNeYZeghYO/I4ka49rb9H/9Ezcq9Se3iQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/moralis/dist/moralis.js"></script>
    <script src="{{ asset('js/home.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" deref/>

</head>
<body>
<div id="phaser-wrapper">
    <img src="assets/images/logo.png" id="logo" />
    <button id="start-btn" hidden>Sign in</button>
</div>

</body>
</html>
