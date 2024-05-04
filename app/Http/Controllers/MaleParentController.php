<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaleParentRequest;
use App\Repositories\Interfaces\MaleParentInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class MaleParentController extends Controller
{

    use GeneralTrait;

    private MaleParentInterface $malerepo;
    public function __construct(MaleParentInterface $malerepo) {
        $this->malerepo = $malerepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $males = $this->malerepo->getall();
            return $this->getData("All Male Parents", $males);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaleParentRequest $request)
    {
        try{
            $male = $this->malerepo->create($request);
            return $this->getData("Male Parent Created", $male);
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
            $male = $this->malerepo->getone($id);
            return $this->getData("The Selected Male Parent", $male);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaleParentRequest $request, string $id)
    {
        try{
            $male = $this->malerepo->update($request,$id);
            return $this->getData("Male Parent Updated", $male);
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
            $this->malerepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
