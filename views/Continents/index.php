<?php
$PAGE_TITLE = "Continents";
require_once(FRAGMENT_HEADER);
?>

<div class="row">
	<div class="column small-12 text-center">
		<h1>Countries</h1>
	</div>
</div>

<section class="row">
	<div class="column small-12 small-centered medium-6">
		<table>
			<thead>
				<th>ID</th>
				<th>Continent</th>
			</thead>
			<tbody>
				<?php foreach($continents as $continent) { ?>
				<tr>
					<td><?=$continent->id ?></td>
					<td><?=$continent->name ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>

<?php
require_once(FRAGMENT_FOOTER);
?>
