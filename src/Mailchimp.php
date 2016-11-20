<?php namespace Mailchimp;

use Mailchimp\Resources\Account;
use Mailchimp\Resources\Lists;
use Mailchimp\Resources\Members;
use Mailchimp\Exceptions\InvalidApiKey;

class Mailchimp {

	protected $api_key;

	protected $dc;

	public function __construct($api_key)
	{
		$this->setApiKey($api_key);
	}

	/**
	 * Get the API key
	 *
	 * @return string
	 */
	public function getApiKey()
	{
		return $this->api_key;
	}

	/**
	 * Set the API key
	 *
	 * @param $api_key
	 * @return $this
	 *
	 * @throws InvalidApiKey
	 */
	public function setApiKey($api_key)
	{
		if (strpos($api_key, '-') === false) {
			throw new InvalidApiKey('Invalid API key specified');
		}

		$this->api_key = $api_key;

		list(, $this->dc) = explode('-', $api_key);

		return $this;
	}

	/**
	 * Get the data center associated with the account
	 *
	 * @return string
	 */
	public function getDataCenter()
	{
		return $this->dc;
	}

	/**
	 * @return Account
	 */
	public function account()
	{
		return new Account($this);
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