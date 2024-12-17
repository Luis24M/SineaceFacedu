<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin-top: 100px;
        }

        #header {
            position: fixed;
            top: -70px;
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

        .titulo h1 {
            font-size: 20px;
            margin: 0;
        }

        .titulo h2 {
            font-size: 15px;
            margin: 0;
        }

        #body {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #6b7280;
            margin-bottom: 20px;
        }

        table thead tr {
            background-color: #002060;
            color: white;
        }

        table th, table td {
            border: 1px solid #6b7280;
            padding: 8px;
            text-align: center;
        }

        #cuerpo {
            text-align: justify;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        ul {
            padding-left: 30px;
        }

        ul li {
            list-style-type: disc;
        }

        .content-block {
            padding: 10px;
        }

    </style>
</head>

<body>
    <div id="header">
        @php
            $logoBase64 =
                'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/logoUNTletras.png')));
        @endphp
        <img src="{{ $logoBase64 }}" width="100" height="auto" class="logo" alt="logo unt">
        <div class="titulo">
            <h1>UNIVERSIDAD NACIONAL DE TRUJILLO</h1>
            <h2>OFICINA DE LA GESTIÓN DE LA CALIDAD UNIDAD DE ACREDITACIÓN Y LICENCIAMIENTO</h2>
        </div>
        <hr style="width: 100%;">
    </div>
    <div id="body">
        <h3><strong>Programa de estudios: </strong>{{ Auth::user()->subcomite->programa->nombre }}</h3>
        <h3><strong>Fecha de actualización: </strong>{{ date('d / m / Y') }}</h3>
        <br>
        <table>
            <thead>
                <tr>
                    <th colspan="3">MODELO DE ACREDITACIÓN SINEACE-2016</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $estandar->infoEstandar->dimension }}</td>
                    <td>{{ $estandar->infoEstandar->factor }}</td>
                    <td>Estandar {{ $estandar->infoEstandar->indice }}</td>
                </tr>
                <tr>
                    <td colspan="3" id="cuerpo">
                        <strong>{{ $estandar->infoEstandar->indice }}. {{ $estandar->infoEstandar->titulo }}</strong>
                        <p>{{ $estandar->infoEstandar->descripcion }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" id="cuerpo">
                        <h2 class="section-title">1. Redacción de la contextualización</h2>
                        <div class="content-block">
                            <p>
                                {!! $narrativa->misionUNT !!}
                            </p>
                            <p>
                                {!! $narrativa->misionFacultad !!}
                            </p>
                            <p>
                                {!! $narrativa->misionPrograma !!}
                            </p>
                            @if($problematicas === null)
                            <p>No se encontraron brechas</p>
                            @else
                            @foreach ($problematicas as $problematica)
                            <p>{{ $problematica->description }}</p> <br>
                            @endforeach
                            @endif
                        </div>
                        <h2 class="section-title">2. Brechas (dificultades encontradas)</h2>
                        <ul>
                            @if($problematicas === null)
                            <p>No se encontraron brechas</p>
                            @else
                            @foreach ($problematicas as $problematica)
                            <li>{{ $problematica->nombre }}</li>
                            @endforeach
                            @endif
                        </ul>
                        <h2 class="section-title">3. Plan de mejora (indicar si la acción de mejora se podrá elaborar a corto, mediano o largo plazo)</h2>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
