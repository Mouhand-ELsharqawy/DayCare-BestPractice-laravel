<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Repositories\Interfaces\ProgramInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class ProgramController extends Controller
{

    use GeneralTrait;

    private ProgramInterface $programrepo;

    public function __construct(ProgramInterface $programrepo) {
        $this->programrepo = $programrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $programs = $this->programrepo->getall();
            return $this->getData("All Programs",$programs);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramRequest $request)
    {
        try{
            $program = $this->programrepo->create($request);
            return $this->getData("Program Created",$program);
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
            $program = $this->programrepo->getone($id);
            return $this->getData("Program",$program);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramRequest $request, string $id)
    {
        try{
            $program = $this->programrepo->update($request,$id);
            return $this->getData("Program",$program);
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
            $this->programrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
