<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\OutputTrait;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use OutputTrait, AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected $service;
	protected $resourceIndex;
	protected $resourceShow;

	/**
	 * Controller constructor.
	 *
	 * @param ServiceBase $service
	 */
	public function __construct()
	{
		$this->checkService();
	}

	protected function checkService()
	{
		if( is_null( $this->service ) )
			throw new Exception('Service não definido');
	}

    public function index()
	{
		$data = app($this->service)->getAll();

		if($this->resourceIndex)
			$result = $this->resourceIndex::collection( $data );
		else
			$result = collect($data);

		return $result;
	}

	public function show($id)
	{
		$data = app($this->service)->findById($id);

		if($this->resourceShow)
			$result = new $this->resourceShow( $data );
		else
			$result = $data;

		return $result;
	}

	public function create(Request $request)
	{
		$result = app($this->service)->store($request->all());

		if($result)
		{
			if(is_numeric($result))
				return $this->insertResponseOk([ 'id' => $result ]);
			else
				return $this->insertResponseOk();
		}

		$this->response('Houve um erro interno. Não criado.',001,500);
	}

	public function update(Request $request, $id)
	{
		$result = app($this->service)->update($request->all(), $id);

		if($result)
		{
			if(is_numeric($result))
				return $this->updateResponseOk([ 'id' => $result ]);
			else
				return $this->updateResponseOk();
		}

		$this->response('Houve um erro interno. Não alterado.',002,500);
	}

	public function destroy($id)
	{
		if(app($this->service)->delete($id))
			return $this->deleteResponseOk();

		$this->response('Houve um erro interno. Não excluído.',003,500);
	}
}
