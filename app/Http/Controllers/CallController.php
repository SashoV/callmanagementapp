<?php

namespace App\Http\Controllers;

use App\Call;
use App\Http\Requests\CreateCallRequest;
use Illuminate\Http\Request;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Call::all()->pluck('user')->unique();
        $clients = Call::all()->pluck('client')->unique();
        $types_of_calls = Call::all()->pluck('type_of_call')->unique();
        
        return view('createCall', ['users' => $users, 'clients' => $clients, 'types_of_calls' => $types_of_calls]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCallRequest $request)
    {
        $input = $request->all();

        try {
            $call = new Call();
            $call->user = $input['user'];
            $call->client = $input['client'];
            $call->client_type = $input['client_type'];
            $call->date = $input['date'];
            $call->duration = $input['duration'];
            $call->type_of_call = $input['type_of_call'];
            $call->external_call_score = $input['external_call_score'];

            $call->save();
            return redirect()->route('home')->withSuccess('Call saved!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['internalError' => 'An error occurred, try again!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $call = Call::findOrFail($id);
        $s = strtotime($call->date);
        $call->date = date('Y-m-d, H:i:s', $s);
        return view('call', ['call' => $call]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $call = Call::findOrFail($id);
        $s = strtotime($call->date);
        $call->date = date('Y-m-d, H:i:s', $s);
        $users = Call::all()->pluck('user')->unique();
        $clients = Call::all()->pluck('client')->unique();
        $types_of_calls = Call::all()->pluck('type_of_call')->unique();
        
        return view('editCall', ['id' => $id, 'call' => $call, 'users' => $users, 'clients' => $clients, 'types_of_calls' => $types_of_calls]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCallRequest $request, $id)
    {
        $input = $request->all();

        try {
            $call = Call::findOrFail($id);
            $call->user = $input['user'];
            $call->client = $input['client'];
            $call->client_type = $input['client_type'];
            $call->date = $input['date'];
            $call->duration = $input['duration'];
            $call->type_of_call = $input['type_of_call'];
            $call->external_call_score = $input['external_call_score'];

            $call->save();

            return redirect()->route('call', ['id' => $call->id])->withSuccess('Call updated!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['internalError' => 'An error occurred, try again!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $call = Call::findOrFail($id);
            $call->delete();
            return redirect()->route('home')->withSuccess('Call deleted!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['internalError' => 'An error occurred, try again!']);
        }
    }
}
