@extends('layouts.app')

@section('content')


    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">

        <div class="container max-w-screen-lg mx-auto">
            @if (session('message'))
                <div class="py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200"
                    role="alert">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            <form method="POST" action="{{ route('project.store') }}">
                @csrf
                <div>
                    <h2 class="font-semibold text-xl text-gray-600">Cadastro de Projeto</h2>
                    <p class="text-gray-500 mb-6">Formulário para cadastrar novos projetos.</p>

                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-2">

                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label>Nome do Projeto</label>
                                        <input type="text" name="name"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{$project->name}}" />
                                        @error('name')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="md:col-span-5">
                                        <label>Descrição</label>
                                        <textarea class="transition-all flex items-center h-64 resize-none border mt-1 pt-2 rounded px-4 w-full bg-gray-50" name="description" id="" cols="30" rows="10"></textarea>
                                        @error('description')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-2">
                                        
                                        
                                            <label>Cliente</label>
                                            <input type="text" name="name"
                                                class="cursor-not-allowed h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                                value="{{$client->name}}" readonly />
                                            @error('name')
                                                <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        
                                       
                                    </div>

                                    
                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <a href="{{ route('project.index') }}"
                                            class="mt-3 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Voltar</a>
                                    </div>
                                    <div class="inline-flex items-end">
                                        <button type="submit"
                                            class="mt-3 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Salvar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>

@endsection
