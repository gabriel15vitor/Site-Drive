Here is the English translation of the provided document:  

---

ETEC Bento Quirino  
Gabriel Barbosa, Victor Mourad, Otávio Enrique, Thiago Ramos  
Report on the 4th Term Project  
Campinas - SP  
2019  

Organization of the Website  
Directory Structure: 
C:\XAMPP\HTDOCS\PROG  
- cabecalho.php  
- css.css
- index.php
- login.css
- principal.php
- principal2.php

Scripts:  
- banco.php  
- cadastra.php  
- deleta.php  
- deleta_admin.php  
- download.php  
- foto.php  
- fotousuario.php  
- jquery.js  
- logout.php  
- pesquisa.php  
- remover.php  
- scripts.php  
- upload.php  
- usuario.php  
- verifica.php  

---

Description of Components  

1. Main Directory (prog):  
Contains the web pages and the header.  

a) `index.php`
- Users can log in or register using forms within a container.  
- Login form sends data to `verifica.php`.  
- Registration form sends data to `cadastra.php`.  

b) `principal.php`  
- Users can update their profile picture via a form, which sends data to `fotousuario.php`.  
- Users can upload files and rename them; data is sent to `upload.php`.  
- Users can delete their account via a form that sends data to `deleta.php`.  
- A DataTables-based table lists all files uploaded by the user, searchable by name or extension.  
- Logout functionality redirects users to `logout.php`.  

c) `principal2.php`  
- Restricted to administrators.  
- Displays a DataTables-based table of all regular users. Administrators can search users by name or password.  
- Logout functionality redirects users to `logout.php`.  

d) `cabecalho.php`  
- Included in all pages, contains style links and JavaScript scripts for animations.  

2. Styling Files:  
a) `login.css`  
b) `css.css`  
- Both contain styling classes for various website components.  

3. Scripts Directory:  
Contains files that handle database interactions, sessions, and JavaScript.  

a) `banco.php`  
- Defines a `Database` class with a `getConnection` function to connect to the database.  

b) `cadastra.php`  
- Handles user registration via POST.  
- Checks for null values and duplicates before registering the user and redirecting to `index.php`.  

c) `deleta.php`  
- Deletes a user and their directory using the `delTree` function.  
- Redirects users to `index.php` if no user is found.  

d) `deleta_admin.php`
- Similar to `deleta.php` but uses a GET variable to specify the user.  

e) `download.php`
- Downloads a file specified by a GET variable.  

f) `foto.php`
- Displays a user's profile picture using the `pegaFoto` function and a GET variable.  

g) `fotousuario.php`
- Handles uploading of profile pictures, verifying file type as JPEG.  

h) `jquery.js`
- JavaScript file facilitating DataTables usage.  

i) `logout.php`  
- Destroys the current session and redirects to `index.php`.  

j) `remover.php`  
- Deletes a file specified by a GET variable using the `unlink` function.  

k) `scripts.php`  
- Contains JavaScript, including table translations for `principal.php` and `principal2.php`.  

l) `upload.php`  
- Handles file uploads to `enviados/<username>`.  

m) `usuario.php`  
- Contains a `Usuario` class with functions like:  
  - `__construct`: Initializes a database connection.  
  - `read`: Retrieves all users with type "N".  
  - `readAll`: Validates user login credentials.  
  - `readOne`: Retrieves user details.  
  - `Insert`: Adds a new user.  
  - `deleta`: Removes a user.  
  - `pegaFoto`: Gets the user's profile picture.  
  - `upload`: Updates a user's profile picture.  

n) `verifica.php`  
- Validates user credentials and creates a session.  
- Redirects regular users to `principal.php` and administrators to `principal2.php`.  

4. `enviados` Folder:  
Stores subfolders for each user's uploaded files.  

---

Database Structure  

Database Name: `drive`  
- Table Name: `usuario`  
  - Columns:  
    1. `Foto`: LONGBLOB, stores user profile pictures.  
    2. `Nome`: VARCHAR(25), stores usernames for login.  
    3. `Senha`: VARCHAR(25), stores passwords for login.  
    4. `Tipo`: TEXT(1), indicates user type ("N" for normal, "A" for admin).  

---  

Let me know if you'd like to refine the translation further!