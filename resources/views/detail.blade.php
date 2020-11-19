<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('themes/base/jquery-ui.css')}}">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

  <style>
    body
    {
      color:#b3b3b3;
    }
  .bg-1 { 
    background-color: #1abc9c;
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d;
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #ffffff;
    color: #555555;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .form_element
  {
    padding-left: 0px;
  }
  .form_element_margin_right
  {
    padding-right: 0px;
  }
  .form_element_border
  {
    border: 1px solid #95cdea;
    border-left: 4px solid #95cdea;
    padding: 15px;
    height: 440px;
  }
  .element_border_shadow 
  {
  border: 1px solid #b3b3b3;
  margin-top: 100px;
  padding: 20px;
  box-shadow: 1px 2px 3px 2px #888888;
  
  }
  .btn
  {
    
    font-weight: bold;
  }
  .madame
  {
    background-color: #f08ec1;
    border: none;
    color: white;

  }

  .monsieur
  {
    background-color: #95cdea;
    border: none;
    color: white;
  }
  .modifier
  {
    background-color: #95cdea;
    border: none;
    color: white;
  }

  .btn_return_list
  {
    background-color: #b3b3b3;
    border: none;
    color: white;
  }

  .btn_selected
  {
    background-color:#b3b3b3;
  }
  .inputElement
  {
    
  }
  </style>
   <script type="text/javascript">
    function choisirCivilite(cls)
    {
        $(".civilite").removeClass("disabled");
        $(".civilite").removeClass("btn_selected");

        $("."+cls).addClass("disabled");
        $("."+cls).addClass("btn_selected");

        $("#civilite").val($("."+cls).attr('val'));

    }
         
    // $( ".inputElement" ).prop( "disabled", true );
    function modifier()
    {
      $( ".inputElement" ).prop( "disabled", false );
      $(".civilite").prop( "disabled", false );
      $('.btn_save').css('display','inline-block');
      $('.modifier').css('display','none');
      $(".civilite").removeClass("disabled");
      $(".btn_selected").addClass("disabled");
    }

    function annuler()
    {
      $( ".inputElement" ).prop( "disabled", true );
      $(".civilite").prop( "disabled", true );
      $('.btn_save').css('display','none');
      $('.modifier').css('display','inline-block');
      $(".civilite").addClass("disabled");
    }


  </script>
</head>
<body>
<div class="col-md-1"></div>
<form class="element_border_shadow col-md-10" method="post" action="{{route('contact.update',$contact)}}">
  @csrf
  {{method_field('PUT')}}
  <input type="hidden" name="civilite" id="civilite" value="{{$contact->civilite}}">
<div style="margin:0"><span style="font-size: 30px">{{$contact->nom}} {{$contact->prenom}}</span> Contact</div>
<hr>




<div class="row " >
<div class="col-md-6 ">

    @php
      $madame="";
      $monsieur="btn_selected";
      if($contact->civilite==0)
      {
        $madame="btn_selected";
        $monsieur="";
      }

    @endphp

  <div class="form_element_border">
     <h3> Identité du contact</h3>
     <label for="civilite">Civilité</label>
      <div class="form-row">
         <div class="form-group " >
            <button type="button" class="btn btn-sm madame civilite {{$madame}}" val="0"  onclick="choisirCivilite('madame')" {{$mode_edit}} ><i class="fa fa-female"></i> | Madame</button>
            <button type="button" class="btn btn-sm monsieur civilite {{$monsieur}}" val="1" onclick="choisirCivilite('monsieur')" {{$monsieur}}><i class="fa fa-male"></i> | Monsieur</button>
          </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6 form_element" >
          <label for="prenom">Prénom</label>
          <input type="text" class="form-control inputElement " id="prenom" name="prenom" placeholder="" required value="{{$contact->prenom}}" {{$mode_edit}}>
        </div>
        <div class="form-group col-md-6 form_element form_element_margin_right">
          <label for="nom">Nom</label>
          <input type="text" class="form-control inputElement" id="nom" name="nom" placeholder="" required value="{{$contact->nom}}" {{$mode_edit}}>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6 form_element">
          <label for="fonction">Fonction</label>
          <input type="text" class="form-control inputElement" id="fonction" name="fonction" placeholder="" value="{{$contact->fonction}}" {{$mode_edit}}>
        </div>
        <div class="form-group col-md-6 form_element form_element_margin_right">
          <label for="service">Service</label>
          <input type="text" class="form-control inputElement" id="service" name="service" placeholder="" value="{{$contact->service}}"  {{$mode_edit}}>
        </div>
      </div>

      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control inputElement" id="email"  name="email" placeholder="" required value="{{$contact->email}}"  {{$mode_edit}}>
      </div>

    <div class="form-row">
        <div class="form-group col-md-7 form_element">
          <div class="col-md-6 form_element">
            <label for="telephone">Téléphone mobile</label>
            <input type="text" class="form-control inputElement" id="telephone" name="telephone" placeholder="" value="{{$contact->telephone}}" {{$mode_edit}}>
          </div>
          <div class="col-md-6 form_element">
            <label for="date_naissance">Date de naissance</label>
            <input type="text" class="form-control inputElement" name="date_naissance" id="datepicker" placeholder="" value="{{$contact->date_naissance}}"   {{$mode_edit}}>
          </div>
        </div>
        
      </div>
     

  
  </div>

</div>



   <div class="col-md-6 ">

    <div class="form_element_border">
      <h3> Société</h3>
      <div class="form-group">
        <label for="nom_societe">Nom</label>
        <input type="text" class="form-control inputElement" id="nom_societe" name="nom_societe"  placeholder="" value="{{$contact->nom_societe}}"  {{$mode_edit}}>
      </div>

      <div class="form-group">
        <label for="adresse_societe">Adresse</label>
        <textarea class="form-control inputElement" rows="4" id="adresse_societe" name="adresse_societe" style="padding: 7px;"   {{$mode_edit}}>{{$contact->adresse_societe}}</textarea>
        
      </div>
  

      <div class="form-row">
            <div class="form-group col-md-4 form_element">
              <label for="code_postal_societe">Code postal</label>
              <input type="number" class="form-control inputElement" id="code_postal_societe" name="code_postal_societe" placeholder="" value="{{$contact->code_postal_societe}}"  {{$mode_edit}}>
            </div>
            <div class="form-group col-md-8 form_element form_element_margin_right">
              <label for="ville_societe">Ville</label>
              <input type="text" class="form-control inputElement" id="ville_societe" name="ville_societe" placeholder="" value="{{$contact->ville_societe}}"  {{$mode_edit}}>
            </div>
          
          
        </div>


      <div class="form-row">
            <div class="form-group col-md-4 form_element">
              <label for="telephone_societe">Téléphone mobile</label>
              <input type="text" class="form-control inputElement" id="telephone_societe" name="telephone_societe" placeholder="" value="{{$contact->telephone_societe}}"  {{$mode_edit}}>
            </div>
            <div class="form-group col-md-8 form_element form_element_margin_right">
              <label for="site_web_societe">Site web</label>
              <input type="text" class="form-control inputElement" id="site_web_societe" name="site_web_societe" placeholder="" value="{{$contact->site_web_societe}}"   {{$mode_edit}}>
            </div>
          
          
        </div>

  
    </div>

  </div>
</div>




<div class="form-row" style="margin-top: 20px">
         <div class="form-group " >

          <button type="submit" class="btn btn-sm btn_save" style="background-color: #66ff99;
            @if($mode_edit!="")
              display: none;
            @endif
            "><i class="fa fa-save"></i> | Enregistrer</button>
            
          @if($mode_edit!="")
          <button type="button" class="btn btn-sm btn_save" style="background-color: #ff471a;display: none;" onclick="annuler()"><i class="fa fa-window-close"></i> | Annuler</button>
          <button type="button" class="btn btn-sm modifier" onclick="modifier()"><i class="fa fa-pencil"></i> | Modifier</button>
          @endif

          <a href="{{route('accueil')}}"><button type="button" class="btn btn-sm btn_return_list" ><i class="fa fa-list"></i> | Retour à la liste des contacts</button></a>
            
          </div>
      </div>
</form>

  

</body>
</html>