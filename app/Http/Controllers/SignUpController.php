<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmation;


class SignUpController extends Controller
{
    public function signUp(Request $request)
    {
        $rules = [
            'first_name'      => ['required', 'min:3', 'max:10'],
            'last_name'       => ['required', 'min:3', 'max:10'],
            'email'          => ['required', 'email', 'unique:users,email', 'confirmed'], // email should match email_confirmation
            'email_confirmation' => ['required', 'email'],
            'password'       => ['required', 'min:6', 'confirmed'], // password should match password_confirmation
            'password_confirmation' => ['required', 'min:6'],
            'terms_and_conditions' => ['required', 'accepted'],
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // validate request
        $validator = Validator::make($request->all(), $rules);

        // if check fails
        if ($validator->fails()) {
            // Redirect back to form with errors and old input
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handling Image
        $profileImageBinary = null;
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            //dd($file);
            $profileImageBinary = file_get_contents($file->getRealPath());
        } else {
            // Error message is displayed and this will prevent the creation attempt below
            return redirect()->back()->withErrors(['profile_image' => 'Image is required'])->withInput();
        }

        // If validation passes,
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image' => $profileImageBinary,
        ]);

        // Send confirmation email
        Mail::to($user->email)->send(new RegistrationConfirmation($user));

        return redirect()->route('submission.success', ['user' => $user->id]);
    }
    public function showSuccess(Request $request)
    {
        // Store user here from query
        $userId = $request->query('user');
        // finding user by ID
        $user = User::find($userId);
        // passing it down to sumited blade
        return view('submited.index', ['user' => $user]);
    }
}
