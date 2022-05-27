<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\Kamar;
use App\Models\Modelfasilitaskamar;
use App\Models\Modelfasilitashotel;
use App\Models\MPemesan;

use App\Models\MReservasi;
use App\Models\Petugas;
use App\Models\TipeKamar;

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
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $fasilitas;
    protected $jurusan;
    protected $pendaftaran;
    protected $pengguna;
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->fasilitas = new Kamar;
        $this->jurusan = new Modelfasilitaskamar;
        $this->jurusan = new Modelfasilitashotel;

        $this->pengguna = new Petugas;
        $this->jurusan = new MReservasi;
        $this->tipe_kamar = new TipeKamar();
        // E.g.: $this->session = \Config\Services::session();
    }
}
