<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Facedu - Sineace</title>
</head>
<body>
  <main class="flex min-h-screen">
    <section class="w-1/2 bg-[#D5D6E7] flex flex-col justify-center items-center">
      <img width="300px" src="{{ asset('images/logoUNT.png')}}" alt="logo de la universidad nacional de trujillo">
      <h1 class="text-4xl">GESTOR DE PLANES SINEACE</h1>
      <strong class="text-5xl">FACEDU</strong>
    </section>
    <section class="w-1/2 flex justify-center items-center">
      @yield('content')
    </section>
  </main>
</body>
</html>