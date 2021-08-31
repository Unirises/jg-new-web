<?php

namespace App\Http\Controllers;

use App\Enums\VehicleType;
use App\Models\Store;
use App\Models\Vehicle;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        return view('pages.profile.verification');
    }

    public function rider(Request $request)
    {
        $validated = $this->validate($request, [
            'license' => 'required|string',
            'type' => ['required', new EnumValue(VehicleType::class, false)],
            'registration' => [auth()->user()->vehicle()->exists() ? 'nullable' : 'required', 'image' ,'mimes:jpg,jpeg,png','max:1024'],
        ]);

        $updatableFields = [
            'user_id' => auth()->user()->id,
            'license' => $validated['license'],
            'type' => $validated['type'],
        ];

        if($request->has('registration')) {
            $hero = request()->file('registration');
            $heroName = time() . '.' . $hero->getClientOriginalExtension();
            $heroRawPath = '/images/riders/';
            $heroPath = public_path($heroRawPath);
            $hero->move($heroPath, $heroName);
            $updatableFields['registration'] = $heroRawPath . $heroName;
        }

        if(auth()->user()->vehicle()->exists()) {
            Vehicle::where('user_id', auth()->user()->id)->update($updatableFields);
        } else {
            Vehicle::create($updatableFields);
        }

        return redirect()->back();
    }

    public function merchant(Request $request)
    {
        $validated = $this->validate($request, [
            'company_name' => 'required|string',
            'representative_name' => 'required|string',
            'representative_contact' => 'required|string',
            'address_address' => 'required|string',
            'address_latitude' => 'required|numeric',
            'address_longitude' => 'required|numeric',
            'hero' => [auth()->user()->store()->exists() ? 'nullable' : 'required', 'image' ,'mimes:jpg,jpeg,png','max:1024'],
            'logo' => [auth()->user()->store()->exists() ? 'nullable' : 'required', 'image' ,'mimes:jpg,jpeg,png','max:1024'],
            'avatar' => ['nullable', 'image' ,'mimes:jpg,jpeg,png','max:1024'],
        ]);

        $updatableFields = [
            'user_id' => auth()->user()->id,
            'representative_name' => $validated['representative_name'],
            'representative_contact' => $validated['representative_contact'],
            'lat' => $validated['address_latitude'],
            'long' => $validated['address_longitude'],
            'address' => $validated['address_address'],
        ];

        if($request->has('hero')) {
            $hero = request()->file('hero');
            $heroName = time() . '.' . $hero->getClientOriginalExtension();
            $heroRawPath = '/images/heros/';
            $heroPath = public_path($heroRawPath);
            $hero->move($heroPath, $heroName);
            $updatableFields['hero'] = $heroRawPath . $heroName;
        }

        if($request->has('avatar')) {
            $paper = request()->file('avatar');
            $paperName = time() . '.' . $paper->getClientOriginalExtension();
            $paperRawPath = '/images/registrations/';
            $paperPath = public_path($paperRawPath);
            $paper->move($paperPath, $paperName);

            auth()->user()->update([
                'avatar' => $paperRawPath . $paperName
            ]);
        }

        if($request->has('logo')) {
            $logo = request()->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logoRawPath = '/images/logos/';
            $logoPath = public_path($logoRawPath);
            $logo->move($logoPath, $logoName);
            $updatableFields['logo'] = $logoRawPath . $logoName;
        }


        auth()->user()->update([
            'company_name' => $validated['company_name']
        ]);

        if(auth()->user()->store()->exists()) {
            Store::where('user_id', auth()->user()->id)->update($updatableFields);
        } else {
            Store::create($updatableFields);
        }

        return redirect()->back();
    }
}
