<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    /**
	 * $responseCode
	 *
	 * @var int
	 */
	protected $responseCode = 200;

	/**
	 * setResponseCode
	 *
	 * @param mixed $code
	 * @return void
	 */
	public function setResponseCode($code = 200)
	{
		$this->responseCode = $code;

		return $this;
	}

	/**
	 * getResponseCode
	 *
	 * @return void
	 */
	public function getResponseCode()
	{
		return $this->responseCode;
	}

	/**
	 * respondNotFound
	 *
	 * @param mixed $message
	 * @return void
	 */
	public function respondNotFound($message = 'Not found!')
	{
		return $this->setResponseCode(404)->respondWithError($message);
	}

	/**
	 * respondUnauthorised
	 *
	 * @param mixed $message
	 * @return void
	 */
	public function respondUnauthorised($message = 'Unauthorised')
	{
		return $this->setResponseCode(401)->respondWithError($message);
	}

	/**
	 * respondWithError
	 *
	 * @param mixed $message
	 * @return void
	 */
	public function respondWithError($message, array $data = array())
	{
        $error = [
            'message' => $message,
            'status_code' => $this->getResponseCode()
        ];
        $error = array_merge($error, $data);
		return $this->respond(['error' => $error]);
	}

	/**
	 * respond
	 *
	 * @param mixed $data
	 * @return void
	 */
	public function respond($data, $headers = [])
	{
		return response()->json($data, $this->getResponseCode(), $headers);
	}

	public function respondWithPagination($data, $paginatedCollection)
	{
		$data = array_merge($data, [
			'pagination' => [
				'count' => $paginatedCollection->count(),
				'total' => $paginatedCollection->total(),
                'perPage' => $paginatedCollection->perPage(),
                'hasMorePages' => $paginatedCollection->hasMorePages(),
                'nextPageUrl' => $paginatedCollection->nextPageUrl(),
                'previousPageUrl' => $paginatedCollection->previousPageUrl(),
				'currentPage' => $paginatedCollection->currentPage()
			]
		]);
		return $this->respond($data);
    }

    public function checkAndQueryPublishedBeforeRequest($q)
    {
        if(request()->has('published_before') && is_numeric(request()->get('published_before')))
        {
            $q = $q->where('published_at', '<', request()->get('published_before'));
        }

        return $q;
    }

    public function checkAndQueryBeforeIdRequest($q)
    {
        if(request()->has('before_id') && is_numeric(request()->get('before_id')))
        {
            $q = $q->where('id', '<', request()->get('before_id'));
        }

        return $q;
    }

    public function checkAndQueryAfterIdRequest($q)
    {
        if(request()->has('after_id') && is_numeric(request()->get('after_id')))
        {
            $q = $q->where('id', '>', request()->get('after_id'));
        }

        return $q;
    }
}
