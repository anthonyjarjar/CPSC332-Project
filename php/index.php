<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniversityDB Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            color: #4CAF50;
            text-align: center;
        }
        form {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9f9f9;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        form input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>UniversityDB Interface</h1>
    </header>
    <main>
        <h2>Welcome to the UniversityDB Interface</h2>

        <h3>Find Classes by Professor</h3>
        <form method="GET" action="professor_classes.php">
            <label for="ssn">Enter Professor SSN:</label>
            <input type="text" id="ssn" name="ssn" required>
            <button type="submit">Submit</button>
        </form>

        <h3>Count Grades in a Section</h3>
        <form method="GET" action="section_grades.php">
            <label for="courseNumber">Course Number:</label>
            <input type="text" id="courseNumber" name="courseNumber" required>
            <label for="sectionNumber">Section Number:</label>
            <input type="text" id="sectionNumber" name="sectionNumber" required>
            <button type="submit">Submit</button>
        </form>

        <h3>Find Sections of a Course</h3>
        <form method="GET" action="course_sections.php">
            <label for="courseNumber">Course Number:</label>
            <input type="text" id="courseNumber" name="courseNumber" required>
            <button type="submit">Submit</button>
        </form>

        <h3>Find Courses Taken by Student</h3>
        <form method="GET" action="student_courses.php">
            <label for="campusWideID">Campus Wide ID:</label>
            <input type="text" id="campusWideID" name="campusWideID" required>
            <button type="submit">Submit</button>
        </form>
    </main>
</body>
</html>
