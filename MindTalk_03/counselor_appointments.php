<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counselor Appointments</title>
    <link rel="stylesheet" href="style.css">
    <style>
        html { 
            background-image: url("schedul_bg.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
        }

        /* Center the title */
        h1 {
            text-align: center;
        }

        /* Add some space between appointments */
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        /* Style the Edit and Delete links as buttons */
        a {
            display: inline-block;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            color: white;
            background-color: #4CAF50; /* Green color */
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #45a049; /* Darker green color on hover */
        }
    </style>
</head>

<body>
    <?php
    include('db.php');

    // Retrieve counselor appointments from the database
    $appointments = getAppointments();
    ?>

    <h1>Counselor Appointments</h1>

    <ul>
        <?php $counter = 1; ?>
        <?php foreach ($appointments as $appointment) : ?>
            <li>
                <?php echo "{$counter}. {$appointment['full_name']} - {$appointment['date']} ({$appointment['time_start']} - {$appointment['time_end']})"; ?>
                <a href="edit_appointment_form.php?id=<?php echo $appointment['id']; ?>">Edit</a>
                <a href="delete_appointment.php?id=<?php echo $appointment['id']; ?>" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</a>
            </li>
            <?php $counter++; ?>
        <?php endforeach; ?>
    </ul>
</body>

</html>
