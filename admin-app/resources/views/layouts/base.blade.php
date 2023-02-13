<html>
<script src="https://cdn.tailwindcss.com"></script>
<body>
    <nav class="bg-gray-100 px-8 py-4 text-gray-700 flex
     items-center justify-between">
        <span class="font-bold text-2xl">ABC Company</span>
    
            <span> Welcome, @yield('name')</span>
    </nav>
    <section class="p-12 mx-auto max-w-6xl text-gray-800">
        @yield('content')
    </section>
</body>
</html>