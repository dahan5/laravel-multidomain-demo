<?php

namespace App\Domain\Foo\Providers;

use App\Core\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // User::class => UserPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
        $this->registerResetPassword();
        $this->registerUserVerify();
    }

    protected function registerResetPassword(): void
    {
        ResetPassword::toMailUsing(function (User $user, string $token) {
            return (new MailMessage())
                ->from(...config('foo.mail.from'))
                ->view('foo::messages.user-reset', [
                    'user' => $user,
                    'token' => $token,
                    'url' => url(route('foo.password.reset', ['email' => $user->email, 'token' => $token], false)),
                ])
                ->subject(__('Reset Password Notification'));
        });
    }

    protected function registerUserVerify(): void
    {
        VerifyEmail::toMailUsing(function (User $user, string $url) {
            return (new MailMessage())
                ->from(...config('foo.mail.from'))
                ->view('foo::messages.user-verify', [
                    'user' => $user,
                    'url' => url(route('foo.verification.verify', ['email' => $user->email], false)),
                ])
                ->subject(__('Verify Email Address'));
        });
    }
}
