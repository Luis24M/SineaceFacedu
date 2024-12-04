<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<style>
  .cabecera {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    width: 100%;
  }
  .logo {
    margin-right: 10px;
    position: absolute;
    left: 0;
  }
  .titulo {
    text-align: center;
    max-width: 500px;
    margin: 0 auto;
  }
  .titulo h1{
    font-size: 20px;
    margin: 0;
  }
  .titulo h2{
    font-size: 15px;
    margin: 0;
  }
</style>
<body>
  <div class="cabecera">
    @php
        $logoBase64 =
            'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/logoUNTletras.png')));
    @endphp
    <img src="{{ $logoBase64 }}" width="100" height="auto" class="logo" alt="logo unt">
    <div class="titulo">
        <h1>UNIVERSIDAD NACIONAL DE TRUJILLO</h1>
        <h2>OFICINA DE LA GESTIÓN DE LA CALIDAD UNIDAD DE ACREDITACIÓN Y LICENCIAMIENTO</h2>
    </div>
</div>
hola aklsjdakjs

</body>
</html>