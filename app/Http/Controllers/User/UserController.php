<?php
namespace App\Http\Controllers\User;

use App\Forms\ProfileForm;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Kris\LaravelFormBuilder\Facades\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

/**
 * @Controller(prefix="teacher")
 * @Middleware("web")
 * @Middleware("auth")
 */
class UserController extends Controller
{

    use FormBuilderTrait;

    /**
     * Display a listing of the resource.
     *
     * @Get("/profile/edit", as="user.profile.edit")
     * 
     * @return View
     */
    public function editProfile()
    {
        $user = Auth::User();

        $form = FormBuilder::create(ProfileForm::class, [
                'method' => 'PATCH',
                'url' => route('user.profile.update'),
                'model' => $user
                ], [
                'isEdit' => true
                ]
        );

        $data = [
            'user' => $user,
            'form' => $form
        ];
        return view('user.profile.edit', $data);
    }

    /**
     * Update the user.
     *
     * @Patch("/profile/update", as="user.profile.update")
     * 
     * @return RedirectResponse|Redirector
     */
    public function update(UserService $userService)
    {
        $form = $this->form(ProfileForm::class, [], ['isEdit' => true]);

        // Or automatically redirect on error. This will throw an HttpResponseException with redirect
        $form->redirectIfNotValid();

        $user = Auth::user();

        $userService->editProfile($user, $form->getFieldValues());

        Session::flash('flash_message', 'Your profile is updated!');

        return redirect(route('app.dashboard'));
    }
}
