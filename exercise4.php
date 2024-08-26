<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Number Categorization</title>
</head>
<body>
    <h1>Number Categorization</h1>
    <form method="post">
        <label for="start">Starting Number:</label>
        <input type="number" id="start" name="start" required><br><br>
        
        <label for="end">Ending Number:</label>
        <input type="number" id="end" name="end" required><br><br>
        
        <input type="submit" value="Display">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $start = intval($_POST['start']);
        $end = intval($_POST['end']);

        $oddNumbers = [];
        $evenNumbers = [];
        $divBy3 = [];
        $divBy5 = [];
        $primeNumbers = [];

        // Determine the sequence direction
        if ($start <= $end) {
            $step = 1;
        } else {
            $step = -1;
        }

        for ($i = $start; $i != $end + $step; $i += $step) {
            // Check for odd numbers
            if ($i % 2 != 0) {
                $oddNumbers[] = $i;
            } else {
                $evenNumbers[] = $i;
            }

            // Check for numbers divisible by 3
            if ($i % 3 == 0) {
                $divBy3[] = $i;
            }

            // Check for numbers divisible by 5
            if ($i % 5 == 0) {
                $divBy5[] = $i;
            }

            // Check for prime numbers
            if ($i > 1 && isPrime($i)) {
                $primeNumbers[] = $i;
            }
        }

        // Function to check for prime numbers
        function isPrime($num) {
            if ($num < 2) return false;
            for ($j = 2; $j <= sqrt($num); $j++) {
                if ($num % $j == 0) return false;
            }
            return true;
        }

        // Display Results
        echo "<h2>Results for Range: $start to $end</h2>";
        
        echo "<h3>Odd Numbers:</h3>";
        echo implode(", ", $oddNumbers);

        echo "<h3>Even Numbers:</h3>";
        echo implode(", ", $evenNumbers);

        echo "<h3>Divisible by 3:</h3>";
        echo implode(", ", $divBy3);

        echo "<h3>Divisible by 5:</h3>";
        echo implode(", ", $divBy5);

        echo "<h3>Prime Numbers:</h3>";
        echo implode(", ", $primeNumbers);
    }
    ?>
</body>
</html>
