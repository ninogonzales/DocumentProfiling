# DocumentProfiling - COSC 419C Project
Collect a set of documents (at least 200) and create a document profile. Show how you build each document vector and any pre/post-processing you do with them. Define a set of users (at least 5) and create their user profiles. These users can be simulated or real. Log/create a browse history of these users on this set of documents. For each user, recommend to the user the most likely preferred document based on the set of unseen documents.

#Environment & Tools
<b>WAMP</b> <br />
Operating System: Windows 10 <br />
Web Server: Apache 2.4.7 <br />
Database Management System: MySQL 5.7.9 <br />
Scripting Language: PHP 7.0 <br />

<b>IDE</b> <br />
NetBeans 8.1 <br />

<b>HTTP Scripting Tool</b> <br />
cURL – libcurl <br />

<b>Topic Modeling Tool</b> <br />
uClassify – Topics <br />
https://www.uclassify.com/browse/uclassify/topics <br />

#Set Up - DDL
CREATE TABLE `account` ( <br />
 `id` int(11) NOT NULL AUTO_INCREMENT, <br />
`fname` varchar(50) DEFAULT NULL, <br />
 `lname` varchar(50) DEFAULT NULL, <br />
 `email` varchar(80) DEFAULT NULL, <br />
 `password` varchar(50) DEFAULT NULL, <br />
 PRIMARY KEY (`id`) <br />
) <br />

CREATE TABLE `document` ( <br />
`id` int(11) NOT NULL AUTO_INCREMENT, <br />
`name` varchar(80) DEFAULT NULL, <br />
`path` varchar(150) DEFAULT NULL, <br />
PRIMARY KEY (`id`) <br />
) <br />

CREATE TABLE `history` ( <br />
`account` int(11) NOT NULL, <br />
`document` int(11) NOT NULL, <br />
 PRIMARY KEY (`account`,`document`), <br />
FOREIGN KEY (`account`) REFERENCES account (`id`), <br />
FOREIGN KEY (`document`) REFERENCES document (`id`) <br />
) <br />
                                                                                                         
CREATE TABLE `category` ( <br />
`document` int(11) NOT NULL, <br />
`first` varchar(20) DEFAULT NULL, <br />
`second` varchar(20) DEFAULT NULL, <br />
`third` varchar(20) DEFAULT NULL, <br />
`fourth` varchar(20) DEFAULT NULL, <br />
`fifth` varchar(20) DEFAULT NULL, <br />
`sixth` varchar(20) DEFAULT NULL, <br />
`seventh` varchar(20) DEFAULT NULL, <br />
`eighth` varchar(20) DEFAULT NULL, <br />
`ninth` varchar(20) DEFAULT NULL, <br />
`tenth` varchar(20) DEFAULT NULL, <br />
PRIMARY KEY (`document`), <br />
FOREIGN KEY (`document`) REFERENCES document (`id`) <br />
) <br />

#Walkthrough
1.	Add documents to the database <br />
•	Inside the docs_txt folder, run script.php<br />
2.	Categorize each document <br />
•	Run categorizeScript.php (this may take a while depending on how many documents you have)<br />
3.	Simulate Users<br />
•	Run simulateUser.php<br />
4.	Check Results<br />
•	Run index.php<br />
•	Log in with email: user1@gmail.com password: password<br />
•	View history and recommended documents<br />
•	Repeat with user2, user3, user4, user5<br />

#Demo
https://youtu.be/wFe6cR8Hnaw



