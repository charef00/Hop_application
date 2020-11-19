<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


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
  .btn_ajouter
  {
    background-color: #adcf63;
    border: none;
    color: white;

  }

  #table_id th
  {
    background-color: #3e7fa8;
    color: white;
    font-weight: bold;
  }

  #table_id td
  {
    
    color: black;
  }

  .icon_mode
  {
        margin-right: 6px;
  }

  </style>
  <script type="text/javascript">
    $(document).ready( function () {
          $('#table_id').DataTable();
      } );
  </script>
</head>

<body>
<div class="col-md-1"></div>
<div class="element_border_shadow col-md-10">
<h1 style="margin:0">Nom Prenom </h1>
<hr>
  <div class="row" style="margin-top: 20px">
          <a href="{{route('contact.create')}}"> <button type="button" class="btn btn-sm btn_ajouter" style="margin-bottom: 15px" ><i class="fa fa-plus-square"></i> | Ajouter un contact</button></a>
          
  </div>
  <div class="row">

      <table id="table_id" class="display Faker">
          <thead>
              <tr>
                  <th>Civilite</th>
                  <th>Prénom</th>
                  <th>Nom</th>
                  <th>Téléphone</th>
                  <th>E-mail</th>
                  <th>Société</th>
                  <th>Ville</th>
                  <th><i class="fa fa-bars" style="float: right;"></i></th>
              </tr>
          </thead>
          <tbody>
            @foreach($contacts as $contact)
              <tr>
                    <td>
                        @if($contact->civilite==0)
                            <i class="fa fa-female" style="color:#f08ec1"></i>
                        @else
                            <i class="fa fa-male" style="color:#95cdea"></i>
                        @endif
                    </td>
                      <td>{{$contact->prenom}}</td>
                      <td>{{$contact->nom}}</td>
                      <td>{{$contact->telephone}}</td>
                      <td>{{$contact->email}}</td>
                      <td>{{$contact->nom_societe}}</td>
                      <td>{{$contact->ville_societe}}</td>
                      <td>
                          <a href="{{route('contact.edit',$contact->id)}}" class="icon_mode"><i class="fa fa-edit" ></i></a>

                          <form method="post" action="{{ route('contact.destroy',$contact) }}" style="display: contents;" onsubmit="return confirm('Vous êtes sûre?')">
                                                         {{ csrf_field() }}
                                                         {{ method_field('delete') }}
                                                         
                                                         <button type="submit" class="icon_mode" style="background: none;border: none; "><i class="fa fa-trash" style="color: #337ab7"></i></button> 
                          </form>
                          <a href="{{route('contact.show',$contact->id)}}" ><i class="fa fa-eye" ></i></a>
                      </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>

</div>

  

</body>
</html>