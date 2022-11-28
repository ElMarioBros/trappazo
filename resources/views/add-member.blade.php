@extends('includes.nav')

@section('content')

<main class="flex items-center justify-center flex-1 px-4 py-8">

<!-- component -->

  <div class="mx-auto w-full max-w-[550px]">
    <div class="flex md:hidden space-x-2 my-3">
      <a href="{{ route('dashboard') }}" class="px-4 py-2 text-center text-white transition-colors bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:outline-none focus:ring focus:ring-yellow-400 focus:ring-offset-2 focus:ring-offset-gray-100 font-bold">Volver </a>
    </div>


    @if (session('success'))
    <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
      <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
      <div>
          <span class="font-medium">{{ session('success') }} </span><a class="underline" href="{{ route('dashboard') }}">Volver a la tabla</a>
      </div>
    </div>

    @endif

    
    <form
        class="py-6 px-9 bg-white"
        action="{{ route('store-member') }}"
        method="POST"
    >
        @csrf
        <div class="mb-5">
          <label
            for="name"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Nombre
          </label>
          <input
            type="text"
            name="name"
            id="name"
            placeholder="Nombre"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
        </div>

        <div class="mb-5">
          <label
            for="phone"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Celular
          </label>
          <input
            type="phone"
            name="phone"
            id="phone"
            placeholder="Celular"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
        </div>


        <div>
          <button
            class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
          >
            Ingresar Usuario
          </button>
        </div>
      </form>
      <a href="{{ route('dashboard') }}" class="hidden md:block text-blue-400 mx-6 my-2 inline-block text-lg"> < Volver</a>

  </div>
</main>
@endsection
