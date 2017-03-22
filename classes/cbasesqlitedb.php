<?

include_once(CRegistry::GetInstance()->Get('local_classes_path') . 'cbasedb.php');

/**
 * CBaseDB
 */
abstract class CBaseSQLiteDB extends CBaseDB
{
	/**
	 * �����������
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * �������� ����� � �����������
	 */
	public function Open()
	{
		// �������� ������� �����
		if(!file_exists($this->m_sFile))
		{
			// �������� ���� ������
			$this->CreateDB();
		}
      
      // �������� ����
		$this->m_hHandle = sqlite_open($this->m_sFile, '0666');
		
		return ($this->m_hHandle) ? true : false;
	}

	/**
	 * �������� �����
	 */
	public function Close()
	{
		// �������� ������� ������
		if($this->m_hHandle)
		{
			// �������� ����
			sqlite_close($this->m_hHandle);
		}
	}
   
   abstract public function CreateDB();
}
?>
