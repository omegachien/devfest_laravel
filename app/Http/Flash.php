<?php
namespace App\Http;

class Flash
{
    /**
     * Create a flash message
     *
     * @param $title
     * @param $message
     * @param $level
     * @param string $key
     */
    public function create($title, $message, $level, $key = 'flash_message')
    {
        session()->flash($key, [
            'title'   => $title,
            'message' => $message,
            'level' => $level
        ]);
    }

    /**
     * Create an information flash message
     *
     * @param $title
     * @param $message
     */
    public function info($title, $message)
    {
        $this->create($title, $message, 'info');
    }

    /**
     * Create a success flash message
     *
     * @param $title
     * @param $message
     */
    public function success($title, $message)
    {
        $this->create($title, $message, 'success');
    }

    /**
     * Create an error flash message
     *
     * @param $title
     * @param $message
     */
    public function error($title, $message)
    {
        $this->create($title, $message, 'error');
    }

    /**
     * Create an overlay flash message
     *
     * @param $title
     * @param $message
     * @param string $level
     */
    public function overlay($title, $message, $level = 'success')
    {
        $this->create($title, $message, $level, 'flash_message_overlay');
    }


}