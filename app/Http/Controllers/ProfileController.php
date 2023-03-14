<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

     //photo update
     public function editPhoto(Request $request)
     {        
         $url = "storage/";
         $photo = $request->file('photo');
         $photo_name = $photo->getClientOriginalName();      
         $photo_storage = $photo->storeAs("public/uploads", $photo_name);
         $photo_path = 'storage/uploads/'.$photo_name;
 
         User::where('id',Auth::user()->id)->update([
             'photo'=> $photo_path,
          ]);          
       
          session()->flash('success','Profile Photo updated successfully..!!');
          return redirect()->route('profile.edit');
    
     }

     //profile information edit
     public function editInfo(Request $request)
     {
        $profileData = New Profile;
        $profileData->userId = Auth::user()->id;
        $profileData->waNumber = $request->waNumber;
        $profileData->address = $request->address;
        $profileData->occupation = $request->occupation;
        $profileData->designation = $request->designation;
        $profileData->companyName = $request->companyName;
        $profileData->bloodGroup = $request->bloodGroup;
        $profileData->save();

        User::where('id',Auth::user()->id)->update([
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
        ]);

        session()->flash('success',' প্রোফাইলের তথ্য আপডেট সম্পন্ন হয়েছে ..!!');
        return redirect()->route('profile.edit');
        
     }
     //profile information update
     public function updateInfo(Request $request)
     {        

        Profile::where('userId',Auth::user()->id)->update([            
            'waNumber' => $request->waNumber,
            'address' => $request->address,
            'occupation' => $request->occupation,
            'designation' => $request->designation,
            'companyName' => $request->companyName,
            'bloodGroup' => $request->bloodGroup,
        ]);
        User::where('id',Auth::user()->id)->update([
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
        ]);

        session()->flash('success',' প্রোফাইলের তথ্য আপডেট সম্পন্ন হয়েছে ..!!');
        return redirect()->route('profile.edit');
        
     }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
