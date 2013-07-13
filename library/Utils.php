<?php

class Utils
{
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

    public static function absolute($path) {
        $memory = Memory::getInstance();
        $directories = $memory->get('directories');

        switch (substr($path, 0, 1)) {
            case '/':
                return $path;
            case '~':
                $path = substr($path, 1);
                $path = $directories['home'] . $path;
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
