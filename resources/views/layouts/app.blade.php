<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Filiprint</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
{{-- Tailwind via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->

<!--<div class="bg-green-500 text-white p-4">
    Se você está vendo este fundo verde, o Tailwind está funcionando ✅
</div>-->

<nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
    <a href="{{ url('/') }}" class="font-bold text-xl text-green-600">FILIPRINT</a>

    <ul class="flex space-x-4 items-center">
        <li><a href="{{ url('/') }}" class="text-gray-700 hover:text-green-600">Home</a></li>
        <li><a href="#" class="text-gray-700 hover:text-green-600">Sobre</a></li>
        <li><a href="#" class="text-gray-700 hover:text-green-600">Contato</a></li>

        @guest
            <li><a href="{{ route('login.form') }}" class="text-green-600 font-semibold hover:text-green-800">Login</a></li>
            <li><a href="{{ route('register.form') }}" class="text-green-600 font-semibold hover:text-green-800">Registrar</a></li>
        @else
            <li class="flex items-center space-x-2">
                <span class="text-gray-700">Olá, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Logout</button>
                </form>
            </li>
        @endguest
    </ul>
</nav>

    <!-- Conteúdo -->
    <main class="flex-fill py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Rodapé -->
    <footer class="bg-dark text-light py-3 mt-auto">
        <div class="container text-center">
            <small>&copy; {{ date('Y') }} Filiprint Blog. Todos os direitos reservados.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
