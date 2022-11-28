@extends('includes.nav')

@section('content')


<main class="flex items-center justify-center flex-1 px-4 py-8">

    <div class="flex flex-col">
        
        <div class="flex space-x-2 my-3">
            <a href="{{ route('add-member') }}" class="w-full px-4 py-2 text-center text-white transition-colors bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-2 focus:ring-offset-gray-100">
                <span class="font-bold" >
                    &plus;
                </span>
                Agregar usuario 
            </a>
        </div>

        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-scroll overflow-x-hidden">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700 block h-96">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Nombre
                                </th>
                                <th scope="col" class="hidden md:table-cell py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Ingreso
                                </th>
                                <th scope="col" class="hidden md:table-cell py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Celular
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Controles
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($members as $member)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white truncate hover:text-clip active:text-clip" style="max-width: 15em">{{ $member->name }}</td>
                                    <td class="hidden md:table-cell py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $member->created_at }}</td>
                                    <td class="hidden md:table-cell py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $member->phone }}</td>
                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">

                                        @if ($member->state == "unchanged")
                                            <button id="copy-button" onclick="copyContent('{{ $member->username }}', '{{ $member->temp_password }}')" class="inline-block text-blue-600 dark:text-blue-500 hover:underline active:bg-gray-300 rounded-full active:-translate-y-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy m-1 w-5 h-5 lg:w-9 lg:h-9" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#727d71" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <rect x="8" y="8" width="12" height="12" rx="2" />
                                                    <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" />
                                                </svg>
                                            </button>
                                        @endif

                                        <a href="{{ route('profile',$member->id) }}" class="text-center inline-block text-blue-600 dark:text-blue-500 hover:underline active:bg-gray-300 rounded-full active:-translate-y-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user m-1 w-5 h-5 lg:w-9 lg:h-9" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#5a189a" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <circle cx="12" cy="7" r="4" />
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            </svg>
                                        </a>

                                    </td>
                                </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    


</main>
<script>

    const copyContent = async (user,pass) => {
        let textCopy = "Nombre de usuario: " + user + "\n" + "Contraseña de usuario: " + pass;
        try {
        await navigator.clipboard.writeText(textCopy);
        console.log('Contenido copiado');
        } catch (err) {
        console.error('Error al copiar: ', err);
        }
    }

</script>

@endsection