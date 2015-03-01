<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LaraPress\Field\FieldFactory;
use LaraPress\Metabox\MetaboxBuilder;

class TemplateServiceProvider extends ServiceProvider {

    /**
     * Boot
     *
     * @return void
     */
    public function register()
    {
        return;

        /** @var MetaboxBuilder  $metaBox */
        $metaBox = $this->app['metabox'];

        /** @var FieldFactory $fieldFactory */
        $fieldFactory = $this->app['field'];

        $metaBox->make('Layout Options', 'page', ['context' => 'side', 'priority' => 'core'])->set(
            [
                $fieldFactory->select(
                    '_template',
                    [static::getTemplateNames()],
                    false,
                    ['title' => __('Template', LARAPRESS_TEXTDOMAIN)]
                ),
                $fieldFactory->select(
                    '_sidebar',
                    [self::getSidebarNames()],
                    false,
                    ['title' => __('Sidebar', LARAPRESS_TEXTDOMAIN)]
                )
            ]
        );
    }

    /**
     * Get the template names data and return them
     *
     * @return array An array of template names.
     */
    private static function getTemplateNames()
    {
        $names = [];

        $files = glob(larapress_path('views') . '/layouts/templates/*.scout.php');

        foreach ($files as $name)
        {
            $name         = str_replace('.scout.php', '', trim(basename($name)));
            $names[$name] = str_replace(['-', '_'], ' ', ucfirst($name));
        }

        return $names;
    }

    private static function getSidebarNames()
    {
        $sidebars = [];

        foreach (config('sidebars', []) as $sidebar)
        {
            $sidebars[$sidebar['id']] = $sidebar['name'];
        }

        return $sidebars;
    }
}
