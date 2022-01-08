<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ministry;
use Exception;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\returnValueMap;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginProcess(Request $request)
    {
        $email = $request->get('mi_userName');
        $password = $request->get('mi_passWord');

        try {
            $ministry = Ministry::where('mi_userName', $email)->where('mi_passWord', $password)->firstOrFail();

            if ($ministry->mi_status == 1) {
                return Redirect::route("login")->with('error', [
                    "message" => 'Nick đã bị khóa !',
                ]);
            } else {
                $request->session()->put('mi_id', $ministry->mi_id);
                $request->session()->put('mi_name', $ministry->mi_name);
                $request->session()->put('mi_status', $ministry->mi_status);
                $request->session()->put('mi_permission', $ministry->mi_permission);
                return Redirect::route("major.index");
            }
        } catch (Exception $e) {
            return Redirect::route("login")->with('error', [
                "message" => 'Sai Email hooặc mật khẩu !',
                "email" => $email

            ]);
        }
        return $request;
    }

    public function logout(Request $request)
    {
        //xoa session
        $request->session()->flush();
        //dieu huong ve trang login
        return Redirect::route("login");
    }
}
