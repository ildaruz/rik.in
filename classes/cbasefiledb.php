<?

include_once(CRegistry::GetInstance()->Get('local_classes_path') . 'cbasedb.php');

/**
 * CBaseDB
 */
abstract class CBaseFileDB extends CBaseDB
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
		if(file_exists($this->m_sFile))
		{
			// открытие файла для редактирования
			$this->m_hHandle = fopen($this->m_sFile, 'r+');

			// блокировка файла
			flock($this->m_hHandle, LOCK_EX);

			// файла нет
		} else
		{
			// создание файла
			$this->m_hHandle = fopen($this->m_sFile, 'w');

			// проверка наличия хендла
			if($this->m_hHandle)
			{
				// блокировка файла
				flock($this->m_hHandle, LOCK_EX);
			}
		}
	}

	/**
	 * Закрытие файла
	 */
	public function Close()
	{
		// проверка наличия хендла
		if($this->m_hHandle)
		{
			// разблокировка файла
			flock($this->m_hHandle, LOCK_UN);

			// закрытие файла
			fclose($this->m_hHandle);
		}
	}

	/**
	 * Загрузка
	 */
	abstract public function Load();

	/**
	 * Сохранение
	 */
	abstract public function Save();
   
   /**
	 * Используется для загрузки данных, без последующего сохранения
	 */
   public function LoadOnly()
   {
      $this->Open();
      $this->Load();
      $this->Close();
   }
}
?>
