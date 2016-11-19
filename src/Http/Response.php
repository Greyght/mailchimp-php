<?php namespace Mailchimp\Http;

use GuzzleHttp\Psr7\Response as PsrResponse;

class Response {

	/**
	 * @var PsrResponse
	 */
	private $response;

	public function __construct(PsrResponse $response)
	{
		$this->response = $response;
	}

	/**
	 * Check if response was a success
	 *
	 * @return bool
	 */
	public function isSuccessful()
	{
		return $this->response->getStatusCode() == 200;
	}

	/**
	 * Check if response was an error
	 *
	 * @return bool
	 */
	public function isError()
	{
		return $this->response->getStatusCode() != 200;
	}

	/**
	 * Get http status code
	 *
	 * @return int
	 */
	public function getStatusCode()
	{
		return $this->response->getStatusCode();
	}

	/**
	 * @return string|null
	 */
	public function getReasonPhrase()
	{
		return $this->response->getReasonPhrase();
	}

	/**
	 * @return \GuzzleHttp\Psr7\Stream|\Psr\Http\Message\StreamInterface
	 */
	public function getBody()
	{
		return $this->response->getBody();
	}

	/**
	 * Get json response
	 *
	 * @param bool $array JSON response is returned as an array.
	 *
	 * @return mixed
	 */
	public function json($array = true)
	{
		return json_decode($this->response->getBody(), $array);
	}

	/**
	 * Get the error response
	 *
	 * @return mixed
	 */
	public function getError()
	{
		return $this->json();
	}

}