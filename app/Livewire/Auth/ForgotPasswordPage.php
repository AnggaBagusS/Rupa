<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Forgot Password Page')]
class ForgotPasswordPage extends Component
{
    public $email;

    public function save()
    {
        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('success', 'Password reset link sent to your email.');
        } else {
            session()->flash('error', 'Failed to send password reset link.');
        }

        // Here you would typically send a password reset link to the user's email
        session()->flash('success', 'Password reset link sent to your email.');

        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
