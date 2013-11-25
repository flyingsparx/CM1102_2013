CM1102 Help Classes
=====================

Week 9
--------

This directory covers a simple implementation of an online store with a shopping basket in PHP and MySQL. In particular, the following techniques are covered;
* Listing store products from a MySQL database
* Adding a product to a basket
* Removing products from the basket
* Paying for items in the basket (disclaimer: only an example - no payment is actually made)
* Using cookies to manage baskets
* Using JavaScript to manage button clicks

All `php`  files in the top directory are the three different pages visible to the browsing user:
* The store's product list
* The basket
* Payment page

The `extra/` directory contains support files and the files needed to interact with the database, namely:
* Adding an item to the basket (given by GET parameter)
* Removing an item from the basket (given by GET parameter)
* Making a payment (this basically just empties the basket)
* A one-off script to create all the necessary tables and populate with some sample data
* CSS stylesheet

The `images/` directory contains the images of the store products. Note that these are not stored in the MySQL database itself. Instead, simply the *filename* is stored.
