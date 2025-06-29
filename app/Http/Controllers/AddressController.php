<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\ShipCities;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['addresses'] = Addresses::with('district','city','state')->where('user_id', Auth::id())->get();
       return view('frontend.address.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['states'] = ShipState::orderBy('state_name','ASC')->get();
        $data['districts'] = ShipDistricts::orderBy('district_name','ASC')->get();
        $data['cities'] = ShipCities::orderBy('city_name','ASC')->get();
        return view('frontend.address.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {           
        Addresses::create([
            'user_id' => Auth::id(),
            'shipping_name' => $request->shipping_name,
            'shipping_phone' => $request->shipping_phone,
            'shipping_email' => $request->shipping_email,
            'shipping_address' => $request->shipping_address,
            'state_id' => $request->state_id,
            'district_id' => $request->district_id,
            'city_id' => $request->city_id,
            'post_code'=>$request->post_code
        ]);
        $notification = array(
            'message' => 'Address Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('address.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['address'] = Addresses::findOrFail($id);
        $data['states'] = ShipState::orderBy('state_name','ASC')->get();
        $data['districts'] = ShipDistricts::orderBy('district_name','ASC')->get();
        $data['cities'] = ShipCities::orderBy('city_name','ASC')->get();
        return view('frontend.address.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Addresses::find($id)->update([
            'user_id' => Auth::id(),
            'shipping_name' => $request->shipping_name,
            'shipping_phone' => $request->shipping_phone,
            'shipping_email' => $request->shipping_email,
            'shipping_address' => $request->shipping_address,
            'state_id' => $request->state_id,
            'district_id' => $request->district_id,
            'city_id' => $request->city_id,
            'post_code'=>$request->post_code
        ]);
        $notification = array(
            'message' => 'Address Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('address.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Addresses::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Address Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function getDistricts($state_id)
    {
        $districts = ShipDistricts::where('state_id', $state_id)->get();
        return response()->json($districts);
    }

    public function getCities($district_id)
    {
        $cities = ShipCities::where('district_id', $district_id)->get();
        return response()->json($cities);
    }

}
