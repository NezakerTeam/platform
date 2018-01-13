<?php
$formAll = [
];

$formCreate = array_merge(
    $formAll, [
    'title'  => ' إضافة درس',
    'desc'   => 'هنا يمكنك اضافة الفيديوهات التي قمت بتسجيلها إلى نذاكر ويمكن ايضا الاطلاع على كيفية تسجيل الفيديوهات بطرق مختلفة عن طريق الاطلاع على صفحة
<a href="' . route('general.howItWorks') . '#about-us-tab-1" target="_blank">كيف تقوم بتصوير الفيديوهات؟</a>',
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

    'form.title.create'  => 'اضافة فيديو',
    'form.stage'         => 'المرحلة التعليمية',
    'form.grade'         => 'الصف الدراسي',
    'form.subject'       => 'المادة',
    'form.lesson'        => 'الفيديوهات',
    'form.howToUpload'   => 'طريقة رفع الفيديو',
    'form.materialUrl'   => 'رابط الفيديو',
    'form.description'   => 'ملخص الفيديو',
    'form.submit.create' => 'اضف فيديو جديد',
    'form.submit.edit'   => 'عدل الفيديو',
    'form.agree'         => 'هل توافق علي <a href="' . route('general.termsAndConditions') . '" target="_blank">الشروط والأحكام؟</a>',
    'form.submitted'     => 'تم اضافة الفيديو بنجاح وجاري مراجعته',
    'createNew'          => 'اضف فيديو',
    'entity.name'        => 'الفيديوهات',
    'login'              => 'دخول',
    'register'           => 'إشترك الأن',
    'select.city'        => 'إختار المدينة',
    'all'                => 'الكل',
    'form'               => [
        'video' => [
            'all'               => $formAll,
            'create'            => $formCreate,
            'upload_guide_desc' => 'قم برفع الفديو علي موقع '
            . ' <a href="https://www.google.com/drive" target="_blank">Google Drive</a> '
            . ' أو'
            . ' <a href="https://www.dropbox.com/login" target="_blank">Dropbox</a> '
            . 'ثم قم بوضع رابط الفديو في المكان المخصص له.'
            . '<br />'
            . ' يمكنك مشاهدة فيديو الشرح لرفع الفيديو على هذه المواقع بالضغط على الشعارات التالية'
        ]
    ]
];
