CREATE TABLE Persons (
	cwid int NOT NULL,
	p_Name varchar(255) NOT NULL,
	phone_Number int,
	address varchar(255),
	gender varchar(255),
	eMail varchar(255) NOT NULL,
	ssn int NOT NULL,
	date_of_birth Date,
	primary_Campus varchar(255),
	grades int,
	classes varchar(255),
	PRIMARY KEY(cwid)
);
GO

CREATE TABLE Instructor(
	education_Level varchar(255),
	field_of_study varchar(255)
);
GO

CREATE TABLE Studnet(
	classification carchar(255)
);
GO

CREATE TABLE Degrees(
	degree_Name varchar(255),
	PRIMARY KEY(degree_Name)
);
GO

CREATE TABLE Colleges(
	college_Name varchar(255),
	dean varchar(255),
	PRIMARY KEY(college_Name)
);
GO

CREATE TABLE Grades(
	percent int,
	scores int,
	PRIMARY KEY(scores)
);
GO

CREATE TABLE Classes(
	crn int NOT NULL,
	course_Number int NOT NULL,
	class_Name varchar(255) NOT NULL,
	campus varchar(255),
	term varchar(255),
	hours int,
	PRIMARY KEY(crn)
);
GO

CREATE TABLE Online(
	paced varchar(255)
);
GO

CREATE TABLE Lecture(
	room_number varchar(255),
	class_time varchar(255),
	building varchar(255)
);
GO
