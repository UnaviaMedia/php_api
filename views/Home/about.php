<?php
$PAGE_TITLE = "About";
require_once(FRAGMENT_HEADER);
?>

<section>
	<div class="row" id="project-description">
		<div class="column small-12 medium-10 large-8 medium-centered">
			<h2 class="text-center">Project Description</h2>
			<div class="text-justify">
				<p>This project was started with the idea of becoming more acquainted with the general principles of backend frameworks. While the concepts were taught in the courses I have taken as a student, the execution was primarily oriented around working with existing frameworks. To this end I decided to create an API framework from scratch in order to become more familiar with basic API functionality, as well as gaining a basic understanding of REST API principles.</p>
				<p>This concept soon grew to include a basic MVC framework as well, ideally implementing the same base functionality for both the API and the user interface/logic. The language (PHP) was chosen in order to become more familiar with it while at the same time creating something of intellectual benefit (if not practical).</p>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="row" id="disclaimer">
		<div class="column small-12 medium-10 large-8 medium-centered">
			<p>
				<strong>Disclaimer:</strong><br />
				<small class="text-center"><em>This project is intended for learning purposes only and is not intended for anything else. I recognize that security flaws abound but will not fix them as the purpose of the project was reinforcing the base concepts alone.</em></small>
			</p>
		</div>
	</div>
</section>

<section>
	<div class="row" id="features">
		<div class="column small-12 medium-10 large-8 medium-centered">
			<h2 class="text-center">Features</h2>
			<dl class="text-justify">
				<dt>REST API</dt>
				<dd>The API utilizes HTTP verbs to determine what actions to apply to the request, along with any additional data if necessary. Each request is stateless and does not depend on cookies/session variables.</dd>
				<dt>MVC Interface</dt>
				<dd>The interface follows a Model&ndash;View&ndash;Controller (MVC) pattern in which the three separate layers are all independent of each other (logic is separated). The model handles validation and database operations, the view displays a specific model/action's information, and the controller links the two parts together and performs any additional operations necessary.</dd>
				<dt>Authentication</dt>
				<dd>Requests to the API are authenticated through a user/token system, while the user interface authentication is handled with a simple user/login system.</dd>
			</dl>
		</div>
	</div>
</section>

<section>
	<div class="row" id="development">
		<div class="column small-12 medium-10 large-8 medium-centered">
			<h2 class="text-center">Development</h2>
			<div class="text-justify">
				<p>Development primarily occurs within an online IDE in order to facilitate quick/easy development from anywhere. The project uses PHP as the serverside language and Foundation 6 for the front end markup. The project's core files include the base API functionality that allows for additional versioning. Outside of this, any additions must follow the existing file pattern in order to work.</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="column medium-10 large-8 medium-centered">
			<h3 class="text-center">API Structure</h3>
			<div class="row">
				<div class="column large-5">
					<ul class="file-tree">
						<li><pre>api</pre>
							<ul>
								<li><pre>v1</pre>
									<ul>
										<li><pre>api.php</pre></li>
										<li><pre>api_base.php</pre></li>
										<li><pre>api_<strong>API_NAME</strong>.php</pre></li>
										<li><pre>api_v1.php</pre></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><pre>controllers</pre>
							<ul>
								<li><pre>func_<strong>API_NAME</strong>.php</pre></li>
							</ul>
						</li>
						<li><pre>include</pre>
							<ul>
								<li><pre>responses.php</pre></li>
							</ul>
						</li>
						<li><pre>models</pre>
							<ul>
								<li>
									<pre><strong>API_NAME</strong>.php</pre>
								</li>
							</ul>
						</li>
						<li><pre>.htaccess</pre></li>
						<li><pre>database.php</pre></li>
					</ul>
				</div>
				<div class="column large-7">
					<dl>
						<dt>api_API_NAME.php</dt>
						<dd>File that handles API actions for requested endpoint and HTTP verb</dd>
						<dt>func_API_NAME.php</dt>
						<dd>File that contains functions for API endpoint</dd>
						<dt>API_NAME.php</dt>
						<dd>File that contains model validation and database functions (DAL)</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="column medium-10 large-8 medium-centered">
			<h3 class="text-center">MVC Structure</h3>
			<div class="row">
				<div class="column large-5">
					<ul class="file-tree">
						<li><pre>controllers</pre>
							<ul>
								<li><pre><strong>API_NAME</strong>Controller.php</pre></li>
							</ul>
						</li>
						<li><pre>include</pre>
							<ul>
								<li><pre>routes.php</pre></li>
								<li><pre>responses.php</pre></li>
							</ul>
						</li>
						<li><pre>models</pre>
							<ul>
								<li>
									<pre><strong>API_NAME</strong>.php</pre>
								</li>
							</ul>
						</li>
						<li><pre>views</pre>
							<ul>
								<li>
									<pre><strong>API_NAME</strong></pre>
									<ul>
										<li><pre>index.php</pre></li>
										<li><pre>create.php</pre></li>
										<li><pre>update.php</pre></li>
										<li><pre>delete.php</pre></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><pre>.htaccess</pre></li>
						<li><pre>database.php</pre></li>
					</ul>
				</div>
				<div class="column large-7">
					<dl>
						<dt>API_NAMEController.php</dt>
						<dd>File that handles controller actions for the requested endpoint</dd>
						<dt>API_NAME.php</dt>
						<dd>File that contains model validation and database functions (DAL)</dd>
						<dt>API_NAME</dt>
						<dd>Folder that contains the various views for the requested endpoint</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once(FRAGMENT_FOOTER); ?>
