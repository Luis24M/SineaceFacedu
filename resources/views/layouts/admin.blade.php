<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #documento, #documento * {
                visibility: visible;
            }
            #documento {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
        .page {
            font-family: 'Times New Roman', Times, serif;
            background: white;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
            margin: 0 auto;
            margin-bottom: 0.5cm;
            width: 21cm;
            min-height: 29.7cm;
            padding: 1cm 2cm;
            position: relative;
        }

        .page-header {
            position: running(header);
            width: 100%;
            height: 2cm;
            /* padding: 0.5cm; */
            border-bottom: 4px solid #000;
        }

        @page {
            size: A4;
            margin: 0;
            @top-center {
                content: element(header);
            }
        }

        .zoom-controls {
            position: fixed;
            bottom: 20px;
            right: 520px;
            background: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .page-navigation {
            position: fixed;
            bottom: 20px;
            left: 370px;
            background: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .page-preview {
            position: fixed;
            left: 370px;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .preview-thumbnail {
            width: 100px;
            height: 141px;
            border: 1px solid #ddd;
            margin: 5px 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .preview-thumbnail:hover {
            transform: scale(1.05);
        }

        .preview-thumbnail.active {
            border: 2px solid #4CAF50;
        }
    </style>
    <title>FACEDU - SINEACE</title>
</head>
<body class="h-full grid grid-cols-12">
    <!-- Barra lateral -->
    <nav class="px-10 py-5 bg-[#D5D6E7] h-screen min-w-[250px] lg:w-2/12 fixed top-0 left-0 z-40 flex flex-col items-center transform -translate-x-full transition-transform duration-300 lg:translate-x-0 "
        id="sidebar">
        @include('partials.sidebarAdmin')
    </nav>

    <!-- Contenido principal -->
    <main class="lg:col-start-3 lg:col-span-10 col-span-12 ml-auto w-full flex flex-col p-5">
        @yield('content')
    </main>
</body>

</html>