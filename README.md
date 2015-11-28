# Library
A php/mysql application for managing a real world library or book collection

##Getting Started
1. Set up a webserver running MySQL and PHP (wamp works fine)
2. Put repository into the webroot
3. Import the database stored in "library.sql" into MySQL
4. Replace the ISBNdb.com API key with your key. Create one by signing up for an account at http://isbndb.com/account/dev

in **json-to-db.php**

```php 
<?php
    $APIkey = YOUR-API-KEY-HERE;
...
```

That's it!

##Version Specificities

| Item        | Version           | 
| ------------- |:-------------:| 
| PHP| 5.5.12 | 
| MySQL | 5.6.17      | 
| WAMP | 2.5      | 
| Bootstrap | 2.3.2      | 
