<div class="m-auto w80">
      <h1 class="titre text-align">Liste des clients</h1>
      <div class="div-btn my-2">
            <a href="client&action=insert" class="btn btn-md btn-primary">Nouveau Client</a>
            <a href="javascript:window.print()" class="btn btn-md btn-primary">Imprimer</a>
      </div>
      <table>
            <thead id="thead_client">
                  <tr>
                        <th>Id</th>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Actions</th>
                  </tr>
            </thead>
            <tbody id="tbody_client">
                  <?php foreach($lignes as $ligne): ?>
                        <tr>
                              <td><?=$ligne['id']?></td>
                              <td><?=$ligne['numClient']?></td>
                              <td><?=$ligne['nomClient']?></td>
                              <td><?=$ligne['adresseClient']?></td>
                              <td>
                                    <a href="client&action=show&id=<?=$ligne['id']?>" class="btn btn-sm btn-success mx-2">Afficher</a>
                                    <a href="client&action=update&id=<?=$ligne['id']?>" class="btn btn-sm btn-primary mx-2">Modifier</a>
                                    <button class="btn btn-sm btn-danger mx-2" onclick="supprimer(<?=$ligne['id']?>)">Supprimer</button>
                              </td>
                        </tr>
                  <?php endforeach;?>
            </tbody>
            <tfoot id="tfoot_client">
                  <tr>
                        <th colspan="5">Nombre clients : <?=$nbre?></th>
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
            document.location.href="client&action=search&mot="+mot.value;
      }
      function supprimer(id){
            const response=confirm("voulez-vous ben supprimez ce client ?");
            if(response){
                  document.location.href="client&action=delete&id="+id;
            }
      }
</script>