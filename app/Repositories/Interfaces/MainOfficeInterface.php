<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\MainOfficeRequest;

interface MainOfficeInterface {
    public function getall();
    public function create( MainOfficeRequest $request );
    public function getone( string $id );
    public function update( MainOfficeRequest $request, string $id);
    public function delete( string $id );
}