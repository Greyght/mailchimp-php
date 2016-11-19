<?php namespace Mailchimp;

use Mailchimp\Exceptions\InvalidApiKey;
use Mailchimp\Resources\Lists;
use Mailchimp\Resources\Members;

/*

use Mailchimp\Exceptions\InvalidApiKey;
use Mailchimp\Mailchimp\Lists;
use Mailchimp\Mailchimp\Members;
use GuzzleHttp\Client;
*/

class Mailchimp {

	protected $api_key;

	protected $dc;

	public function __construct($api_key)
	{
		$this->setApiKey($api_key);
	}

	public function getApiKey()
	{
		return $this->api_key;
	}

	public function setApiKey($api_key)
	{
		if (strpos($api_key, '-') === false) {
			throw new InvalidApiKey('Invalid API key specified');
		}

		$this->api_key = $api_key;

		list(, $this->dc) = explode('-', $api_key);

		return $this;
	}

	public function getDataCenter()
	{
		return $this->dc;
	}

	/**
	 * @return Lists
	 */
	public function lists()
	{
		return new Lists($this);
	}

	/**
	 * @return Members
	 */
	public function members()
	{
		return new Members($this);
	}

}