<?php
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

    'siteName'       => 'نذاكر',
    'select'         => 'إختار',
    'contactUs.send' => 'إرسال الرسالة',
    'aboutUs.desc'   => '<p>أول موقع إلكترونى يهتم بشرح المناهج المدرسية للأباء فى فيديو قصيرة المدة يتراوح بين (5- 10 دقائق ) لكل درس يعمل على شرح الفكرة الاساسية للدرس مع طريقة شرحها ومثال عليها مما يعد استفاده كبرى لرفع مستوى الاباء فى توصيل المعلومة بشكل صحيح لابنائهم ولتوفير الوقت.</p>

<p>تم تأسيس موقع نذاكر استجابة إلى للحاجة المستمرة لدى اولياء اللامور والعاملين بالعملية التعليمية إلى اتقان المواد الدراسية والطرق السليمة لتدريس المناهج إلي الطلاب والطالبات فى مراحل التعليم المختلفة.</p>

<p>يهدف موقع نذاكر إلى رفع مستوى الاباء فى طرق المذاكر مع ابنائهم وبناتهم ذلك لوجود اختلاف كبير بين المناهج فى الاجيال المختلفة وللتغير الكبير الحادث على المناهج الدراسية.</p>

<p>إننا على وعي كبير بأن الاباء والامهات المستخدمون لموقع نذاكر يحملون معهم تجارب تعليمية واكاديمية مختلفة وخلفيات مهنية متنوعة ونحن نسعى بكل جهد على أخذ جميع هذه الحيثيات في الحسبان خلال إعداد الدروس المقدمة.</p>
',
    'createdAt'      => 'التاريخ',
    'form'           => [
        'contactUs' => [
            'title'        => 'اتصل بنا',
            'desc'         => 'واسمحوا لنا أن نتعرف على استفساراتكم ومقترحاتكم من خلال ملء الاستمارة أدناه.',
            'name'         => 'الإسم',
            'email'        => 'البريد الألكتروني',
            'phone_number' => 'رقم التليفون',
            'message'      => 'السؤال',
            'submit'       => 'إرسال الرسالة',
            'thanks'       => 'شكرا لتواصلك معنا',
        ],
    ],
    'page'           => [
        'howItWorks'         => [
            'title'    => 'كيف يعمل',
            'desc'     => 'في هذا القسم يمكن الاطلاع على طريقة عمل نذاكر وكيفية الاشتراك وكذلك اضافة الفيديوهات الخاصة بك إلى الموقع .',
            'sections' => [
                0 => [
                    'title' => 'تسجيل المعلم',
                    'desc'  => ' نذاكر خدمة مجانية لأولياء الأمور والمدرسين تساعد المهتمين بالعملية التعليمية تحصيل المناهج التعليمية بطريقة صحيحة وسهلة تساعد الطلاب في تحصيل دروسهم.<br />
عند تسجيل على موقع نذاكر يمكنك اضافة الفيديوهات الخاصة بك إلى الموضع وسيتم مراجعتها واضافتها الى دروس موقع نذاكر لتكون متاحة إلى أولياء الأمور والمدرسين يمكن التسجيل من خلال هذا الرابط <a href="' . route('register') . '">اشترك الآن</a>'
                ],
                1 => [
                    'title' => 'كيف تقوم بتصوير الدروس؟',
                    'desc'  => 'بعد انتهاء المعلم من تسجيل الفيديو الخاص بالدرس يقوم بتحميل الدرس في صفحة اضافة درس على Dropbox  كما هو موضح في الفيديو التالي
او اضافة اضافة الدرس على Google Drive  كما هو موضح في الفيديو التالي'
                ],
                2 => [
                    'title' => 'ارسال الفيديو',
                    'desc'  => 'بعد انتهاء المعلم من تسجيل الفيديو الخاص بالدرس يقوم بتحميل الدرس في صفحة اضافة درس على Dropbox  كما هو موضح في الفيديو التالي
او اضافة اضافة الدرس على Google Drive  كما هو موضح في الفيديو التالي'
                ],
                3 => [
                    'title' => 'مراجعة الفيديوهات واضافاتها',
                    'desc'  => 'يقوم فريق نذاكر بمراجعة الفيديوهات  المضافة عن طريق  المدرسين وأولياء الأمور وبعدها يتم اضافتها الى فيديوهات نذاكر لتكون متاحة لأولياء الأمور والمدرسين بالمجان'
                ],
                4 => [
                    'title' => 'تصفح الآباء لنذاكر',
                    'desc'  => 'كل الدروس المضافة إلى موقع نذاكر تكون مقسمة  بناءا على المرحلة الدراسية والصف الدراسي وكل المواد المتاحة لهذا الصف ثم الفيديوهات الخاصة بكل مادة ويمكنك الوصول الى الفيديوهات المتوفرة على الموقع من خلال'
                    . '<a href="' . route('lesson.all') . '"> الضغط هنا</a>'
                ],
            ],
        ],
        'termsAndConditions' => [
            'title' => 'الشروط والاحكام',
            'desc'  => 'يتعين عليك الموافقة على البنود الواردة في هذه الاتفاقية حتى يتسنى لك استخدام الخدمات التي يقدمها "نذاكر", إلا أن مجرد استخدامك لهذه الخدمات يعد موافقة ضمنية و تلقائية على هذه الشروط..',
            'rules' => [
                0 => 'هذه الموقع مخصص فقط لاستخدامك الشخصي. لا يجوز لك نسخ أي محتوى أو أية مادة من هذا الموقع أو الترخيص باستخدامها أو تغييرها أو توزيعها أو استبدالها أو تعديلها أو بيعها أو نقلها بما في ذلك على سبيل المثال لا الحصر أي نص أو صور أو ملفات صوت أو فيديو أو روابط لأي أغراض تجارية أو عامة.',
                1 => 'يمنحك "نذاكر" حقًا محدودًا غير حصري وغير قابل للتنازل عنه لدخول هذا الموقع ومشاهدته واستخدامه ومباشرة عمليات عليه. إنك توافق على عدم عرقلة أو الإقدام على عرقلة تشغيل هذا الموقع بأي شكل. غير مسموح بالدخول إلى أجزاء معينة من الموقع إلا للأعضاء المسجلين فقط. ولتصبح عضوًا مسجلاً، قد يشترط الإجابة على أسئلة معينة وتقديم تفاصيل معينة. والأجوبة على هذه الأسئلة والتفاصيل تكون إلزامية. إنك تقر وتضمن صحة ودقة كل المعلومات التي تقدمها لنا عن نفسك وعن الآخرين.',
                2 => 'باستثناء المعلومات أو المنتجات أو الخدمات المبين بوضوح أنها مقدمة بواسطة "نذاكر"، لا يقوم بتشغيل أو رقابة أو إقرار أية معلومات أو منتجات أو خدمات متواجدة على الإنترنت بأي شكل.
يجوز لشركة "نذاكر" إضافة أي محتوى أو خدمات أخرى منشورة على هذا الموقع أو تغييرها أو إيقافها أو إزالتها أو تعليقها بما في ذلك ميزات ومواصفات المنتجات المشروحة أو المصورة على الموقع وذلك بصورة مؤقتة أو نهائية في أي وقت دون إشعار بذلك وأدنى مسؤولية.',
                3 => 'عند إرسالك أي ملف فيديو “نذاكر” فأنك تكون قد منحت الشركة حق استخدام ملفات الفيديو والمحتوى التعليمي بشكل حصري "نذاكر" وبالطريقة التي تناسبها بما في ذلك استخدامه سواء بالبيع أو الترخيص أو غيره، كما يحق "لنذاكر" تعديله والإضافة عليه والحذف منه كيفما تشاء.',
            ],
        ]
    ]
];
