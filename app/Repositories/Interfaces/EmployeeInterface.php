<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\EmployeeRequest;

interface EmployeeInterface {
    public function getall();
    public function create( EmployeeRequest $request );
    public function getone( string $id );
    public function update( EmployeeRequest $request, string $id);
    public function delete( string $id );
}