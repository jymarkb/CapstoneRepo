-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 12:48 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newdbcapstonelib`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(10) NOT NULL,
  `acc_fname` varchar(20) NOT NULL,
  `acc_mname` varchar(20) NOT NULL,
  `acc_lname` varchar(20) NOT NULL,
  `acc_user` varchar(20) NOT NULL,
  `acc_pass` varchar(20) NOT NULL,
  `acc_email` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `bday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_fname`, `acc_mname`, `acc_lname`, `acc_user`, `acc_pass`, `acc_email`, `status`, `contact`, `gender`, `bday`) VALUES
(1, 'hoho', 'macky', 'panda', 'hoho', 'hoho', 'mackyhoho@gmail.com', 'Administrator', '0912345678', 'Male', '1999-05-20'),
(2, 'Jay Mark', 'A', 'Borja', 'user', 'pass', 'userpass@gmail.com', 'Administrator', '0123456789', 'Male', '1999-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL,
  `cap_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `dateBorrow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `capstone`
--

CREATE TABLE `capstone` (
  `cap_id` int(11) NOT NULL,
  `cap_title` char(100) NOT NULL,
  `cap_author` varchar(100) NOT NULL,
  `cap_abstract` mediumtext NOT NULL,
  `cap_date_pub` date NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `acc_id` int(11) NOT NULL,
  `stat_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capstone`
--

INSERT INTO `capstone` (`cap_id`, `cap_title`, `cap_author`, `cap_abstract`, `cap_date_pub`, `cat_id`, `acc_id`, `stat_id`, `status_id`) VALUES
(2, 'Attendance Monitoring System Database Design', 'Author 2', 'The system Supreme Student Council (SSC) Student Activity Bar coding Attendance and Monitoring System has the ability to automate and increase the speed and security in terms of monitoring the attendance. The SSC members/Students will both have benefit for a reason that they will not do the same process they are using in every transaction. Instead of doing the usual way or the manual system of monitoring the attendance, they can now use a Graphical User Interface (GUI) all they have to do is to use the mouse, keyboard and barcode scanner to automate every transaction.', '2019-07-18', 2, 1, 0, 4),
(3, 'Employeess Performance Evaluation System Database Design', 'Author 3', 'The Human Resource will address the Automation of the Performance of the employees as regard to what is monitored on them. Their performance would be according to the qualities of what theyâ€™re working on. On the present situation, the performance of the employees were poorly evaluated and monitored before, during and after every period of their jobs. Although Human Resource would evaluate them, it is a very ideal thing for them to accomplish every evaluation of the employees regularly to update their performance their quality of work. The Human Resource Management Office used to have a process of manual performance evaluation system. The employee evaluators manage/conduct the manual system and other staffs of Human Resource Management Office are the one who compute the results of performance evaluation. During the process, it takes time to do all paper works and the validity of results. There are also some instances that some documents are being misplaced and lack of security. The Web-Based Employee Performance Evaluation System will improve the current system of the organization. The documents will be secured and the employees can gain knowledge about their performance and the data will be sent directly to the Human Resource Management Office. The works will be lessening because of the new system that we proposed.', '2016-04-30', 5, 1, 0, 4),
(4, 'Fitness Gym Management System', 'Author 4', 'The fitness gym needs the invention of technology, it gives more convenience to participate to some activities and most especially in business industries. Furthermore, people become dependent on this technical equipment since the flow of transaction becomes more convenient at the same time produces quality data to its client.\r\nThe researchers conducted an interview at Pro-health Gym owned by Mr. Eazher Montejo at Libod 1, Libmanan, Camarines Sur. Based from the interview with the client, many problems or even difficulty was identified that contribute as factors affecting daily transaction with the client. It was found out that they experience difficulty when it comes to managing customersâ€™ information. Likewise, inventory of all equipment at the Gym vicinity. Because business is still in the practice of traditional transaction, they donâ€™t have yet established ways of attendance monitoring of their customer while in the vicinity and time inventory of equipment, and managing customer information.\r\n\r\nThe researchers developed a system â€œFitness Gym Management Systemâ€ which aimed to address the problem to help the business. This system is a stand-alone system focused on membersâ€™ registration and clientsâ€™ time logs, - In developing this Project, the researcher undergone a library visit. This activity was conducted for the researchers to widen their knowledge regarding this project.\r\n\r\nIn the study of Ramos, et al. (2014), â€œNaga College Foundation eonâ€ (NCF-e-ID),â€ the system was focused in the security of the studentsâ€™ records. By using this automated system recording, it can help to easily access all the information or data stored in that specific system. The researchers found out that most of the industries are using technology to automate and to secure the data and information of an individual. Like in the study of Kulkarniâ€™s (2014) the RFID Security issues and Challenges articulated that the deployment and use of RFID technology is growing rapidly. Those studies provide more knowledge about the project and research they conducted.\r\n\r\nTo understand the design of this system, the researcher used the System Development Life Cycle and the architectural interface. The project was developed by creating the abstract model and data flow diagram of the system through analysis of certain problem in the maintenance stage. The primary application that created the Systems Design was the Visual Studio and My Structured Query Language (MySQL) which are the front-end and back-end of the system. This tool was very useful in developing the system. To successfully deploy the system, the business must have met the minimum requirements. In hardware requirements, Personal Computer with at least 1.7 GHz Dual core with at least 2GB or RAM and a Graphics card. The managing customersâ€™ information, and automating all related daily transactions. This system enabled the owner to register customer and retrieve the record of every session. It could help the owner lessen his/her time doing daily, weekly, monthly and yearly reports because this is one among the features that the system can do including the generation of inventory report. This can be extracted on the existing data stored on the database. The system focused on managing transaction using RFID reader that can read tags. This can help lessen the interaction of the owner and customers by tapping the RFID tag to the reader. Generally, the main purpose of this system was to automate recording and monitoring of client transactions.\r\n\r\nFitness Gym Management System, the finished system for the business, shall improve the work of the owner and staff, particularly, the preparation of records so not to take much time and with certain degree of efficiency. More so, this system will help reduce data loss, manual recording, data redundancy and leakage of client information. business is also required to have an RFID reader together with RFID tags which is on the membership card. In terms of software requirements, the system requires to have an installed OS of at least Windows 7 to have a worthy function of the system. Likewise, the system must have an Adobe reader and printer to view reports before printing and to print reports, respectively.\r\n', '2017-05-03', 1, 1, 0, 4),
(5, 'Sales and Inventory System Database Design', 'Author 5', 'The main objective of the study is to develop and implement computerized sales and inventory with decision support system. The development of this project started with the proponentâ€™s statement of the problem which includes general and specific problems that the current processes of the owner/company encountered. These problems were acquired through different data determination techniques such as observation, interviews, and surveys. Upon knowing the problems and formulating the objectives of the development, the proponents set the scope and limitations of the developed system to determine what the system would be like.\r\n\r\nThe proponents will create a module that will integrate the Point of Sales and for the availability of the products. The proponents will use MySQL that will serve as the database and querying of the tables. The proponents will also use Visual Basic for building an application for this module.', '2016-03-03', 2, 1, 0, 4),
(6, 'Android Based Learning App for Criminology Students', 'Author 6', 'The player will be given 3 lives, and in every wrong answer the life will be deducted\r\n\r\nThe player will be given 3 50/50 lifelines and can only be used once in every level (not available in demo version).\r\n\r\nThe score will be recorded in the app (not available in demo version).\r\n\r\nEvery Level has more or less 5 questions, 60 sec per question\r\n\r\nThe game has 8 categories (5 per category and a total of 45 questions),\r\n\r\n5 questions per category will be shuffled or will be randomly selected', '2018-05-14', 1, 1, 0, 4),
(7, 'Face Recognition with SMS notification and Security System', 'Author 7', 'Face Recognition with SMS notification and Security SystemFace Recognition with SMS notification and Security SystemFace Recognition with SMS notification and Security SystemFace Recognition with SMS notification and Security SystemFace Recognition with SMS notification and Security SystemFace Recognition with SMS notification and Security SystemFace Recognition with SMS notification and Security SystemFace Recognition with SMS notification and Security SystemFace Recognition with SMS notification and Security System', '2020-03-11', 1, 1, 0, 4),
(8, 'Students Grade Record Profiling System Complete Capstone Documentation', 'Jay Mark A .Borja', 'Computers have changed the world and are here to stay. They have changed people lives not only in everything they do. But also they changed daily activities, and lot more. Computers are used as storage and management of data; they can serve as huge knowledge bases and can be harnessed for all sorts of transactions due to their processing power and storage capacities. As computers are a daily utility, they have gained immense importance in day-to-day life. Their increasing utility has made every business organization and educational institutions switch from paper-based to automated systems.', '2020-03-04', 3, 2, 0, 4),
(9, 'Voting System Complete Capstone', 'Jay Mark Hoho', 'The election process allows the general population to choose their representatives and express their preferences for how they will be governed. Naturally, the integrity of the election process is fundamental to the integrity of democracy itself. The election system must be sufficiently robust to withstand a variety of deceptive behaviors and must be sufficiently transparent and comprehensible that voters and candidates can accept the results of an election. Election fraud and delayed process of electoral selection were common problems in any kind of voting system.', '2020-03-06', 2, 2, 0, 4),
(10, 'Sales and Inventory with Decision Support System', 'zzzzzz,qwerty', 'The proponents will create a Sales and Inventory with Decision Support System which will help the company/owner to be more progressive, productive and to avoid unnecessary errors.\n\nThe current process will be improved with the implementation of the computerized system. This system will make the process easier and faster.\n\nThis study aims to provide a standard way recording of invoice, generate report and monitoring of products.\n\n\nThe proponents will create a module that will integrate the Point of Sales. This will also include module for availability of products when stock levels are insufficient to satisfy the orders.', '2020-03-06', 2, 2, 0, 4),
(11, 'Online Grading System with Grade Viewing Capstone Project', 'admin', 'People nowadays are living in information age reliant on digital information. Digital information is an electronic information; the result of computer processing. Every type of job relies upon getting data, using it, managing it and relaying information to others. Computers enable the efficient processing and storage information.\n\nThe logistical problems associated with distributing, collecting, grading, and the difficulties in ensuring fairness and consistency in grading tend to increase non-linearly with the number of students. Electronic Grading System is designed to provide incentive for achievement and assist in identifying problem areas of student of name of school. Studentsâ€™ grades are vital information needed in advancing to the next grade/year level and its accuracy is very important.\n\n\nOnline Grade viewing helps the students of name of school to view their grades using their username and password to access or login to the online application. Many public and private School are adopting continuous improvements program to improve operational work. Furthermore, it is not easy for a teacher to manage hundreds of records in an accurate way without using automation. It is necessary that students should have grades at the end of the semester.', '2020-03-06', 2, 2, 0, 4),
(12, 'Web Based Accounting System using PHP, MySQL and Bootstrap 4', 'jaymark, zzzzzzz', 'The researchers of the system entitled Web Based Accounting System aimed to make transaction in the establishment more convenient, faster and easier for the management and customers. The system will also lessen the work of personnel in charge because when encoding all data transaction by the customer the record can be automatically save to the inventory system and the data in the database can be printed out to be past the summary of the reports to the manager for signing of signature and the manager will past the reports to the main office.\n\nIn this proposed system, the proponents made some improvement on the current system. The current system is a manual system and requires much effort.\n\n\nThe proposed Web Based Accounting System can make a quick process for recording, making inventory, encoding data, summarizing reports regarding all about accounting process. In addition, the owner and the manager of the resort can view and retrieve on the record of income for a week, month and for a year and he or she also determine the number of the customer entered in the resorts for a particular day.', '2020-03-06', 1, 2, 0, 4),
(13, 'Web Based Entrance Examination with Mobile App Support and SMS Notification', 'asdwe qwe asd', 'Most of the colleges nowadays use a computer-assisted entrance examination. The result of this study may enlighten and give additional information in providing quality performance through the use of computer-assisted entrance examination.\n\nResult may serve the following:\n\nResearchers. The result of this study may be the researchersâ€™ basis for developing computer-assisted entrance examination.\n\n\nGuidance Counselor. The result of this study may lessen the pressure of the guidance counselorâ€™s job and errors on checking the examination papers will not likely to happen.', '2020-03-06', 3, 2, 0, 4),
(14, 'Fire Alarm Management System Capstone Project', 'hohoased ', 'The researchers of the system named Fire Alarm Management aimed to provide a safety feature that detects fires at early stage and alarm occupants for them to evacuate quickly in the premises. With this system, causes like injuries, loss of lives and damages will lessen or limits. This will serves as a safeguard to the premises as well as to people. This system made some development, from system that alarms people in a basic way which relies on the occupants to a system that detects fire itself. The proposed project which is the Alarm Management System will immediately inform occupants from fire occurs and for them to safely off the premises. In addition, both the owner/admin and the occupants will get an advantage with this system for it will avoid them from harm.', '2020-03-06', 3, 2, 0, 4),
(15, 'Patient Information System User Interface in PHP and Bootstrap', 'asaweqwceqwev', 'This article will present the different form design and pages for the project entitled Patient Information System. The said project was designed using Bootstrap 4.\nThis study is expected to be a great help to the following:\n\nDoctor. The proposed system will make it easier for the doctor to retrieve the patientâ€™s records.\n\nStaff. Staff can benefit a lot from this study, as they are the integral part of the whole clinic.\n\nNurse. The proposed system will also make it easier for the nurse in retrieving data about the patients.\n\nPatients. The proposed system will give the patients a reliable result and also a better service of the clinic staff.', '2020-03-06', 3, 2, 0, 4),
(16, 'Graduate Tracer Study Application', 'asdawevqwe', 'This chapter contains the review of related literature, related studies and prior arts, which include the related readings, related literature and related studies (foreign and local studies). It also includes the synthesis of Graduate Tracer. This will give fully understanding of the research to be done.\n\nAccording to the researcher Edward Deming (n.d.), the tracer study is an approach which widely being used in most organization especially in the educational institutions to track and to keep record of their students once they have graduated from the institution. Through tracer study, an institution able to evaluate the quality of education given to their graduates by knowing the graduates placements and positions in the society.', '2020-03-06', 3, 2, 0, 4),
(17, 'Online Record Archiving of Soil Analysis Results', 'sadqwervqtqwre', 'Our world as we know it today, technology has played a big role in our daily routines. The task of technology is to create a better and easier way for ourselves while living in this world. One of this is the record keeping of different soil analysis. Soil analysis has been used as an aid in assessing soil fertility and plant nutrient. In conjunction to this, the researchers of the proposed study aimed to provide a platform wherein the records of soil analysis are kept and managed. Through the system farmers who tested their soils on a regular basis would have a reference in comparing data from different sampling times to see if there are changes affecting the fertility of their soils. The system will serve as a centralized location for results of soil analysis. Through the system record keeping will be convenient for sides, the admin and the user. The proposed system will made a development in the manual system of record keeping. This would provide convenience to the user.\n\n', '2020-03-06', 2, 2, 0, 4),
(18, 'Mobile Based Expense Manager Application', 'qwecqwecwe', 'The researchers of the system entitled â€œMobile Based Expense Manager Applicationâ€ is develop a better way to manage people expenses through mobility. It is an application that will keep track of userâ€™s personal expenses; this includes also the usersâ€™ monthly income. The researchers aimed to provide an efficient application that could manage userâ€™s expenses well and also an advantageous application that could monitor the day to day expenses so that users will spend their money in the right way. Through this application users can now budget their expenses without the worry of having enough money. When it comes to managing money, this application would be a great help, users can now able to manage their finances and expenses properly and correctly.', '2020-03-07', 1, 2, 0, 4),
(19, 'Android Based Dictio-Translator using jQuery Mobile and Apache Cordova', 'asdqwecqwecqwe', 'Talking about translation study, many people think that translation is not easy to do, because in translation there are many processes and methods. Generally, translation is known as a process of transferring a language to another. It has historic and cultural background.\n\nIn our interconnected world, Android Based Dictio-Translator give the user a global mindset which is increasingly useful. Because of the widespread use of dictionaries in schools and their acceptance by many as language authorities the researcher has the idea of creating an application. Android Based Dictio-Translator is an application that helps Filipino to translate their mother tongue to other Filipino dialect for them to interpret their lingo. It enhances your knowledge to comprehend many language entities. It enables the user to explore Filipino dialect. It gives the meaning of the words and translates it to your desired language.', '2020-03-08', 1, 2, 0, 4),
(20, 'Online Application for Salon Management System with Mobile App Support', 'asdwecqweqw', 'The project entitled Online Application for Salon Management System with Mobile App Support is a cloud-based technology for managing hair salon. The application is designed and developed using web technologies such as PHP and MariaDB for the backend programming and Bootstrap for front-end or for the design and interface of the project. Aside from being an online application, it is also compatible for mobile devices because the design is responsive.\n\nOnline Application for Salon Management System with Mobile App is the solution to upgrade the manual method of business transaction between the management and the customers. The said project will cover appointment scheduling, billing for customers, customers records management, integrated point of sale and inventory module, mobile access, reports management and database maintenance. The detailed description of the system modules will be discussed further in the System Features section of this article.', '2020-03-08', 1, 2, 0, 4),
(21, 'System Module of Salon Management System in PHP', 'asdqewrqcweqwe', 'The project entitled Salon Management System is a database oriented project that will manage the transactions in the salon business. The development of Salon Management System is to act an alternative to the manual operation of process implemented by the business.\n\nThe said system was implemented in a live server/online, which means that it can be access through the internet.\n\nThis article will present the basic features of a salon management system together with its screenshots or user interfaces.', '2020-03-08', 3, 2, 0, 4),
(22, 'Short Message Service Controlled Sockets', 'qwerqwveqw qweqwce', 'The SMS controlled Sockets reduce the manpower. We can save a lot of time to operate home appliances and devices from anywhere without wasting time to move from the other place to the location of device controller. Presently, it is hassle for the user to go the conventional wall sockets and operate them if they are located in the different parts of the house. Even more it is difficult for the elderly or people who have physical disability to do so. This provides modern solution with cellular phones and automatic voltage regulator as the controller. Short Message Service (SMS) controlled Sockets can be a solution since it is an automated socket that can be controlled by a mobile phone through Short Message Service (SMS).', '2020-03-08', 5, 2, 0, 4),
(23, 'Payroll System Database Design', 'Author 11aaa', 'Automated Payroll system is an application that will manage and compute the employees salary. It connects information throughout the entire company. It is the easiest way to cater these needs. Computerize systems is typically simplify information, Quickly organize reports, automatically archive data, calculate deductions, easily track clock in/out and minimize manual efforts.\n\nSimplified and quickly organize data is advantageous in many ways. Such as integrated the payroll figures into easy to read platform to ensure everything is accounted for, thus minimizing risks of valid or missed numbers. The systems include updating of records of the employees preparing payroll sheet & pay slips. Updating records is automatically updated and stored on host computers where it can be review or amended by a manager or supervisor to ensure the accuracy & consistency of the records of the employees. Preparing payroll sheet is a document which all informationï¿½s of employees are recorded including name, address, id, number, position of employee.\n\n\nPay slip is a slip of paper of an employee receives either as a notices, it will typically details the gross income and all taxes, and any other deductions such as retirement plan contributions, insurances contributions taken out of gross income to arrive at the final amount of the pay, including the year to date totals of all deductions of your salary in for circumstances.\n\nAdditional features of the system are the Backup and Restore utility which enables the users of the application to Backup and Restore the database', '2020-03-08', 2, 2, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Mobile Application'),
(2, 'Windows Application'),
(3, 'Web Based System'),
(4, 'Game Development'),
(5, 'Artificial Intelligent');

-- --------------------------------------------------------

--
-- Table structure for table `screenshot`
--

CREATE TABLE `screenshot` (
  `screen_id` int(11) NOT NULL,
  `screen_name` varchar(250) NOT NULL,
  `cap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statistic`
--

CREATE TABLE `statistic` (
  `stat_id` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `cap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_desc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_desc`) VALUES
(1, 'Returned'),
(2, 'Canceled'),
(3, 'Pending'),
(4, 'Approved'),
(5, 'Borrowed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `capstone`
--
ALTER TABLE `capstone`
  ADD PRIMARY KEY (`cap_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `screenshot`
--
ALTER TABLE `screenshot`
  ADD PRIMARY KEY (`screen_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `capstone`
--
ALTER TABLE `capstone`
  MODIFY `cap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `screenshot`
--
ALTER TABLE `screenshot`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
