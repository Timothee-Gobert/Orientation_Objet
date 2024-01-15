<div class="m-auto w80">
      <h1 class="titre text-align">Liste des clients</h1>
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
                                    <button class="btn btn-sm btn-success mx-2">Afficher</button>
                                    <button class="btn btn-sm btn-primary mx-2">Modifier</button>
                                    <button class="btn btn-sm btn-danger mx-2">Supprimer</button>
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