<?php
namespace App\Http\Controllers;

use App\Entities\User;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use LaravelDoctrine\ORM\Facades\EntityManager;

class HomeController extends Controller
{

    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index(EntityManagerInterface $em)
    {
        $repository = EntityManager::getRepository(User::class);

        //dd($repository->findAll());
        return view('welcome');
    }
}
