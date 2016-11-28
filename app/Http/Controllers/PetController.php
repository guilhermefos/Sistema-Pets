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
        $search = \Request::get('search');

        if($search !== null){
            $pets = \App\Pet::where('name', 'like','%'.$search.'%')->get();
        } else {
            $pets = \App\Pet::all();
        }
        return view('layout.list', ['pets' => $pets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.insert');
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

        if ($pet = $this->createPet($request))
            return $this->index();
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
                'born'      => $pet->born,
                'owner'     => $pet->owner,
                'phone'     => $pet->phone
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pet = \App\Pet::find($id);
        return view('layout.edit', ['pet' => $pet]);
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
        \App\Pet::where('id', $id)
            ->update([
                'name'   => $request->name,
                'gender' => $request->gender,
                'born'   => $request->born,
                'owner'  => $request->owner,
                'phone'  => $request->phone,
                ]);
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Pet::destroy($id);
        return $this->index();
    }
}
