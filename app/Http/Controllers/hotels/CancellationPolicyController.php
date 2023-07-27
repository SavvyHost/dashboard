<?php

namespace App\Http\Controllers\hotels;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HousePolicy;
use App\Models\CancellationPolicy;
use App\Models\Hotel;
use App\Http\Resources\HousePolicyResource;

class CancellationPolicyController extends Controller
{
    //


    public function show($id)
    {
        $attr = CancellationPolicy::find($id);
        return view('hotels.hotels-cancel-edit',compact('attr'));
    }
    public function index()
    {
        $att = CancellationPolicy::all();
        return view('hotels.hotels-cancel',compact('att'));
    }

    public function add()
    {
        // $attr = CancellationPolicy::all();
        view()->share('attr', $attr);

        view()->composer('hotels.add-hotel', function ($view) use ($attr) {
            $view->with('attr', $attr);
        });

        return view('hotels.hotels-cancel-add',/* compact('attr') */);
    }









    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'refund_percentage' => 'required',
            'days_before_checkin' => 'required',
        ]);
        $attr = CancellationPolicy::create([
            'name'  =>  $request->name,
            'refund_percentage'  =>  $request->refund_percentage,
            'days_before_checkin'  =>  $request->days_before_checkin,
        ]);
        return redirect()->back()->with('success','Cancellation Policy Added Successfully');

    }
    public function save_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'refund_percentage' => 'required',
            'days_before_checkin' => 'required',
        ]);
        $attr = CancellationPolicy::find($id);
        $attr->name = $request->name;
        $attr->refund_percentage = $request->refund_percentage;
        $attr->days_before_checkin = $request->days_before_checkin;
        $attr->save();

        return redirect()->back()->with('success','Cancellation Policy Added Successfully');

    }





    public function destroy($id)
    {
        $attr = CancellationPolicy::find($id);

        if (!$attr) {
            return redirect()-back()->with('error', 'Cancellation Policy not found');
        }

        $attr->delete();

        return redirect()->back()->with('success', 'Cancellation Policy deleted successfully');
    }


}
