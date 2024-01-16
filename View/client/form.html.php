<div class="m-auto w80">
      <h1 class="titre text-light">Saisie Client</h1>
       <form action="client&action=save" method='post'> <!-- pour que les donnees se mettent sur $_POST il faut ecrire method='post' sinon il mettra tout dans l'url en $_GET-->
            <div class="line-input hidden">
                  <label for="id" class="lab30">ID</label>
                  <input type="text" class="form-input w20 text-dark" id='id' name='id' value='<?=$id?>' <?=$disabled?>>
            </div>
            <div class="line-input">
                  <label for="numClient" class="lab30">Code</label>
                  <input type="text" class="form-input w20 text-dark"  id='numClient' name='numClient' value='<?=$numClient?>' <?=$disabled?>>
            </div>
            <div class="line-input">
                  <label for="nomClient" class="lab30">Nom</label>
                  <input type="text" class="form-input w20 text-dark" id='nomClient' name='nomClient' value='<?=$nomClient?>' <?=$disabled?>>
            </div>
            <div class="line-input">
                  <label for="adresseClient" class="lab30">Adresse</label>
                  <input type="text" class="form-input w20 text-dark" id='adresseClient' name='adresseClient' value='<?=$adresseClient?>' <?=$disabled?>>
            </div>
            
            <div class="div-btn">
                  <input type="reset" class="btn btn-md btn-danger" value='Annuler' <?=$disabled?>>
                  <input type="submit" class="btn btn-md btn-primary" value='Valider' <?=$disabled?>>
            </div>
      </form>
      
</div>