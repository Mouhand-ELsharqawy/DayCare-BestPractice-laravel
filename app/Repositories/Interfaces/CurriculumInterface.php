<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\CurriculumRequest;

interface CurriculumInterface {
    public function getall();
    public function create( CurriculumRequest $request );
    public function getone( string $id );
    public function update( CurriculumRequest $request, string $id);
    public function delete( string $id );
}