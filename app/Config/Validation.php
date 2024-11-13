<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
	// --------------------------------------------------------------------
	// Setup
	// --------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var list<string>
	 */
	public array $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public array $templates = [
		// 'list'   => 'CodeIgniter\Validation\Views\list',
		'list'   => 'App\Views\listErrors',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules For Registration
	//--------------------------------------------------------------------
	public $registration = [
		'username' => [
			'label' => 'Auth.username',
			'rules' => [
				'required',
				'max_length[30]',
				'min_length[3]',
				'regex_match[/\A[a-zA-Z0-9\.]+\z/]',
				'is_unique[users.username]',
			],
		],
		'email' => [
			'label' => 'Auth.email',
			'rules' => [
				'required',
				'max_length[254]',
				'valid_email',
				'is_unique[auth_identities.secret]',
			],
		],
		'password' => [
			'label' => 'Auth.password',
			'rules' => 'required|max_byte[72]|strong_password[]',
			'errors' => [
				'max_byte' => 'Auth.errorPasswordTooLongBytes'
			]
		],
		'password_confirm' => [
			'label' => 'Auth.passwordConfirm',
			'rules' => 'required|matches[password]',
		],
	];

	//--------------------------------------------------------------------
	// Rules For Login
	//--------------------------------------------------------------------
	public $login = [
		'username' => [
			'label'		=> 'Auth.username',
			'rules'		=> [
				'required',
				'max_length[30]',
				'min_length[3]',
				'regex_match[/\A[a-zA-Z0-9\.]+\z/]',
			],
			'errors'		=> [
				'required'		=> 'Username belum diisi!',
				'max_length'	=> 'Username maksimum {param} karakter',
				'min_length'	=> 'Username minimum {param} karakter'
			]
		],
		// 'email' => [
		// 	'label' => 'Auth.email',
		// 	'rules' => [
		// 		'required',
		// 		'max_length[254]',
		// 		'valid_email'
		// 	],
		// ],
		'password' => [
			'label'		=> 'Auth.password',
			'rules'		=> [
				'required',
				'max_byte[72]',
			],
			'errors' => [
				'required'		=> 'Password belum diisi!',
				'max_byte'		=> 'Password tidak boleh melebihi {param} karakter',
			]
		],
	];

	public $registrasi = [
		'nama' => [
			'rules'     => 'required|min_length[2]|max_length[100]',
			'errors'    => [
				'required'   => 'Nama belum diisi!',
				'min_length' => 'Nama minimal 2 karakter!',
				'max_length' => 'Nama maksimal 100 karakter!'
			]
		],
		'tgl_lahir' => [
			'rules'     => 'required|valid_date',
			'errors'    => [
				'required'   => 'Tanggal lahir belum diisi!',
				'valid_date' => 'Format tanggal lahir tidak valid!'
			]
		],
		'jenisKelamin' => [
			'rules'     => 'required|in_list[l,p]',
			'errors'    => [
				'required'   => 'Jenis kelamin belum dipilih!',
				'in_list'    => 'Pilihan jenis kelamin tidak valid!'
			]
		],
		'noTelp' => [
			'rules'     => 'required|numeric|min_length[10]|max_length[15]',
			'errors'    => [
				'required'   => 'No. Telepon belum diisi!',
				'numeric'    => 'No. Telepon harus berupa angka!',
				'min_length' => 'No. Telepon minimal 10 digit!',
				'max_length' => 'No. Telepon maksimal 15 digit!'
			]
		],
		'alamat' => [
			'rules'     => 'required|min_length[5]|max_length[255]',
			'errors'    => [
				'required'   => 'Alamat belum diisi!',
				'min_length' => 'Alamat terlalu pendek!',
				'max_length' => 'Alamat terlalu panjang!'
			]
		],
		'pendidikan' => [
			'rules'     => 'required',
			'errors'    => [
				'required'   => 'Pendidikan belum dipilih!',
				'in_list'    => 'Pilihan pendidikan tidak valid!'
			]
		],
		'foto' => [
			'rules'     => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,5120]', // 5MB
			'errors'    => [
				'uploaded'   => 'Foto belum diisi!',
				'is_image'   => 'File yang dipilih bukan gambar!',
				'mime_in'    => 'Format foto harus JPG, JPEG, atau PNG!',
				'max_size'   => 'Ukuran foto maksimal 5MB!'
			]
		],
	];

	public $event = [
		'namaEvent' => [
			'rules'				=> 'required',
			'errors'			=> [
				'required'				=> 'Nama Event wajib diisi!',
				'is_unique'				=> 'Nama Event sudah terdaftar! Coba isi dengan nama lain'
			]
		],
		'tglMulai' => [
			'rules'				=> "required",
			'errors'			=> [
				'required'				=> 'Tgl. Mulai kegiatan belum diisi!',
			]
		],
		'hariMulai' => [
			'rules'				=> "required",
			'errors'			=> [
				'required'				=> 'Hari Mulai kegiatan belum diisi!',
			]
		],
		'jamMulai' => [
			'rules'				=> "required",
			'errors'			=> [
				'required'				=> 'Jam Mulai kegiatan belum diisi!',
			]
		],
		'tglSelesai' => [
			'rules'				=> "required",
			'errors'			=> [
				'required'				=> 'Tgl. Selesai kegiatan belum diisi!',
			]
		],
		'hariSelesai' => [
			'rules'				=> "required",
			'errors'			=> [
				'required'				=> 'Hari Selesai kegiatan belum diisi!',
			]
		],
		'jamSelesai' => [
			'rules'				=> "required",
			'errors'			=> [
				'required'				=> 'Jam Selesai kegiatan belum diisi!',
			]
		],
		'lokasi' => [
			'rules'				=> "required",
			'errors'			=> [
				'required'				=> 'Lokasi kegiatan belum diisi!',
			]
		],
	];

}