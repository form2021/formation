<?php

namespace Tdf\Filesystem;

class VirtualFilesystem implements Filesystem
{
    /** @var string */
    private $currentPath;

    public function __construct($path)
    {
        $this->currentPath = $path;
    }

    public function getCurrentPath()
    {
        return $this->currentPath;
    }

    public function cd($newPath)
    {
        // IMPLEMENT THIS METHOD
        if(!empty($path))
        {
             $this->currentPath = $path;

        }
    }
        public function getCurrentPath()
        {
            $data = [
                ['../x', '/a/b/c/x'],
                ['../../x', '/a/b/x'],
            ];
            foreach($newPath as $data => $path)
            return $this->currentPath;
            if($newPath=$path)
            {
                $data [
                    ['/x', '/x'],
                    ['/e/f/g', '/e/f/g'],
                    ['/e/f/g/../h', '/e/f/h'],
                ] ORDER BY ASC;
            }
        }

        }
    }
