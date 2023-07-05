# The **Posts** CRUD app

## Running the project

To run the code ensure that you have the latest version of XAMPP installed.
Start the mySQL server and navigate to phpmyadmin by entering this link in the browser http://127.0.0.1/phpmyadmin. Create the database with the name of your choice but change the dafault name used in this project's database file. While in that database, import the SQL document attached in this project to have the same copy of tables used in this project.
After that run the **command** below in your operating system terminal in the root directory of this project.

```php
php -S localhost:8080
```

## About the project

The project involves a simple application which implements the CRUD(create, read, update and delete) functionality using the object oriented PHP. Once a user is in the landing page, they can click the create link in the navigation bar to create a new post which will be stored in the database.
Once they return to the home page, the post will be listed in short form from which they can click read more which takes them to a page where they can read the full version of the post.
From this page the user can delete or update the contents of the post or the entire post.

