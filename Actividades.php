<!DOCTYPE html>
<html>
<head>
    <title>Calculadora y Conversor de Moneda PHP</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h2>Calculadora y Conversor de Moneda PHP</h2>
    <form method="post" action="">
        <h3>Calculadora:</h3>
        <input type="number" name="num1" placeholder="Número 1" required>
        <select name="operator">
            <option value="+">Suma</option>
            <option value="-">Resta</option>
            <option value="*">Multiplicación</option>
            <option value="/">División</option>
        </select>
        <input type="number" name="num2" placeholder="Número 2" required>
        <input type="submit" value="Calcular">
    </form>

    <form method="post" action="">
        <h3>Conversor de Moneda:</h3>
        <input type="number" name="amount" placeholder="Monto en COP" required>
        <select name="currency">
            <option value="usd">Dólares (USD)</option>
            <option value="eur">Euros (EUR)</option>
            <option value="inr">Rupias Indias (INR)</option>
        </select>
        <input type="submit" value="Convertir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["operator"])) {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operator = $_POST["operator"];

            switch ($operator) {
                case "+":
                    $result = $num1 + $num2;
                    break;
                case "-":
                    $result = $num1 - $num2;
                    break;
                case "*":
                    $result = $num1 * $num2;
                    break;
                case "/":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "No es posible dividir por cero, vuelve a intentarlo tontin🙉";
                    }
                    break;
                default:
                    $result = "Operador inválido";
            }

            echo "<p>Resultado de la calculadora😄: $result</p>";
        } elseif (isset($_POST["currency"])) {
            $amount = $_POST["amount"];
            $currency = $_POST["currency"];

            $exchange_rates = [
                "usd" => 0.00024,
                "eur" => 0.00022,
                "inr" => 0.020
            ];

            if (isset($exchange_rates[$currency])) {
                $converted_amount = $amount * $exchange_rates[$currency];
                echo "<p>$amount COP equivale a aproximadamente🤑🤑 $converted_amount $currency</p>";
            } else {
                echo "<p>Moneda inválida😡</p>";
            }
        }
    }
    ?>
</body>
</html>

