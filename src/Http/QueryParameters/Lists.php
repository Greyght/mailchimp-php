<?php namespace Mailchimp\Http\QueryParameters;

class Lists extends BaseQueryParameters implements QueryParameterInterface {

	protected $limit;

	protected $offset;

	protected $email;

	public function __construct(array $fields = [], array $exclude_fields = [], $limit = 100, $offset = 0, $email = null)
	{
		parent::__construct($fields, $exclude_fields);

		$this->setLimit($limit);

		$this->setOffset($offset);

		$this->setEmail($email);
	}

	/**
	 * Set the number of records to return
	 *
	 * @param $limit
	 *
	 * @return $this
	 */
	public function setLimit($limit)
	{
		$this->limit = $limit;

		return $this;
	}

	/**
	 * Set the starting offset for the result set
	 *
	 * @param $offset
	 *
	 * @return $this
	 */
	public function setOffset($offset)
	{
		$this->offset = $offset;

		return $this;
	}

	/**
	 * Set the subscriber email to filter lists by
	 *
	 * @param $email
	 *
	 * @return $this
	 */
	public function setEmail($email)
	{
		$this->email = $email;

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

		$params['count'] = $this->limit;

		$params['offset'] = $this->offset;

		if (!is_null($this->email)) {
			$params['email'] = $this->email;
		}

		return $params;
	}

}