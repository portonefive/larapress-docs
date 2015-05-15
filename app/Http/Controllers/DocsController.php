<?php namespace App\Http\Controllers;

use App\Docs\DocsRepository;
use Michelf\Markdown;

class DocsController extends Controller {

    protected $docs;
    protected $markdown;

    public function __construct(DocsRepository $docs, Markdown $markdown)
    {
        $this->docs = $docs;
        $this->markdown = $markdown;
    }

    public function index($version)
    {
        return view('docs', [
            'docsMenuHTML' => $this->markdown->defaultTransform($this->docs->getMenu($version)),
            'docHTML'      => $this->markdown->defaultTransform($this->docs->get($version, 'introduction'))
        ]);
    }

    public function show($version, $component)
    {
        return view('docs', [
            'docsMenuHTML' => $this->markdown->defaultTransform($this->docs->getMenu($version)),
            'docHTML'      => $this->markdown->defaultTransform($this->docs->get($version, $component))
        ]);
    }
}