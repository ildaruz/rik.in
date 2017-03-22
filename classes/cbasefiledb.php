<?

include_once(CRegistry::GetInstance()->Get('local_classes_path') . 'cbasedb.php');

/**
 * CBaseDB
 */
abstract class CBaseFileDB extends CBaseDB
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
		if(file_exists($this->m_sFile))
		{
			// �������� ����� ��� ��������������
			$this->m_hHandle = fopen($this->m_sFile, 'r+');

			// ���������� �����
			flock($this->m_hHandle, LOCK_EX);

			// ����� ���
		} else
		{
			// �������� �����
			$this->m_hHandle = fopen($this->m_sFile, 'w');

			// �������� ������� ������
			if($this->m_hHandle)
			{
				// ���������� �����
				flock($this->m_hHandle, LOCK_EX);
			}
		}
	}

	/**
	 * �������� �����
	 */
	public function Close()
	{
		// �������� ������� ������
		if($this->m_hHandle)
		{
			// ������������� �����
			flock($this->m_hHandle, LOCK_UN);

			// �������� �����
			fclose($this->m_hHandle);
		}
	}

	/**
	 * ��������
	 */
	abstract public function Load();

	/**
	 * ����������
	 */
	abstract public function Save();
   
   /**
	 * ������������ ��� �������� ������, ��� ������������ ����������
	 */
   public function LoadOnly()
   {
      $this->Open();
      $this->Load();
      $this->Close();
   }
}
?>
