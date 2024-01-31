<div class="m-auto w40 my-4">
      <h1 class="titre text-light">SAISIE ROLE</h1>
      <form action="role&action=save" method='post' enctype="multipart/form-data">

            <div class="mb-3 my-2 hidden">
                  <div>
                        <label for="id" class="lab30 form-label">ID</label>
                        <input class="form-control w20" type="text" id='id' name="id" value="<?=$id?>" <?=$disabled?>>
                  </div>
            </div>

            <div class="my-2 mb-3 col">
                  <div>
                        <label for="rang" class="lab30 obligatoire form-label">rang</label>
                  </div class='col'>
                  <div>
                        <input required class="form-control w20" type="text" id='rang' name="rang" value="<?=$rang?>"
                              <?=$disabled?>>
                  </div>
            </div>

            <div class="my-2">
                  <label for="libelle" class="lab30">libelle</label>
                  <input class="form-control w70" type="text" id='libelle' name="libelle" value="<?=$libelle?>"
                        <?=$disabled?>>
            </div>

            <div class="div-btn">
                  <a href="role" class="btn btn-md btn-success">Retour à la liste</a>
                  <input type="reset" class="btn btn-md btn-danger" value="Annuler" <?=$disabled?>>
                  <input type="submit" class="btn btn-md btn-primary" value="Valider" <?=$disabled?>>
            </div>

      </form>

</div>