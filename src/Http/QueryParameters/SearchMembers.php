<?php namespace Mailchimp\Http\QueryParameters;

class SearchMembers extends BaseQueryParameters implements QueryParameterInterface {

	protected $query;

	protected $list;

	protected $offset;

	public function __construct(array $fields = [], array $exclude_fields = [], $query, $list = null)
	{
		parent::__construct($fields, $exclude_fields);

		$this->query = $query;

		$this->list = $list;
	}

	/**
	 * Set the search query
	 *
	 * @param $query
	 *
	 * @return $this
	 */
	public function setQuery($query)
	{
		$this->query = $query;

		return $this;
	}

	/**
	 * Set the list to search
	 *
	 * @param $list
	 *
	 * @return $this
	 */
	public function setList($list)
	{
		$this->list = $list;

		return $this;
	}

	/**
	 * Convert query parameters to an array
	 *
	 * @return array
	 */
	public function toArray()
	{
		$params = parent::toArray();

		$params['query'] = $this->query;

		if ( !is_null($this->list) )
		{
			$params['list_id'] = $this->list;
		}

		return $params;
	}

}