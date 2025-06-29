<!DOCTYPE html>
<html lang="en">
<head><script src="https://static.readdy.ai/static/e.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom PC Builder</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#3B82F6',secondary:'#10B981'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        html{
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-section {
            background-image: url('https://readdy.ai/api/search-image?query=modern%20gaming%20PC%20with%20RGB%20lighting%2C%20glass%20case%2C%20high-end%20components%2C%20professional%20product%20photography%20with%20dramatic%20lighting%2C%20dark%20background%20with%20blue%20and%20purple%20accent%20lighting%2C%20ultra-detailed%20components%2C%20clean%20cable%20management%2C%20premium%20build%20quality&width=1280&height=600&seq=123&orientation=landscape');
            background-size: cover;
            background-position: center;
        }
        .component-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .custom-range {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 5px;
            background: #e5e7eb;
            outline: none;
        }
        .custom-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #3B82F6;
            cursor: pointer;
        }
        .custom-range::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #3B82F6;
            cursor: pointer;
            border: none;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    @include('header')
    @yield('content')
    @include('footer')
</body>
</html>
