<?php
$PAGE_TITLE = "API Docs";
require_once(FRAGMENT_HEADER);
?>

<div class="row">
    <div class="column small-12 medium-8 medium-centered">
        <h2 class="text-center">Description</h2>
        <p>This project was started simply because I wanted a better understanding of both APIs in general as well as REST oriented architecture. I've also used it to become more familiar with the MVC architectural pattern for the user interface.</p>
    </div>
</div>

<div class="row">
    <div class="column small-12 medium-6">
        <h2 class="text-center">Request Types</h2>
        <ul>
            <li>POST<br />
                <small>Create</small>
            </li>
            <li>GET<br />
                <small>Read</small>
            </li>
            <li>PUT<br />
                <small>Update</small>
            </li>
            <li>DELETE<br />
                <small>Delete</small>
            </li>
        </ul>
    </div>
    <div class="column small-12 medium-6">
        <h2 class="text-center">Use Cases</h2>
        <dl>
            <dt>Retrieve a continent</dt>
            <dd><pre>GET - /api/v1/continents/23</pre></dd>
            <dt>Retrieve all continents</dt>
            <dd><pre>GET - /api/v1/continents/list</pre></dd>
            <dt>Add a new continent</dt>
            <dd><pre>POST - /api/v1/continents { name: "test" }</pre></dd>
            <dt>Update a continent</dt>
            <dd><pre>PUT - /api/v1/continents { name: "another" }</pre></dd>
            <dt>Remove a continent</dt>
            <dd><pre>DELETE - /api/v1/continents/23 { name: test }</pre></dd>
        </dl>
    </div>
</div>

<?php require_once(FRAGMENT_FOOTER); ?>
