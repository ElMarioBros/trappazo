<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trappazo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <!-- component -->
    <div class="h-screen md:flex">
        <div class="hidden md:flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center">
          <div>
            <h1 class="text-white font-bold text-4xl font-sans">TRAPPAZO</h1>
            <p class="text-white mt-1">Inicia sesión ahora y comienza a generar ingresos.</p>
            <button type="submit" class="block w-32 bg-white text-indigo-800 mt-4 py-2 rounded-2xl font-bold mb-2">Contáctanos</button>
          </div>
        </div>
        <h1 class="md:hidden text-center text-4xl my-8 font-bold tracking-widest">TRAPPAZO</h1>
        <div class="flex md:w-1/2 justify-center items-center bg-white">
          <form method="POST" action="{{ route('login-attempt') }}" class="bg-white">
            @csrf
            <h1 class="text-gray-800 text-2xl mt-8 mb-3">Bienvenido</h1>
            <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
              </svg>
              <input class="pl-2 outline-none border-none" type="text" name="username" id="username" placeholder="Usuario" />
            </div>
            <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
              <input class="pl-2 outline-none border-none" type="password" name="password" id="password" placeholder="Contraseña" />
            </div>
            <button type="submit" class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Iniciar Sesión.</button>
            <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Contácta a Nodo Cero</span>
          </form>
        </div>
      </div>
</body>
</html>