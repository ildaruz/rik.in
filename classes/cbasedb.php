<?

/**
 * CBaseDB
 */
abstract class CBaseDB
{
	public $m_sFile;
	public $m_hHandle;

	/**
	 * Конструктор
	 */
	public function __construct()
	{
		$this->m_sFile                = '';
		$this->m_hHandle              = NULL;
	}

	/**
	 * Открытие файла с блокировкой
	 */
	abstract public function Open();

	/**
	 * Закрытие файла
	 */
	abstract public function Close();
}
?>
