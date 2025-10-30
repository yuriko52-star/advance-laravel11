<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <!-- <style> 
        body {
            font-size: 16px;
            margin: 5px;
        }
        h1 {
            font-size: 60px;
            color: white;
            text-shadow: 1px 0 5px #289adc;
            letter-spacing: -4px;
            margin-left: 10px;
        }
        .content {
            margin: 10px;
        }
    </style>
    -->
</head>
<body class="bg-gray-50 text-gray-800">
    <header class="bg-blue-500 text-white p-5 shadow-md">
        <h1 class="text-5xl font-bold">@yield('title')</h1>
    </header>
    <main class="p-6">
    <div class="content">
        @yield('content')
    </div>
    </main>
</body>
</html>