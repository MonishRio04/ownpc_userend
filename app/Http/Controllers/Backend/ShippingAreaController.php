<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipCities;
use Illuminate\Http\Request;
use App\Models\ShipDistricts;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    public function AllDivision()
    {
        $division = ShipDivision::latest()->get();
        return view('backend.ship.division.division_all', compact('division'));
    }

    public function AddDivision(){
        return view('backend.ship.division.division_add');
    }

    public function StoreDivision(Request $request)
    {
        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Ship Division Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.division')->with($notification);
    }

    public function EditDivision($id){
        $division = ShipDivision::findOrFail($id);
        return view ('backend.ship.division.edit_division',compact('division'));
    }

    public function UpdateDivision(Request $request){
        $division_id = $request->id;
        ShipDivision::findOrFail($division_id)->update([
            'division_name' =>$request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Ship Division Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.division')->with($notification);
    }

    public function DeleteDivision($id){
        ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Ship Division Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.division')->with($notification);
    }

    /// District CRUD

    public function AllDistrict()
    {
        $district = ShipDistricts::with('state')->latest()->get();
        return view('backend.ship.district.district_all', compact('district'));
    }

    public function AddDistrict(){
        $states = ShipState::orderBy('state_name','ASC')->get();
        return view('backend.ship.district.district_add',compact('states'));
    }

    public function StoreDistrict(Request $request)
    {
        ShipDistricts::insert([
            'state_id' => $request->state_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Ship Districts Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.district')->with($notification);
    }

    public function EditDistrict($id){
        $states = ShipState::orderBy('state_name','ASC')->get();
        $district = ShipDistricts::findOrFail($id);
        return view ('backend.ship.district.edit_district',compact('district','states'));
    }

    public function UpdateDistrict(Request $request){
        $district_id = $request->id;
        ShipDistricts::findOrFail($district_id)->update([
            'state_id' => $request->state_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Ship District Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.district')->with($notification);
    }

    public function DeleteDistrict($id){
        ShipDistricts::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Ship District Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.district')->with($notification);
    }

    // State CRUD

    public function AllState()
    {
        $state = ShipState::latest()->get();
        return view('backend.ship.state.state_all', compact('state'));
    }

    public function AddState(){
        // $division = ShipDivision::orderBy('division_name','ASC')->get();
        // $district = ShipDistricts::orderBy('district_name','ASC')->get();
        return view('backend.ship.state.state_add');
    }

    public function GetDistrict($division_id){
        $dist = ShipDistricts::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($dist);
    }

    public function StoreState(Request $request)
    {
        ShipState::insert([
            // 'division_id' => $request->division_id,
            // 'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Ship State Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.state')->with($notification);
    }

    public function EditState($id){
        // $division = ShipDivision::orderBy('division_name','ASC')->get();
        // $district = ShipDistricts::orderBy('district_name','ASC')->get();
        $state = ShipState::findOrFail($id);
        return view ('backend.ship.state.edit_state',compact('state'));
    }

    public function UpdateState(Request $request){
        $state_id = $request->id;
        ShipState::findOrFail($state_id)->update([
            // 'division_id' => $request->division_id,
            // 'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Ship state Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.state')->with($notification);
    }

    public function DeleteState($id){
        ShipState::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Ship State Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.state')->with($notification);
    }

    // City Crud
    public function AllCities()
    {
        $cities = ShipCities::with('state','district')->latest()->get();
        return view('backend.ship.cities.cities_all', compact('cities'));
    }

    public function AddCities(){
        $districts = ShipDistricts::orderBy('district_name','ASC')->get();
        return view('backend.ship.cities.cities_add',compact('districts'));
    }

    public function StoreCities(Request $request)
    {
        ShipCities::insert([
            'district_id' => $request->district_id,
            'city_name' => $request->city_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Ship City Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.cities')->with($notification);
    }

    public function EditCities($id){
        $cities = ShipCities::findOrFail($id);
        $districts = ShipDistricts::orderBy('district_name','ASC')->get();
        return view ('backend.ship.cities.edit_cities',compact('cities','districts'));
    }

    public function UpdateCities(Request $request){
        $division_id = $request->id;
        ShipCities::findOrFail($division_id)->update([
            'district_id' => $request->district_id,
            'city_name' => $request->city_name,
            'created_at' => Carbon::now(),
        ]);
        
        $notification = array(
            'message' => 'Ship Cities Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.cities')->with($notification);
    }

    public function DeleteCities($id){
        ShipCities::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Ship Cities Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.cities')->with($notification);
    }
}
