@extends('includes.nav')
@section('content')

    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
      <div class="mx-2 w-full max-w-[550px]">
        <form action="#" method="get">
              <div class="mb-5">
                  <label
                    for="user"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                  >
                    Usuario
                  </label>
                  <input
                    type="text"
                    name="user"
                    id="user"
                    placeholder="Usuario"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                  />
                </div>
                <div class="mb-5">
                  <label
                  for="password"
                  class="mb-3 block text-base font-medium text-[#07074D]"
                  >
                  Contraseña
                  </label>
                  <input
                  type="text"
                  name="password"
                  id="password"
                  placeholder="Contraseña"
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
                  type="tel"
                  name="phone"
                  id="phone"
                  placeholder="Celular"
                  min="10"
                  class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
              />
              </div>
    
    
          <div class="inline-block">
              <button
                class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
              >
                Actualizar
              </button>
          </div>
          <a href="{{ route('my-profile') }}" class="text-blue-400 mx-8 inline-block">Volver</a>
        </form>
      </div>

@endsection