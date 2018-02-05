<?php
$formAll = [
    'name'           => 'الاسم',
    'education_type' => 'نوع التعليم',
    'gender'         => 'الجنس',
    'birthdate'      => 'تاريخ الميلاد',
];

$formCreate = array_merge(
    $formAll, [
    'title'  => 'إضافة ابن',
    'submit' => 'إضافة',
    ]
);

$formEdit = array_merge(
    $formAll, [
    'title'  => 'تعديل بيانات الابن',
    'submit' => 'تعديل البيانات',
    ]
);

return [
    'form' => [
        'all'    => $formAll,
        'create' => $formCreate,
        'edit'   => $formEdit
    ]
];
