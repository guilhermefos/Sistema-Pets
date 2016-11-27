<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PetTest extends TestCase
{
    public function testIndex()
    {
    	$pets = factory(App\Pet::class)->all();
    }

    public function testCreate()
    {

    }

    public function testStore()
    {

    }

    public function testShow()
    {

    }

    public function testEdit()
    {

    }

    public function testUpdate()
    {

    }

    public function testDestroy()
    {

    }

    /**
     * Test create model but not save them to the database.
     *
     * @return boolean true or false
     */
    public function testCreationOfModel()
    {
    	$pet = factory(App\Pet::class)->make();
    }
}
