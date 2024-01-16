<style>
      #tbody_art{
            display:block;
            width: 100%;
            height: 100px;
            overflow: auto;
      }
      #thead_art,#tbody_art,#tfoot_art{
            display:table;
            width:100%;
      }
</style>



<div class="w90 auto">
      <h1 class="titre center">LISTE ARTICLE</h1>
      <table class="w100">
            <thead id="thead_art">
                  <tr class="bg_green">
                        <th classe="w10 center">ID</th>
                        <th classe="w10 center">CODE</th>
                        <th classe="w50 center">Designation</th>
                        <th classe="w10 center">PU</th>
                        <th classe="w20 center">Action</th>
                  </tr>
            </thead>
            <tbody id="tbody_art">
                  
            </tbody>
            <tfoot id="tfoot_art">
                  <tr class="bg_green">
                        <th class="center" colspan="5" id="nbre_art"></th>
                  </tr>
            </tfoot>
      </table>
</div>

<script>
      //declaration des données
      let articles=<?=$articles?>;
      console.log(articles);

      afficher(articles);

      function afficher(articles){
            const nbre=articles.length;
            let html=articles.map(function(article){
                  return `
                  <tr>
                        <td class="w10">${article.id}</td>
                        <td class="w10">${article.numArticle}</td>
                        <td class="w50">${article.designation}</td>
                        <td class="w10">${article.prixUnitaire}</td>
                        <td class="w20 d-flex justify-content-between">
                              <button class="btn btn-sm btn-success">Afficher</button>
                              <button class="btn btn-sm btn-danger">Supprimer</button>
                              <button class="btn btn-sm btn-primary">Modifier</button>
                        </td>
                  </tr>
            `
            }).join('');
            console.log(html);
            tbody_art.innerHTML=html;
            nbre_art.innerHTML="Nombres d'articles : "+nbre;
            tbody_art.scrollTop=tbody_art.scrollHeight;
      }
      
</script>