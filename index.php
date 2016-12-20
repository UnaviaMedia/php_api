<?php
require_once("/home/cabox/workspace/constants.php");
require_once(FRAGMENT_HEADER);
?>

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
            <dt>Retrieve a country</dt>
            <dd><pre>GET - /api/v1/countries/23</pre></dd>
            <dt>Retrieve all countries</dt>
            <dd><pre>GET - /api/v1/countries/list</pre></dd>
            <dt>Add a new country</dt>
            <dd><pre>POST - /api/v1/countries { name: "test" }</pre></dd>
            <dt>Update a country</dt>
            <dd><pre>PUT - /api/v1/countries { name: "another" }</pre></dd>
            <dt>Remove a country</dt>
            <dd><pre>DELETE - /api/v1/countries/23 { name: test }</pre></dd>
        </dl>
    </div>
</div>

<?php require_once(FRAGMENT_FOOTER); ?>
