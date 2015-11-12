/*
The MIT License (MIT)

Copyright (c) 2015 Marek Aufart, edesky.cz

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

class EdeskyClient {

  private $client_defaults = array(
    'endpoint_url' => 'https://edesky.cz/api/v1',
    'api_key' => '',
  );

  private $doc_query_defaults = array(
    'keywords' => '*',
  );

  private $board_query_defaults = array(
  );

  function __construct($params = array()) {
    foreach(array_merge($this->client_defaults, $params) as $key => $val) {
      $this->{$key} = $val;
    }
  }

  function queryDocuments($params = array()) {
    return $this->fetch('/documents', array_merge($this->doc_query_defaults, $params));
  }

  function queryDashboards($params = array()) {
    return $this->fetch('/dashboards', array_merge($this->board_query_defaults, $params));
  }

  private function fetch($type, $params) {
    $url = $this->endpoint_url.$type.'?';
    foreach($params as $key => $val) {
      $url .= $key.'='.$val.'&';
    }
    return simplexml_load_file($url);
  }

}

//$client = new EdeskyClient('<API_KEY>');
//$response = $client->queryDocuments(array('keywords' => 'prodej'));
//var_dump($response->meta);
//var_dump($response->documents);

?>
