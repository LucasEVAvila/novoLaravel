<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

<<<<<<< HEAD
=======
// adicionando a importação de e-mail 
use Illuminate\Support\Facades\Mail; 
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Log;

>>>>>>> 1033cc00b0f653bc28941259b58825fd80cf1283
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

<<<<<<< HEAD
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
=======
        //adicionar a lógica de try catch
        try {
            Mail::to($user->email)->send(new WelcomeEmail($user->name));
        } catch (\Exception $e) {
            // Se o envio falhar, logamos o erro, mas o registro continua:
            Log::error("Falha ao enviar e-mail de boas-vindas para {$user->email}: " . $e->getMessage());
        }

        Auth::login($user);

        return redirect(route('admin.dashboard'));
>>>>>>> 1033cc00b0f653bc28941259b58825fd80cf1283
    }
}
