<?php

namespace Http\Client\Body;

/**
 * Data converted to multipart form body
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class MultipartData extends Multipart
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @param array       $data
     * @param string|null $boundary
     */
    public function __construct(array $data, $boundary = null)
    {
        $this->data = $data;

        parent::__construct($boundary);
    }

    /**
     * {@inheritdoc}
     */
    public function toStreamable()
    {
        return $this->prepareData(null, $this->data);
    }

    /**
     * @param string|integer|null $name
     * @param mixed               $data
     *
     * @return string
     */
    protected function prepareData($name, $data)
    {
        $body = '';

        if (is_array($data)) {
            foreach ($data as $subName => $subData) {
                if (!is_null($name)) {
                    $subName = sprintf('%s[%s]', $name, $subName);
                }

                $body .= $this->prepareData($subName, $subData);
            }

            return $body;
        }

        $body .= sprintf(
            "--%s\r\nContent-Disposition: form-data; name=\"%s\"\r\n\r\n%s\r\n",
            $this->boundary,
            $name,
            $data
        );

        return $body;
    }
}
