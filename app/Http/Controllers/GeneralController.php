<?php
namespace App\Http\Controllers;

use App\Forms\ContactUsForm;
use App\Services\NotifiableAdmin;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Kris\LaravelFormBuilder\Facades\FormBuilder;
use function redirect;
use function route;
use function view;

/**
 * @Controller(prefix="")
 * @Middleware("web")
 */
class GeneralController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @Get("/about-us", as="general.aboutUs")
     * 
     * @return Response
     */
    public function aboutUs()
    {
        return view('general.about_us');
    }

    /**
     * Show the application dashboard.
     *
     * @Get("/how-it-works", as="general.howItWorks")
     * 
     * @return Response
     */
    public function howItWorks()
    {
        return view('general.how_it_works');
    }

    /**
     * Show the contact us page.
     *
     * @Get("/contact-us", as="general.contactUs")
     * 
     * @return Response
     */
    public function contactUs()
    {
        $contactUsForm = FormBuilder::create(ContactUsForm::class, [
                'method' => 'POST',
                'url' => route('general.postContactUs')
        ]);

        $data = [
            'contactUsForm' => $contactUsForm,
        ];

        return view('general.contact_us', $data);
    }

    /**
     * Post the contact us form.
     *
     * @Post("/contact-us", as="general.postContactUs")
     * 
     * @return Response
     */
    public function storeContactUS()
    {
        $form = $this->form(ContactUsForm::class);

        // Or automatically redirect on error. This will throw an HttpResponseException with redirect
        $form->redirectIfNotValid();

        $contactUs = \App\Models\ContactUs::create($form->getFieldValues());

        Notification::send(NotifiableAdmin::getInstance(), new \App\Notifications\ContactUs($contactUs));

        Session::flash('flash_message', trans('general.form.contactUs.thanks'));

        return redirect(route('general.contactUs'));
    }
}
