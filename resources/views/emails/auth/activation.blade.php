@component('mail::message')
#Activate your account

Thanks for signing up, please activate your account.
click on the link below to activate your account

@component('mail::button', ['url' => route('auth.activate', [
                                    'token' => $user->activation_token,
                                    'email' => $user->email
                                ])
                        ]
            )
    Activation link
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
