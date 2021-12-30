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
            <form method="POST" action="{{ route('client.update', $client->id) }}">
                @csrf
                <div>
                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Editar Cliente</p>
                                <p>Alterar dados do cliente.</p>
                            </div>

                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label>Nome Completo</label>
                                        <input type="text" name="name"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{ $client->name }}" />
                                    </div>

                                    <div class="md:col-span-5">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email"
                                            class="h-10 border mt-1 rounded  px-4 w-full bg-gray-50"
                                            value="{{ $client->email }}" />
                                    </div>
                                    <div class="md:col-span-2">
                                        <label>Número de Telefone</label>
                                        <input type="text" name="phone" id="phone"
                                            class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{ $client->phone }}" />
                                    </div>
                                    <div class="md:col-span-5">
                                        <hr class="my-5">
                                    </div>
                                    <div class="md:col-span-1">
                                        <label>CEP</label>
                                        <input type="text" maxlength="9" name="zipcode" id="cep"
                                            class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{ $client->address->zipcode }}" />
                                    </div>
                                    <div class="md:col-span-3">
                                        <label>Rua</label>
                                        <input type="text" name="address" id="logradouro"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{ $client->address->address }}" />
                                    </div>
                                    <div class="md:col-span-1">
                                        <label>Número</label>
                                        <input type="text" name="streetnumber" id="streetnumber"
                                            class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{ $client->address->streetnumber }}" />
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="address">Bairro</label>
                                        <input type="text" name="neighborhood" id="bairro"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{ $client->address->neighborhood }}" />
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="city">Cidade</label>
                                        <input type="text" name="city" id="localidade"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{ $client->address->city }}" />
                                    </div>



                                    <div class="md:col-span-1">
                                        <label>Estado</label>
                                        <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                                            <input name="state" id="uf"
                                                class="px-4 appearance-none text-gray-800 w-full bg-transparent"
                                                value="{{ $client->address->state }}" />

                                        </div>
                                    </div>

                                    <div class="md:col-span-5 text-right">
                                        <div class="inline-flex items-end">
                                            <a href="{{ route('client.index') }}"
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
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.js"
        integrity="sha512-bwanfE29Vxh7VGuxx44U2WkSG9944fjpYRTC3GDUjh0UJ5FOdCQxMJgKWBnlxP5hHKpFJKmawufWEyr5pvwYVA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        /* JqueryMask */
        $('#cep').mask('00000-000');
        $('#phone').mask('(00) 00000-0000')

        /* ViaCep */
        const cep = document.querySelector('#cep')
        const mCEP = (cep) => {
            cep = cep.replace(/\D/g, "");
            cep = cep.replace(/^(\d{5})(\d)/, "$1-$2");

            return cep;
        }
        const show = (result) => {
            for (const input in result) {
                if (document.querySelector("#" + input)) {
                    document.querySelector("#" + input).value = result[input]
                }

            }
        }

        const clear = () => {
            document.getElementById('cep').value = ''
            document.getElementById('logradouro').value = ''
            document.getElementById('localidade').value = ''
            document.getElementById('bairro').value = ''
            document.getElementById('uf').value = ''

        }

        cep.addEventListener("blur", (e) => {

            let search = cep.value.replace("-", "")

            const options = {
                method: 'GET',
                mode: 'cors',
                cache: 'default'
            }

            fetch(`https://viacep.com.br/ws/${search}/json/`, options).then(response => {
                response.json().then(data => show(data))
            }).catch(e => erro, clear())
        })
    </script>
@endsection
