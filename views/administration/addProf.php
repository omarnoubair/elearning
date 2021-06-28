
<form class="form-horizontal" id="addprof" method="post" action="<?php echo BASE_URL."/administration/addProfAction"?>">
<fieldset>

<!-- Form Name -->
<legend>Ajouter un professeur</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="EmailText">Email</label>  
  <div class="col-md-4">
      <input id="EmailText" name="EmailText" type="email" placeholder="Entrez un email" class="form-control input-md" >  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="NomText">Nom</label>  
  <div class="col-md-4">
  <input id="NomText" name="NomText" type="text" placeholder="Entrez le nom" class="form-control input-md ">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="PrenomText">Prenom</label>  
  <div class="col-md-4">
  <input id="PrenomText" name="PrenomText" type="text" placeholder="Entrez le Prenom" class="form-control input-md">
 
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="PrenomText">Pseudo</label>  
  <div class="col-md-4">
  <input id="PseudoText" name="PseudoText" type="text" placeholder="Entrez le Pseudo" class="form-control input-md">

  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telephoneText">Telephone</label>  
  <div class="col-md-4">
  <input id="telephoneText" name="telephoneText" type="text" placeholder="Entrez le numéro de téléphone" class="form-control input-md">

  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="Photo">Photo</label>
  <div class="col-md-4">
    <input id="Photo" name="Photo" class="input-file" type="file">
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ValiderBtn"></label>
  <div class="col-md-8">
      <button type="submit" id="ValiderBtn" name="ValiderBtn" class="btn btn-success">Valider</button>
  </div>
</div>

</fieldset>
</form>
