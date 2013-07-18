<?php

class Utils
{
    public static function split_path($path) {
        $real_path = Utils::canonical($path);
	$result = explode('/', $real_path);
	$result[0] = '/';
	if (end($result) == '') {
	    array_pop ($result);
	}
	return $result;
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

    public static $colors = array(
        '0;30' => 'regular text-black', // Black - Regular
        '0;31' => 'regular text-red', // Red
        '0;32' => 'regular text-green', // Green
        '0;33' => 'regular text-yellow', // Yellow
        '0;34' => 'regular text-blue', // Blue
        '0;35' => 'regular text-purple', // Purple
        '0;36' => 'regular text-cyan', // Cyan
        '0;37' => 'regular text-white', // White

        '1;30' => 'bold text-black', // Black - Bold
        '1;31' => 'bold text-red', // Red
        '1;32' => 'bold text-green', // Green
        '1;33' => 'bold text-yellow', // Yellow
        '1;34' => 'bold text-blue', // Blue
        '1;35' => 'bold text-purple', // Purple
        '1;36' => 'bold text-cyan', // Cyan
        '1;37' => 'bold text-white', // White

        '4;30' => 'underline text-black', // Black - Underline
        '4;31' => 'underline text-red', // Red
        '4;32' => 'underline text-green', // Green
        '4;33' => 'underline text-yellow', // Yellow
        '4;34' => 'underline text-blue', // Blue
        '4;35' => 'underline text-purple', // Purple
        '4;36' => 'underline text-cyan', // Cyan
        '4;37' => 'underline text-white', // White

        '40' => 'background-black', // Black - Background
        '41' => 'background-red', // Red
        '42' => 'background-green', // Green
        '43' => 'background-yellow', // Yellow
        '44' => 'background-blue', // Blue
        '45' => 'background-purple', // Purple
        '46' => 'background-cyan', // Cyan
        '47' => 'background-white', // White
        '0'  => 'reset', // Text
    );

    public static function transform_color($string) {
        $colors = preg_split('/\\\033\\[(.{1,4})m/', $string, -1, PREG_SPLIT_DELIM_CAPTURE );

        $return = $colors[0];
        for ($i = 2; $i < count($colors); $i += 2) {
            $return .= '<span class="'
                    . Utils::$colors[$colors[$i - 1]] .  '">' . $colors[$i]
                    . '</span>';
        }

        return $return;
    }
}
