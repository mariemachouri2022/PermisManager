<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermiRequest;
use App\Models\Permi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers;

use Str;
class PermiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    //    $permis=auth()->user()->permis()->paginate();
        $permis=Permi::All();
        $data=[

            'permis' => $permis
        ];

        return view('permis.mes-permis',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('permis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermiRequest $request)
    {

        DB::beginTransaction();
        try{
            $validated = $request->validated();



            Permi::create([
                'Num'=> $validated['Num'],
                'NumId' => $validated['NumId'],
                'Nom' => $validated['Nom'],
                'Prenom' => $validated['Prenom'],
                'Lieu' => $validated['Lieu'],
                'DateEdition' => $validated['DateEdition'],
                'DateDelivrance' => $validated['DateDelivrance'] ,
                'DateReussite' => $validated['DateReussite'],
                'Description' => $validated['Description'],



            ]);

        }catch(ValidationException $exception){
            DB::rollBack();
        }

        DB::commit();

        return redirect()->route('permis.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permi $permi)
    {
        //
        $data=[
            'Num' => 'Numéro permis: '.$permi->Num,
            'NumId' => 'Numéro carte d indentité: '.$permi->NumId,
            'Nom' => 'Nom: '.$permi->Nom,
            'Prenom' => 'Prénom: '.$permi->Prenom,
            'DateReussite' => 'Date de réussite: '.$permi->DateReussite,
            'DateDelivrance' => 'Date de délivrance: '.$permi->DateDelivrance,
            'DateEdition' => 'Date d édition : '.$permi->DateEdition,
            'Lieu' => 'Lieu: '.$permi->Lieu,
            'Description' => 'Description: '.$permi->Description,
            'heading' => config('app.name'),
            'permi' => $permi
        ];
        return view('permis.details-permis', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permi $permi)
    {

     $data=[
            'title' => $description="Editer PC ".$permi->Nom,
            'description' => $description,
            'heading' => $description,
            'permi' =>$permi
        ];
        return view('permis.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function update(PermiRequest $request, Permi $permi)
        {
        DB::beginTransaction();
            try{
                $validated = $request->validated();


                Permi::where('id',$permi->id)->update([
                    'Num'=> $validated['Num'],
                    'NumId' => $validated['NumId'],
                    'Nom' => $validated['Nom'],
                    'Prenom' => $validated['Prenom'],
                    'Lieu' => $validated['Lieu'],
                    'DateEdition' => $validated['DateEdition'],
                    'DateDelivrance' => $validated['DateDelivrance'] ,
                    'DateReussite' => $validated['DateReussite'],
                    'Description' => $validated['Description'],

                ]);

            }catch(ValidationException $exception){
                DB::rollback();
            }
            DB::commit();

            return redirect()->route('permis.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permi $permi)
    {

        DB::beginTransaction();
        try{
            $permi->delete();
        }catch(ValidationException $e){
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('permis.index');

    }
}

