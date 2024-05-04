<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainOfficeRequest;
use App\Repositories\Interfaces\MainOfficeInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class MainOfficeController extends Controller
{

    use GeneralTrait;

    private MainOfficeInterface $mainrepo;

    public function __construct(MainOfficeInterface $mainrepo) {
        $this->mainrepo = $mainrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $mains = $this->mainrepo->getall();
            return $this->getData("All Main Offices", $mains);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MainOfficeRequest $request)
    {
        try{
            $main = $this->mainrepo->create($request);
            return $this->getData("Main Office Created", $main);
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
            $main = $this->mainrepo->getone($id);
            return $this->getData("The Selected Main Office", $main);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MainOfficeRequest $request, string $id)
    {
        try{
            $main = $this->mainrepo->update($request,$id);
            return $this->getData("Main Office Updated", $main);
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
            $this->mainrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
