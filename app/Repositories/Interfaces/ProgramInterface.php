<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\ProgramRequest;

interface ProgramInterface {
    public function getall();
    public function create( ProgramRequest $request );
    public function getone( string $id );
    public function update( ProgramRequest $request, string $id);
    public function delete( string $id );
}