<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildrenRequest;
use App\Repositories\Interfaces\ChildrenInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    use GeneralTrait;

    private ChildrenInterface $childrepo;

    public function __construct(ChildrenInterface $childrepo) {
        $this->childrepo = $childrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $childrens = $this->childrepo->getall();
            return $this->getData("All Children", $childrens);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChildrenRequest $request)
    {
        try{
            $children = $this->childrepo->create($request);
            return $this->getData("Children Created", $children);
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
            $children = $this->childrepo->getone($id);
            return $this->getData("The Selected Children", $children);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChildrenRequest $request, string $id)
    {
        try{
            $children = $this->childrepo->update($request,$id);
            return $this->getData("All Children", $children);
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
