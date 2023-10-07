<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    
                    <!-- Modal toggle -->
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Nuevo registro
                    </button>
                    
                    <!-- Main modal -->
                    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">

                    {{-- FORMULARIO --}}
                            <form class="space-y-6" action="{{route('posts.store')}}" enctype="multipart/form-data" method="POST">
                                @csrf

                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h3>

                        
                           
                                        
                                        {{-- <div class="grid gap-6 mb-6 md:grid-cols-2"> --}}

                                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                                                <input type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" name="title"  required>


                                                
                                                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                                                <textarea id="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..." name="body"></textarea>

                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload file</label>
                                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" type="file" name="image">

                                            
                                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear</button>

                                        {{-- </div> --}}

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                    {{-- TABLA --}}
                    
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID 
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Body
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Fecha
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Accion
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $rows = json_decode($post, true);
                                    foreach ($rows as $row) :
                                @endphp
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="max-w-xs h-auto" src="{{ $row['image_url'] }}" alt="Imagen">
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $row['title'] }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $row['body'] }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $row['created_at'] }}
                                        </td>
                                        <td class="px-6 py-4">
                                                <a href="{{route('posts.destroy', ['id'=>$row['id']])}}" class="ml-auto text-sm font-medium text-red-600 hover:underline dark:text-blue-500">Eliminar</a>
                                        </td>
                                    </tr>
                                @php
                                    endforeach;
                                @endphp
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>