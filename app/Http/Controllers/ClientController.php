<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::paginate(5);
        if (count($clients) == 0 ){
            $empty = 'Não há nenhum cliente cadastrado.';

            return view('Client.index', compact('empty'));
        }

        return view('Client.index', compact('clients'));
        
    }

    public function create (){
        return view('Client.create');
    }

    public function view($id) {

        $client = Client::find($id);
        return view('Client.view', compact('client'));
    }
    public function edit($id) {

        $client = Client::find($id);
        return view('Client.edit', compact('client'));
    }

    public function store(ClientRequest $request){
        $data = $request->validated();
     

        
        $client = Client::create([
            'name' => $data['name'],
            'email' =>$data['email'],
            'phone' =>$data['phone'],
        ]);

        $client->address()->create([
            'address' => $data['address'],
            'streetnumber' =>  $data['streetnumber'],
            'neighborhood' =>  $data['neighborhood'],
            'zipcode' => $data['zipcode'],
            'city' => $data['city'],
            'state' => $data['state'],
            'client_id' => $client->id
        ]);

        return redirect()->route('client.create')->with('message', 'Cliente cadastrado com sucesso.');

        
    }

    public function update(ClientRequest $request, $id){
        $data = $request->validated();

        $client = Client::with('address')->find($id);
        $client->update($data);

        return redirect()->route('client.edit/')->with('message', 'Cadastrado alterado com sucesso.');
    }
    public function destroy($id)
    {
        Client::find($id)->delete();
        return redirect()->route('client.index')->with('message', 'Cliente deletado com sucesso.');
    }


}
