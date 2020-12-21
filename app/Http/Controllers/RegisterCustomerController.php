<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;

class RegisterCustomerController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    //
    public function showView(){
        $title = 'Cadastro de Clientes';

        return view('register')->withTitle('Cadastro Cliente');

    }

    public function registerCustomer(Request $request){
        try {
            $customer = new Customer;
            
            $customer->name = $request->name;
            $customer->galc = $request->galc;
            $customer->door = $request->door;
            $customer->installation_address = $request->installation_address;
            $customer->velocity = $request->velocity;
            
            $customer->save();
            
            return redirect('/register')->With('success_message', 'Cliente Cadastrado Com Sucesso ');
        } catch (\Throwable $th) {
            return redirect('/register')->With('danger_message', 'Erro ao Cadastrar Cliente ');
        }
    }

    public function listCustomers(){
        $customers = Customer::all();
        
        Log::debug(__METHOD__  . "Listando Clientes ");

        return view('list_customers')->withCustomers($customers)->withTitle('Lista de Clientes');

    }


    public function deleteCustomers(Request $request)
    {
        $customer = Customer::find($request->id_customer);
        $customer->delete();

        Log::debug(__METHOD__  . "Excluindo Cliente = " . $request->id_customer );

        return redirect('/lista-clientes')->With('success_message', 'Cliente Excluído com Sucesso!! :) ');
    }

    public function showViewChangeCustomer($id_customer)
    {
        Log::debug(__METHOD__  . "View Alteração de Cliente");

        $customer = Customer::find($id_customer);

        return view('register')->withCustomer($customer)->withTitle('Edição de Cliente');
    }


    public function updateCustomer(Request $request, $id)
    {
        $customer = Customer::find($id);

        $customer->name = $request->name;
        $customer->galc = $request->galc;
        $customer->door = $request->door;
        $customer->installation_address = $request->installation_address;
        $customer->velocity = $request->velocity;

        $response = $customer->save();

        Log::debug(__METHOD__  . "Atualizando Cliente  = " . $request->id_customer);

        return redirect('register')->With('success_message', 'Cliente Alterado com Sucesso!! :) ');
    }    
    
}
