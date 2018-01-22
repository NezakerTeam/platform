<?php
namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Repositories\SubjectRepository;
use Illuminate\View\View;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use function view;

/**
 * @Controller(prefix="subject")
 * @Middleware("web")
 */
class SubjectController extends Controller
{

    use FormBuilderTrait;

    /**
     * Display the specified resource.
     *
     * @Get("/{id}", as="subject.show", where={"id": "[0-9]+"})
     * 
     * @param  int  $subjectId
     *
     * @return View
     */
    public function show($subjectId)
    {
        $subject = SubjectRepository::findById($subjectId);

        //dd($subject->lessons()->first());
        return view('curriculum.subject.show', ['subject' => $subject]);
    }
}
