<x-layout>
    <div class="max-w-md mx-auto mt-16 bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-green-600">Login</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="E-mail" required
                   class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
            <input type="password" name="password" placeholder="Senha" required
                   class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-500">

            <button type="submit"
                    class="w-full bg-green-600 text-white p-2 rounded hover:bg-green-700 font-semibold">Entrar</button>
        </form>

        <p class="mt-4 text-center text-gray-600">
            Não tem conta? <a href="{{ route('register.form') }}" class="text-green-600 hover:text-green-800">Registrar</a>
        </p>
    </div>
</x-layout>
