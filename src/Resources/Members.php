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

	/**
	 * Create a new member in the specified list
	 *
	 * @param $list List ID
	 * @param array $member
	 *
	 * @return \Mailchimp\Http\Response
	 */
	public function create($list, array $member)
	{
		return $this->post("lists/{$list}/members", $member);
	}

	public function update()
	{

	}

	/**
	 * Creates or updates a member in the specified list
	 *
	 * @param $list
	 * @param array $member
	 *
	 * @return \Mailchimp\Http\Response
	 */
	public function createOrUpdate($list, array $member) {
		return $this->put("lists/{$list}/members/" . md5(strtolower($member['email_address'])), $member);
	}

	/**
	 * Search for members based on the parameters provided
	 *
	 * @param QueryParameterInterface $parameters
	 *
	 * @return \Mailchimp\Http\Response
	 */
	public function search(QueryParameterInterface $parameters)
	{
		return $this->get("search-members", $parameters);
	}

}