<x-layout>
    <div class="max-w-md mx-auto mt-16 bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-green-600">Registrar</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <input type="text" name="name" placeholder="Nome" required
                   class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
            <input type="email" name="email" placeholder="E-mail" required
                   class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
            <input type="password" name="password" placeholder="Senha" required
                   class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
            <input type="password" name="password_confirmation" placeholder="Confirmar Senha" required
                   class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-500">

            <button type="submit"
                    class="w-full bg-green-600 text-white p-2 rounded hover:bg-green-700 font-semibold">Registrar</button>
        </form>

        <p class="mt-4 text-center text-gray-600">
            Já tem conta? <a href="{{ route('login.form') }}" class="text-green-600 hover:text-green-800">Login</a>
        </p>
    </div>
</x-layout>
