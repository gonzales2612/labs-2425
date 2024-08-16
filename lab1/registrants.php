<pre>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phone_number'];
    $sex = $_POST['sex'];
    $birthdate = $_POST['birthdate'];
    $program = $_POST['program'];
    $address = $_POST['address'];
    $fullname = $firstname . " " . $middlename . " " . $lastname;
    $age = date_diff(date_create($birthdate), date_create('now'))->y;

    print_r($_POST);




    // Define the CSV file path
    $file = fopen("registrations.csv", "a");

    // Add headers if the file is new or empty
    if (filesize("registrations.csv") == 0) {
        fputcsv($file, ["Name", "Email"]);
    }

    // Write the data to the CSV file
    fputcsv($file, [$fullname, $birthdate, $age, $phonenumber, $sex, $program, $address, $email ]);

    // Close the file
    fclose($file);

    echo "Data saved to CSV file.";
} else {
    echo "Invalid request.";

}
?>
</pre>
