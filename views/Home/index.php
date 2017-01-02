<?php
$PAGE_TITLE = "API Docs";
require_once(FRAGMENT_HEADER);
?>

<div class="row">
	<div class="column medium-8 medium-centered">
		<h2 class="text-center">Description</h2>
		<p>This project was started simply because I wanted a better understanding of both APIs in general as well as REST oriented architecture. I've also used it to become more familiar with the MVC architectural pattern for the user interface.</p>
	</div>
</div>

<div class="row">	
	<div class="column medium-6 medium-centered">
		<h2 class="text-center">Example</h2>
		<p><a href="<?=IMAGES ?>/example_api.png" target="_blank"><img src="<?=IMAGES ?>/example_api.png" alt="Sample API Usages" /></a></p>
	</div>
</div>

<div class="row">
	<div class="column medium-10 medium-centered">
		<h2 class="text-center">API Use Cases</h2>
		<div class="row">
			<div class="column medium-6">
				<dl>
					<dt>Retrieve a continent</dt>
					<dd><code>GET - /api/v1/continents/23</code></dd>
					<dt>Retrieve all continents</dt>
					<dd><code>GET - /api/v1/continents/</code></dd>
					<dt>Add a new continent</dt>
					<dd><code>POST - /api/v1/continents { name: "test" }</code></dd>
					<dt>Update a continent</dt>
					<dd><code>PUT - /api/v1/continents { name: "another" }</code></dd>
					<dt>Remove a continent</dt>
					<dd><code>DELETE - /api/v1/continents/23</code></dd>
				</dl>
			</div>
			<div class="column medium-6">
				<p class="text-justify">The API response is a JSON object containing the response status, message, and any return data</p>
				<dl>
					<dt>Success Response</dt>
					<dd><code>{ status: "0", message: "&hellip;" data: [&hellip;] }</code></dd>
					<dt>Error Response</dt>
					<dd><code>{ status: "1", message: "&hellip;" data: [&hellip;] }</code></dd>
					<dt>Warning Response</dt>
					<dd><code>{ status: "2", message: "&hellip;" data: [&hellip;] }</code></dd>
				</dl>
			</div>
		</div>
	</div>
</div>

<?php require_once(FRAGMENT_FOOTER); ?>
