<?php
require_once("/home/cabox/workspace/constants.php");
require_once(FRAGMENT_HEADER);
?>

<!-- URL for API -->
<div class="row">
    <form action="#" class="column small-12 medium-6">
        <input type="hidden" name="api_token" value="00000" />
        <pre class="">/api/countries/?action=list<br />/api/countries/?action=add&amp;name=sokovia</pre>
        <div class="input-group">
            <span class="input-group-label">/api/</span>
            <input type="text" id="api_url" name="api_url" class="input-group-field">
            <div class="input-group-button">
                <input type="submit" id="api-submit" name="api-submit" class="button" value="Submit">
            </div>
        </div>
    </form>
</div>
<div class="row">
    <pre id="api_output" class="column small-12 medium-6">
        
    </pre>
</div>

<?php require_once(FRAGMENT_FOOTER); ?>
