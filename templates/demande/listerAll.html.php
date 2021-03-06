<div class="container mt-5">
  <h1 class="card-title">La Liste des demandes</h1>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Libelle</th>
        <th scope="col">Nom Complet</th>
        <th scope="col">Matricule</th>
        <th scope="col">Etat demande</th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($demande as $key => $value) : ?>
        <tr>
          <td><?= $key +1 ?></td>
          <td><?= ucwords($value->libelle) ?></td>
          <td><?= ucwords($value->nom_complet) ?></td>
          <td><?= ucwords($value->matricule) ?></td>
          <td><?= ucwords($value->etat_demande) ?></td>
          <td>
            <?php if ($Role::isRP()) :?>
              <form action="<?= $Constantes::WEB_ROOT . "traiter-demande" ?>" class="btn" method="POST">
                  <input type="hidden" name="validate" value="<?= $value->id ?>">
                  <input type="hidden" name="action" value="valider">
                  <input type="hidden" name="id_ins" value="<?= $value->etud?>">
                  <input type="submit" class="btn btn-success test" value="VALIDER">
              </form>
              <form action="<?= $Constantes::WEB_ROOT . "traiter-demande" ?>" class="btn" method="POST">
                <input type="hidden" name="refus" value="<?= $value->id ?>">
                <input type="hidden" name="action" value="refus">
                <input type="submit" class="btn btn-danger test" value="REFUSER">
              </form>
            <?php endif ?>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>