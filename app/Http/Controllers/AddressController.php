<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Link;
use App\Models\Partner;
use Illuminate\Http\Request;

class AddressController extends Controller
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
        $address = Address::latest()->first();
        $partners = Partner::latest()->get();
        $links = Link::latest()->get();

        return view('admin.contact_form', [
            'address' => $address,
            'partners' => $partners,
            'links' => $links,
            'title' => 'Parametres',
            'desc' => 'This is meta Description for the settings',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|max:5000',
            'address' => 'required|max:5000',
            'location' => 'required|max:5000',
            'phone' => 'required|max:5000',
        ]);

        Address::updateOrCreate(['id' => Address::latest()->pluck('id')->first()], [
            'email' => $request->email,
            'address' => $request->address,
            'location' => $request->location,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'successfully updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
