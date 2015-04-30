<?php

/*
 * This file is part of the Http Adapter package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Http\Adapter\Message;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
interface InternalRequestInterface extends RequestInterface
{
    /**
     * Returns some data by name
     *
     * @param string $name
     *
     * @return mixed
     */
    public function getData($name);

    /**
     * Returns all data
     *
     * @return array
     */
    public function getAllData();

    /**
     * Checks if the data exists
     *
     * @param string $name
     *
     * @return boolean
     */
    public function hasData($name);

    /**
     * Checks if any data exists
     *
     * @return boolean
     */
    public function hasAnyData();

    /**
     * Sets some data by name
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return self
     */
    public function withData($name, $value);

    /**
     * Adds some data
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return self
     */
    public function withAddedData($name, $value);

    /**
     * Removes some data
     *
     * @param string $name
     *
     * @return self
     */
    public function withoutData($name);

    /**
     * Returns a file by name
     *
     * @param string $name
     *
     * @return string
     */
    public function getFile($name);

    /**
     * Returns the files
     *
     * @return array
     */
    public function getFiles();

    /**
     * Checks if the file exists
     *
     * @param string $name
     *
     * @return boolean
     */
    public function hasFile($name);

    /**
     * Checks if any file exists
     *
     * @return boolean
     */
    public function hasFiles();

    /**
     * Sets a file by name
     *
     * @param string $name
     * @param string $file
     *
     * @return self
     */
    public function withFile($name, $file);

    /**
     * Adds a file
     *
     * @param string $name
     * @param string $file
     *
     * @return self
     */
    public function withAddedFile($name, $file);

    /**
     * Removes a file
     *
     * @param string $name
     *
     * @return self
     */
    public function withoutFile($name);
}
