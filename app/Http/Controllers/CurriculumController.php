<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurriculumRequest;
use App\Repositories\Interfaces\CurriculumInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{

    use GeneralTrait;

    private CurriculumInterface $curriculumrepo;

    public function __construct(CurriculumInterface $curriculumrepo) {
        $this->curriculumrepo = $curriculumrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $curriculum = $this->curriculumrepo->getall();
            return $this->getData("Curriculum", $curriculum);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurriculumRequest $request)
    {
        try{
            $curriculum = $this->curriculumrepo->create($request);
            return $this->getData("Curriculum", $curriculum);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $curriculum = $this->curriculumrepo->getone($id);
            return $this->getData("Curriculum", $curriculum);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurriculumRequest $request, string $id)
    {
        try{
            $curriculum = $this->curriculumrepo->update($request,$id);
            return $this->getData("Curriculum", $curriculum);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->curriculumrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
