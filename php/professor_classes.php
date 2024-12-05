<?php
include 'config.php';

$ssn = $_GET['ssn']; // Retrieve SSN from form input

$sql = "SELECT c.Title, s.Classroom, s.MeetingDays, s.StartTime, s.EndTime 
        FROM Professors p
        JOIN Sections s ON p.ProfessorID = s.ProfessorID
        JOIN Courses c ON s.CourseID = c.CourseID
        WHERE p.SSN = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ssn);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor Classes</title>
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
        <h1>Professor Classes</h1>
    </header>
    <main>
        <?php if ($result->num_rows > 0): ?>
            <h2>Classes Taught by Professor (SSN: <?php echo htmlspecialchars($ssn); ?>)</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course Title</th>
                        <th>Classroom</th>
                        <th>Meeting Days</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['Title']); ?></td>
                            <td><?php echo htmlspecialchars($row['Classroom']); ?></td>
                            <td><?php echo htmlspecialchars($row['MeetingDays']); ?></td>
                            <td><?php echo htmlspecialchars($row['StartTime']) . " - " . htmlspecialchars($row['EndTime']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No classes found for the professor with SSN: <?php echo htmlspecialchars($ssn); ?></p>
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
