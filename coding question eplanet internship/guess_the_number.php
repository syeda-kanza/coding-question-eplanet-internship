<!DOCTYPE html>

<head>

<body>
    <h1>GUESS THE NUMBER</h1>

    <?php
    session_start();

    if (!isset($_SESSION['number'])) {
        $_SESSION['random'] = rand(1000, 9999);
    }
    if (!isset($_SESSION['number'])) {
        $random_number = $_SESSION['random'];
        $number = array_map('intval', str_split($random_number));
        $_SESSION['number'] = $number;

        $counter = 5;

        $_SESSION["counter"] = $counter;
        $_SESSION['tries'] = array();
    }

    if (isset($_POST['guess'])) {
        $random_number = $_SESSION['random'];

        $number = $_SESSION['number'];

        $guesses = $_POST['guess'];
        $user_input = (int)implode("", $guesses);

        $position = 0;
        $digit = 0;

        for ($i = 0; $i < 4; $i++) {
            if ($number[$i] == $guesses[$i]) {
                $position++;
            }
            if (in_array($guesses[$i], $number)) {
                $digit++;
            }
        }
        $_SESSION['tries'][] = array("input" => $user_input, "digit" => $digit, "position" => $position);

        if ($digit == 4 && $position == 4) {
            echo "random Number:" . $random_number;
            echo "<h2>Congratulations! You have guessed the correct number.</h2>";
            echo "<h3>Click reset to start new game</h3>";
            echo "<button><a href='end.php'>reset</a></button>";
            exit;
        } else {
            $_SESSION['counter']--;
            $counter = $_SESSION['counter'];
            echo "<p>Remaining turns:$counter</p>";
            echo "Sorry, try again.";
        }

        if ($_SESSION['counter'] <= 0) {
            $number = $_SESSION['number'];
            $tries = $_SESSION['tries'];
            echo "random Number:" . $random_number;
            echo "<h2>Oops! you lost</h2>";
            echo "<h3>Click reset to start new game</h3>";
            echo "<button><a href='end.php'>reset</a></button>";
            exit;
        }
    }

    ?>
     <p>Random number: <?php echo $_SESSION["random"]; ?></p>

    <form method=post>
        <input type="number" name="guess[]" id="guess1" placeholder="enter first digit" required />
        <input type="number" name="guess[]" id="guess2" placeholder="enter second digit" required />
        <input type="number" name="guess[]" id="guess3" placeholder="enter third digit" required />
        <input type="number" name="guess[]" id="guess4" placeholder="enter fourth digit" required />
        <button type="submit">Guess</button>
    </form>
    <br>
    <?PHP
    $tries = $_SESSION['tries'];
    foreach ($tries as $turn) {
        echo '<li>User input: ' . $turn['input'] . '=> Correct Digit Guessed: ' . $turn['digit'] . ', Correct Positions: ' . $turn['position'] . '</li>';
    }
    ?>
    <button><a href="end.php">reset</a></button>
</body>
</head>

</html>