<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\bien;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function PHPUnit\Framework\assertTrue;

class BienControllerTest extends TestCase
{
    public function testStoreBien()
    {
        $bien = [
            'nom' => 'belle villa',
            'categorie' => 'luxe',
            'adresse' => 'mermoz',
            'image' => 'url_de_l_image',
            'description' => 'kjoidfhdk',
            'statu' => 'disponible', // Correction de la clé
            'datePublication' => '2024-02-01',
        ];

        $response = $this->post('/savebien', $bien);
        $this->assertDatabaseHas('biens', $bien);
    }

    public function testlisterBien()
    {
        $biens = Bien::all();
        $response = $this->get('/dashboard/admin');
        $response->assertStatus(200);

    }
    public function testsupprimerBien(){
        $biens = bien::FindOrFail(1);
        $response = $this->get('/delete/produit/'.$biens->id);
        $response->assertStatus(302);
    }


}
