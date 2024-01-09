<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BienControllerValidationTest extends TestCase
{
    public function testValidationRules()
    {
        $controller = new \App\Http\Controllers\BienController();

        $request = new \Illuminate\Http\Request();

        $validator = $controller->validateBien($request);

        $this->assertEquals([
            'nombien' => 'required|min:2|max:25',
            'categori' => 'required',
            'adresse' => 'required',
            'image' => 'required',
            'description' => 'required',
            'status' => 'required',
        ], $validator->getRules());
    }

}
