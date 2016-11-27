<?php

namespace App\Http\Controllers;

use App\Pet;

use View;

use Illuminate\Http\Request;

use App\Http\Requests;

class PetController extends Controller
{
    /**
     * The pets instance.
     */
    protected $pets;


    /**
     * Create a new controller instance.
     *
     * @param  Pet  $pets
     * @return void
     */
    public function __construct(Pet $pets)
    {
        $this->pets = $pets;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->pets = \App\Pet::all();

        /**foreach ($this->pets as $pet) {

            $petOwner = $pet->owners->toArray();

            var_dump($pet->name .', '. $pet->born .', '. $pet->gender .' | dono(a) '. $petOwner[0]['name'] .', '. $petOwner[0]['phone']);
        }
        die(); **/
        return view('layout.pets', ['pets' => $this->pets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $pet    = $this->createPet($request);
        $owner  = $this->createOwner($request);

        $pet->owners()->attach($owner->id);
    }

    /**
     * Create or update Pet.
     *
     * @param \Illuminate\Http\Request  $pet
     *
     * @return \App\Pet
     */
    private function createPet($pet)
    {
        return \App\Pet::updateOrCreate([
                'name'      => $pet->name,
                'gender'    => $pet->gender,
                'born'      => $pet->born
            ]);
    }

    /**
     * Create or update Owner.
     *
     * @param \Illuminate\Http\Request  $owner
     * @return App\Owner
     */
    private function createOwner($owner)
    {
        return \App\Owner::updateOrCreate([
                'name'   => $owner->owner,
                'phone'  => $owner->phone,
            ]);
    }

    /**
     * Validation data
     *
     * @param array $data
     * @return
     */
    private function validation($data)
    {
        $this->validate($data, [
            'name'      => 'required',
            'gender'    => 'required',
            'born'      => 'required',
            'owner'     => 'required',
            'phone'     => 'required'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
