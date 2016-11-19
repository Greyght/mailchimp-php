<?php namespace Mailchimp\Http\QueryParameters;

abstract class BaseQueryParameters implements QueryParameterInterface {

	protected $fields = [];

	protected $exclude_fields = [];

	public function __construct(array $fields = [], array $exclude_fields = [])
	{
		$this->setFields($fields);
		$this->setExcludeFields($exclude_fields);
	}

	/**
	 * @param array $fields
	 *
	 * @return $this
	 */
	public function setFields(array $fields)
	{
		$this->fields = $fields;

		return $this;
	}

	/**
	 * @param array $exclude_fields
	 *
	 * @return $this
	 */
	public function setExcludeFields(array $exclude_fields)
	{
		$this->exclude_fields = $exclude_fields;

		return $this;
	}

	/**
	 * Convert query parameters to an array
	 *
	 * @return array
	 */
	public function toArray()
	{
		$params = [];

		if (count($this->fields) > 0) {
			$params['fields'] = implode(',', $this->fields);
		}

		if (count($this->exclude_fields) > 0) {
			$params['exclude_fields'] = implode(',', $this->exclude_fields);
		}

		return $params;
	}

}