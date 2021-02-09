<?php

namespace Tdf\Filesystem;

interface Filesystem
{
    /**
     * Filesystem constructor.
     *
     * @param string $path
     */
    public function __construct($path);

    /**
     * Returns the current path
     *
     * @return string
     */
    public function getCurrentPath();

    /**
     * Changes the current path
     *
     * @param string $newPath The new path to set as current path
     * @return void
     */
    public function cd($newPath);
}
