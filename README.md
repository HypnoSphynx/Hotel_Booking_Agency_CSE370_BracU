
# 1. Introduction

Thank you for checking our project. This repository is for a simple hotel booking management system website. It is a beginner level project for CSE370 course AKA Database Management. This project created with the help of **HTML, PHP, MySQL, BootStrap, and a tiny bit of JS**. We have concentrated more on the backend because this is a project intended for the DBMS course.




# 2. Folder Explanation
There are two folders in this repo.  

### 2.1 ER_Schema_DB
As the name suggests this folder contains ER, Schema and SQL queries. **You can ignore Schema and ER as these things are part of the initial planning**. See **ER_Schema** section if you are interested.   

   
There is also a file called **Database.sql**. Which contains all the queries to create the database and necessary tables. **You must have to create this or the code might not work properly**. Checkout **Environment Setup** section to know more.

There is also a file which is the project report. **From here you can know if this project is worth your time or not.**

### 2.2 TravelNest 
**This folder contains all the code to build the website**. TravelNest is the name of our Hotel Booking System. Here in this folder you will again notice two folders, one of them is owner and another one is user. owner contains all the code needed for the hotel owner panel and another one is user which contains all files for the customer panel. And there are some common files outside of these two folders, this is what anyone would see if they are not logged in to any of these entities.
**You will be able to guess what file is doing what based on their name or the comments made inside the file.**

# 3. Environment Setup
To run the website properly on your computer follow this instruction.  
1. Download [Xampp](https://www.apachefriends.org/download.html) and install it.
2. Download this repository as a zip.
3. Extract the zip folder.
3. Copy TravelNest folder.
5. Then search for the **htdocs** folder. 
For **Windows** the direct filepath will be - ```C:/xampp/htdocs```  
For **Linux** the direct filepath will be - ```/opt/lampp/htdocs```  

6. Then paste the TravelNest folder on the htdocs folder.
7. Now start Xampp.
For **Windows** go to Xampp app then Manage Servers and turn on all of the option.  
For **Linux** just run ```sudo  /opt/lampp/lampp start``` on your terminal.  

8. Now open any browser of your choice. And paste this url ```http://localhost/phpmyadmin/```
9. Now create a Database named **Hotel_Manage** then select Hotel_Manage database and press the import option on topbar. Here select the **Database.sql** file and import it. It will import all the tables necessary with all the relationships and dependency.  
10. Now go to this link ```http://localhost/TravelNest/``` to access the TravNest website.
11. Use VS Code and open the TravelNest folder from **htdocs**. Now you can modify the code based on your necessity. We have also added some comments on the code for better understanding.

# 4. ER_Schema
Here **ER.pdf** is the pdf file which contains the ER diagram of this project. We have also added **Editable_Er.drawio**. If you want to modify the ER diagram then download this file and go to [draw.io](https://app.diagrams.net/) and use the **import from** option from the **file** menu and select this **Editable_Er.drawio** file. After that you will be able to modify the ER diagram.  

Same for the Schema. Here we have provided the schema in png format. We have also added **Editable Schema.erdplus**. If you want to modify the Schema then download this file and go to the [ErdPlus](https://erdplus.com/standalone) website. After that use import from option from **Menu** and upload the **.erdplus** file. 

# 5. Troubleshoot
1. **Navbar Acting Weird** - We know that. On some devices it works perfectly and some devices it does not. We actually do not know what causes this. If you can fix this then push a request with your solve.
2. **Blank Pages** - That means you have messed something up. Check the name of the table and database in the code, check if they properly match with the Database or not. For Syntax errors this issue also can occur. Also you can paste the code to chatgpt and ask it to check if you have made any syntax error or not, otherwise you have to debug it manually.

3. **You Don't have permission to access this file** -  for windows we don't actually know how to fix this. We have faced this issue once on windows and solved it by deleting the TravelNest folder from htdocs. And pasting it again. For linux go to superuser mode from your file manager then go to properties and file permission. After that select ‘owner's name of your pc’ and give it read-write permission. Now you will be good to go.
No paste option in htdocs folder on linux - just go to superuser mode of your file manager and you will get the paste button.

4. **The page is not changing based on your code** - It is due to the cache of your browser. Try to open the page on incognito. It fixes the issue most of the time.
# 6. Acknowledgment
This is a really small project. You can copy it. But **please make sure to give us a star**, it means a lot. Also if you want to make some improvements, push your code, we will merge it with the main branch after checking it. 
