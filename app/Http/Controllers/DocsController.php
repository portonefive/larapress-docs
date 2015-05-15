<?php namespace App\Http\Controllers;

use App\Docs\DocsRepository;
use Michelf\Markdown;

class DocsController extends Controller {

    protected $docs;
    protected $markdown;
    protected $docsMenuHTML;

    public function __construct(DocsRepository $docs, Markdown $markdown)
    {
        $this->docs = $docs;
        $this->markdown = $markdown;

        $this->docsMenuHTML = $markdown->defaultTransform($docs->getMenu());
    }

    public function index($docs, $version)
    {
        return view('docs', [

        ]);
    }

    public function show($version, $component)
    {
        return view('docs', [
            'docsMenuHTML' => $this->docsMenuHTML,
            'docHTML' => $this->markdown->defaultTransform($this->docs->get($version, $component))
        ]);
    }
}