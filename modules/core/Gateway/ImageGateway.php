<?php

class ImageGateway
{
    /**
     * @var PDO
     */
    private $conn;


    /**
     * Constructor
     *
     * @param PDO $conn
     */
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }


    /**
     * Find an image by it's ID
     *
     * @param  integer $id
     * @return array
     */
    public function findImage($id)
    {
        // Do something here with PDO
        // You'd use it like:
        // $this->conn->methodName();

        // Pretend this is from the DB
        return array(
            'path' => '/path/to/image/toplel.jpg';
        );
    }
}
