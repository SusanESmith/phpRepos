#PHP Github Repositories--Susan Smith

This app displays information from the most starred PHP repositories currently on Github.  

##Installation
###Prerequisites
You must have a mySQL database installed.
You must have a suitable way to serve PHP.
###Steps
1.Run the REPOSc_sqlquery.sql file in your mySQL database

2.Store your mySQL database username, password, and connection information in REPOSa_connect_database.php  
```php
$dsn='mysql:host=[host name here]; dbname=[database name here]';
$username='[username here]';
$password='[password here]';
```
3.Deploy PHP files to the server

##Architecture
The application sends a HTTP GET request to the Github API search route to retrieve a list of the most starred php repositories.
Once the data is returned, it is inserted into a mySQL database table.  Each time the app is loaded, the mySQL database table is truncated and new data is retrieved from the Github API.
The table is then queried and the data is displayed in a list of collapsed bootstrap panels.
