
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Compra</h2>
        </div>
		<!--
		Nivell 2 - Exercici 2
		Afegeix a sobre de la taula un botó "Nou Producte" que condueixi a la pàgina insereix.php
		on haurem de crear un formulari que ens permeti crear un producte a inserir a la base de dades. 
		-->
		<div class="col text-end">
            <a href="insereix.php" role="button" class="btn btn-primary">Inserir nou Producte</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                <th scope="col">Nom producte</th>
                <th scope="col">Preu Unitat</th>
                <th scope="col">Quantitat</th>
                <th scope="col">Total</th>
				<th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php  $sumatori=0; while ($fila = $descriptor->extreure_registre()) { $sumatori+=($fila["quantitat"]*$fila["preu"]); ?>
                <tr>
                    <th scope="row"><?php echo $fila["nom"] ?></th>
                    <td><?php echo $fila["quantitat"] ?></td>
                    <td><?php echo $fila["preu"] ?></td>
                    <td><?php echo $fila["quantitat"]*$fila["preu"] ?></td>
					<td>
					<!-- 
					- Exercici 3

					Afegeix a cada fila de la Taula de productes comprats una columna que inclogui opcions
					per modificar i eliminar cadascun dels productes.

					Podeu indicar les opcions com vulgueu(mitjançant icones, botons...) de tal forma que: 

					La opció de modificar ens porti a una pàgina modificar.php que inclogui un formulari
					per editar dades d'aquell producte.

					La opció d'eliminar ens permetrà esborrar aquell producte de la base de dades.
					Lògica que implementarem al nivell 3.
					-->

                        <div class="btn-group" role="group">
                        <a href="modificar.php" role="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                        </a>
						<a href="#" role="button" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                        </a>
                        </div>
                    </td>
                </tr>
				
                <?php } ?>
				<tr><td></td><td></td><td><?php echo "<b>Total</b>" ?></td><td><?php echo $sumatori ?></td><td></td></tr>
				
            </tbody>
        </table>
    </div>
</div>
