<?php namespace Mailchimp\Resources;

use Mailchimp\Http\Client;
use Mailchimp\Http\QueryParameters\QueryParameterInterface;

class Members extends Client {

	public function __construct($mailchimp)
	{
		parent::__construct($mailchimp);
	}

	/**
	 * Get all members for the specified list
	 *
	 * @param string $list ID of the list to retrieve the members of
	 * @return \Mailchimp\Http\Response
	 */
	public function all($list)
	{
		return $this->get("lists/{$list}/members");
	}

	/**
	 * Find a subscriber in the specified list
	 *
	 * @param $list
	 * @param $subscriber
	 *
	 * @return \Mailchimp\Http\Response
	 */
	public function find($list, $subscriber)
	{
		return $this->get("lists/{$list}/members/{$subscriber}");
	}

	public function create($list, array $member)
	{
		return $this->post("lists/{$list}/members", $member);
	}

	public function update()
	{

	}

	public function createOrUpdate($list, array $member) {
		return $this->put("lists/{$list}/members/" . md5(strtolower($member['email_address'])), $member);
	}

	public function search(QueryParameterInterface $parameters)
	{
		return $this->get("search-members", $parameters);
	}

}