<div class="m-auto w80 my-4">
      <h1 class="titre text-light">SAISIE USER</h1>
      <form action="user&action=save" method='post' enctype="multipart/form-data">

            <div class="mb-3 my-2 hidden">
                  <div>
                        <label for="id" class="lab30 form-label">ID</label>
                        <input class="form-control w20" type="text" id='id' name="id" value="<?=$id?>" <?=$disabled?>>
                  </div>
            </div>
            <div class="my-2 mb-3 col">
                  <div>
                        <label for="username" class="lab30 obligatoire form-label">USERNAME</label>
                  </div class='col'>
                  <div>
                        <input required class="form-control w20" type="text" id='username' name="username"
                              value="<?=$username?>" <?=$disabled?>>
                  </div>
            </div>

            <div class="my-2">
                  <label for="photo" class="lab30">PHOTO</label>
                  <img src="Public/upload/<?=$photo?>" alt="" width="10%" class="img-fluid" id="image_view">
                  <input class="ml30" type="file" id='photo' name="photo" value=""
                        onchange="previewImage(event,'image_view')" <?=$disabled?>>
                  <!--c'est le name qui donne la valeur de $_FILES['photo'] -->
            </div>

            <div class="my-2">
                  <label for="email" class="lab30">E-MAIL</label>
                  <input class="form-control w70" type="text" id='email' name="email" value="<?=$email?>"
                        <?=$disabled?>>
            </div>
            <div class="my-2">
                  <label for="password" class="lab30 obligatoire">PASSWORD</label>
                  <input required class="form-control w70" type="password" id='password' name="password"
                        value="<?=$password?>" <?=$disabled?>>
            </div>

            <!-- <div class="my-2">
            <label for="roles" class="lab30">ROLES</label>
            <select class="w70 form-select" id="roles" name="roles[]" multiple <?=$disabled?>>
                <?php foreach($roles as $role) : ?>
                    <option value="<?=$role['libelle']?>" <?=$role['selected']?>><?=$role['libelle']?></option>
                <?php endforeach; ?>
            </select>
        </div> -->
            <?php if(MyFct::isGranted('ROLE_ADMIN')): ?>
            <div class="my-4">
                  <div class="col">
                        <label for="" class="lab30">ROLES</label>
                  </div>
                  <div class="col">
                        <ul class="ml30 p-0 row">
                              <?php foreach($roles as $role) : ?>
                              <li><input class="form-check-input" type="checkbox" name="roles[]"
                                          value="<?=$role['libelle']?>" <?=$role['checked']?>>
                                    <label class="form-check-label">
                                          <?=$role['libelle']?>
                                    </label>
                              </li>

                              <?php endforeach; ?>
                        </ul>
                  </div>
            </div>
            <?php endif; ?>
            <div class="div-btn">
                  <a href="user" class="btn btn-md btn-success">Retour à la liste</a>
                  <input type="reset" class="btn btn-md btn-danger" value="Annuler" <?=$disabled?>>
                  <input type="submit" class="btn btn-md btn-primary" value="Valider" <?=$disabled?>>
            </div>
      </form>
</div>
<script>

</script>