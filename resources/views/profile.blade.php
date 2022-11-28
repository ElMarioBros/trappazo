@extends('includes.nav')
@section('content')
<div class="container mx-auto md:my-5 p-5">
    <div class="md:flex no-wrap md:-mx-2 ">
        <!-- Left Side -->
        <div class="w-full md:w-4/12 md:mx-2 lg:3/12 xl:2/12">
            <!-- Profile Card -->
            <div class="bg-white p-3 border-t-4 border-indigo-400 rounded-b-lg">
                <div class="image overflow-hidden rounded-lg">
                    <img class="w-36 rounded-lg h-auto md:w-full mx-auto"
                    src="https://minimaltoolkit.com/images/randomdata/male/{{ rand(1,99) }}.jpg"
                        alt="">
                </div>
                <h1 class="text-gray-900 text-center font-bold text-xl leading-8 my-1">{{ $user->name }}</h1>
                <p class="text-sm text-gray-500 hover:text-gray-600 leading-6"></p>
                <ul
                    class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                    <li class="flex items-center py-3">
                        <span>Estatus</span>
                        <span class="ml-auto"><span
                                class="bg-indigo-500 py-1 px-2 rounded text-white text-sm">Activo</span></span>
                    </li>
                    <li class="flex items-center py-3">
                        <span>Miembro desde</span>
                        <span class="ml-auto">{{ explode(' ', $user->created_at)[0] }}</span>
                    </li>
                </ul>
            </div>
            <!-- End of profile card -->
            <div class="my-4"></div>
        </div>
        <!-- Right Side -->
        <div class="w-full md:w-8/12 md:mx-4 lg:9/12 xl:10/12">
            <!-- Profile tab -->
            <!-- About Section -->
                <div class="w-full mx-auto bg-white shadow-lg rounded-t-lg border border-gray-200">
                    <header class="px-5 py-2 border-b border-gray-100">
                        <h2 class="font-semibold text-gray-800">Trabajos</h2>
                    </header>
                    <div class="p-3">
                        <div class="overflow-x-auto block h-48 md:h-96">
                            <table class="w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Nombre</div>
                                        </th>
                                        <th class="hidden md:table-cell p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Celular</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Monto</div>
                                        </th>
                                        <th class="hidden p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Controles</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://randomuser.me/api/portraits/women/{{ rand(1,99) }}.jpg" width="40" height="40" alt="Alex Shatov"></div>
                                                <div class="font-medium text-gray-800 w-28 truncate">María Rodrigues</div>
                                            </div>
                                        </td>
                                        <td class="hidden md:table-cell p-2 whitespace-nowrap">
                                            <div class="text-left">6436346743</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$890.66</div>
                                        </td>
                                        <td class="hidden p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">??</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://randomuser.me/api/portraits/women/{{ rand(1,99) }}.jpg" width="40" height="40" alt="Alex Shatov"></div>
                                                <div class="font-medium text-gray-800 w-28 truncate">Sandra Alvarado</div>
                                            </div>
                                        </td>
                                        <td class="hidden md:table-cell p-2 whitespace-nowrap">
                                            <div class="text-left">6833671763</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$791.50</div>
                                        </td>
                                        <td class="hidden p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">??</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://randomuser.me/api/portraits/women/{{ rand(1,99) }}.jpg" width="40" height="40" alt="Alex Shatov"></div>
                                                <div class="font-medium text-gray-800 w-28 truncate">Matilda Orozco</div>
                                            </div>
                                        </td>
                                        <td class="hidden md:table-cell p-2 whitespace-nowrap">
                                            <div class="text-left">6413445918</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$1,198.00</div>
                                        </td>
                                        <td class="hidden p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">??</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://randomuser.me/api/portraits/women/{{ rand(1,99) }}.jpg" width="40" height="40" alt="Alex Shatov"></div>
                                                <div class="font-medium text-gray-800 w-28 truncate">Jazmin Morales</div>
                                            </div>
                                        </td>
                                        <td class="hidden md:table-cell p-2 whitespace-nowrap">
                                            <div class="text-left">6239878432</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$696.39</div>
                                        </td>
                                        <td class="hidden p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">??</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://randomuser.me/api/portraits/women/{{ rand(1,99) }}.jpg" width="40" height="40" alt="Alex Shatov"></div>
                                                <div class="font-medium text-gray-800 w-28 truncate">Lidia Lopez</div>
                                            </div>
                                        </td>
                                        <td class="hidden md:table-cell p-2 whitespace-nowrap">
                                            <div class="text-left">6436346743</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$426.25</div>
                                        </td>
                                        <td class="hidden p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">??</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://randomuser.me/api/portraits/women/{{ rand(1,99) }}.jpg" width="40" height="40" alt="Alex Shatov"></div>
                                                <div class="font-medium text-gray-800 w-28 truncate">Areli Gonzalez</div>
                                            </div>
                                        </td>
                                        <td class="hidden md:table-cell p-2 whitespace-nowrap">
                                            <div class="text-left">6436346743</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$291.09</div>
                                        </td>
                                        <td class="hidden p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">??</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://randomuser.me/api/portraits/women/{{ rand(1,99) }}.jpg" width="40" height="40" alt="Alex Shatov"></div>
                                                <div class="font-medium text-gray-800 w-28 truncate">Ana Espinoza</div>
                                            </div>
                                        </td>
                                        <td class="hidden md:table-cell p-2 whitespace-nowrap">
                                            <div class="text-left">6363743623</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$492.62</div>
                                        </td>
                                        <td class="hidden p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">??</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://randomuser.me/api/portraits/women/{{ rand(1,99) }}.jpg" width="40" height="40" alt="Alex Shatov"></div>
                                                <div class="font-medium text-gray-800 w-28 truncate">María Slazar</div>
                                            </div>
                                        </td>
                                        <td class="hidden md:table-cell p-2 whitespace-nowrap">
                                            <div class="text-left">6446436283</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$1,002.00</div>
                                        </td>
                                        <td class="hidden p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">??</div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <!-- End of about section -->

            <div class="my-4"></div>

        </div>
    </div>
</div>

@endsection