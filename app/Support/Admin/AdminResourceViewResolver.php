<?php

namespace App\Support\Admin;

class AdminResourceViewResolver
{
    public function resolveView($resource, $action = 'index')
    {
        if (is_null($resource)) {
            return null;
        }

        if (file_exists(base_path("resources/views/admin/{$resource}/{$action}.blade.php"))) {
            return "admin.{$resource}.{$action}";
        }

        return "admin.templates.{$action}";
    }
}
