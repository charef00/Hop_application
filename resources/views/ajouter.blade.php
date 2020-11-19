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
   .btn_ajouter
  {
    background-color: #adcf63;
    border: none;
    color: white;

  }
  .btn_selected
  {
    background-color:#b3b3b3;
  }
  .civilite:hover
  {
    color:white;
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
  </script>
</head>
<body>
<div class="col-md-1"></div>
<form class="element_border_shadow col-md-10" method="post" action="{{route('contact.store')}}">
  @csrf
  <input type="hidden" name="civilite" id="civilite" value="1">
<h1 style="margin:0">Ajouter un contact</h1>
<hr>




<div class="row " >
<div class="col-md-6 ">


  <div class="form_element_border">
     <h3> Identité du contact</h3>
     <label for="civilite">Civilité</label>
      <div class="form-row">
         <div class="form-group " >
            <button type="button" class="btn btn-sm madame civilite" val="0"  onclick="choisirCivilite('madame')"><i class="fa fa-female"></i> | Madame</button>
            <button type="button" class="btn btn-sm monsieur civilite btn_selected disabled" val="1" onclick="choisirCivilite('monsieur')"><i class="fa fa-male"></i> | Monsieur</button>
          </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6 form_element" >
          <label for="prenom">Prénom</label>
          <input type="text" class="form-control" id="prenom" name="prenom" placeholder="" required>
        </div>
        <div class="form-group col-md-6 form_element form_element_margin_right">
          <label for="nom">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom" placeholder="" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6 form_element">
          <label for="fonction">Fonction</label>
          <input type="text" class="form-control" id="fonction" name="fonction" placeholder="fonction">
        </div>
        <div class="form-group col-md-6 form_element form_element_margin_right">
          <label for="service">Service</label>
          <input type="text" class="form-control" id="service" name="service" placeholder="service">
        </div>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email"  name="email" placeholder="Email" required>
      </div>

    <div class="form-row">
        <div class="form-group col-md-7 form_element">
          <div class="col-md-6 form_element">
            <label for="telephone">Téléphone mobile</label>
            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="00000">
          </div>
          <div class="col-md-6 form_element">
            <label for="date_naissance">Date de naissance</label>
            <input type="text" class="form-control" name="date_naissance" id="datepicker" placeholder="04/08/1993">
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
        <input type="text" class="form-control" id="nom_societe" name="nom_societe"  placeholder="nom de Société">
      </div>

      <div class="form-group">
        <label for="adresse_societe">Adresse</label>
        <textarea class="form-control" rows="4" id="adresse_societe" name="adresse_societe" style="padding: 7px;"></textarea>
        
      </div>
  

      <div class="form-row">
            <div class="form-group col-md-4 form_element">
              <label for="code_postal_societe">Code postal</label>
              <input type="number" class="form-control" id="code_postal_societe" name="code_postal_societe" placeholder="">
            </div>
            <div class="form-group col-md-8 form_element form_element_margin_right">
              <label for="ville_societe">Ville</label>
              <input type="text" class="form-control" id="ville_societe" name="ville_societe" placeholder="ville">
            </div>
          
          
        </div>


      <div class="form-row">
            <div class="form-group col-md-4 form_element">
              <label for="telephone_societe">Téléphone mobile</label>
              <input type="text" class="form-control" id="telephone_societe" name="telephone_societe" placeholder="00000">
            </div>
            <div class="form-group col-md-8 form_element form_element_margin_right">
              <label for="site_web_societe">Site web</label>
              <input type="text" class="form-control" id="site_web_societe" name="site_web_societe" placeholder="http://site web">
            </div>
          
          
        </div>

  
    </div>

  </div>
</div>



<div class="form-row" style="margin-top: 20px">
         <div class="form-group " >
          <button type="submit" class="btn btn-sm btn_ajouter" ><i class="fa fa-plus-square"></i> | Ajouter</button>
          <a href="{{route('accueil')}}"><button type="button" class="btn btn-sm btn_return_list" ><i class="fa fa-list"></i> | Retour à la liste des contacts</button></a>
            
          </div>
      </div>
</form>

  

</body>
</html>