<?php

namespace App\Traits;

trait OutputTrait
{
	public function response($message, $code = 0, $status = 200, $data = null)
	{
		$output = [
			'message' => $message,
			'code' => $code
		];

		if($data != null)
		{
			$output['data'] = $data;
		}

		return response()->json($output, $status);
	}

	public function insertResponseOk($data = null)
	{
		return $this->response('Dados inseridos com sucesso.', 50, 201, $data);
	}

	public function updateResponseOk($data = null)
	{
		return $this->response('Dados alterados com sucesso.', 60, 200, $data);
	}

	public function deleteResponseOk($data = null)
	{
		return $this->response('Dados removidos com sucesso.', 61, 200, $data);
	}
}