CO-OP - Gamer Dating Web Application (Group 7)

Overview
CO-OP is a swipe-based dating platform specifically built for gamers. It allows users to create a profile, find matches based on game interests, like/pass users, and chat in real time.


Download the Files from here
https://github.com/BonelessChachii/CO-OP



How to Deploy This Project
1. After downloading the Zip, a folder called "CO-OP-main" will be downloaded.
- Rename the folder to just "CO-OP"


2. Install XAMPP
- Download from: https://www.apachefriends.org/index.html
- Install with default settings.
- Make sure Apache and MySQL are selected.


3. Copy Project Files
- Place the `CO-OP` folder inside:
- C:\xampp\htdocs\
- The final path should look like:
- C:\xampp\htdocs\CO-OP\


4. Start XAMPP
- Open the XAMPP Control Panel.
- Click **Start** on Apache and MySQL.
- Apache PID 16780 5672
	 PORTS 80, 433

- MySQL	PID 17184
	PORT 3306

- If MySQL id not starting, then go to the task manager and look for a task called mysqld and end that task.


5. Create the MySQL Database
- Go to: http://localhost/phpmyadmin
- Click **New** and create a database named:
- coop_db
- then click go


6. Import SQL Tables
- Inside phpMyAdmin
- Click on Import
- Import the file coop_db.sql from the CO-OP folder
- Import

7. Import info from .env files to files
- To ensure encryption, copy all the tokens, usernames, passwords, and URLs from the .env file to the correct file locations and line numbers. Each file location and line number is included in the .env file.


8. Run the Web App
- Open your browser and visit:
- http://localhost/CO-OP/login.php


9. To run two users on localhost 
- Run http://localhost/CO-OP/login.php on a NORMAL browser and create an account 
- For the other user, open an Incognito tab or use a separate browser to create another account.
- This way you can test two accounts' chat functions with each other.


I. AI Usage Citation
- AI Tools Used:
- ChatGPT (GPT-3.5 via OpenAI)
- Grammarly (For rephrasing and grammar correction)

	Prompts Used:
	- Help Debugging
	- Fix Css Styles 
	- Help with logic
	
	Affected Files/Components:
	- Style.css, home.php, connections.php, edit_profile.php, discord login.php, profile.php

	Port & Config Notes
	- Apache: Port 80, 443
	- MySQL: Port 3306 (or 3307 if conflicts)


II. File Structure
- HTML: register.html, login.html
- PHP: login.php, register.php, profile.php, home.php, chat.php, edit_profile.php, messages.php
- JS: swipe.js
- Database: `coop_db` MySQL schema


III. Notes
- Ensure the uploads folder exists and has write permissions.
  - To give permissions, go to the directory in the terminal cd ..../XAMPP/htdocs/CO-OP
  - Once inside the directory, type the command "chmod 777 uploads" into the terminal.
- Works on both Windows and macOS with XAMPP.
