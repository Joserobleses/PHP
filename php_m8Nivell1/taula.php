
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Compra</h2>
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
                </tr>
            </thead>
            <tbody>
			
			<?php
			
			
			?>
            <?php  $sumatori=0; while ($fila = $descriptor->extreure_registre()) { $sumatori+=($fila["quantitat"]*$fila["preu"]); ?>
                <tr>
                    <th scope="row"><?php echo $fila["nom"] ?></th>
                    <td><?php echo $fila["quantitat"] ?></td>
                    <td><?php echo $fila["preu"] ?></td>
                    <td><?php echo $fila["quantitat"]*$fila["preu"] ?></td>
                </tr>
				
                <?php } ?>
				<tr><td></td><td></td><td><?php echo "<b>Total</b>" ?></td><td><?php echo $sumatori ?></td></tr>
				
            </tbody>
        </table>
    </div>
</div>
