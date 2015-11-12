PHP klient pro edesky.cz API
============================

**Ve vývoji.**

Informace o obecném HTTP API najdete na https://github.com/edesky/edesky_api

Příklad použití
---------------

```php
require('lib/edesky_client.php');

$client = new EdeskyClient('<API_KEY>');
$response = $client->queryDocuments(array('keywords' => 'prodej'));
var_dump($response->meta);
//var_dump($response->documents);
```

