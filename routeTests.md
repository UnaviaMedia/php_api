# MVC Routing Tests

**Valid Routes**
- `/`
	- No controller or action
		- Uses default controller and default action
	- `/Home/Index`
- `/Home`
	- Controller with no action (default)
		- Uses requested controller and default action
	- `/Home/Index`
- `/Index`
	- Invalid controller but is valid action of default controller
		- Uses default controller and requested action
	- `/Home/Index`
- `/Home/Index`
	- Controller with action
		- Uses requested controller and requested action
	- `/Home/Index`

**Invalid Routes**
- `/Random`
	- Invalid controller with no action
		- Routes to error page
	- `/Home/Error`
- `/Random/Action`
	- Invalid controller with invalid action
		- Routes to error page
	- `/Home/Error`