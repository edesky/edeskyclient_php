PHP klient pro edesky.cz API
============================

**Ve vývoji.**

Informace o obecném HTTP API najdete na https://github.com/edesky/edesky_api

Příklad použití
---------------

```php
require('lib/edesky_client.php');

$client = new EdeskyClient(array('API_KEY' => ''));

$response = $client->queryDocuments(array('keywords' => 'prodej'));

foreach($response->documents->document as $document) {
  echo $document['dashboard_name'].': '.$document['name']."<br>\n";
}
```
