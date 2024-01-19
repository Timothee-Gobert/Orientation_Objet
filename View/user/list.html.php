<div class="m-auto w80">
      <h1 class="titre text-align">Liste des USER</h1>
      <div class="div-btn my-2">
            <a href="user&action=insert" class="btn btn-md btn-primary">Nouveau User</a>
            <a href="javascript:window.print()" class="btn btn-md btn-primary">Imprimer</a>
      </div>
      <table>
            <thead id="thead_user">
                  <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Date Creation</th>
                        <th>role</th>
                        <th>Actions</th>
                  </tr>
            </thead>
            <tbody id="tbody_user">
                  <?php foreach($lignes as $ligne): ?>
                        <tr>
                              <td><?=$ligne['id']?></td>
                              <td><?=$ligne['username']?></td>
                              <td><?=$ligne['dateCreation']?></td>
                              <td><?=$ligne['roles']?></td>
                              <td>
                                    <a href="user&action=show&id=<?=$ligne['id']?>" class="btn btn-sm btn-success mx-2">Afficher</a>
                                    <a href="user&action=update&id=<?=$ligne['id']?>" class="btn btn-sm btn-primary mx-2">Modifier</a>
                                    <button class="btn btn-sm btn-danger mx-2" onclick="supprimer(<?=$ligne['id']?>)">Supprimer</button>
                              </td>
                        </tr>
                  <?php endforeach;?>
            </tbody>
            <tfoot id="tfoot_user">
                  <tr>
                        <th colspan="5">Nombre users : <?=$nbre?></th>
                  </tr>
            </tfoot>
      </table>
</div>
<script>
      function touch(event){
            if(event.keyCode==13){
                  chercher();
            }
      }
      function chercher(){
            document.location.href="user&action=search&mot="+mot.value;
      }
      function supprimer(id){
            const response=confirm("voulez-vous ben supprimez ce user ?");
            if(response){
                  document.location.href="user&action=delete&id="+id;
            }
      }
</script>