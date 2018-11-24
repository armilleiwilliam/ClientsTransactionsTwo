<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    protected $fillable = ['FirstName', 'LastName','email'];

    private $client_id;

    function __construct(Clients $id_client)
    {
        $this->client_id = $id_client;
    }

    public function clientsList(Request $request)
    {
        // set pagination parameters
        $pag = 0;
        if($request->pag){
            $pag = $request->pag;
        }
        $pagination = ceil(DB::table('clients')->count() / 10);

        // get clients list parameters
        $clients = Clients::select('id', 'FirstName', 'LastName', 'email')->offset($pag)->limit(10)->get();
        return view('clients/clientslist', ['clients' => $clients, 'pag' => $pag, 'pagination' => $pagination]);
    }

    public function clientEdit(Request $request)
    {
        $clientsDetails = Clients::select('id', 'FirstName', 'LastName', 'email')->where('id', $request->id)->first();
        return view('clients/editclient', ['clientDetails' => $clientsDetails]);
    }

    public function clientUpdate(Request $request)
    {
        // validation fields
        $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required',
            'email' => 'required|email',
        ]);

        $isUpdated = Clients::where('id', $request->id)->update(['FirstName' => $request->name, 'LastName' => $request->lastname, 'email' => $request->email]);

        // show result messages
        if ($isUpdated) {
            return redirect()->back()->with('success_msg', trans('messages.user_updated'));
        } else {
            return redirect()->back()->with('error_msg', trans('messages.error_msg'));
        }
    }

    public function clientDelete(Request $request)
    {
        // check if the client is existing
        if($this->client_id->find($request->id)){

            // delete client
            $isDeleted = Clients::where('id', $request->id)->delete();
            if ($isDeleted) {
                return redirect()->back()->with('success_msg', trans('messages.user_deleted'));
            } else {
                return redirect()->back()->with('error_msg', trans('messages.error_msg'));
            }
        } else {
            return redirect()->back()->with('error_msg', trans('messages.client_no_existing'));
        }
    }

    public function insertClient(Request $request)
    {
        $clientsDetails = Clients::select('id', 'FirstName', 'LastName', 'email')->where('id', $request->id)->first();
        return view('clients/insertclient');
    }

    public function clientCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required',
            'email' => 'required|email',
        ]);

        $isCreated = Clients::create([
            'FirstName' => $request->name,
            'LastName' => $request->lastname,
            'email' => $request->email,
            'avatar' => 'sdfsdf'
        ]);

        if ($isCreated) {
            return redirect()->back()->with('success_msg', trans('messages.user_created'));
        } else {
            return redirect()->back()->with('error_msg', trans('messages.error_msg'));
        }
    }
}
