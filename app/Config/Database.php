<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * @var array<string, mixed>
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => 'localhost', // Ganti dengan alamat host database jika berbeda
        'username'     => 'root',      // Ganti dengan username yang sesuai
        'password'     => '',          // Ganti dengan password yang sesuai
        'database'     => 'db-simasjid-ci4', // Nama database yang digunakan
        'DBDriver'     => 'MySQLi',    // Driver yang digunakan, dalam hal ini MySQLi
        'DBPrefix'     => '',          // Jika ada prefix pada tabel, bisa diatur di sini
        'pConnect'     => false,       // Menggunakan persistent connection atau tidak
        'DBDebug'      => true,        // Debugging database
        'charset'      => 'utf8mb4',   // Charset yang digunakan
        'DBCollat'     => 'utf8mb4_general_ci', // Collation yang digunakan
        'swapPre'      => '',
        'encrypt'      => false,       // Enkripsi koneksi database
        'compress'     => false,       // Kompresi query yang dikirim
        'strictOn'     => false,       // Mengaktifkan mode strict atau tidak
        'failover'     => [],          // Koneksi failover jika koneksi utama gagal
        'port'         => 3306,        // Port default untuk MySQL
        'numberNative' => false,       // Menampilkan angka dalam format native
        'foundRows'    => false,       // Mengambil jumlah total baris (untuk query yang tidak menggunakan LIMIT)
        'dateFormat'   => [
            'date'     => 'Y-m-d',         // Format tanggal
            'datetime' => 'Y-m-d H:i:s',   // Format datetime
            'time'     => 'H:i:s',         // Format waktu
        ],
    ];

    /**
     * This database connection is used when running PHPUnit database tests.
     *
     * @var array<string, mixed>
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1', // Localhost untuk testing
        'username'    => '',          // Kosongkan atau ganti sesuai database testing
        'password'    => '',          // Kosongkan atau ganti sesuai database testing
        'database'    => ':memory:',  // Menggunakan database in-memory untuk testing
        'DBDriver'    => 'SQLite3',   // Menggunakan SQLite3 untuk testing
        'DBPrefix'    => 'db_',       // Prefix tabel untuk database testing
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => '',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,        // Port default untuk SQLite
        'foreignKeys' => true,        // Mengaktifkan foreign key untuk SQLite
        'busyTimeout' => 1000,        // Waktu tunggu jika database SQLite sedang sibuk
        'dateFormat'  => [
            'date'     => 'Y-m-d',      // Format tanggal
            'datetime' => 'Y-m-d H:i:s',// Format datetime
            'time'     => 'H:i:s',      // Format waktu
        ],
    ];

    public function __construct()
    {
        parent::__construct();

        // Pastikan kita menggunakan grup database 'tests' saat menjalankan PHPUnit untuk menghindari menimpa data live.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
