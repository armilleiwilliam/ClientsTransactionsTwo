<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Clients;
use App\Transactions;

class TransactionsController extends Controller
{
    private $id_transaction = 0;
    function __construct(Transactions $id_trans)
    {
        $this->id_transaction = $id_trans;
    }

    public function transactionsList(Request $request)
    {
        // set pagination parameters
        $pag = 0;
        if($request->pag){
            $pag = $request->pag;
        }
        $pagination = ceil(DB::table('transactions')->count() / 10);

        $transactions = DB::table('transactions')
            ->leftJoin('clients', 'clients.id', '=', 'transactions.client_id')
            ->select('transactions.id','clients.FirstName','clients.LastName','transactions.amount','transaction_date')
            ->offset($pag)->limit(10)->get();
        return view('transactions/transactionslist', ['transactions' => $transactions, 'pag' => $pag, 'pagination' => $pagination]);
    }

    public function transactionEdit(Request $request)
    {
        $transactionDetails = DB::table('transactions')
            ->leftJoin('clients', 'clients.id', '=', 'transactions.client_id')
            ->select('transactions.id','client_id','FirstName','LastName','transactions.amount',DB::raw('DATE_FORMAT(transaction_date, "%Y-%m-%d") as transDate'))
            ->where('transactions.id', $request->id)->first();

        // get clients list parameters
        $clients = Clients::select('id', 'FirstName', 'LastName')->get();

        return view('transactions/edittransaction', ['transactionDetails' => $transactionDetails, 'clients' => $clients]);
    }

    public function transactionUpdate(Request $request)
    {
        // validation fields
        $request->validate([
            'amount' => 'required|max:255|numeric|between:0.01,9999.99',
            'id' => 'required',
            'clientName' => 'required',
            'transaction_date' => 'required|date',
        ]);

        $isUpdated = Transactions::where('id', $request->id)->update(['id' => $request->id, 'amount' => $request->amount, 'client_id' => $request->clientName, 'transaction_date' => $request->transaction_date]);

        // show result messages
        if ($isUpdated) {
            return redirect()->back()->with('success_msg', trans('messages.transaction_updated'));
        } else {
            return redirect()->back()->with('error_msg', trans('messages.error_msg'));
        }
    }

    public function transactionDelete(Request $request)
    {
        if($this->id_transaction->find($request->id)){
            $isDeleted = Transactions::where('id', $request->id)->delete();

            if ($isDeleted) {
                return redirect()->back()->with('success_msg', trans('messages.user_deleted'));
            } else {
                return redirect()->back()->with('error_msg', trans('messages.error_msg'));
            }
        } else {
            return redirect()->back()->with('error_msg', trans('messages.transaction_no_existing'));
        }
    }

    public function insertTransaction(Request $request)
    {
        $transactionsDetails = Transactions::select('id', 'amount', 'client_id', 'transaction_date')->where('id', $request->id)->first();

        // get clients list parameters
        $clients = Clients::select('id', 'FirstName', 'LastName')->get();

        return view('transactions/inserttransaction', ['clients' => $clients]);
    }

    public function transactionCreate(Request $request)
    {
        $request->validate([
            'amount' => 'required|max:255|numeric|between:0.01,9999.99',
            'clientName' => 'required',
            'transaction_date' => 'required|date',
        ]);

        $isCreated = Transactions::create([
            'amount' => $request->amount,
            'client_id' => $request->clientName,
            'transaction_date' => $request->transaction_date
        ]);

        if ($isCreated) {
            return redirect()->back()->with('success_msg', trans('messages.transaction_created'));
        } else {
            return redirect()->back()->with('error_msg', trans('messages.error_msg'));
        }
    }
}
