<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BienControllerTest extends TestCase
{
    public function testStoreBien()
    {
        $data = [
            'nombien' => 'belle villa',
            'categori' => 'luxe',
            'adresse' => 'mermoz',
            'image' => 'url_de_l_image',
            'description' => 'kjoidfhdk',
            'status' => 'disponible',
            'datepub' => '2024-01-09', 
        ];

        $response = $this->post('/store-bien', $data);

        $response->assertRedirect('/dashboard/admin');
        $this->assertDatabaseHas('biens', $data);
    }
}
