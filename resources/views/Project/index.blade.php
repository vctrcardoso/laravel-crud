<!-- This is an example component -->
@extends('layouts.app')

@section('content')



    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen  flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            @if (isset($empty) == true)
                <div class="flex flex-col">
                    <h1 class="bg-transparent mx-auto text-xl">{{ $empty }}</h1>
                    <a href="{{ route('project.create') }}"
                        class="w-48 mx-auto mt-3 p-2 pl-5 pr-5 bg-transparent border-2 text-center border-green-500 text-green-500 text-lg rounded-lg hover:bg-green-500 hover:text-gray-100 focus:border-4 focus:border-green-300">Criar Projeto</a>
                </div>

            @else
                <div class="w-full lg:w-5/6 -mt-32">
                    @if (session('message'))
                <div class="py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200"
                    role="alert">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
                    <div class="flex">
                        <a href="{{ route('project.create') }}"
                        class="w-48  ml-auto mt-3 p-2 pl-5 pr-5 bg-transparent border-2 text-center border-green-500 text-green-500 text-lg rounded-lg hover:bg-green-500 hover:text-gray-100 focus:border-4 focus:border-green-300">Cadastrar
                        cliente</a>
                    </div>
                    
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Projeto</th>
                                    <th class="py-3 px-6 text-left">Descrição</th>
                                    <th class="py-3 px-6 text-center">Cliente</th>
                                    <th class="py-3 px-6 text-center">Ações</th>
                                </tr>
                            </thead>
                            @foreach ($projects as $project)


                                <tbody class="text-gray-600 text-sm font-light">
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="font-medium">{{ $project->name }}</span>
                                            </div>
                                        </td>

                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="font-medium">{{ $project->description }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center justify-center">
                                                <span class="font-medium">{{ $project->clients->name }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                            
                                                <a href="{{route('project.edit/', $project->id)}}" title="Editar">
                                                    <div class="cursor-pointer w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </div>
                                                </a>
                                                <a href="{{route('project.destroy', $project->id)}}" title="Excluir cliente">
                                                    <div class="cursor-pointer w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>

                            @endforeach
                        </table>
                    </div>
                    {{$projects->links()}}
                </div>
            @endif
        </div>
    </div>
 

@endsection
