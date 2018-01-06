<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LsObject {

    public function Logger_Notice() {
        
    }
    public function PluginFreelancer_() {
        
    }

    /**
     * Проверяет разрешение для текущего авторизованного пользователя
     *
     * @param string $sPermissionCode Код разрешения
     * @param mixed $aParamsOrPlugin Параметры или плагин
     * @param mixed $sPluginOrParams Плагин или параметры
     *
     * @return bool
     */
    public function Rbac_IsAllow($sPermissionCode, $aParamsOrPlugin = array(), $sPluginOrParams = null)
    {
    }

    /**
     * Проверяет разрешение для конкретного пользователя
     *
     * @param ModuleUser_EntityUser $oUser Пользователь
     * @param string $sPermissionCode Код разрешения
     * @param mixed $aParamsOrPlugin Параметры или плагин
     * @param mixed $sPluginOrParams Плагин или параметры
     *
     * @return bool
     */
    public function Rbac_IsAllowUser($oUser, $sPermissionCode, $aParamsOrPlugin = array(), $sPluginOrParams = null)
    {
        }

    /**
     * Проверяет разрешение для конкретного пользователя
     *
     * @param ModuleUser_EntityUser $oUser Пользователь
     * @param string $sPermissionCode Код разрешения
     * @param array $aParams Параметры
     * @param mixed $sPlugin Плагин, можно указать код плагина, название класса или объект
     *
     * @return bool
     */
    protected function Rbac_IsAllowUserFull($oUser, $sPermissionCode, $aParams = array(), $sPlugin = null)
    {
    }

    /**
     * Возвращает список ролей пользователя
     * На самом деле этот метод можно было бы заменить на $oUser->getRolesActive(), если бы сущность User была ORM
     *
     * @param ModuleUser_EntityUser|int $oUser
     * @param bool $bActiveOnly Учитывать только активные роли
     *
     * @return array
     */
    public function Rbac_GetRolesByUser($oUser, $bActiveOnly = true)
    {
        return array();
    }

    /**
     * Возвращает количество пользователей у роли
     *
     * @param ModuleRbac_EntityRole|int $oRole
     *
     * @return int
     */
    public function Rbac_GetCountUsersByRole($oRole)
    {
        return $this->GetCountItemsByFilter(array('role_id' => $iRoleId), 'ModuleRbac_EntityRoleUser');
    }

    /**
     * Выполняет загрузку в кеш ролей и разрешений
     */
    protected function Rbac_LoadRoleAndPermissions()
    {
    }

    /**
     * Загружает в кеш разрешения
     */
    protected function Rbac_LoadPermissions()
    {
     }

    /**
     * Загружает в кеш роли
     */
    protected function Rbac_LoadRoles()
    {
    }

    /**
     * Проверяет наличие разрешения у конкретной роли, учитывается наследование ролей
     *
     * @param ModuleRbac_EntityRole $oRole Объект роли
     * @param string $sPermissionCode Код разрешения
     * @param string $sPlugin Код плагина или пустая строка (разрешения ядра)
     *
     * @return bool
     */
    protected function Rbac_CheckPermissionByRole($oRole, $sPermissionCode, $sPlugin = '')
    {
        return false;
    }

    /**
     * Возвращает последнее сообщение о неудачной проверке прав
     *
     * @return null|string
     */
    public function Rbac_GetMsgLast()
    {
    }

    /**
     * Добавляет роль к пользователю
     *
     * @param ModuleRbac_EntityRole|string $oRole Объект роли или код роли
     * @param int|ModuleUser_EntityUser $iUserId Объект пользователя или его ID
     *
     * @return bool|Entity
     */
    public function Rbac_AddRoleToUser($oRole, $iUserId)
    {
     }

    /**
     * Создает разрешений для управления правами
     * В качестве основного параметра передается массив с данными, массив имеет тип корневых ключа: groups, roles и permissions.
     * <pre>
     * $aData=array(
     *        'groups' => array(
     *            array('article','Статьи'),
     *        ),
     *        'roles' => array(
     *            array('article_moderator','Модератор статей'),
     *        ),
     *        'permissions' => array(
     *            array('view','Просмотр статьи','msg_error'=>'У вас нет прав на просмотр статьи','group'=>'article','roles'=>array('guest','user')),
     *            array('create','Создание статей','msg_error'=>'У вас нет прав на создание статьи','group'=>'article','roles'=>'user'),
     *            array('update_all','Правка всех статей','msg_error'=>'У вас нет прав на редактирование статьи','group'=>'article','roles'=>'article_moderator'),
     *        ),
     * );
     * </pre>
     *
     * @param array $aData Набор данных
     * @param mixed $sPlugin Плагин, можно указать код плагина, название класса или объект
     *
     * @return bool
     */
    public function Rbac_CreatePermissions($aData, $sPlugin = null)
    {
     }

    /**
     * Удаляет разрешения - группы, роли, разрешения
     *
     * <pre>
     * $aData=array(
     *        'groups' => array('article'),
     *        'roles' => array('article_moderator'),
     * );
     * </pre>
     * @param array $aData Данные для удаления
     * @param mixed $sPlugin Плагин, можно указать код плагина, название класса или объект
     */
    public function Rbac_RemovePermissions($aData, $sPlugin)
    {
    }

    /**
     * Алиас для перенаправления экшена на страницу ошибки с сообщением
     *
     * @param bool $bFromAdmin Необходимо указать true, если метод вызывается из стандартной админки
     *
     * @return string
     */
    public function Rbac_ReturnActionError($bFromAdmin = false)
    {
         
    }
    
    
    public function Viewer_Init($bLocal = false) {
    }

    /**
     * Получает локальную копию модуля
     *
     * @return ModuleViewer
     */
    public function Viewer_GetLocalViewer() {
    }

    /**
     * Выполняет загрузку необходимых (возможно даже системных :)) переменных в шаблон
     *
     */
    public function Viewer_VarAssign() {
    }

    /**
     * Загружаем содержимое menu-контейнеров
     */
    protected function Viewer_MenuVarAssign() {
    }

    /**
     * Выводит на экран(браузер) обработанный шаблон
     *
     * @param string $sTemplate Шаблон для вывода
     */
    public function Viewer_Display($sTemplate) {
   }

    /**
     * Возвращает объект Smarty
     *
     * @return Smarty
     */
    public function Viewer_GetSmartyObject() {
    }

    /**
     * Создает и возвращает объект Smarty
     *
     * @return Smarty
     */
    public function Viewer_CreateSmartyObject() {
    }

    /**
     * Очищает кеш компиленных шаблонов
     */
    public function Viewer_ClearCompiledTemplates() {
        $this->oSmarty->clearCompiledTemplate();
    }

    /**
     * Ответ на ajax запрос
     *
     * @param string $sType Варианты: json, jsonIframe, jsonp
     */
    public function Viewer_DisplayAjax($sType = 'json') {
    }

    /**
     * Возвращает тип отдачи контекта
     *
     * @return string
     */
    public function Viewer_GetResponseAjax() {
        return $this->sResponseAjax;
    }

    /**
     * Устанавливает тип отдачи при ajax запросе, если null то выполняется обычный вывод шаблона в браузер
     *
     * @param string $sResponseAjax Тип ответа
     * @param bool $bResponseSpecificHeader Установливать специфичные тиру заголовки через header()
     * @param bool $bValidate Производить или нет валидацию формы через {@link Security::ValidateSendForm}
     */
    public function Viewer_SetResponseAjax($sResponseAjax = 'json', $bResponseSpecificHeader = true, $bValidate = true) {
    }

    /**
     * Загружает переменную в шаблон
     *
     * @param string|array $mName Имя переменной в шаблоне или ассоциативный массив со списком параметров
     * @param mixed $mValue Значение переменной. $bByRef = true, то значение должно быть в виде массива array(&$mValue) для корректной работы передачи по ссылке
     * @param bool $bLocal Загружает переменную в локальную область видимости шаблонизатора (доступна только для конкретного шаблона)
     * @param bool $bByRef Загружает переменную по ссылке
     */
    public function Viewer_Assign($mName, $mValue = null, $bLocal = false, $bByRef = false) {
        if ($bByRef and isset($mValue[0])) {
            $this->oSmarty->assignByRef($mName, $mValue[0]);
        } else {
            $this->oSmarty->assign($mName, $mValue, false, $bLocal);
        }
    }

    /**
     * Добавляет переменную к уже существующим в шаблоне
     * Значение переменной преобразуется к типу array
     *
     * @param      $mName    Имя переменной в шаблоне или ассоциативный массив со списком переменных
     * @param null $mValue Значение переменной
     * @param bool $bMerge Необходимость мержа (слияния) переменных
     */
    public function Viewer_Append($mName, $mValue = null, $bMerge = false) {
        $this->oSmarty->append($mName, $mValue, $bMerge);
    }

    /**
     * Загружаем переменную в ajax ответ
     *
     * @param string|array $sName Имя переменной в шаблоне или ассоциативный массив со списком параметров
     * @param mixed $value Значение переменной
     */
    public function Viewer_AssignAjax($sName, $value = null) {
        if (is_array($sName)) {
            foreach ($sName as $sKey => $mVal) {
                $this->aVarsAjax[$sKey] = $mVal;
            }
        } else {
            $this->aVarsAjax[$sName] = $value;
        }
    }

    /**
     * Загружаем переменную в JS
     *
     * @param      $sName
     * @param null $value
     */
    public function Viewer_AssignJs($sName, $value = null) {
        if (is_array($sName)) {
            foreach ($sName as $sKey => $mVal) {
                $this->aVarsJs[$sKey] = $mVal;
            }
        } else {
            $this->aVarsJs[$sName] = $value;
        }
    }

    /**
     * Возвращает переменные JS
     *
     * @return array
     */
    public function Viewer_GetVarsJs() {
        return $this->aVarsJs;
    }

    /**
     * Возвращает обработанный шаблон
     *
     * @param string $sTemplate Шаблон для рендеринга
     * @return string
     */
    public function Viewer_Fetch($sTemplate) {
    }

    /**
     * Проверяет существование шаблона
     *
     * @param string $sTemplate Шаблон
     * @return bool
     */
    public function Viewer_TemplateExists($sTemplate) {
        return $this->oSmarty->templateExists($sTemplate);
    }

    /**
     * Инициализируем параметры отображения блоков
     */
    protected function Viewer_InitBlockParams() {
    }

    /**
     * Добавляет блок для отображения
     *
     * @param string $sGroup Группа блоков
     * @param string $sName Название блока
     * Можно передать название блока, тогда для обработки данных блока будет вызван обработчик из /classes/blocks/, либо передать путь до шаблона, тогда будет выполнено обычное подключение шаблона
     * @param array $aParams Параметры блока, которые будут переданы обработчику блока
     * @param int $iPriority Приоритет, согласно которому сортируются блоки
     * @return bool
     */
    public function Viewer_AddBlock($sGroup, $sName, $aParams = array(), $iPriority = 5) {
    }

    /**
     * Добавляет список блоков
     *
     * @param string $sGroup Группа блоков
     * @param array $aBlocks Список названий блоков с параметрами
     * <pre>
     * $this->Viewer_AddBlocks('right',array('tags',array('block'=>'stream','priority'=>100)));
     * </pre>
     * @param bool $ClearBlocks Очищать или нет перед добавлением блоки в данной группе
     */
    public function Viewer_AddBlocks($sGroup, $aBlocks, $ClearBlocks = true) {
    }

    /**
     * Удаляет блоки группы
     *
     * @param string $sGroup
     */
    public function Viewer_ClearBlocks($sGroup) {
        $this->aBlocks[$sGroup] = array();
    }

    /**
     * Удаляет блоки всех групп
     *
     */
    public function Viewer_ClearBlocksAll() {
        foreach ($this->aBlocks as $sGroup => $aBlock) {
            $this->aBlocks[$sGroup] = array();
        }
    }

    /**
     * Возвращает список блоков
     *
     * @param bool $bSort Выполнять или нет сортировку блоков
     * @return array
     */
    public function Viewer_GetBlocks($bSort = false) {
        if ($bSort) {
            $this->SortBlocks();
        }
        return $this->aBlocks;
    }


    /**
     * Добавляет js файл в конец списка
     *
     * @param $sJs    Файл js
     * @param array $aParams Параметры, например, можно указать параметр 'name'=>'jquery.plugin.foo' для исключения повторного добавления файла с таким именем
     * @param bool $bReplace Заменять файл или нет
     * @return bool
     */
    public function Viewer_AppendScript($sJs, $aParams = array(), $bReplace = false) {
    }

    /**
     * Добавляет js файл в начало списка
     *
     * @param $sJs    Файл js
     * @param array $aParams Параметры, например, можно указать параметр 'name'=>'jquery.plugin.foo' для исключения повторного добавления файла с таким именем
     * @param bool $bReplace Заменять файл или нет
     * @return bool
     */
    public function Viewer_PrependScript($sJs, $aParams = array(), $bReplace = false) {
    }

    /**
     * Добавляет css файл в конец списка
     *
     * @param $sCss    Файл css стилей
     * @param array $aParams Параметры, например, можно указать параметр 'name'=>'blueprint' для исключения повторного добавления файла с таким именем
     * @param bool $bReplace Заменять файл или нет
     * @return bool
     */
    public function Viewer_AppendStyle($sCss, $aParams = array(), $bReplace = false) {
    }

    /**
     * Добавляет css файл в начало списка
     *
     * @param $sCss    Файл css стилей
     * @param array $aParams Параметры, например, можно указать параметр 'name'=>'blueprint' для исключения повторного добавления файла с таким именем
     * @param bool $bReplace Заменять файл или нет
     * @return bool
     */
    public function Viewer_PrependStyle($sCss, $aParams = array(), $bReplace = false) {
    }

    /**
     * Строит массив для подключения css и js,
     * преобразовывает их в строку для HTML
     *
     */
    protected function Viewer_BuildHeadFiles() {
    }

    /**
     * Устанавливает список файлов для вывода в хидере страницы
     *
     * @param array $aText Список файлов
     */
    public function Viewer_SetHtmlHeadFiles($aText) {
    }

    /**
     * Устанавливаем заголовок страницы(тег title)
     *
     * @param string|array $mText Заголовок
     */
    public function Viewer_SetHtmlTitle($mText) {
    }

    /**
     * Добавляет часть заголовка страницы через разделитель
     *
     * @param string $sText Заголовок
     */
    public function Viewer_AddHtmlTitle($sText) {
   }

    /**
     * Возвращает текущий заголовок страницы
     *
     * @param bool $bSortReverse Направаление сортировки частей заголовка
     *
     * @return string
     */
    public function Viewer_GetHtmlTitle($bSortReverse = true) {
    }

    /**
     * Возвращает разделитель заголовков страниц
     *
     * @return string
     */
    public function Viewer_GetHtmlTitleSeparation() {
    }

    /**
     * Устанавливает разделитель заголовков страниц
     *
     * @param $sSep
     */
    public function Viewer_SetHtmlTitleSeparation($sSep) {
    }

    /**
     * Устанавливает ключевые слова keywords
     *
     * @param string $sText Кейворды
     */
    public function Viewer_SetHtmlKeywords($sText) {
    }

    /**
     * Устанавливает описание страницы description
     *
     * @param string $sText Описание
     */
    public function Viewer_SetHtmlDescription($sText) {
        $this->sHtmlDescription = $sText;
    }

    /**
     * Возвращает описание страницы description
     *
     * @return string
     */
    public function Viewer_GetHtmlDescription() {
    }

    /**
     * Устанавливает основной адрес страницы
     *
     * @param string $sUrl URL страницы
     * @param bool $bRewrite Перезаписывать URL, если он уже установлен
     */
    public function Viewer_SetHtmlCanonical($sUrl, $bRewrite = false) {
    }

    /**
     * Устанавливает директивы индексирования для поисковика
     *
     * @param string $sText Поисковые директивы
     */
    public function Viewer_SetHtmlRobots($sText) {
        $this->sHtmlRobots = $sText;
    }

    /**
     * Возвращает директивы индексирования для поисковика
     *
     * @return string
     */
    public function Viewer_GetHtmlRobots() {
        return $this->sHtmlRobots;
    }

    /**
     * Устанавливает директивы запрета индексирования для поисковика
     *
     * @param bool $bNoIndex Запретить или разрешить индексирование
     */
    public function Viewer_SetHtmlNoIndex($bNoIndex = true) {
    }

    /**
     * Устанавливает альтернативный адрес страницы по RSS
     *
     * @param string $sUrl URL
     * @param string $sTitle Заголовок
     */
    public function Viewer_SetHtmlRssAlternate($sUrl, $sTitle) {
    }

    /**
     * Формирует постраничный вывод
     *
     * @param int $iCount Общее количество элементов
     * @param int $iCurrentPage Текущая страница
     * @param int $iCountPerPage Количество элементов на одну страницу
     * @param int $iCountPageLine Количество ссылок на другие страницы
     * @param string $sBaseUrl Базовый URL, к нему будет добавлять постикс /pageN/  и GET параметры
     * @param array $aGetParamsList Список GET параметров, которые необходимо передавать при постраничном переходе
     * @return array
     */
    public function Viewer_MakePaging(
    $iCount, $iCurrentPage, $iCountPerPage, $iCountPageLine, $sBaseUrl, $aGetParamsList = array()
    ) {}

    /**
     * Добавить меню в контейнер
     *
     * @param string $sContainer
     * @param string $sTemplate
     */
    public function Viewer_AddMenu($sContainer, $sTemplate) {
    }

    /**
     * Компилирует меню по контейнерам
     *
     */
    protected function Viewer_BuildMenu() {
        foreach ($this->aMenu as $sContainer => $sTemplate) {
            $this->aMenuFetch[$sContainer] = $this->Fetch($sTemplate);
        }
    }

    /**
     * Возвращает текущий объект Open Graph
     *
     * @return ModuleViewer_EntityOpenGraph
     */
    public function Viewer_GetOpenGraph() {
        return $this->oOpenGraph;
    }

    /**
     * Устанавливает значение параметра для объекта Open Graph
     *
     * @param $sName
     * @param $mValue
     */
    public function Viewer_SetOpenGraphProperty($sName, $mValue) {
        $this->oOpenGraph->setProperty($sName, $mValue);
    }

    /**
     * Обработка поиска файла шаблона, если его не смог найти шаблонизатор Smarty
     *
     * @param string $sType Тип шаблона/ресурса
     * @param string $sName Имя шаблона - имя файла
     * @param string $sContent Возврат содержания шаблона при return true;
     * @param int $iTimestamp Возврат даты модификации шаблона при return true;
     * @param Smarty $oSmarty Объект Smarty
     * @return string|bool
     */
    public function Viewer_SmartyDefaultTemplateHandler($sType, $sName, &$sContent, &$iTimestamp, $oSmarty) {
    }

    /**
     * Возвращает форматированную дату
     *
     * @param int|string|null $mDate
     * @param string $sFormat
     * @param array $aParams Список параметров
     * <pre>
     * array(
     *  'declination'   => 1,
     *  'now' => 60,   // Количество секунд, в течении которых событие имеет статус "Только что"
     *  'day' => 'day в H:i', // Указывает на необходимость замены "Сегодня", "Вчера", "Завтра".
     *                        // В указанном формате 'day' будет заменено на соответствующее значение.
     *  'minutes_back'  => 59, // Количество минут, в течении которых событие имеет статус "... минут назад"
     *  'hours_back'    => 23, // Количество часов, в течении которых событие имеет статус "... часов назад"
     *  'tz'    => 4, // Временная зона
     *  'notz'  => false, // Не учитывать зон
     * )
     * </pre>
     * @return bool|string
     */
    public function Viewer_GetDateFormat($mDate = null, $sFormat = 'd F Y, H:i', $aParams = array()) {
    }

    /**
     * Загружаем переменные в шаблон при завершении модуля
     *
     */
    public function Viewer_Shutdown() {
        
    }

    /**
     * Возвращает список типов полей
     *
     * @return array
     */
    public function User_GetUserFieldTypes() {
        
    }

    /**
     * Добавляет новый тип с пользовательские поля
     *
     * @param string $sType Тип
     * @return bool
     */
    public function User_AddUserFieldTypes($sType) {
        
    }

    /**
     * Получает дополнительные данные(объекты) для юзеров по их ID
     *
     * @param array $aUserId Список ID пользователей
     * @param array|null $aAllowData Список типод дополнительных данных для подгрузки у пользователей
     * @return array
     */
    public function User_GetUsersAdditionalData($aUserId, $aAllowData = null) {
        
    }

    /**
     * Список юзеров по ID
     *
     * @param array $aUserId Список ID пользователей
     * @return array
     */
    public function User_GetUsersByArrayId($aUserId) {
        
    }

    /**
     * Алиас для корректной работы ORM
     *
     * @param array $aFilter Фильтр, который содержит список id пользователей в параметре "id in"
     * @return array
     */
    public function User_GetUserItemsByFilter($aFilter) {
        
    }

    /**
     * Получение пользователей по списку ID используя общий кеш
     *
     * @param array $aUserId Список ID пользователей
     * @return array
     */
    public function User_GetUsersByArrayIdSolid($aUserId) {
        
    }

    /**
     * Список сессий юзеров по ID
     *
     * @param array $aUserId Список ID пользователей
     * @return array
     */
    public function User_GetSessionsByArrayId($aUserId) {
        
    }

    /**
     * Получить список сессий по списку айдишников, но используя единый кеш
     *
     * @param array $aUserId Список ID пользователей
     * @return array
     */
    public function User_GetSessionsByArrayIdSolid($aUserId) {
        
    }

    /**
     * Получает сессию юзера
     *
     * @param int $sUserId ID пользователя
     * @return ModuleUser_EntitySession|null
     */
    public function User_GetSessionByUserId($sUserId) {
        
    }

    /**
     * При завершенни модуля загружаем в шалон объект текущего юзера
     *
     */
    public function User_Shutdown() {
        
    }

    /**
     * Добавляет юзера
     *
     * @param ModuleUser_EntityUser $oUser Объект пользователя
     * @return ModuleUser_EntityUser|bool
     */
    public function User_Add(ModuleUser_EntityUser $oUser) {
        
    }

    /**
     * Получить юзера по ключу активации
     *
     * @param string $sKey Ключ активации
     * @return ModuleUser_EntityUser|null
     */
    public function User_GetUserByActivateKey($sKey) {
        
    }

    /**
     * Получить юзера по ключу сессии
     *
     * @param string $sKey Сессионный ключ
     * @return ModuleUser_EntityUser|null
     */
    public function User_GetUserBySessionKey($sKey) {
        
    }

    /**
     * Получить юзера по мылу
     *
     * @param string $sMail Емайл
     * @return ModuleUser_EntityUser|null
     */
    public function User_GetUserByMail($sMail) {
        
    }

    /**
     * Получить юзера по реферальному коду
     *
     * @param string $sCode Реферальный код
     * @return ModuleUser_EntityUser|null
     */
    public function User_GetUserByReferralCode($sCode) {
        
    }

    /**
     * Получить юзера по логину
     *
     * @param string $sLogin Логин пользователя
     * @return ModuleUser_EntityUser|null
     */
    public function User_GetUserByLogin($sLogin) {
        
    }

    /**
     * Получить юзера по айдишнику
     *
     * @param int $sId ID пользователя
     * @return ModuleUser_EntityUser|null
     */
    public function User_GetUserById($sId) {
        
    }

    /**
     * Обновляет юзера
     *
     * @param ModuleUser_EntityUser $oUser Объект пользователя
     * @return bool
     */
    public function User_Update(ModuleUser_EntityUser $oUser) {
        
    }

    /**
     * Авторизовывает юзера
     *
     * @param ModuleUser_EntityUser $oUser Объект пользователя
     * @param bool $bRemember Запоминать пользователя или нет
     * @param string $sKey Уникальный ключ сессии
     * @return bool
     */
    public function User_Authorization(ModuleUser_EntityUser $oUser, $bRemember = true, $sKey = null) {
        
    }

    /**
     * Автоматическое заллогинивание по ключу из куков
     *
     */
    protected function Viewer_AutoLogin() {
        
    }

    /**
     * Авторизован ли юзер
     *
     * @return bool
     */
    public function User_IsAuthorization() {
        
    }

    /**
     * Получить текущего юзера
     *
     * @return ModuleUser_EntityUser|null
     */
    public function User_GetUserCurrent() {
        
    }

    /**
     * Устанавливает текущего пользователя
     *
     * @param ModuleUser_EntityUser $oUser
     */
    public function User_SetUserCurrent($oUser) {
        
    }

    /**
     * Обновляет данные текущего пользователя
     *
     * @param bool $bSafe Обновлять только данные объекта ($bSafe=true) или полностью весь объект. При обновлении всего объекта происходит потеря связей старых ссылок на объект.
     */
    public function User_ReloadUserCurrent($bSafe = true) {
        
    }

    /**
     * Проверяет является ли текущий пользователь администратором
     *
     * @param bool $bReturnUser Возвращать или нет объект пользователя
     *
     * @return bool|ModuleUser_EntityUser
     */
    public function User_GetIsAdmin($bReturnUser = false) {
        
    }

    /**
     * Разлогинивание
     *
     */
    public function User_Logout() {
        
    }

    /**
     * Обновление данных сессии
     * Важный момент: сессию обновляем в кеше и раз в 10 минут скидываем в БД
     */
    protected function UpdateSession() {
        
    }

    /**
     * Создание пользовательской сессии
     *
     * @param ModuleUser_EntityUser $oUser Объект пользователя
     * @param string $sKey Сессионный ключ
     * @return bool
     */
    protected function Viewer_CreateSession(ModuleUser_EntityUser $oUser, $sKey = null) {
        
    }

    public function User_GetSessionsByUserId($iUserId, $bOnlyNotClose = true) {
        
    }

    /**
     * Возвращает список пользователей по фильтру
     *
     * @param array $aFilter Фильтр
     * @param array $aOrder Сортировка
     * @param int $iCurrPage Номер страницы
     * @param int $iPerPage Количество элментов на страницу
     * @param array $aAllowData Список типо данных для подгрузки к пользователям
     * @return array('collection'=>array,'count'=>int)
     */
    public function User_GetUsersByFilter($aFilter, $aOrder, $iCurrPage, $iPerPage, $aAllowData = null) {
        
    }

    /**
     * Получить список юзеров по дате регистрации
     *
     * @param int $iLimit Количество
     * @return array
     */
    public function User_GetUsersByDateRegister($iLimit = 20) {
        
    }

    /**
     * Получить статистику по юзерам
     *
     * @return array
     */
    public function User_GetStatUsers() {
        
    }

    /**
     * Получить список юзеров по первым  буквам логина
     *
     * @param string $sUserLogin Логин
     * @param int $iLimit Количество
     * @return array
     */
    public function User_GetUsersByLoginLike($sUserLogin, $iLimit) {
        
    }

    /**
     * Получить список отношений друзей
     *
     * @param  array $aUserId Список ID пользователей проверяемых на дружбу
     * @param  int $sUserId ID пользователя у которого проверяем друзей
     * @return array
     */
    public function User_GetFriendsByArray($aUserId, $sUserId) {
        
    }

    /**
     * Получить список отношений друзей используя единый кеш
     *
     * @param  array $aUserId Список ID пользователей проверяемых на дружбу
     * @param  int $sUserId ID пользователя у которого проверяем друзей
     * @return array
     */
    public function User_GetFriendsByArraySolid($aUserId, $sUserId) {
        
    }

    /**
     * Получаем привязку друга к юзеру(есть ли у юзера данный друг)
     *
     * @param  int $sFriendId ID пользователя друга
     * @param  int $sUserId ID пользователя
     * @return ModuleUser_EntityFriend|null
     */
    public function User_GetFriend($sFriendId, $sUserId) {
        
    }

    /**
     * Добавляет друга
     *
     * @param  ModuleUser_EntityFriend $oFriend Объект дружбы(связи пользователей)
     * @return bool
     */
    public function User_AddFriend(ModuleUser_EntityFriend $oFriend) {
        
    }

    /**
     * Удаляет друга
     *
     * @param  ModuleUser_EntityFriend $oFriend Объект дружбы(связи пользователей)
     * @return bool
     */
    public function User_DeleteFriend(ModuleUser_EntityFriend $oFriend) {
        
    }

    /**
     * Удаляет информацию о дружбе из базы данных
     *
     * @param  ModuleUser_EntityFriend $oFriend Объект дружбы(связи пользователей)
     * @return bool
     */
    public function User_EraseFriend(ModuleUser_EntityFriend $oFriend) {
        
    }

    /**
     * Обновляет информацию о друге
     *
     * @param  ModuleUser_EntityFriend $oFriend Объект дружбы(связи пользователей)
     * @return bool
     */
    public function User_UpdateFriend(ModuleUser_EntityFriend $oFriend) {
        
    }

    /**
     * Получает список друзей
     *
     * @param  int $sUserId ID пользователя
     * @param  int $iPage Номер страницы
     * @param  int $iPerPage Количество элементов на страницу
     * @return array
     */
    public function User_GetUsersFriend($sUserId, $iPage = 1, $iPerPage = 10) {
        
    }

    /**
     * Получает количество друзей
     *
     * @param  int $sUserId ID пользователя
     * @return int
     */
    public function User_GetCountUsersFriend($sUserId) {
        
    }

    /**
     * Добавляем воспоминание(восстановление) пароля
     *
     * @param ModuleUser_EntityReminder $oReminder Объект восстановления пароля
     * @return bool
     */
    public function User_AddReminder(ModuleUser_EntityReminder $oReminder) {
        
    }

    /**
     * Сохраняем воспомнинание(восстановление) пароля
     *
     * @param ModuleUser_EntityReminder $oReminder Объект восстановления пароля
     * @return bool
     */
    public function User_UpdateReminder(ModuleUser_EntityReminder $oReminder) {
        
    }

    /**
     * Получаем запись восстановления пароля по коду
     *
     * @param string $sCode Код восстановления пароля
     * @return ModuleUser_EntityReminder|null
     */
    public function User_GetReminderByCode($sCode) {
        
    }

    /**
     * Создает аватар пользователя на основе области из изображения
     *
     * @param      $sFileFrom
     * @param      $oUser
     * @param      $aSize
     * @param null $iCanvasWidth
     *
     * @return bool
     */
    public function User_CreateProfileAvatar($sFileFrom, $oUser, $aSize = null, $iCanvasWidth = null) {
        
    }

    /**
     * Создает фото пользователя на основе области из изображения
     *
     * @param      $sFileFrom
     * @param      $oUser
     * @param      $aSize
     * @param null $iCanvasWidth
     *
     * @return bool
     */
    public function User_CreateProfilePhoto($sFileFrom, $oUser, $aSize = null, $iCanvasWidth = null) {
        
    }

    /**
     * Загрузка фото в профиль пользователя
     *
     * @param $aFile
     * @param $oUser
     *
     * @return bool
     */
    public function User_UploadProfilePhoto($aFile, $oUser) {
        
    }

    /**
     * Удаляет фото пользователя
     *
     * @param ModuleUser_EntityUser $oUser
     */
    public function User_DeleteProfilePhoto($oUser) {
        
    }

    /**
     * Удаляет аватар пользователя
     *
     * @param ModuleUser_EntityUser $oUser
     */
    public function User_DeleteProfileAvatar($oUser) {
        
    }

    /**
     * Проверяет логин на корректность
     *
     * @param string $sLogin Логин пользователя
     * @return bool
     */
    public function User_CheckLogin($sLogin) {
        
    }

    /**
     * Получить дополнительные поля профиля пользователя
     *
     * @param array|null $aType Типы полей, null - все типы
     * @return array
     */
    public function User_getUserFields($aType = null) {
        
    }

    /**
     * Получить значения дополнительных полей профиля пользователя
     *
     * @param int $iUserId ID пользователя
     * @param bool $bOnlyNoEmpty Загружать только непустые поля
     * @param array $aType Типы полей, null - все типы
     * @return array
     */
    public function User_getUserFieldsValues($iUserId, $bOnlyNoEmpty = true, $aType = array('')) {
        
    }

    /**
     * Получить по имени поля его значение дял определённого пользователя
     *
     * @param int $iUserId ID пользователя
     * @param string $sName Имя поля
     * @return string
     */
    public function User_getUserFieldValueByName($iUserId, $sName) {
        
    }

    /**
     * Установить значения дополнительных полей профиля пользователя
     *
     * @param int $iUserId ID пользователя
     * @param array $aFields Ассоциативный массив полей id => value
     * @param int $iCountMax Максимальное количество одинаковых полей
     * @return bool
     */
    public function User_setUserFieldsValues($iUserId, $aFields, $iCountMax = 1) {
        
    }

    /**
     * Добавить поле
     *
     * @param ModuleUser_EntityField $oField Объект пользовательского поля
     * @return bool
     */
    public function User_addUserField($oField) {
        
    }

    /**
     * Изменить поле
     *
     * @param ModuleUser_EntityField $oField Объект пользовательского поля
     * @return bool
     */
    public function User_updateUserField($oField) {
        
    }

    /**
     * Удалить поле
     *
     * @param int $iId ID пользовательского поля
     * @return bool
     */
    public function User_deleteUserField($iId) {
        
    }

    /**
     * Проверяет существует ли поле с таким именем
     *
     * @param string $sName Имя поля
     * @param int|null $iId ID поля
     * @return bool
     */
    public function User_userFieldExistsByName($sName, $iId = null) {
        
    }

    /**
     * Проверяет существует ли поле с таким ID
     *
     * @param int $iId ID поля
     * @return bool
     */
    public function User_userFieldExistsById($iId) {
        
    }

    /**
     * Удаляет у пользователя значения полей
     *
     * @param int $iUserId ID пользователя
     * @param array|null $aType Список типов для удаления
     * @return bool
     */
    public function User_DeleteUserFieldValues($iUserId, $aType = null) {
        
    }

    /**
     * Возвращает список заметок пользователя
     *
     * @param int $iUserId ID пользователя
     * @param int $iCurrPage Номер страницы
     * @param int $iPerPage Количество элементов на страницу
     * @return array('collection'=>array,'count'=>int)
     */
    public function User_GetUserNotesByUserId($iUserId, $iCurrPage, $iPerPage) {
        
    }

    /**
     * Возвращает список пользователей к которым юзер оставлял заметку
     *
     * @param int $iUserId ID пользователя
     * @param int $iCurrPage Номер страницы
     * @param int $iPerPage Количество элементов на страницу
     *
     * @return array('collection'=>array,'count'=>int)
     */
    public function User_GetUsersByNoteAndUserId($iUserId, $iCurrPage, $iPerPage) {
        
    }

    /**
     * Возвращает количество заметок у пользователя
     *
     * @param int $iUserId ID пользователя
     * @return int
     */
    public function User_GetCountUserNotesByUserId($iUserId) {
        
    }

    /**
     * Возвращет заметку по автору и пользователю
     *
     * @param int $iTargetUserId ID пользователя о ком заметка
     * @param int $iUserId ID пользователя автора заметки
     * @return ModuleUser_EntityNote
     */
    public function User_GetUserNote($iTargetUserId, $iUserId) {
        
    }

    /**
     * Возвращает заметку по ID
     *
     * @param int $iId ID заметки
     * @return ModuleUser_EntityNote
     */
    public function User_GetUserNoteById($iId) {
        
    }

    /**
     * Возвращает список заметок пользователя по ID целевых юзеров
     *
     * @param array $aUserId Список ID целевых пользователей
     * @param int $sUserId ID пользователя, кто оставлял заметки
     * @return array
     */
    public function User_GetUserNotesByArray($aUserId, $sUserId) {
        
    }

    /**
     * Удаляет заметку по ID
     *
     * @param int $iId ID заметки
     * @return bool
     */
    public function User_DeleteUserNoteById($iId) {
        
    }

    /**
     * Сохраняет заметку в БД, если ее нет то создает новую
     *
     * @param ModuleUser_EntityNote $oNote Объект заметки
     * @return bool|ModuleUser_EntityNote
     */
    public function User_SaveNote($oNote) {
        
    }

    public function User_AddComplaint($oComplaint) {
        
    }

    /**
     * Возвращает список префиксов логинов пользователей (для алфавитного указателя)
     *
     * @param int $iPrefixLength Длина префикса
     * @return array
     */
    public function User_GetGroupPrefixUser($iPrefixLength = 1) {
        
    }

    /**
     * Добавляет запись о смене емайла
     *
     * @param ModuleUser_EntityChangemail $oChangemail Объект смены емайла
     * @return bool|ModuleUser_EntityChangemail
     */
    public function User_AddUserChangemail($oChangemail) {
        
    }

    /**
     * Обновляет запись о смене емайла
     *
     * @param ModuleUser_EntityChangemail $oChangemail Объект смены емайла
     * @return int
     */
    public function User_UpdateUserChangemail($oChangemail) {
        
    }

    /**
     * Возвращает объект смены емайла по коду подтверждения
     *
     * @param string $sCode Код подтверждения
     * @return ModuleUser_EntityChangemail|null
     */
    public function User_GetUserChangemailByCodeFrom($sCode) {
        
    }

    /**
     * Возвращает объект смены емайла по коду подтверждения
     *
     * @param string $sCode Код подтверждения
     * @return ModuleUser_EntityChangemail|null
     */
    public function User_GetUserChangemailByCodeTo($sCode) {
        
    }

    /**
     * Формирование процесса смены емайла в профиле пользователя
     *
     * @param ModuleUser_EntityUser $oUser Объект пользователя
     * @param string $sMailNew Новый емайл
     * @return bool|ModuleUser_EntityChangemail
     */
    public function User_MakeUserChangemail($oUser, $sMailNew) {
        
    }

    /**
     * Отправляет уведомление с новым линком активации
     *
     * @param ModuleUser_EntityUser $oUser Объект пользователя
     */
    public function User_SendNotifyReactivationCode(ModuleUser_EntityUser $oUser) {
        
    }

    /**
     * Отправляет уведомление при регистрации с активацией
     *
     * @param ModuleUser_EntityUser $oUser Объект пользователя
     * @param string $sPassword Пароль пользователя
     */
    public function User_SendNotifyRegistrationActivate(ModuleUser_EntityUser $oUser, $sPassword) {
        
    }

    /**
     * Отправляет уведомление о регистрации
     *
     * @param ModuleUser_EntityUser $oUser Объект пользователя
     * @param string $sPassword Пароль пользователя
     */
    public function User_SendNotifyRegistration(ModuleUser_EntityUser $oUser, $sPassword) {
        
    }

    /**
     * Отправляет пользователю сообщение о добавлении его в друзья
     *
     * @param ModuleUser_EntityUser $oUserTo Объект пользователя
     * @param ModuleUser_EntityUser $oUserFrom Объект пользователя, которого добавляем в друзья
     * @param string $sText Текст сообщения
     * @param string $sPath URL для подтверждения дружбы
     * @return bool
     */
    public function User_SendNotifyUserFriendNew(ModuleUser_EntityUser $oUserTo, ModuleUser_EntityUser $oUserFrom, $sText, $sPath) {
        
    }

    /**
     * Уведомление при восстановлении пароля
     *
     * @param ModuleUser_EntityUser $oUser Объект пользователя
     * @param ModuleUser_EntityReminder $oReminder объект напоминания пароля
     */
    public function User_SendNotifyReminderCode(ModuleUser_EntityUser $oUser, ModuleUser_EntityReminder $oReminder) {
        
    }

    /**
     * Уведомление с новым паролем после его восставновления
     *
     * @param ModuleUser_EntityUser $oUser Объект пользователя
     * @param string $sNewPassword Новый пароль
     */
    public function User_SendNotifyReminderPassword(ModuleUser_EntityUser $oUser, $sNewPassword) {
        
    }

    /**
     * Уведомление администрации о новой жалобе
     *
     * @param $oComplaint
     */
    public function User_SendNotifyUserComplaint($oComplaint) {
        
    }

    /**
     * Генерация хеша пароля
     *
     * @param $sPassword
     * @return string
     */
    public function User_MakeHashPassword($sPassword) {
        
    }

    /**
     * Проверка пароля
     *
     * @param $sPassword
     * @param $sHash
     * @return string
     */
    public function User_VerifyPassword($sPassword, $sHash) {
        
    }

    /**
     * Проверка доступа к авторизации
     *
     * @param $oUser
     * @return bool
     */
    public function User_VerifyAccessAuth($oUser) {
        
    }

    /**
     * Регистрация сайтмапа для пользователей
     */
    public function User_RegisterSitemap() {
        
    }

}
