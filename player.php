<?php

/**
 * Konfiguration 
 *
 * Bitte passen Sie die folgenden Werte an, bevor Sie das Script benutzen!
 * 
 * Das Skript bitte in UTF-8 abspeichern (ohne BOM).
 */
 
// An welche Adresse sollen die Mails gesendet werden?
$zieladresse = 'player@xism.de';

// Welche Adresse soll als Absender angegeben werden?
// (Manche Hoster lassen diese Angabe vor dem Versenden der Mail ueberschreiben)
$absenderadresse = 'register@xism.de';

// Welcher Absendername soll verwendet werden?
$absendername = 'name.surname';

// Welchen Betreff sollen die Mails erhalten?
$betreff = 'Register';

// Zu welcher Seite soll als "Danke-Seite" weitergeleitet werden?
// Wichtig: Sie muessen hier eine gueltige HTTP-Adresse angeben!
$urlDankeSeite = 'http://www.xism.de/register.htm';

// Welche(s) Zeichen soll(en) zwischen dem Feldnamen und dem angegebenen Wert stehen?
$trenner = ":\t"; // Doppelpunkt + Tabulator

/**
 * Ende Konfiguration
 */

if ($_SERVER['REQUEST_METHOD'] === "POST") {

	$header = array();
	$header[] = "From: ".mb_encode_mimeheader($absendername, "utf-8", "Q")." <".$absenderadresse.">";
	$header[] = "MIME-Version: 1.0";
	$header[] = "Content-type: text/plain; charset=utf-8";
	$header[] = "Content-transfer-encoding: 8bit";
	
    $mailtext = "";

    foreach ($_POST as $name => $wert) {
        if (is_array($wert)) {
		    foreach ($wert as $einzelwert) {
			    $mailtext .= $name.$trenner.$einzelwert."\n";
            }
        } else {
            $mailtext .= $name.$trenner.$wert."\n";
        }
    }

    mail(
    	$zieladresse, 
    	mb_encode_mimeheader($betreff, "utf-8", "Q"), 
    	$mailtext,
    	implode("\n", $header)
    ) or die("Die Mail konnte nicht versendet werden.");
    header("Location: $urlDankeSeite");
    exit;
}

//Tobi: Wenn das Formular submitted wird sollen die Daten umgewandelt werden in ein PDF, welches dann anschließend per Mail versendet wird. Ist dies machbar, wenn ja, muss das über eine Extra-Datei laufen oder kann es in dieser ergänzt werden???


header("Content-type: text/html; charset=utf-8");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
    <head>
        <title>Player Register</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <h1>Register</h1>
        <form action="" method="post">
		<dl>
			<dt align="left">Name:</dt>
			<dd><input name="name" type="text" size="30" maxlength="30"></dd>
			<dt align="left">Surname:</dt>
			<dd><input name="surname" type="text" size="30" maxlength="40"></dd>
			<dt align="left">Pseudonym:</dt>
			<dd><input name="psydo" type="text" size="30" maxlength="40"></dd>
			
//Tobi: Bild einfügen! Ist das an dieser Stelle machbar oder muss das mit einem seperaten PHP gelöst werden?
			
			<dt align="left">E-Mail:</dt>
			<dd><input name="mail" type="text" size="30" maxlength="50"></dd>
			<dt align="left">Phone:</dt>
			<dd><input name="mail" type="text" size="30" maxlength="50"></dd>
			<dt align="left">Country Code (Phone):</dt>
			<dd><input name="mail" type="text" size="30" maxlength="50"></dd>
			<dt align="left">Date of Birth:</dt>
			<dd><input name="gebdate" type="date" size="30" maxlength="30"></dd>
			<dt align="left">Place of Birth:</dt>
			<dd><input name="gebort" type="text" size="30" maxlength="50"></dd>
			<dt align="left">Country of Birth:</dt>
			<dd><input name="gebland" type="text" size="30" maxlength="50"></dd>
			<dt align="left">Nationality:</dt>
			<dd><input name="nat1" type="text" size="30" maxlength="50"></dd>
			<dt align="left">Nationality 2:</dt>
			<dd><input name="nat2" type="text" size="30" maxlength="50"></dd>
			<dt align="left">Nationality 3:</dt>
			<dd><input name="nat3" type="text" size="30" maxlength="50"></dd>
			<dt align="left">First Language:</dt>
			<dd><input name="lang1" type="text" size="30" maxlength="50"></dd>
			<dt align="left">Second Language:</dt>
			<dd><input name="lang2" type="text" size="30" maxlength="50"></dd>
			<dt align="left">Third Language:</dt>
			<dd><input name="lang3" type="text" size="30" maxlength="50"></dd>
			<dt align="left">Fourth Language:</dt>
			<dd><input name="lang4" type="text" size="30" maxlength="50"></dd>
			<dt align="left">Position:</dt>
			<dd><input name="pos" type="text" size="30" maxlength="30"></dd>
			<dt align="left">Position 2:</dt>
			<dd><input name="pos2" type="text" size="30" maxlength="30"></dd>
			<dt	align="left">Position 3:</dt>
			<dd><input name="pos3" type="text" size="30" maxlength="30"></dd>
			<dt align="left">Current Club:</dt>
			<dd><input name="club" type="text" size="30" maxlength="90"></dd>
			<dt align="left">End of Contract:</dt>
			<dd><input name="contract" type="date" size="30" maxlength="30"></dd>
			<dt align="left">Facebook Profile / Fanpage:</dt>
			<dd><input name="fb" type="text" size="30" maxlength="256"></dd>
			<dt align="left">Twitter Account:</dt>
			<dd><input name="tw" type="text" size="30" maxlength="256"></dd>
			<dt align="left">YouTube Channel:</dt>
			<dd><input name="yt" type="text" size="30" maxlength="256"></dd>
			<dt align="left">Other Profiles:</dt>
			<dd><input name="socmed1" type="text" size="30" maxlength="256"></dd>
			<dt align="left">Other Profiles 2:</dt>
			<dd><input name="socmed2" type="text" size="30" maxlength="256"></dd>
			<dt align="left">Message:</dt>
			<dd><textarea name="message" cols="30" rows="10" maxlength="1000"></textarea></dd>
		</dl>
		<p>	
			<input type="submit" value="send">
        </p>
		</form>
    </body>
</html>