<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
	public $data = [];

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = ['form'];
	protected $EventModel;
	protected $SesiModel;
	protected $PesertaModel;
	protected $DetailPesertaModel;
	protected $Enkripsi;
	protected $Image;

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        // E.g.: $this->session = \Config\Services::session();
		$this->Image 				= \Config\Services::image();
		$this->Enkripsi				= \Config\Services::encrypter();
		$this->EventModel			= new \App\Models\EventModel();
		$this->SesiModel			= new \App\Models\SesiModel();
		$this->PesertaModel			= new \App\Models\PesertaModel();
		$this->DetailPesertaModel	= new \App\Models\DetailPesertaModel();

		$this->data['event'] = $this->EventModel->where('aktif', '1')->first();
		$this->data['uri']	= new \CodeIgniter\HTTP\URI(current_url(true));
		session();
    }
}
