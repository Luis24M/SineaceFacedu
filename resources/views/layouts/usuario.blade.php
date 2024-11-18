<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>FACEDU - SINEACE</title>
</head>
<body class="flex">
  <nav class="w-[350px] px-10 py-5 bg-[#D5D6E7] fixed h-screen flex flex-col items-center">
    @include('partials.sidebar')
  </nav>
  <main class="w-full">
    @yield('content')
  </main>
</body>
</html>