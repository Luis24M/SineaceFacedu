<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>


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
<body class="flex">
    <nav class="w-[350px] px-10 py-5 bg-[#D5D6E7] fixed h-screen flex flex-col items-center">
        <section class="flex justify-center items-center">
            <img width="80px" src="{{ asset('images/logoUNT.png') }}" alt="">
            <h2 class="text-3xl">FACEDU</h2>
        </section>
        <section class="flex flex-col jsutify-center items-center py-4 gap-3">
            <img width="180px" src="{{ asset('images/user.png') }}" alt="">
            <h2><strong>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</strong></h2>
            <h3>{{ Auth::user()->email }}</h3>
        </section>
        
        <ul class="flex flex-col h-1/2 py-20">
            <li class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                    <path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                    <path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                    <path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                </svg>
                <a href="{{ route('usuario.home') }}">Main</a>
            </li>
            @if(Auth::user()->rol == 'user')
                @include('partials.sidebar')
            @else @if(Auth::user()->rol == 'adminPrograma')
                @include('partials.sidebarAdminPrograma')
            @else
                @include('partials.sidebarAdmin')
            @endif
            @endif
        </ul>
        <div class="order-last">
            <a class="dropdown-item flex hover:font-bold" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                    <path d="M9 12h12l-3 -3" />
                    <path d="M18 15l3 -3" />
                </svg>
                {{ __('Logout') }}
            </a>
        
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        
    </nav>
    <main class="w-full">
        @yield('content')
    </main>
</body>
</html>