<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input PHP - PBO</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; padding: 50px; background-color: #f4f4f4;}
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 100%; max-width: 500px; }
        .form-group { margin-bottom: 15px; }
        .form-group input, .form-group textarea { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #4da6ff; color: white; border: none; padding: 10px 20px; border-radius: 20px; cursor: pointer; width: 100%; font-size: 16px; margin-bottom: 20px; }
        button:hover { background-color: #3388dd; }
        .result { margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee; }
        .result p { margin: 5px 0; font-size: 14px; }
        .reset-link { font-size: 12px; color: #666; text-decoration: none; display: inline-block; margin-top: 10px; }
        .reset-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <form method="POST" action="">
        <div class="form-group">
            <input type="text" name="firstname" placeholder="Firstname" required>
        </div>
        <div class="form-group">
            <input type="text" name="lastname" placeholder="Lastname" required>
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="Phone Number" required>
        </div>
        <div class="form-group">
            <textarea name="address" placeholder="Address" rows="4" required></textarea>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    class UserProfile {
        private $firstName;
        private $lastName;
        private $phoneNumber;
        private $address;

        public function __construct($firstName, $lastName, $phoneNumber, $address) {
            $this->firstName = htmlspecialchars($firstName);
            $this->lastName = htmlspecialchars($lastName);
            $this->phoneNumber = htmlspecialchars($phoneNumber);
            $this->address = htmlspecialchars($address);
        }

        public function displayProfile() {
            echo "<div class='result'>";
            echo "<p>Hi, my name is <strong>" . $this->firstName . " " . $this->lastName . "</strong></p>";
            echo "<p>Phone Number : " . $this->phoneNumber . "</p>";
            echo "<p>Address : " . $this->address . "</p>";
            echo "<a href='index.php' class='reset-link'>Reset</a>";
            echo "</div>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $user = new UserProfile($fname, $lname, $phone, $address);
        
        $user->displayProfile();
    }
    ?>
</div>

</body>
</html>