<?php namespace Mailchimp\Resources;

use Mailchimp\Http\Client;
use Mailchimp\Http\QueryParameters\Lists as ListQueryParameters;

class Lists extends Client {

	public function __construct($mailchimp)
	{
		parent::__construct($mailchimp);
	}

	/**
	 * Get all lists
	 *
	 * @param ListQueryParameters $query_parameters
	 *
	 * @return \Godish\Http\Response
	 *
	 */
	public function all(ListQueryParameters $query_parameters = null)
	{
		return $this->get('lists', $query_parameters);
	}

	/**
	 * Get an individual list
	 *
	 * @param $id
	 * @param ListQueryParameters|null $query_parameters
	 *
	 * @return \Godish\Http\Response
	 */
	public function find($id, ListQueryParameters $query_parameters = null)
	{
		return $this->get("lists/{$id}", $query_parameters);
	}

	public function create()
	{

	}

	public function update()
	{

	}

	public function delete($id)
	{

	}

	public function members()
	{
		return new Members($this->mailchimp);
	}

}