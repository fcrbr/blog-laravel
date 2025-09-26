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
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Logoute</button>
                </form>
            </li>
        @endguest
    </ul>
</nav>
