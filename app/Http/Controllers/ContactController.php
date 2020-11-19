<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contacts=Contact::all();
        
        return view('welcome',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ajouter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact=new Contact();



        // nom, prénom et email obligatoires
       $this->validate($request, 
            [
                'nom' => 'required',
                'prenom' => 'required',
                'email' => 'required|email', // email bien formé : xxxxxx@yyyy.zz
            ]);
        
       
        $contact->civilite=$request->input('civilite');
        $contact->prenom=ucfirst(strtolower($request->input('prenom')));// Met le premier caractère en majuscule pour le nom et prenom
        $contact->nom=ucfirst(strtolower($request->input('nom')));
        $contact->fonction=$request->input('fonction');
        $contact->service=$request->input('service');
        $contact->email=$request->input('email');
        $contact->telephone=$request->input('telephone');
        $contact->date_naissance=$request->input('date_naissance');
        $contact->nom_societe=$request->input('nom_societe');
        $contact->adresse_societe=$request->input('adresse_societe');
        $contact->code_postal_societe=$request->input('code_postal_societe');
        $contact->ville_societe=$request->input('ville_societe');
        $contact->telephone_societe=$request->input('telephone_societe');
        $contact->site_web_societe=$request->input('site_web_societe');


      

        $contact->save();

        return redirect()->route('accueil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact =Contact::findOrFail($id);
        $mode_edit="disabled";
        return view('detail',compact('contact','mode_edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact =Contact::findOrFail($id);
        $mode_edit="";
        return view('detail',compact('contact','mode_edit'));
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
       $contact =Contact::findOrFail($id);

         $this->validate($request, 
            [
                'nom' => 'required',
                'prenom' => 'required',
                'email' => 'required|email', // email bien formé : xxxxxx@yyyy.zz
            ]);
        
       
        $contact->civilite=$request->input('civilite');
        $contact->prenom=ucfirst(strtolower($request->input('prenom')));// Met le premier caractère en majuscule pour le nom et prenom
        $contact->nom=ucfirst(strtolower($request->input('nom')));
        $contact->fonction=$request->input('fonction');
        $contact->service=$request->input('service');
        $contact->email=$request->input('email');
        $contact->telephone=$request->input('telephone');
        $contact->date_naissance=$request->input('date_naissance');
        $contact->nom_societe=$request->input('nom_societe');
        $contact->adresse_societe=$request->input('adresse_societe');
        $contact->code_postal_societe=$request->input('code_postal_societe');
        $contact->ville_societe=$request->input('ville_societe');
        $contact->telephone_societe=$request->input('telephone_societe');
        $contact->site_web_societe=$request->input('site_web_societe');


      

        $contact->save();

        $mode_edit="disabled";
        return view('detail',compact('contact','mode_edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact =Contact::findOrFail($id);

        Contact::destroy($id);
           
       
        return redirect()->route('accueil');
    }
}
