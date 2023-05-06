<!DOCTYPE html>
<html lang="cs-cz">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Pojištěnci</title>
    </head>
    <body>        

<?php
require_once('Db.php');
Db::connect('127.0.0.1', 'db_pojisteni', 'root', '');
$pojistenci = Db::queryAll('
			SELECT *
			FROM pojistenci
		');
		echo('<h2>Pojištěnci</h2><table border="1">');
        echo('<th>Jméno</th>');
        echo('<th>Příjmení</th>');
        echo('<th>Telefon</th>');
        echo('<th>Věk</th>');
		foreach ($pojistenci as $pojistenec) {
			echo('<tr><td>' . htmlspecialchars($pojistenec['jmeno']));
			echo('</td><td>' . htmlspecialchars($pojistenec['prijmeni']));
			echo('</td><td>' . htmlspecialchars($pojistenec['telefon']));
			echo('</td><td>' . htmlspecialchars($pojistenec['vek']));
			echo('</td></tr>');
		}
		echo('</table>');
Db::query('
        INSERT INTO pojistenci (jmeno, prijmeni, telefon, vek)
        VALUES (?, ?, ?, ?)
    ', $_POST['jmeno'], $_POST['prijmeni'], $_POST['telefon'], $_POST['vek']);

    echo('<h2> Nový pojištěnec</h2>');

?>    
<form method="post">
            <label>
                Jméno:<br />
                <input type="text" name="jmeno" />
            </label><br />
            <label>
                Příjmení:<br />
                <input type="text" name="prijmeni" />
            </label><br />
            <label>
                Telefon:<br />
                <input type="text" name="telefon" />
            </label><br />
            <label>
                Věk:<br />
                <input type="text" name="vek" />
            </label><br />
            <input type="submit" value="Vložit" />
        </form>

    </body>
</html>
