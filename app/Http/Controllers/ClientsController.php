<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Clients;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    private $clients;

    function __construct(Clients $clients)
    {
        $this->clients = $clients;
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
        $clients = Clients::select('id', 'FirstName', 'LastName', 'email','avatar')
                            ->offset($pag)
                            ->limit(10)
                            ->orderby('FirstName','asc')
                            ->get();

        return view('clients/clientslist', ['clients' => $clients, 'pag' => $pag, 'pagination' => $pagination]);
    }

    public function clientEdit(Request $request)
    {
        $clientsDetails = Clients::select('id', 'FirstName', 'LastName', 'email','avatar')->where('id', $request->id)->first();
        return view('clients/editclient', ['clientDetails' => $clientsDetails]);
    }

    public function clientUpdate(Request $request)
    {
        // validation fields
        $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required',
            'email' => 'required|email',
            'input_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        $isUpdated = Clients::where('id', $request->id)->update(['FirstName' => $request->name, 'LastName' => $request->lastname, 'email' => $request->email]);

        // upload file
        if ($request->hasFile('input_img') && $isUpdated) {
            $image = $request->file('input_img');
            $name = $request->id . '_' .strtolower($request->name) . '_' . strtolower($request->lastname) .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $imageMoveSuccess = $image->move($destinationPath, $name);
            $clientData = $this->clients->find($request->id);
            $clientData->avatar = $name;
            $clientData->save();
        }

        // show result messages
        if ($isUpdated) {
            return redirect()->back()->with('success_msg', trans('messages.user_updated'))->with('avatar',$request->avatar);
        } else {
            return redirect()->back()->with('error_msg', trans('messages.error_msg'));
        }
    }

    public function clientDelete(Request $request)
    {
        // check if the client is existing
        if($this->clients->find($request->id)){

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
            'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        // create new client
        $clientCreation = new Clients();
        $clientCreation->FirstName = $request->name;
        $clientCreation->LastName = $request->lastname;
        $clientCreation->email = $request->email;
        $successSaving = $clientCreation->save();

        // upload file
        if ($request->hasFile('input_img') && $successSaving) {
            $image = $request->file('input_img');
            $name = $clientCreation->id . '_' .strtolower($request->name) . '_' . strtolower($request->lastname) .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $imageMoveSuccess = $image->move($destinationPath, $name);
            $clientData = $this->clients->find($clientCreation->id);
            $clientData->avatar = $name;
            $clientData->save();
        }

        if ($successSaving && $imageMoveSuccess) {
            return redirect()->back()->with('success_msg', trans('messages.user_created'))->with('id_client', $clientCreation->id);
        } else {
            return redirect()->back()->with('error_msg', trans('messages.error_msg'));
        }
    }

    // check if new email provided already existing
    public function checkEmail(Request $request)
    {
        $result = array('success' => true, 'message' => '');

        // check if email is provided
        if($request->emailNew){

            // in edit client check if retyped the original client's email, if so it won't give an error
            // once found in the database
            $emailCopy = $request->emailCopy ? $request->emailCopy : '';

            // check if email already existing
            $checkDb = DB::table('clients')->where('email', $request->emailNew)->where('email','!=',$emailCopy)->count();
            if($checkDb > 0){
                $result['success'] = false;
                $result['message'] = 'Email not available.';
            }
        } else {
            $result['success'] = false;
            $result['message'] = 'Email not provided. Internal error... please contact the administrator!';
        }
        return new JsonResponse($result);
    }
}
