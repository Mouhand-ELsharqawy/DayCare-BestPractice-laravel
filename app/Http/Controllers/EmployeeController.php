<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Repositories\Interfaces\EmployeeInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use GeneralTrait;

    private EmployeeInterface $employeerepo;

    public function __construct(EmployeeInterface $employeerepo) {
        $this->employeerepo = $employeerepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $employees = $this->employeerepo->getall();
            return $this->getData("All Employees", $employees);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        try{
            $employee = $this->employeerepo->create($request);
            return $this->getData("Employee Created", $employee);
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
            $employee = $this->employeerepo->getone($id);
            return $this->getData("The Selected Employee", $employee);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        try{
            $employee = $this->employeerepo->update($request,$id);
            return $this->getData("Employee Updated", $employee);
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
            $this->employeerepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
