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
        //
        $data=[
            'title' => $description="ajouter un nouveau permis",
            'description' => $description,

            'heading' => $description
        ];
        return view('permis.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermiRequest $request)
    {

     $user=User::find(1);

        DB::beginTransaction();
        try{
            $validated = $request->validated();



        $user->permis()->create([
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
    public function show($id)
    {
        //
        $data=[
            'Num' => 'Numéro permis: '.$permis->Num,
            'NumId' => 'Numéro carte d indentité: '.$permis->NumId,
            'Nom' => 'Nom: '.$permis->Nom,
            'Prenom' => 'Prénom: '.$permis->Prenom,
            'DateReussite' => 'Date de réussite: '.$permis->DateReussite,
            'DateDelivrance' => 'Date de délivrance: '.$permis->DateDelivrance,
            'DateEdition' => 'Date d édition : '.$permis->DateEdition,
            'Lieu' => 'Lieu: '.$permis->Lieu,
            'Description' => 'Description: '.$permis->Description,
            'heading' => config('app.name'),
            'permis' => $permis
        ];
        return view('permis.details-permis', $data);
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
        abort_if(auth()->user()->id !== $permis->organisateur->id,403 );

        $data=[
            'title' => $description="Editer PC ".$permis->Nom,
            'description' => $description,
            'heading' => $description,
            'permis' =>$permis
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
    public function update(PermiRequest $request, $id)
    {
        //
        abort_if($permis->organisateur->id !== auth()->id(),403);

        DB::beginTransaction();
        try{
            $validated = $request->validated();

            $poster=$permis>poster;
            $urlPoster=$permis->urlPoster;

            if(($request->file('poster')!==null)&&($request->file('poster')->isValid())){

                $ext=$request->file('poster')->extension();
                $fileName=Str::uuid().'.'.$ext;
                $poster=$request->file('poster')->storeAs('public/images',$fileName);
                $urlPoster=env('APP_URL').Storage::url($poster);



                //Supprimer l'ancien poster s'il existe
                DB::afterCommit(function() use($permis){
                    if($permis->poster!=null){
                        Storage::delete($permis->poster);
                    }

                });

            }
            Auth::user()->permis()->where('id',$permis->id)->update([
                'Num'=> $validated['Num'],
                'NumId' => $validated['NumId'],
                'Nom' => $validated['Nom'],
                'Prenom' => $validated['Prenom'],
                'Description' => $validated['Description'],
                'Lieu' => $validated['Lieu'],
                'poster' => $poster,
                'urlPoster' => $urlPoster,
                'Date_reussite_permis' => $validated['Date_reussite_permis'],
                'DateDelivrance' => $validated['DateDelivrance'] ,
                'DateEdition' => $validated['DateEdition'],
                'DateReussite' => $validated['DateReussite']

            ]);

        }catch(ValidationException $exception){
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('permis.show',[$permis]);
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
        abort_if($permis->organisateur->id !== auth()->id(),403);

        DB::beginTransaction();
        try{
            DB::afterCommit(function() use($permis){

                if($permis->poster!=null){
                    Storage::delete($permis->poster);
                }

            });

            $permis->delete();

        }catch(ValidationException $e){
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('permis.index');

    }
}
