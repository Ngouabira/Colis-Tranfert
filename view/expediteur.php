<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expéditeur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>
</head>
<body  style="overflow-x:hidden">

<br> <br>

<div class="row">

    <div class="col-lg-8 offset-2">

    <form class="row g-3">
  <div class="col-md-6">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom" placeholder="NGOUABIRA">
  </div>
  <div class="col-md-6">
    <label for="prenom" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="prenom" placeholder="Valdy">
  </div>

  <div class="col-md-2">
    <label for="genre" class="form-label">Genre</label>
    <select id="genre" class="form-select">
      <option selected>...</option>
      <option value="Masculin">Masculin</option>
      <option value="Feminin">Feminin</option>
    </select>
  </div>

  <div class="col-md-5">
    <label for="telephone" class="form-label">Téléphone</label>
    <input type="phone" class="form-control" id="telephone">
  </div>
  
  <div class="col-md-5">
    <label for="cni" class="form-label">Cni</label>
    <input type="file" class="form-control" id="cni">
  </div>

  <div class="col-12">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Valdyngouabira@gmail.com">
  </div>
  <div class="col-12">
    <label for="adresse" class="form-label">Adresse</label>
    <input type="text" class="form-control" id="adresse" placeholder="Dakar, studio, or floor">
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary" id="validate">Add</button>
  </div>
</form>

    </div>

</div>

<br>

<div class="row">

    <div class="col-lg-10 offset-1">

    <table id="myTable" class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Genre</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Email</th>
      <th scope="col">Adresse</th>
      <th scope="col">Cni</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody id="expediteur">
   
  </tbody>
</table>


    </div>

</div>


<script>

var Expediteurid;

function getData(){

  $.get("http://localhost/livraison/controller/ExpediteurController.php?action=all").done((data)=>{

    $("#expediteur").html("")

    var expediteurs = JSON.parse(data);

    for(var e of expediteurs){

  $("#expediteur").append('<tr><td>'+e.id+'</td><td> '+e.nom + '</td><td> '+e.prenom+
  '</td><td>'+e.genre+'</td><td> '+e.telephone+'</td><td> '+e.email+'</td><td> '+e.adresse+
  '</td><td> '+e.cni+
  '</td><td><button class="btn btn-success" onclick="edit('+e.id+')" id="edit" class="edit">Edit</button>  <button class="btn btn-danger" class="delete" id="delete" onclick="remove('+e.id+')">Delete</button></td></tr>');

       }
    })
}


function edit(id){

  Expediteurid = id;

   $.get("http://localhost/livraison/controller/ExpediteurController.php?action=one&id="+id).done((data)=>{

   this.expediteur = JSON.parse(data)
   $("#nom").val(expediteur.nom)
   $("#prenom").val(expediteur.prenom)
   $("#genre").val(expediteur.genre)
   $("#telephone").val(expediteur.telephone)
   $("#email").val(expediteur.email)
   $("#adresse").val(expediteur.adresse)
   $("#validate").html("Update")

    })
}

function add(){

        nom = $("#nom").val()
        prenom = $("#prenom").val()
        genre = $("#genre").val()
        telephone = $("#telephone").val()
        email = $("#email").val()
        adresse = $("#adresse").val()


      $.post("http://localhost/livraison/controller/ExpediteurController.php?action=add",
      {
        nom :nom,
        prenom : prenom,
        genre : genre,
        telephone : telephone,
        email : email,
        adresse : adresse,
        cni : "example.jpg"
      },

      ).done((data,status)=>  {
       
            if(data.trim()=="OK") {

                Swal.fire(
                   {title: 'Ajout!',
                    text:'Enregistrement effectué!',
                    icon:'success'}
                    )

                    getData();
                    clear()
                
            } else {

                Swal.fire(
                  { title: 'Erreur!',
                    text:data,
                    icon:'error'}
                    )

                //alert("Data: " + data + "\nStatus: " + status);
            }
            
        });
}

function update(id){

        nom = $("#nom").val()
        prenom = $("#prenom").val()
        genre = $("#genre").val()
        telephone = $("#telephone").val()
        email = $("#email").val()
        adresse = $("#adresse").val()

  Swal.fire({
      title: 'Êtes-vous sûr?',
      text: "Voulez-vous modifier ?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText:'Annuler',
      confirmButtonText: 'Oui modifier'
    })
    .then((result) => {
        
      if (result.isConfirmed) {
    
      $.post("http://localhost/livraison/controller/ExpediteurController.php?action=update&id="+id,
      {
        nom :nom,
        prenom : prenom,
        genre : genre,
        telephone : telephone,
        email : email,
        adresse : adresse,
        cni : "example.jpg"
      }).done((data, status)=>{
    
                 
              if(data.trim()=="OK") {

                Swal.fire(
                  {title: 'Modification!',
                    text:'Enregistrement effectué!',
                    icon:'success'}
                    )

                    getData();
                    clear()
                    $("#validate").html("Add")

                } else {

                Swal.fire(
                  { title: 'Erreur!',
                    text:data,
                    icon:'error'}
                    )

                //alert("Data: " + data + "\nStatus: " + status);
                }  
    
                })
            }
    
    })
  
}


function remove(id) {
    
    Swal.fire({
      title: 'Êtes-vous sûr?',
      text: "La suppression est définitive!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText:'Annuler',
      confirmButtonText: 'Oui supprimer'
    })
    .then((result) => {
        
      if (result.isConfirmed) {
    
      $.get("http://localhost/livraison/controller/ExpediteurController.php?action=delete&id="+id).done((data, status)=>{
    
                    Swal.fire({
                    title:'Supprimée!',
                    text:'Expéditeur supprimé',
                    icon:'success',
                    confirmButtonText: 'Ok'
                    })

                    getData()
    
                })
            }
    
       })
    
}


function clear(){

    $("#nom").val("")
    $("#prenom").val("")
    $("#genre").val("")
    $("#telephone").val("")
    $("#email").val("")
    $("#adresse").val("")

}

$(document).ready(function(e){

  
  var expediteur;

    getData()

        
 $("#validate").click(function (e) { 

    e.preventDefault();
    var test =  $("#validate").html()
    if (test=="Add") {
      add()
    } else if(test=="Update") {
      update(Expediteurid);
    }
    else {
      alert("Erreur")
    }
   
       
 })
})

</script>
    
</body>
</html>