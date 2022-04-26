<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        VerifyEmail::toMailUsing(function (User $user, string $verificationUrl) {

            return (new MailMessage)
                ->subject(Lang::get('تأكيد البريد الاكتروني'))
                ->line(Lang::get('رجاء قم بالضغط على الزر في الاسفل لتفعيل البريد الاكتروني'))
                ->action(Lang::get('تأكيد البريد الاكتروني'), $verificationUrl)
                ->line(Lang::get('اذا واجهتك مشاكل في الضغط على الزرار يمكنك الضغط على الرابط ادناه'));
        });
    }
}