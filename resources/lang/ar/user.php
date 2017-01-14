<?php
$formAll = [
    'first_name' => 'الإسم الأول',
    'last_name' => 'الإسم الثاني',
    'email' => 'البريد الإلكتروني',
    'password' => 'كلمة السر',
    'city_id' => 'المدينة',
    'city' => ['empty_value' => 'إختر المدينة'],
    'phone_numbers' => 'رقم التليفون',
];

$formEdit = array_merge(
    $formAll, [
    'title' => 'تعديل بيانات حسابك الخاص',
    'desc' => 'من فضلك قم بإدخال بريدك الإلكتروني المسجل و كلمة المرور .',
    'submit' => 'تعديل البيانات',
    ]
);

return [
    /*
      |--------------------------------------------------------------------------
      | Authentication Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines are used during authentication for various
      | messages that we need to display to the user. You are free to modify
      | these language lines according to your application's requirements.
      |
     */

    'form' => [
        'all' => $formAll,
        'edit' => $formEdit
    ]
];
