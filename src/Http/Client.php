<?php namespace Mailchimp\Http;

use Mailchimp\Http\QueryParameters\QueryParameterInterface;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Request;

abstract class Client {

	protected $mailchimp;

	protected $http;

	protected $version = '3.0';

	public function __construct($mailchimp)
	{
		$this->mailchimp = $mailchimp;

		$this->http = new HttpClient([
			'base_uri' => "https://{$mailchimp->getDataCenter()}.api.mailchimp.com/{$this->version}/",
			'headers' => ['Authorization' => "apikey {$mailchimp->getApiKey()}"]
		]);
	}

	public function get($uri, QueryParameterInterface $query_parameters = null)
	{
		$query = [];

		if (!is_null($query_parameters)) {
			$query = $query_parameters->toArray();
		}

		return new Response($this->http->request('GET', $uri, ['http_errors' => false, 'query' => $query]));
	}

	public function post($uri, array $payload = [])
	{
		return new Response($this->http->request('POST', $uri, ['http_errors' => false, 'json' => $payload]));
	}

}