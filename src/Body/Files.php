<?php

namespace Http\Client\Body;

use Http\Client\Exception\RuntimeException;

/**
 * Files converted to multipart form body
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Files extends Multipart
{
    /**
     * @var array
     */
    protected $files;

    /**
     * @param array       $files
     * @param string|null $boundary
     */
    public function __construct(array $files, $boundary = null)
    {
        $this->files = $files;

        parent::__construct($boundary);
    }

    /**
     * {@inheritdoc}
     */
    public function toStreamable()
    {
        $body = '';

        foreach ($this->files as $name => $file) {
            if (!is_file($file)) {
                throw new RuntimeException(sprintf('File "%s" does not exist', $file));
            }

            $body .= sprintf(
                "--%s\r\nContent-Disposition: form-data; name=\"%s\"; filename=\"%s\"\r\n\r\n%s\r\n",
                $this->boundary,
                $name,
                basename($file),
                file_get_contents($file)
            );
        }

        return $body;
    }
}
