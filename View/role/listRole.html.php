<div class="m-auto w80">
      <h1 class="titre text-light">LISTE Role</h1>
      <div class="div-btn my-2">
            <a href="javascript:creerRole()" class="btn btn-md btn-primary"><i class="fa fa-solid fa-plus"></i>Nouveau
                  role</a>
            <a href="javascript:afficherRole()" class="btn btn-md btn-primary"><i
                        class="fa fa-solid fa-eye"></i>Afficher</a>
            <a href="javascript:modifierRole()" class="btn btn-md btn-primary"><i
                        class="fa fa-solid fa-pen"></i>Modifier</a>
            <a href="javascript:supprimerRole()" class="btn btn-md btn-primary"><i
                        class="fa fa-solid fa-trash"></i>Supprimer</a>
            <a href="javascript:window.print()" class="btn btn-md btn-primary"><i class="fa fa-print"></i>Imprimer</a>
      </div>
      <table class="w100 table-responsive">
            <thead id="thead_role">
                  <tr class="bg_navy">
                        <td class="w20 center">Choix</td>
                        <td class="w20 center">ID</td>
                        <td class="w20 center">Rang</td>
                        <td class="w40 center">libelle</td>
                  </tr>
            </thead>
            <tbody id="tbody_role">
                  <?php foreach($lignes as $ligne): ?>
                  <tr>
                        <td class="center"> <input type="checkbox" name="role" id="<?=$ligne['id']?>"
                                    value="<?=$ligne['id']?>" onclick="onlyOne(this)"></td>
                        <td class="center"> <label for="<?=$ligne['id']?>"><?=$ligne['id']?> </label> </td>
                        <td class="left"> <label for="<?=$ligne['id']?>"><?=$ligne['rang']?> </label> </td>
                        <td class="left"> <label for="<?=$ligne['id']?>"> <?=$ligne['libelle']?> </label> </td>
                  </tr>
                  <?php endforeach;?>
            </tbody>
            <tfoot id="tfoot_role">
                  <tr class="bg_green">
                        <th colspan="5" class="text-center">Nombre roles : <?=$nbre?></th>
                  </tr>
            </tfoot>
      </table>
</div>

<script>

function creerRole() {
      document.location.href = "role&action=insert";
}

function afficherRole() {
      let id = getIdChecked('role');
      if (id == 0) {
            alert("selectionnez bien une ligne");
      } else {
            document.location.href = "role&action=show&id=" + id;
      }
}

function supprimerRole() {
      let id = getIdChecked('role');
      if (id == 0) {
            alert("selectionnez bien une ligne");
      } else {
            const response = confirm("Voulez vous vraiment supprimer ce role ?");
            if (response) {
                  document.location.href = "role&action=delete&id=" + id;
            }
      }
}

function modifierRole() {
      let id = getIdChecked('role');
      // let checkboxes = document.getElementsByName('role');
      // let id = 0;
      // checkboxes.forEach((item) => {
      //       if (item.checked == true) {
      //             id = item.value ; 
      //             stop;
      //       }
      // });
      /* 
      checkboxes.forEach(function(item){
            if(item.checked==true){
                  id=item.value;
            }
      }
      */
      if (id == 0) {
            alert("selectionnez bien une ligne");
      } else {
            // const url="role&action=update&id="+id;
            // const title="Modification"+ id;
            // const w="50%";
            // const h="50%";
            // popupCenter(url, title, w, h)
            document.location.href = "Role&action=update&id=" + id;
      }
}

function chercher() {
      document.location.href = "role&action=search&mot=" + mot.value;
}

function touche(event) {
      if (event.keyCode == 13) {
            chercher();
      }
}

function supprimer() {
      const response = confirm("Voulez-vous bien supprimer ce role?");
      if (response) {
            document.location.href = "role&action=delete&id=" + id;
      }
}

</script>