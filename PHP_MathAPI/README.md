Popis kódu:
Tento kód poskytuje API pro základní matematické operace (sčítání, odčítání, násobení, dělení, modulo a odmocňování). Kód přijímá POST požadavek s parametry "numbers" (pole s čísly) a "url" (operace, která má být prováděna).

Použití:
Abyste mohli s API pracovat, musíte poslat POST požadavek na jeho adresu s požadovanými parametry.



Příklad požadavku pro násobení čísel 1, 5 a 8:

$data = ['numbers' => [1, 5, 8]];
$options = ['http' => ['method' => 'POST', 'content' => http_build_query($data)]];
$context = stream_context_create($options);
$result = file_get_contents('http://localhost/math-api/f3/mul', false, $context);
echo $result;

Odpověď by měla být ve formátu JSON s klíči "report" (OK nebo ERR) a "result" (výsledek nebo chybová zpráva).




Příklad úspěšné odpovědi:

{"report":"OK","result":40}




Příklad chybové odpovědi:

{"report":"ERR","result":"Not enough numbers. At least two are required."}
