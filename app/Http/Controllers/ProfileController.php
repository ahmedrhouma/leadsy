<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view(auth()->user()->getAccountName().'.profile');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:60'],
            'country' => ['nullable', 'string', 'max:2'],
            'timezone' => ['nullable'],
            'language' => ['nullable', 'string', 'max:2'],
            'avatar' => ['nullable', 'mimes:png,jpg,jpeg'],
        ]);
        $validated = $validator->validated();
        if ($validator->fails()) {
            return $this->failedResponse([
                'status' => 415,
                'alert' => [
                    'html' => implode('<br>', \Arr::flatten($validator->errors()->getMessages())),
                ]
            ]);
        }

        if ($request->has('avatar')&&$validated['avatar']!=null){
            $request->file('avatar')->storeAs(
                'public/avatars', $request->user()->id.'.'.$request->file('avatar')->getClientOriginalExtension()
            );
            $path ='avatars/'.$request->user()->id.'.'.$request->file('avatar')->getClientOriginalExtension();
        }else{
            $path = auth()->user()->photo;
        }

        $user = auth()->user();
        $user->update([
            'username' => $validated['name'],
            'country' => $validated['country'],
            'timezone' => $validated['timezone'],
            'language' => $validated['language'],
            'photo' => $path,
        ]);

        if ($user->wasChanged()) {
            return $this->successfulResponse([
                //'alert' => ['html' => _trans('actions.created', 1, ['attribute' => _trans('names.contact')])],
                'alert' => ['html' => 'Profile successfully updated '],
            ]);
         }
        return $this->failedResponse([
            'status' => 400,
            'alert' => [
                'html' => 'Something went wrong! please try later.',
            ]
        ]);
    }
}
