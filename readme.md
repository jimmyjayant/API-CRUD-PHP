# API CRUD PHP

Hello Everyone, This is an **API CRUD PHP** project. 
This project has 2 parts.

1. The first part (API) is the demonstration of crud operations with the api database using **REST API design**.

2. The second part (CLIENT) is the demonstration of fetching of api data that is list of users using PHP CURL functionality respecting API token limit feature. That is, the client can only fetch data just 5 times. After which, the `token_counter` has to be manually set to 0 in `token` table in `myapidb` mysql database.

You can test this website project in your own localhost environment.

---

## 🚀 Features

### Of API part of Project
* CRUD Operations with database using REST APIs.
* Custom PHP MVC Framework

### Of CLIENT part of Project
* Fetching of data using PHP CURL Functionality
* Rate limiting using token counter

---

## 🛠️ Technologies Used

The project is developed using the following technologies:

| Technology                   | Purpose                       |
| ---------------------------- | ----------------------------- |
| **HTML5**                    | Website structure             |
| **CSS3**                     | Styling and responsive design |
| **Vanilla JavaScript**       | Client-side functionality     |
| **PHP 8.3+**                 | Backend development           |
| **AJAX**                     | Asynchronous requests         |
| **SQL**                      | Database queries              |
| **MySQL**                    | Database management           |
| **Curl**                     | Curl Functionality            |
| **Custom PHP MVC Framework** | Application architecture      |
| **Composer**                 | Third-Party Packages          |

---

## 🔧 Development Tools

The following tools are used during development:

* [Visual Studio Code](https://code.visualstudio.com/)
* Git
* GitHub
* XAMPP
* Composer

---

## Packages

The following packages are used in custom mvc php framework during development:

* guzzlehttp/psr7
* league/route
* httpsoft/http-emitter

---

# 📋 Requirements

Before running the project, make sure the following software is installed:

* **PHP 8.3 or higher**
* Make sure the required PHP extensions are enabled in `php.ini`, including:
    * `curl`
    * `intl`
    * `zip`
    * `mbstring`

* **MySQL**
* **XAMPP**
* **Git**
* **Composer**
* **Active Internet Connection** — Preferably a broadband connection

---

# 📥 Installation & Setup

Follow the steps below to run the API CRUD PHP application successfully on your local machine.

## 1. Clone the Repository

Clone the project from GitHub and place the project inside the XAMPP `htdocs` directory.

For example:

```text
C:\xampp\htdocs\API_CRUD_PHP
```

Then open the project using your preferred code editor, such as Visual Studio Code.

---

## 2. Configure XAMPP Apache httpd-vhosts.conf file

Open the below file in text editor or vs code to add **api.com** as the virtual host.

```text
C:\xampp\apache\conf\extra\httpd-vhosts.conf
```

Add the below code at bottom of the file. Edit it according to the location of your cloned project folder.

```text
<VirtualHost *:80>
    ServerName api.com
    DocumentRoot "C:/xampp/htdocs/API_CRUD_PHP/API/public/"
    SetEnv APPLICATION_ENV "development"
    <Directory "C:/xampp/htdocs/API_CRUD_PHP/API/public/">
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
```

Change it according to the directory where your project is located.
Because when the project folder is accessed via browser. Then all requests are forwarded to **public/index.php** file.

This configuration ensures that requests are correctly routed through the application's front controller.

Make sure the below line is uncommented (remove # in front of it) 

```text
C:\xampp\apache\conf\httpd.conf
```

in

```text
Include conf/extra/httpd-vhosts.conf
```

---

## 3. Edit hosts file

Open the file with administrative privileges located at below location:-


```text
C:\Windows\System32\drivers\etc\hosts
```

At the bottom of the file, add the following:- 

```text
127.0.0.1      localhost api.com 
```

And save the file.

---

## 4. Install All Required Dependencies

Run the following command in terminal or git:

```bash
composer install
```

---

## 5. Start XAMPP

Open the **XAMPP Control Panel**.

Make sure the following services are running:

* **Apache**
* **MySQL**

Both services should show a running status.

---

## 6. Open phpMyAdmin

Open your web browser and navigate to:

```text
http://localhost/phpmyadmin
```

Once the phpMyAdmin dashboard appears, click on the **Databases** option in the top menu.

---

# 🗄️ Database Setup

## 7. Create the Database

In the **Create Database** section:

1. Enter the following database name:

```text
myapidb
```

2. Click the **Create** button.

The `myapidb` database will now be created.

---

## 8. Create the `apidatatable` Table

Select the newly created `myapidb` database from the left sidebar.

Click the **SQL** button in the top menu.

Paste and execute the following SQL query:

```sql
CREATE TABLE IF NOT EXISTS apidatatable (
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname varchar(100) UNIQUE NOT NULL,
email varchar(100) UNIQUE NOT NULL
);
```

Click **Go** to execute the query.

After successful execution, a table named `apidatatable` will appear inside the `myapidb` database.

---

## 9. Create the `token` Table

Again, click the **SQL** button in the top menu and execute:

```sql
CREATE TABLE IF NOT EXISTS token(
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
token_key varchar(100) NOT NULL UNIQUE,
token_counter int(6) UNSIGNED NOT NULL
);
```

Click **Go** to execute the query.

After successful execution, the `token` table will be created.

If the **token_counter** field exceeds **5** for a particular **token_key**, then that client won't be able to fetch the data via api.
In that case, please reset the **token_counter** to **0** in **localhost/phpmyadmin** yourself.

---

## 10. Insert Key in `token` Table

Go to **localhost/phpmyadmin**.

Click on the `myapidb` database present in the menu on the left hand side of browser.

Select the `token` table.

Click on `Insert` present in the top menu on right hand side.

For `token_key`, insert value = asdfghjklzxcvbnm
For `token_counter`, insert value = 0

Then click on **Go** button.

You will see a new record in `token` table.

---

# 📊 Database Structure

After completing the above steps, the `myapidb` database should contain the following two tables:

```text
myapidb
│
├── apidatatable
├── token

```

### Table Overview

| Table               | Description                                  |
| ------------------- | -------------------------------------------- |
| `apidatatable`      | Stores data such as fullname and email       |
| `token`             | Stores token key and token counters          |

---

# 🔐 Database Configuration

By default, the project assumes the following MySQL credentials:

```text
Username: root
Password: 
```

In other words, the default MySQL username is `root` and the password is empty.

If you are using different MySQL credentials, update them in:

```text
API/app/Database/DB.php
```

Make sure the database name is also configured correctly:

```text
myapidb
```

---

# ▶️ Running the Application

After completing the database configuration:

1. Make sure **Apache** and **MySQL** are running in XAMPP.
2. Make sure the project is located inside the XAMPP `htdocs` directory.
3. Verify that the database and all 2 tables have been created.
4. Verify the database credentials in:

```text
API/app/Database/DB.php
```

5. Open your browser and navigate to your project's URL.

```text
http://api.com
```

---

# 📁 Project Architecture

A typical structure includes:

```text
API_CRUD_PHP/
│
├── API/
|      |-- app/
|      |      |-- Config/
|      |      |         |-- Routes.php
|      |      |-- Controllers/
|      |      |              |-- APIController.php
|      |      |              |-- ErrorController.php
|      |      |              |-- HomeController.php
|      |      |              |-- UserController.php
|      |      |              |-- UsersController.php
|      |      |-- Database/
|      |      |           |-- DB.php
|      |      |-- Filters/
|      |      |-- Helpers/
|      |      |          |-- Sanitize.php
|      |      |-- Libraries/
|      |      |-- Models/
|      |      |         |-- create.php
|      |      |         |-- delete.php
|      |      |         |-- getapidata.php
|      |      |         |-- read.php
|      |      |         |-- record.php
|      |      |         |-- update.php
|      |      |-- Views/
|      |      |        |-- crud/
|      |      |        |       |-- index.php
|      |      |        |-- errors/
|      |      |                  |-- 404.php
|      |-- public/
|      |         |-- css/
|      |         |      |-- 404.css
|      |         |      |-- style.css
|      |         |-- images/
|      |         |         |-- add.png
|      |         |         |-- delete.png
|      |         |         |-- edit.png
|      |         |         |-- India.png
|      |         |-- js/
|      |         |     |-- script.js
|      |         |-- .htaccess
|      |         |-- index.php
|      |-- src/
|      |-- vendor/
|      |-- .htaccess
|      |-- composer.json
|      |-- composer.lock
|-- CLIENT/
|         |-- index.php
|-- .gitignore
|-- README.md

```

The exact directory structure may vary depending on the current version of the repository.

---

# 🔄 Application Workflow

The general application workflow is:

**API Part**

```text
User
 |
 |
 ▼
http://api.com
 |
 |
 ▼
Homepage
 |
 |-- GET data
 |-- POST data
 |-- PUT data
 |-- DELETE data
 |-- Using REST APIs design
---

**CLIENT Part**

```text
User
 |
 |
 ▼
CLIENT/index.php (through localhost in web browser)
 |
 |
 ▼
Fetch data using PHP CURL Functionality
 |
 |
 ▼
After 5 requests, or 5 page refresh, reset `token_counter` to 0 in `token` table
 |
 |
 ▼
Fetch data again
```

---

# 🔒 Security Note

For local development, the default MySQL credentials may be:

```text
Username: root
Password: 
```

For production environments, it is strongly recommended to:

* Use a dedicated database user.
* Set a strong database password.
* Avoid exposing database credentials in publicly accessible files.
* Configure the application using appropriate environment-specific settings.
* Use HTTPS.
* Follow secure password-storage and input-validation practices.

---

# 🐛 Troubleshooting

### Apache is not starting

Make sure another application is not already using ports such as `80` or `443`.

### MySQL is not starting

Check whether another MySQL/MariaDB service is already running and occupying the required port.

### Database connection error

Verify the credentials and database name in:

```text
API/app/Database/DB.php
```

Default database:

```text
myapidb
```

Default username:

```text
root
```

Default password:

```text
(empty)
```

### Page not found

Make sure the project is placed inside:

```text
C:\xampp\htdocs\
```

and access it using the correct URL.

---

# 👨‍💻 Development

This project can be developed locally using:

* Visual Studio Code
* XAMPP
* Git
* GitHub

To check the PHP version installed on your machine:

```bash
php -v
```

---

# 📄 License

```text
This project is licensed under the MIT License.
```

---

# Learning Resources

Learn the development of **API CRUD PHP** and various topics related to it from the following **YouTube Channel**:-

[Programming with Vishal](https://www.youtube.com/@ProgrammingwithVishal)

**API related videos** from the above channel:-

[https://www.youtube.com/watch?v=IPp9tTs9ctY\&t=179s](https://www.youtube.com/watch?v=IPp9tTs9ctY\&t=179s)

[https://www.youtube.com/watch?v=fUkNBR66B2I](https://www.youtube.com/watch?v=fUkNBR66B2I)

[https://www.youtube.com/watch?v=Iu5y0QEEED4](https://www.youtube.com/watch?v=Iu5y0QEEED4)


Learn the development of **Custom PHP MVC Framework** and various topics related to it from the following 
**YouTube Channel**:-

[Programming with Vishal](https://www.youtube.com/@ProgrammingwithVishal)

[https://youtube.com/playlist?list=PLWCLxMult9xf-BWvwF1IfqSfbgAfN4Zab&si=-P73e2ABXfKcG-2v]


Also, learn the development of **Custom PHP MVC Framework** from another **YouTube Channel**:- 

Note:- 
The following video tutorials of building custom php mvc framework right from scratch is not beginner friendly.
The learner must thoroughly grasp the concepts of **composer**, **PHP OOP** and use of third party libraries and packages before continue to learn the following tutorials.

[Dave Hollingworth](https://www.youtube.com/@dave-hollingworth)

The below video tutorials will teach you how to build custom php mvc framework in a standard way include 
**PSR Recommendations**.

[Build a PHP Framework](https://youtube.com/playlist?list=PLFbnPuoQkKseimWeA4UFo1BPFTeXnv_1S&si=A02B1a-lvFDq-F5_)


---

# 🙌 Acknowledgements

Thanks for checking out **API_CRUD_PHP**.

The project was built to demonstrate REST API based Database CRUD Functionality and Data Fetching using PHP Curl Functionality with Rate Limitation.