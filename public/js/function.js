 function validateFormConception(e) {
    // Contrôler le fichier logo
    //e.preventDefault() ;
    if ( document.getElementById("logo") != null) {
        if (document.getElementById("logo").files[0] != undefined)
        {
            var logofile = document.getElementById("logo").files[0];
            var l = logofile.type ;
          if (l != "image/png" &&  l != "image/tiff" && l != "image/jpeg"
                && l != "image/gif" && l != "image/bmp" && l != 'application/pdf' 
                && l != "image/svg+xml")
            {
              alert("Le logo doit être au format : JPG, PNG ,JEPG , GIF, PDF ou SVG ! ");
              return false;
            }
        }
    }


    // Contrôler les fichiers images
    var files = document.getElementById("images").files;
          var rslt = false ;
      Object.keys(files).forEach(function (key){
        var blob = files[key]; 
        var ex = blob.type ;
        

        if (ex != "image/png" &&  ex != "image/tiff" && ex != "image/jpeg"
            && ex != "image/gif" && ex != "image/bmp" )
        {
          rslt = true ;
        }
      });

      if (rslt) {
        alert("Les images doivent être au format : JPG, PNG ,JEPG ou GIF ! ");
        document.getElementById("labelImages").style.color = "red"
        document.getElementById("images").value = ""
        return false;        
      }

    if ( document.getElementById("document") != null ) {
      if (document.getElementById("document").files[0] != undefined)
      {
      var documentfile = document.getElementById("document").files[0];
      var ext = documentfile.type;

        if (ext != 'image/png' && ext != 'application/pdf' && ext != 'image/jpeg'
        && ext != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        && ext != 'application/msword'
        && ext != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        && ext != 'application/vnd.ms-powerpoint'
        && ext != 'application/vnd.openxmlformats-officedocument.presentationml.presentation')
        {
          alert("Le document doit être au format : Word, PowerPoint, PDF, JPG, PNG ou Excel ! ");
          document.getElementById("labelDoc").style.color = "red"
          document.getElementById("document").value = '' ;
          return false;
        } 
      }
    }

return true ;


  }

// Valider le champs upload pour la modification du client 

 function validateFormModification(e) {

    // Contrôler les fichiers images
    var files = document.getElementById("doc").files;
          var rslt = false ;
      Object.keys(files).forEach(function (key){
        var blob = files[key]; 
        var ex = blob.type ;

      if (ex != 'image/png' && ex != 'application/pdf' && ex != 'image/jpeg'
        && ex != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        && ex != 'application/msword'
        && ex != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        && ex != 'application/vnd.ms-powerpoint'
        && ex != 'application/vnd.openxmlformats-officedocument.presentationml.presentation')
      {
          rslt = true ;
        }

      });

      if (rslt) {
        alert("Les images doivent être au format : Word, PowerPoint, PDF, JPG, PNG ou Excel ! ");
        document.getElementById("labelDoc").style.color = "red"
        document.getElementById("doc").value = ""

        return false;        
      }

return ( true );


  }

  // Valider l'upload des propositions


  function validateFormPropals() {

    //if ( formEditConception.propals !== undefined ) {

    var files = document.getElementById("propals").files;
    var l = files.length ;
      if (l != 3) {
        alert("Vous devez soumettre 3 propositions ! " );
        document.getElementById("propals").value = '' ;
        return false;
      }
      else
      {
          var resultat = false ;
          Object.keys(files).forEach(function (key){
          var blob = files[key]; 
          var ex = blob.type ;
          if (ex != "image/png" && ex != "image/jpeg" )
          {
            resultat = true ;
          }
            });
        if (resultat) {
          alert("Les propositions doivent être au format : JPG ou PNG ! ");
          document.getElementById("propals").value = ""
          return false;        
        }         
      }
  }

  function validateFormSendingModif() {
    if ( formModif1.modif != undefined ) {
      var documentfile = document.getElementById("modif").value;
      if(documentfile != '')
      {
      var l = documentfile.split('.').pop();

        if (l != 'png' && l != 'jpg' && l != 'jpeg')
        {
          alert("La proposition doit être au format : JPG ou PNG ! ");
          document.getElementById("labelPropal").style.color = "red"
          document.getElementById("modif").value = '' ;
          return false;
        }
      }
    }
  }

  function validateFormFinal() {
    var file = document.getElementById("pdf_conception").value;
    var l = file.split('.').pop();
    if (l != 'pdf') {
      alert("Vous devez soumettre un fichier PDF ! ");
      document.getElementById("pdf_conception").value = '' ;
      return false;
    }
  }



