<?php

namespace Tests\App\Http\Controllers;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use TestCase;

class ParserControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index_status_code_should_be_200()
    {
        $this->get('/parsers')->seeStatusCode(200);
    }

    /** @test **/
/*    public function test_index_should_return_a_collection_of_records()
    {
        $this->get('/parsers')
            ->seeJson([
                'title' =>'Instalación y puesta en servicio de mamparas de separación pa la UCI'
            ]);
    }

    /** @test **/
  /*  public function test_store_should_save_new_book_in_the_database()
    {
        $this->post('/parsers', [
            'title'=> 'Prueba de licitacion',
            'summary' => 'prueba de summary',
            'link' => 'prueba de link'
        ]);

        $this->seeJson(['created' => true])
            ->seeInDatabase('parsers', ['title' => 'Prueba de licitacion']);
    }

    /** @test */
   /* public function test_store_should_respond_with_a_201_and_location_header_when_successful()
    {
        $this->post('/parsers', [
            'title'=> 'Prueba de licitacion',
            'summary' => 'prueba de summary',
            'link' => 'prueba de link'
        ]);

        $this->seeStatusCode(201)
            ->seeHeaderWithRegExp('Location', '#/parsers/[\d]+#');
    }
    */
}
