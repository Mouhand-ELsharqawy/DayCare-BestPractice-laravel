<?php

namespace App\Http\Controllers;

use App\Http\Requests\FemaleParentRequest;
use App\Repositories\Interfaces\FemaleParentInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class FemaleParentController extends Controller
{

    use GeneralTrait;

    private FemaleParentInterface $femalerepo;

    public function __construct(FemaleParentInterface $femalerepo) {
        $this->femalerepo = $femalerepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $femaleparents = $this->femalerepo->getall();
            return $this->getData("All Female Parent", $femaleparents);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FemaleParentRequest $request)
    {
        try{
            $femaleparent = $this->femalerepo->create($request);
            return $this->getData("Female Parent created", $femaleparent);
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
            $femaleparent = $this->femalerepo->getone($id);
            return $this->getData("The Selected Female Parent", $femaleparent);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FemaleParentRequest $request, string $id)
    {
        try{
            $femaleparent = $this->femalerepo->update($request,$id);
            return $this->getData("Female Parent Updated", $femaleparent);
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
            $this->femalerepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
