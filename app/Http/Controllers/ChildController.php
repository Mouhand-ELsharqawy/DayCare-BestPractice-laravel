<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildRequest;
use App\Repositories\Interfaces\ChildInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class ChildController extends Controller
{

    use GeneralTrait;

    private ChildInterface $childrepo;

    public function __construct(ChildInterface $childrepo) {
        $this->childrepo = $childrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $childs = $this->childrepo->getall();
            return $this->getData("All Childs", $childs);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChildRequest $request)
    {
        try{
            $child = $this->childrepo->create($request);
            return $this->getData("Child Created", $child);
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
            $child = $this->childrepo->getone($id);
            return $this->getData("The Selected Child", $child);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChildRequest $request, string $id)
    {
        try{
            $child = $this->childrepo->update($request,$id);
            return $this->getData("The Updated Child", $child);
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
            $this->childrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
