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
            <dd>Retrieve a country</dd>
            <dt>
                <pre>GET - /api/v1/countries/23</pre>
            </dt>
            <dd>Retrieve all countries</dd>
            <dt>
                <pre>GET - /api/v1/countries/list</pre>
            </dt>
            <dd>Add a new country</dd>
            <dt>
                <pre>POST - /api/v1/countries { name: "test" }</pre>
            </dt>
            <dd>Update a country</dd>
            <dt>
                <pre>PUT - /api/v1/countries { name: "another" }</pre>
            </dt>
            <dd>Remove a country</dd>
            <dt>
                <pre>DELETE - /api/v1/countries/23 { name: test }</pre>
            </dt>
        </dl>
    </div>
</div>

<?php require_once(FRAGMENT_FOOTER); ?>
