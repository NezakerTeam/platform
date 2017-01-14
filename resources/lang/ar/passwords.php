<?php
return [
    /*
      |--------------------------------------------------------------------------
      | Password Reset Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines are the default lines which match reasons
      | that are given by the password broker for a password update attempt
      | has failed, such as for an invalid token or invalid new password.
      |
     */

    'password' => 'كلمة المرور يجب ان تكون 5 حروف علي الأقل وتماثل تأكيد كلمة السر',
    'reset' => 'تم تعديل كلمة السر الخاصة بك',
    'sent' => 'تم إرسال بريد إليكتروني متضمن رابط تعديل كلمة السر',
    'token' => 'هذا الرابط غير صحيح',
    'user' => 'لا يوجد مستخدم مسجل بهذا البريد الالكتروني سجل الان',
    'form' => [
        'forgot' => [
            'email' => [
                'placeholder' => 'الرجاء إدخال البريد الإلكتروني المسجّل في حسابك'
            ],
            'error' => [
                'email' => [
                    'exists' => 'لا يوجد مستخدم مسجل بهذا البريد الالكتروني،
<a href="' . route('register') . '">سجل الأن</a>',
                ]
            ]
        ]
    ]
];
