@extends('layouts.app')

@section('content')
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            
            <div>
                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Detalhes do cliente</p>
                            <p>Todas as informações do cliente.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <label>Nome Completo</label>
                                    <input type="text" name="name" readonly
                                        class="cursor-not-allowed outline-none h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                        value="{{ $client->name }}" />
                                </div>

                                <div class="md:col-span-5">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" readonly
                                        class=" cursor-not-allowed outline-none h-10 border mt-1 rounded  px-4 w-full bg-gray-50"
                                        value="{{ $client->email }}" />
                                </div>
                                <div class="md:col-span-2">
                                    <label>Número de Telefone</label>
                                    <input type="text" name="phone" id="phone" readonly
                                        class="cursor-not-allowed transition-all outline-none flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                        value="{{ $client->phone }}" />
                                </div>
                                <div class="md:col-span-5">
                                    <hr class="my-5">
                                </div>
                                <div class="md:col-span-1">
                                    <label>CEP</label>
                                    <input type="text" maxlength="9" name="zipcode" id="cep" readonly
                                        class="cursor-not-allowed transition-all outline-none flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                        value="{{ $client->address->zipcode }}" />
                                </div>
                                <div class="md:col-span-3">
                                    <label>Rua</label>
                                    <input type="text" name="address" id="logradouro" readonly
                                        class="cursor-not-allowed h-10 border mt-1 outline-none rounded px-4 w-full bg-gray-50"
                                        value="{{ $client->address->address }}" />
                                </div>
                                <div class="md:col-span-1">
                                    <label>Número</label>
                                    <input type="text" name="streetnumber" id="streetnumber" readonly
                                        class="cursor-not-allowed transition-all outline-none flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                        value="{{ $client->address->streetnumber }}" />
                                </div>
                                <div class="md:col-span-2">
                                    <label for="address">Bairro</label>
                                    <input type="text" name="neighborhood" id="bairro" readonly
                                        class="cursor-not-allowed h-10 border mt-1 outline-none rounded px-4 w-full bg-gray-50"
                                        value="{{ $client->address->neighborhood }}" />
                                </div>
                                <div class="md:col-span-2">
                                    <label for="city">Cidade</label>
                                    <input type="text" name="city" id="localidade" readonly
                                        class="cursor-not-allowed h-10 border mt-1 outline-none rounded px-4 w-full bg-gray-50"
                                        value="{{ $client->address->city }}" />
                                </div>



                                <div class="md:col-span-1">
                                    <label>Estado</label>
                                    <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                                        <input name="state" id="uf" readonly
                                            class="cursor-not-allowed px-4 appearance-none outline-none text-gray-800 w-full bg-transparent"
                                            value="{{ $client->address->state }}" />

                                    </div>
                                </div>

                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <a href="{{ route('client.index') }}"
                                            class="mt-3 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Voltar</a>
                                    </div>
                                    <div class="inline-flex items-end">
                                        <a href="{{ route('client.edit/', $client->id) }}"
                                            class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.js"
        integrity="sha512-bwanfE29Vxh7VGuxx44U2WkSG9944fjpYRTC3GDUjh0UJ5FOdCQxMJgKWBnlxP5hHKpFJKmawufWEyr5pvwYVA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        /* JqueryMask */
        $('#cep').mask('00000-000');
        $('#phone').mask('(00) 00000-0000')
    </script>
@endsection
