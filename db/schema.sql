CREATE DATABASE IF NOT EXISTS UniversityDB;
USE UniversityDB;

CREATE TABLE Professors (
    ProfessorID INT AUTO_INCREMENT PRIMARY KEY,
    SSN VARCHAR(11) UNIQUE NOT NULL,
    Name VARCHAR(100) NOT NULL,
    Address VARCHAR(255),
    Telephone VARCHAR(15),
    Sex CHAR(1),
    Title VARCHAR(50),
    Salary DECIMAL(10, 2),
    CollegeDegrees TEXT
);

CREATE TABLE Departments (
    DepartmentID INT AUTO_INCREMENT PRIMARY KEY,
    DepartmentName VARCHAR(100) UNIQUE NOT NULL,
    Telephone VARCHAR(15),
    OfficeLocation VARCHAR(100),
    ChairpersonID INT,
    FOREIGN KEY (ChairpersonID) REFERENCES Professors(ProfessorID)
);

CREATE TABLE Courses (
    CourseID INT AUTO_INCREMENT PRIMARY KEY,
    CourseNumber VARCHAR(10) UNIQUE NOT NULL,
    Title VARCHAR(100) NOT NULL,
    Textbook VARCHAR(255),
    Units INT,
    DepartmentID INT,
    FOREIGN KEY (DepartmentID) REFERENCES Departments(DepartmentID)
);

CREATE TABLE Prerequisites (
    CourseID INT,
    PrerequisiteCourseID INT,
    PRIMARY KEY (CourseID, PrerequisiteCourseID),
    FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
    FOREIGN KEY (PrerequisiteCourseID) REFERENCES Courses(CourseID)
);

CREATE TABLE Sections (
    SectionID INT AUTO_INCREMENT PRIMARY KEY,
    CourseID INT,
    SectionNumber VARCHAR(10),
    Classroom VARCHAR(50),
    Seats INT,
    MeetingDays VARCHAR(20),  
    StartTime TIME,
    EndTime TIME,
    ProfessorID INT,
    FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
    FOREIGN KEY (ProfessorID) REFERENCES Professors(ProfessorID)
);

CREATE TABLE Students (
    StudentID INT AUTO_INCREMENT PRIMARY KEY,
    CampusWideID VARCHAR(10) UNIQUE NOT NULL,
    Name VARCHAR(100) NOT NULL,
    Address VARCHAR(255),
    Telephone VARCHAR(15),
    MajorDepartmentID INT,
    FOREIGN KEY (MajorDepartmentID) REFERENCES Departments(DepartmentID)
);

CREATE TABLE Minors (
    StudentID INT,
    DepartmentID INT,
    PRIMARY KEY (StudentID, DepartmentID),
    FOREIGN KEY (StudentID) REFERENCES Students(StudentID),
    FOREIGN KEY (DepartmentID) REFERENCES Departments(DepartmentID)
);

CREATE TABLE Enrollments (
    EnrollmentID INT AUTO_INCREMENT PRIMARY KEY,
    StudentID INT,
    SectionID INT,
    Grade VARCHAR(5),
    FOREIGN KEY (StudentID) REFERENCES Students(StudentID),
    FOREIGN KEY (SectionID) REFERENCES Sections(SectionID)
);


INSERT INTO Professors (SSN, Name, Address, Telephone, Sex, Title, Salary, CollegeDegrees)
VALUES
('123-45-6789', 'Dr. Alice Doe', '321 Birch St, OC', '949-555-1212', 'F', 'Assoc Prof', 90000, 'PhD CS'),
('987-65-4321', 'Dr. Bob Brown', '789 Elm St, LA', '310-555-3434', 'M', 'Prof', 110000, 'PhD Math'),
('567-89-0123', 'Dr. Carol White', '456 Pine St, SD', '619-555-6789', 'F', 'Asst Prof', 80000, 'PhD Eng');

INSERT INTO Departments (DepartmentName, Telephone, OfficeLocation, ChairpersonID)
VALUES
('Computer Sci.', '714-555-4321', 'CS-101', 1),
('Mathematics', '714-555-8765', 'MH-210', 2);

INSERT INTO Courses (CourseNumber, Title, Textbook, Units, DepartmentID)
VALUES
('CS101', 'Intro to CS', 'Learn CS', 3, 1),
('CS102', 'Data Structures', 'Data Struct & Algo', 4, 1),
('MATH201', 'Calculus I', 'Calculus Text', 4, 2),
('MATH202', 'Linear Algebra', 'Linear Algebra Text', 3, 2);

INSERT INTO Sections (CourseID, SectionNumber, Classroom, Seats, MeetingDays, StartTime, EndTime, ProfessorID)
VALUES
(1, '101', 'CS-105', 30, 'MW', '10:00:00', '11:30:00', 1),
(1, '102', 'CS-106', 25, 'TTh', '14:00:00', '15:30:00', 2),
(2, '201', 'CS-107', 20, 'MW', '13:00:00', '14:30:00', 3),
(3, '301', 'MH-101', 35, 'MW', '08:00:00', '09:30:00', 2),
(4, '401', 'MH-102', 40, 'TTh', '11:00:00', '12:30:00', 3),
(4, '402', 'MH-103', 30, 'MW', '16:00:00', '17:30:00', 1);

INSERT INTO Students (CampusWideID, Name, Address, Telephone, MajorDepartmentID)
VALUES
('10001', 'Alice Smith', '123 Maple St, Irvine', '949-555-1234', 1),
('10002', 'Bob Johnson', '456 Oak St, Fullerton', '714-555-5678', 2);

INSERT INTO Enrollments (StudentID, SectionID, Grade)
VALUES
(1, 1, 'A'), (1, 3, 'B+'), (2, 4, 'A-'), (2, 2, 'B');

INSERT INTO Prerequisites (CourseID, PrerequisiteCourseID)
VALUES
(2, 1), (4, 3);

INSERT INTO Students (CampusWideID, Name, Address, Telephone, MajorDepartmentID)
VALUES
('10003', 'Charlie Davis', '789 Spruce St, Anaheim', '714-555-2345', 1),
('10004', 'Dana Lee', '321 Fir St, Tustin', '949-555-3456', 2),
('10005', 'Eve Miller', '654 Palm St, Laguna', '949-555-4567', 1),
('10006', 'Frank Wilson', '987 Cedar St, Santa Ana', '714-555-5678', 2),
('10007', 'Grace Chen', '111 Willow St, Irvine', '949-555-6789', 1),
('10008', 'Henry Moore', '222 Cypress St, Orange', '714-555-7890', 2);

INSERT INTO Enrollments (StudentID, SectionID, Grade)
VALUES
(3, 1, 'A'), (3, 4, 'B'), (4, 5, 'A-'), (4, 6, 'B+'),
(5, 1, 'B'), (5, 2, 'C+'), (6, 3, 'B'), (6, 5, 'A'),
(7, 2, 'B+'), (7, 4, 'A-'), (8, 6, 'B'), (8, 5, 'A'),
(1, 2, 'A'), (2, 6, 'B'), (3, 3, 'B+'), (4, 1, 'C');
