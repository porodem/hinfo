in this folder will be created site with purpose to learn Web authorization and organize local web site with useful info for IT departament.
-Dolgopolov A.

used materials

http://old.code.mu/books/php/auth/avtorizaciya-cherez-bazy-dannyh-na-php.html
https://www.internet-technologies.ru/articles/sistema-registracii-polzovateley-s-pomoschyu-php-i-mysql.html

PHP code modyfied for using PostgreSQL DB.

DB shema:
create table userstest(id serial primary key, login text, password text, email text, is_admin boolean, access_lvl int4);

03.11-3	setup sending email from PHP (detailed guide on porodem google drive "php Hinfo")
	1. have sendmail app on linux server where PHP work
	2. edit php.ini file of section [mail function]
	3. use PHP function mail 
	
	--- TO DO: add on login if user have full access_lvl to read all content

03.11-2
-email field on registration 
https://www.w3schools.com/php/php_form_url_email.asp - validation code example

03.11
- logout now work
- read html files from /pages folder and show it only for logined users

16.10-1
-added few lines of code about session
-new files 'reg.php','intro.php' for registration and welcome page.
-create folder 'includes' for header and footer of all pages
