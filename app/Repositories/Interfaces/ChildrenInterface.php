<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\ChildrenRequest;

interface ChildrenInterface {
    public function getall();
    public function create( ChildrenRequest $request );
    public function getone( string $id );
    public function update( ChildrenRequest $request, string $id);
    public function delete( string $id );
}
