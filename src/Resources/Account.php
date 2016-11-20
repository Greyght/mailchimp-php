<?php namespace Mailchimp\Resources;

use Mailchimp\Http\Client;

class Account extends Client {

	public function __construct($mailchimp)
	{
		parent::__construct($mailchimp);
	}

	/**
	 * Get account information
	 *
	 * @return \Mailchimp\Http\Response
	 */
	public function retrieve()
	{
		return $this->get('');
	}

}