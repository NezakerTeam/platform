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

        if (!$subject) {
            abort(404);
        }

        $lessons = $subject->getActiveLessons();

        $lessonsChunks = [0 => [], 1 => []];

        $index = 0;
        foreach ($lessons as $lesson) {
            if (count($lesson->getApprovedContents()) > 0) {
                $lessonsChunks[$index % 2][] = $lesson;
                $index++;
            }
        }

        $data = [
            'subject'       => $subject,
            'lessonsChunks' => $lessonsChunks
        ];

        return view('curriculum.subject.show', $data);
    }
}
