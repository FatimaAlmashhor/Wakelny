<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject(Lang::get('تأكيد البريد الاكتروني'))
                ->greeting(Lang::get('مرحبا بك في متاح'))
                ->line(Lang::get('رجاء قم بالضغط على الزر في الاسفل لتفعيل البريد الاكتروني'))
                ->action(Lang::get('تأكيد البريد الاكتروني'), $url)
                ->line(Lang::get('اذا واجهتك مشاكل في الضغط على الزرار يمكنك الضغط على الرابط ادناه'));
        });
    }
}