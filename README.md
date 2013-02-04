2 does:

-value auslesen mit jquery => Bsp. value="12:00:00 | mon"
-danach mit ajax wert weitergeben zu php Funktion in controller ajax => set_status_for_court(),
in php Funktion diesen Werte aufsplitten mit php-explode Funktion => das gibt dann 2 Werte zurück:
12:00:00 für Feld start_time und mon für Feld day
diese werte danach in db speichern

ajax-return: -success=> Eintrag gespeichert => kit .html()
		  -failed=> Eintrag schon vorhanden
