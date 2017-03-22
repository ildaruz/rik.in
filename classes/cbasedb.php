<?

/**
 * CBaseDB
 */
abstract class CBaseDB
{
	public $m_sFile;
	public $m_hHandle;

	/**
	 * �����������
	 */
	public function __construct()
	{
		$this->m_sFile                = '';
		$this->m_hHandle              = NULL;
	}

	/**
	 * �������� ����� � �����������
	 */
	abstract public function Open();

	/**
	 * �������� �����
	 */
	abstract public function Close();
}
?>
