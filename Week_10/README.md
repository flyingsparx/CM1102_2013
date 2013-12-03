CM1102 Help Classes
=====================

Week 10
--------

This directory covers an example concerning the use of cookies at further detail.

This is a much more simple example than in the previous week as this class will be based more around covering concepts that *you* are having particular problems with.

This example allows a user to enter their name. A cookie is then set to store this user's session, and a database is used to count the number of visits made by each user holding a cookie.
As before, this top-most directory contains the single out-ward facing web-page, `visitors.php`, which asks the user to enter a name.
If successful, the page will be reloaded and display a table of the users who have visited, along with their visitor count and last visit time.
Every time the page is visited (or refreshed) the counter for that particular user will be incremented.

The file `slideshow.html` is a one-off file demonstrating a simple image slideshow implementation using plain ol' JavaScript.

The `extra/` directory contains the following:
* `stylesheet.css` - styles for the webpage
* `create_tables.css` - initialise the tables in the database
* `store_name.php` - receive the POSTed name and set the cookie, acting as a 'log-in'
* `logout.php` - log the user out by invalidating the cookie.
