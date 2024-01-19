<div class="m-auto w80">
      <h1 class="titre text-light">Saisie User</h1>
       <form action="user&action=save" method='post'> <!-- pour que les donnees se mettent sur $_POST il faut ecrire method='post' sinon il mettra tout dans l'url en $_GET-->
            <div class="line-input hidden">
                  <label for="id" class="lab30">ID</label>
                  <input type="text" class="form-input w20 text-dark" id='id' name='id' value='<?=$id?>' <?=$disabled?>>
            </div>
            <div class="line-input">
                  <label for="username" class="lab30">Username</label>
                  <input type="text" class="form-input w20 text-dark"  id='username' name='username' value='<?=$username?>' <?=$disabled?>>
            </div>
            <div class="line-input">
                  <label for="email" class="lab30">email</label>
                  <input type="text" class="form-input w20 text-dark" id='email' name='email' value='<?=$email?>' <?=$disabled?>>
            </div>
            <div class="line-input">
                  <label for="password" class="lab30 obligatoire">password</label>
                  <input requiered type="password" class="form-input w20 text-dark" id='password' name='password' value='<?=$password?>' <?=$disabled?>>
            </div>
            <div class="line-input">
                  <select id="roles" name="roles[]" multiple>
                        
                        <?php foreach($roles as $role) : ?>
                              <option value="<?=$role['libelle']?>" <?=$role['selected']?>>   <?=$role['libelle']?>    </option>
                        <?php endforeach; ?>
                  </select>
            </div>


            <div class="my-2">
                  <label for="" class="lab30">Jeu de role</label>
                  <ul class="ml30 p-0">
                        <?php foreach($roles as $role) : ?>
                              <li><input type="checkbox" name="roles[]" value="<?=$role['libelle']?>" <?=$role['checked']?>>   <?=$role['libelle']?>  </li>
                        <?php endforeach; ?>
                  </ul>
            </div>


            <div class="div-btn">
                  <a href="user" type="reset" class="btn btn-md btn-success" >Retour à la liste</a>
                  <input type="reset" class="btn btn-md btn-danger" value='Annuler' <?=$disabled?>>
                  <input type="submit" class="btn btn-md btn-primary" value='Valider' <?=$disabled?>>
            </div>
      </form>
      
</div>