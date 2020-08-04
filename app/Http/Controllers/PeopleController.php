<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('people.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Stuff
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:people|max:191',
            'contact_info' => 'nullable',
        ]);
        // onError
        if ($validator->fails()) {
            return redirect(route('createPeople'))
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create new Item
        $item = new People();
        $item->name = $request->name;
        if(isset($request->contact_info))
            $item->contact_info = $request->contact_info;
        // Redirect to PeopleList with done msg
        return redirect(route('peoples.index'))->with('status', __('app.done'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        return view('people.show', ['people' => $people]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people)
    {
        return view('people.edit', ['people' => $people]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {
        //
    }
}
