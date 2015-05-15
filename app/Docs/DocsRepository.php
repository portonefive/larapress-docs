<?php namespace App\Docs;

use Illuminate\Contracts\Filesystem\Filesystem;
use League\Flysystem\Exception;

class DocsRepository {

    /** @var Filesystem */
    protected $fileSystem;

    public function __construct(Filesystem $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }

    public function get($version, $component)
    {
        $filePath = $version . '/' . $component . '.md';

        if ( ! $this->fileSystem->exists($filePath))
        {
            throw new Exception('File not found');
        }

        return $this->fileSystem->get($filePath);
    }

    public function getMenu($version)
    {
        return $this->fileSystem->get($version . '/_menu.md');
    }
}
