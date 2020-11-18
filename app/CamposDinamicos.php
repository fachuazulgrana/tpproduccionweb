<?php
class CamposDinamicos
{

	private $con;

	function __construct($con)
	{
		$this->con = $con;
	}


	public function getList()
    {
        $query = 'SELECT * FROM campos_dinamicos';
        return $this->con->query($query);
    }
}
