<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function noticias()
    {
        $noticias = News::all();
        return view('news', ['noticias' => $noticias]);
    }

    public function logIn()
    {
        return view('logIn');
    }
    public function userProfile()
    {
        return view('userProfile');
    }

    public function userEdit()
    {
        return view('userEdit');
    }

    public function userEditing(Request $request)
    {
        try {
            $user = User::findOrFail(auth()->user()->id);
            DB::transaction(function () use ($user, $request) {
                $request->validate([
                    'name' => 'required|min:2',
                    'email' => 'required|email',
                ], [
                    'name.required' => 'El nombre es necesario.',
                    'name.min' => 'El nombre debe tener al menos dos caracteres.',
                    'email.required' => 'El correo electrónico es necesario.',
                    'email.email' => 'El formato del correo electrónico no es válido.',
                ]);
                $data = $request->only(['name', 'email']);
                $user->update($data);
            });
            return redirect('/user')
                ->with('status', ['type' => 'success', 'message' => 'El perfil fue editado con éxito']);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('status', ['type' => 'error', 'message' => 'El perfil no pudo ser editado: ' . $e->getMessage()])
                ->withInput();
        }
    }
}
