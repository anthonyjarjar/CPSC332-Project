<?php
include 'config.php';

$campusWideID = $_GET['campusWideID'];

$sql = "SELECT c.Title, e.Grade
        FROM Students s
        JOIN Enrollments e ON s.StudentID = e.StudentID
        JOIN Sections sec ON e.SectionID = sec.SectionID
        JOIN Courses c ON sec.CourseID = c.CourseID
        WHERE s.CampusWideID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $campusWideID);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Courses</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <h1>Student Courses</h1>
    </header>
    <main>
        <?php if ($result->num_rows > 0): ?>
            <h2>Courses Taken by Student (ID: <?php echo htmlspecialchars($campusWideID); ?>)</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['Title']); ?></td>
                            <td><?php echo htmlspecialchars($row['Grade']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No courses found for student with ID: <?php echo htmlspecialchars($campusWideID); ?>.</p>
        <?php endif; ?>
        <div style="text-align: center; margin-top: 20px;">
            <a href="index.php" style="text-decoration: none;">
                <button style="
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    padding: 10px 20px;
                    font-size: 16px;
                    border-radius: 5px;
                    cursor: pointer;
                ">
                    Back to Index
                </button>
            </a>
        </div>
    </main>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
