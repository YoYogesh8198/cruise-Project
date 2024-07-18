<?php
include_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/table.css">
    <link rel="shortcut icon" href="https://img.icons8.com/3d-fluency/94/group--v1.png" type="image/x-icon">
    <!-- https://img.icons8.com/?size=100&id=UWNhN9bLYG1k&format=png&color=000000 -->
    <title>All Cruise Details</title>
</head>

<body>
    <!-- <table class="table table-hover table-success ">
        <thead>
            <tr>
                <th scope="col">uniqueId</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Number</th>
                <th scope="col">Travelers</th>
                <th scope="col">Destination</th>
                <th scope="col">Cruise_length</th>
                <th scope="col">Depart Date</th>
                <th scope="col">Return Date</th>
                <th scope="col">Cruise Line</th>
                <th scope="col">Cruise Ship</th>
                <th scope="col">Departur Port</th>
            </tr>
        </thead>
        <?php //foreach ($results['details'] as $table): ?>
            <tbody>
                <tr>
                    <th scope="row"><?php //echo $table->uniqueId; ?></th>
                    <td><?php //echo $table->name; ?></td>
                    <td><?php //echo $table->email; ?></td>
                    <td><?php //echo $table->number; ?></td>
                    <td><?php //echo $table->travelers; ?></td>
                    <td><?php //echo $table->destination; ?></td>
                    <td><?php //echo $table->cruise_length; ?></td>
                    <td><?php //echo $table->depart; ?></td>
                    <td><?php //echo $table->return; ?></td>
                    <td><?php //echo $table->cruise_line; ?></td>
                    <td><?php //echo $table->cruise_ship; ?></td>
                    <td><?php //echo $table->departure_port; ?></td>
                </tr>
            </tbody>
        <?php //endforeach; ?>
    </table>  -->





    <div class="container mt-4">
        
        <table class="rwd-table">
            <tbody>
                <tr>
                    <th>uniqueId</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Travelers</th>
                    <th>Destination</th>
                    <th>Cruise_length</th>
                    <th>Depart Date</th>
                    <th>Return Date</th>
                    <th>Cruise Line</th>
                    <th>Cruise Ship</th>
                    <th>Departur Port</th>
                </tr>
                <?php foreach ($results['details'] as $table): ?>
                    <tr>
                        <td data-th="uniqueId">
                            <?php echo $table->uniqueId; ?>
                        </td>
                        <td data-th="Name">
                            <?php echo $table->name; ?>
                        </td>
                        <td data-th="Email">
                            <?php echo $table->email; ?>
                        </td>
                        <td data-th="Number">
                            <?php echo $table->number; ?>
                        </td>
                        <td data-th="Travelers">
                            <?php echo $table->travelers; ?>
                        </td>
                        <td data-th="Destination">
                            <?php echo $table->destination; ?>
                        </td>
                        <td data-th="Cruise_length">
                            <?php echo $table->cruise_length; ?>
                        </td>
                        <td data-th="Depart Date">
                            <?php echo $table->depart; ?>
                        </td>
                        <td data-th="Return Date">
                            <?php echo $table->return; ?>
                        </td>
                        <td data-th="Cruise Line">
                            <?php echo $table->cruise_line; ?>
                        </td>
                        <td data-th="Cruise Ship">
                            <?php echo $table->cruise_ship; ?>
                        </td>
                        <td data-th="Departur Port">
                            <?php echo $table->departure_port; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>