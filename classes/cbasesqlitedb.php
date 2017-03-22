<?

include_once(CRegistry::GetInstance()->Get('local_classes_path') . 'cbasedb.php');

/**
 * CBaseDB
 */
abstract class CBaseSQLiteDB extends CBaseDB
{
	/**
	 * Конструктор
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Открытие файла с блокировкой
	 */
	public function Open()
	{
		// проверка наличия файла
		if(!file_exists($this->m_sFile))
		{
			// создание базы данных
			$this->CreateDB();
		}
      
      // открытие базы
		$this->m_hHandle = sqlite_open($this->m_sFile, '0666');
		
		return ($this->m_hHandle) ? true : false;
	}

	/**
	 * Закрытие файла
	 */
	public function Close()
	{
		// проверка наличия хендла
		if($this->m_hHandle)
		{
			// закрытие базы
			sqlite_close($this->m_hHandle);
		}
	}
   
   abstract public function CreateDB();
}
?>
