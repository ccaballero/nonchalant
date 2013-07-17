<?php

class Utils
{

    public static function split_path($path) {
        $real_path = absolute($path);
    }

    public static function translate($path) {
        $memory = Memory::getInstance();
        $directories = $memory->get('directories');

        switch (substr($path, 0, 1)) {
            case '/':
                return APPLICATION_PATH . '/data/fs_example' . $path;
            case '~':
                $path = substr($path, 1);
                $path = $directories['home'] . $path;
                return APPLICATION_PATH . '/data/fs_example' . $path;
            default:
                $path = $directories['current'] . '/' . $path;
                return APPLICATION_PATH . '/data/fs_example' . $path;
        }
    }
    
    public static function canonical($path) {
        $path = Utils::absolute($path);
        $paths = preg_split('/\\//', $path);
        $canonical = '';
        
        foreach ($paths as $directory) {
            switch ($directory) {
                case '.':
                    break;
                case '..':
                    $canonical = Utils::parent_path($canonical);
                    break;
                default:
                    $canonical .= '/' . $directory;
            }
        }
        
        $canonical = substr($canonical, 1);
        return preg_replace('/[\\/]+/', '/', $canonical);
    }
    
    public static function parent_path($path) {
        $paths = explode('/', $path);
        if (end($paths) == '') {
            array_pop($paths);
        }
        array_pop($paths);
        return '/' . implode('/', $paths);
    }

    public static function absolute($path) {
        $memory = Memory::getInstance();
        $directories = $memory->get('directories');
        
        $paths = preg_split('/\\//', $path);
//        var_dump($paths);
        switch ($paths[0]) {
            case '':
                return $path;
            case '~':
                $path = substr($path, 1);
                $path = $directories['home'] . $path;
                return $path;
            case '.':
                $path = substr($path, 1);
                $path = $directories['current'] . $path;
                return $path;
            case '..':
                $path = substr($path, 2);
                $path = Utils::parent_path($directories['current']) . $path;
                return $path;
            default:
                $slash = '';
                if (substr($directories['current'], -1) <> '/') {
                    $slash = '/';
                }
                $path = $directories['current'] . $slash . $path;
                return $path;
        }
    }

    public static function file_exists($path) {
        return file_exists(Utils::translate($path));
    }
}
