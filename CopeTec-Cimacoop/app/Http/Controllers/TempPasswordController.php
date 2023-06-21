<?php

namespace App\Http\Controllers;

use App\Models\TempPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TempPasswordController extends Controller
{
    public function generateTempPassword()
    {
        $temPassword = new TempPassword();
        $passwordTemp = Str::random(5);
        $temPassword->temp_password = Hash::make($passwordTemp);
        $temPassword->is_used = 0;
        $temPassword->type_operation = $passwordTemp;
        $temPassword->expiration_date = Carbon::now()->addMinutes(15);
        $temPassword->save();
        return response()->json([
            'passwordTemp' => $passwordTemp, 
            'idPassword' => $temPassword->id,
            'expiration_date' => date('d-m-Y H:i:s', strtotime($temPassword->expiration_date))
        ]);
    }
    public function validatePassword($password){
        $temPassword=TempPassword::where('type_operation', $password)->first();
        if($temPassword){
            if($temPassword->is_used == 0){
                if($temPassword->expiration_date > Carbon::now()){
                    $temPassword->is_used = 1;
                    $temPassword->save();
                    return response()->json(['status' => 'success']);
                }else{
                    return response()->json(['status' => 'Expiro']);
                }
            }else{
                return response()->json(['status' => 'Usada']);
            }
        }else{
            return response()->json(['status' => 'Invalida']);
        }

    }
}