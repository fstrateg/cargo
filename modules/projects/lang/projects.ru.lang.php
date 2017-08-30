<?php
 
/**
 * projects module
 *
 * @package projects
 * @version 2.5.2
 * @author CMSWorks Team
 * @copyright Copyright (c) CMSWorks.ru, littledev.ru
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

/**
 * Module Config
 */
$L['cfg_pagelimit'] = array('Число записей в списках');
$L['cfg_indexlimit'] = array('Число записей на главной');
$L['cfg_offersperpage'] = array('Число предложений на странице');
$L['cfg_shorttextlen'] = array('Количество символов в списках');
$L['cfg_prevalidate'] = array('Включить предварительную модерацию');
$L['cfg_preview'] = array('Включить предварительный просмотр');
$L['cfg_prjsitemap'] = 'Включить в Sitemap';
$L['cfg_prjsitemap_freq'] = 'Частота изменения в Sitemap';
$L['cfg_prjsitemap_freq_params'] = $sitemap_freqs;
$L['cfg_prjsitemap_prio'] = array('Приоритет в Sitemap');
$L['cfg_description'] = array('Description');
$L['cfg_prjsearch'] = array('Включить в общий поиск');
$L['cfg_license'] = array('Лицензионный ключ');
$L['cfg_default_type'] = array('Тип проекта по-умолчанию');
$L['cfg_notif_admin_moderate'] = array('Уведомлять о новых проектах на проверке','Отправка уведомления на системный email о новых проектах на премодерации');
$L['cfg_prjeditor'] = 'Выбор конфигурации визуального редактора';
$L['cfg_prjeditor_params'] = 'Минимальный набор кнопок,Стандартный набор кнопок,Расширенный набор кнопок'; 

$L['info_desc'] = 'Модуль публикации проектов';

$L['projects_select_cat'] = "Выберите категорию";
$L['projects_locked_cat'] = "Выбранная категория заблокирована";
$L['projects_empty_title'] = "Не указан тип груза";
$L['projects_empty_text'] = "Описание груза не может быть пустым";
$L['projects_wrong_period'] = "Не верно задан период действия заявки";
$L['projects_empty_city']="Не задан пункт погрузки";
$L['projects_empty_cityto']="Не задан пункт разгрузки";
$L['projects_empty_count']='Количество фур не задано';
$L['projects_empty_massa']='Пожалуйста, укажите приблизительный вес груза';
$L['projects_empty_vol']='Пожалуйста, укажите приблизительный объем груза';
$L['projects_empty_frt']='Пожалуйста, укажите тип фрахта';
$L['projects_fev_count']='Количество машин в работе больше, чем вы заказали';

$L['projects_forreview'] = 'Ваш проект находится на проверке. Модератор утвердит его публикацию в ближайшее время.';
$L['projects_isrealized'] = 'Исполненный';

$L['projects_dat_created'] = 'Дата создания';
$L['projects_dat_period'] = 'Период действия';
$L['projects'] = 'Поиск груза';
$L['projects_cabinet']='Кабинет';
$L['projects_projects'] = 'Грузы';
$L['projects_calc'] = 'Калькулятор';
$L['projects_myprojects'] = 'Мои грузы';
$L['projects_mytransport'] = 'Мой транспорт';
$L['projects_mymarshruts'] = 'Мои заявки';
$L['catalog'] = 'Каталог';
$L['projects_add_to_catalog'] = 'Добавить груз';
$L['projects_add_tr_marshrut'] = 'Добавить заявку на груз';
$L['projects_edit_project'] = 'Редактировать груз';
$L['projects_add_project_title'] = 'Публикация груза';
$L['projects_edit_project_title'] = 'Редактирование груза';
$L['projects_begin']='Начало действия';
$L['projects_end']='Конец действия';
$L['projects_actual']='Актуальность заявки';
$L['projects_cnt']='Необходимое кол-во фур';
$L['projects_count']='Кол-во фур';
$L['projects_vol']='Объем груза';
$L['projects_massa']='Вес груза';
$L['projects_frt']='Тип фрахта';
$L['projects_m3']='м3';
$L['projects_m']='м';
$L['projects_ton']='тонн';
$L['projects_t']='т.';

$L['projects_hidden'] = 'Груз не опубликован';
$L['projects_success_projects'] = 'Успешные проекты';
$L['projects_next'] = 'Далее';
$L['projects_reputation'] = 'Репутация';
$L['projects_aliascharacters'] = 'Недопустимо использование символов \'+\', \'/\', \'?\', \'%\', \'#\', \'&\' в алиасах';
$L['projects_inwork']='Заявка находится "В работе"!';

$L['projects_status_published'] = 'Опубликовано';
$L['projects_status_moderated'] = 'На проверке';
$L['projects_status_hidden'] = 'Скрыто';
$L['projects_status_inarchive'] = 'Завершено';
$L['projects_admin_home_valqueue'] = 'На проверке';
$L['projects_admin_home_public'] = 'Опубликовано';
$L['projects_admin_home_hidden'] = 'Скрытые';


$L['project_added_mail_subj'] = 'Ваша заявка опубликована';
$L['project_senttovalidation_mail_subj'] = 'Ваша заявка отправлена на проверку';

$L['project_added_mail_body'] = 'Здравствуйте, {$user_name}. '."\n\n".'Ваш заявка "{$prj_name}" была опубликована на сайте {$sitename} - {$link}';
$L['project_senttovalidation_mail_body'] = 'Здравствуйте, {$user_name}.'."\n\n".'Ваш груз "{$prj_name}" был отправлен на проверку. Модератор утвердит его публикацию в ближайшее время.';

$L['projects_price'] = 'Бюджет';

$L['projects_types_edit'] = 'Правка типов';
$L['projects_types_new'] = 'Создать категорию';
$L['projects_types_editor'] = 'Редактор типов груза';
$L['projects_price'] = 'Цена';

$L['projects_sendoffer'] = 'Оставить предложение';
$L['projects_step2_title'] = 'Предпросмотр заявки';
$L['projects_step2_buy'] = 'Оплатить';
$L['projects_step2_selectproject'] = 'Выделить груз';
$L['projects_nomoney'] = 'У вас недостаточно средств на счете, чтобы оплатить данную услугу.';

$L['projects_costasc'] = 'Цена по возрастанию';
$L['projects_costdesc'] = 'Цена по убыванию';
$L['projects_mostrelevant'] = 'Наиболее актуальные';

$L['projects_notfound'] = 'Грузы не найдены';
$L['projects_empty'] = 'Грузов нет';

$L['offers_timetype'] = array('часов', 'дней', 'месяцев');

$L['offers_text_predl'] = 'Текст предложения';
$L['offers_hide_offer'] = 'Сделать предложение видимым только для заказчика';
$L['offers_for_guest'] = 'Оставлять свои предложения по проекту могут только зарегистрированные пользователи с аккаунтом перевозчика.<br />
	<a href="'.cot_url('users', 'm=register').'">Зарегистрируйтесь</a> или <a href="'.cot_url('login').'">войдите</a> на сайт под своим именем.';

$L['offers_view_all'] = 'Посмотреть все';
$L['offers_add_offer'] = 'Оставить предложение';
$L['offers_upload'] = 'Загрузить';
$L['offers_offers'] = 'Предложения перевозчиков';
$L['offers_useroffers'] = 'Мои предложения';
$L['offers_budget'] = 'Бюджет';
$L['offers_sroki'] = 'Сроки';
$L['offers_ot'] = 'от';
$L['offers_do'] = 'до';
$L['offers_otkazat'] = 'Отказать';
$L['offers_otkazali'] = 'Отказали';
$L['offers_ispolnitel'] = 'Исполнитель';
$L['offers_vibran_ispolnitel'] = 'Выбран исполнителем';
$L['offers_ostavit_predl'] = 'Оставьте свое предложение';
$L['offers_add_predl'] = 'Добавить предложение';
$L['offers_empty'] = 'Предложений нет';

$L['offers_useroffers_none'] = 'Не определен';
$L['offers_useroffers_performer'] = 'Исполнитель';
$L['offers_useroffers_refuse'] = 'Отказали';

$L['offers_empty_text'] = 'Предложение не может быть пустым';
$L['offers_add_done'] = 'Предложение добавленно';
$L['offers_add_post'] = 'Сообщение отправленно';

$L['performer_set_done'] = '{$username} выбран исполнителем';
$L['performer_set_refuse'] = 'Отказано {$username}';

$L['offers_add_msg'] = 'Написать сообщение';
$L['offers_posts_title'] = 'Переписка по заказу';

$L['project_added_offer_header'] = 'Новое предложение по грузу «{$prtitle}»';
$L['project_added_offer_body'] = 'Здравствуйте, {$user_name}. '."\n\n".'Пользователь {$offeruser_name} оставил вам предложение по проекту «{$prj_name}».'."\n\n".'{$link}';

$L['project_added_post_header'] = 'Новое сообщение по заявке «{$prtitle}»';
$L['project_added_post_body'] = 'Здравствуйте, {$user_name}. '."\n\n".'Пользователь {$postuser_name} оставил вам сообщение по проекту «{$prj_name}».'."\n\n".'{$link}';

$L['project_setperformer_header'] = 'Вас выбрали по заявке «{$prtitle}»';
$L['project_setperformer_body'] = 'Здравствуйте, {$offeruser_name}. '."\n\n".'Вас выбрали исполнителем по заявке «{$prj_name}».'."\n\n".'{$link}';

$L['project_refuse_header'] = 'Вам отказали по заявке «{$prtitle}»';
$L['project_refuse_body'] = 'Здравствуйте, {$offeruser_name}. '."\n\n".'Вам отказали по заявке «{$prj_name}».'."\n\n".'{$link}';

$L['project_reject_header'] = 'Перевозчик отказался от заявки «{$prtitle}»';
$L['project_reject_body'] = 'Здравствуйте, {$user_name}. '."\n\n".'Перевозчик "{$offeruser_name}" отказался от заявки <a href="{$link}">«{$prj_name}»</a>.'."\n\n";


$L['project_notif_admin_moderate_mail_subj'] = 'Новый груз на проверку';
$L['project_notif_admin_moderate_mail_body'] = 'Здравствуйте, '."\n\n".'Пользователь {$user_name} отправил на проверку новый груз "{$prj_name}".'."\n\n".'{$link}';

$L['project_realized'] = 'Отметить исполненным';
$L['project_unrealized'] = 'Отметить неисполненным';

$L['projects_license_error'] = 'Ваш лицензионный ключ указан с ошибкой либо не существует! Пожалуйста, укажите действительный лицензионный ключ в настройках модуля Projects';

$L['plu_prj_set_sec'] = 'Категории грузов';
$L['plu_prj_res_sort1'] = 'Дате публикации';
$L['plu_prj_res_sort2'] = 'Названию';
$L['plu_prj_res_sort3'] = 'Популярности';
$L['plu_prj_res_sort3'] = 'Категории';
$L['plu_prj_search_names'] = 'Поиск в названиях заявок';
$L['plu_prj_search_text'] = 'Поиск в самих заявках';
$L['plu_prj_set_subsec'] = 'Поиск в подразделах';

$L['projects_headermoderated'] = "грузов на проверке,груза на проверке,грузов на проверке";
$L['CargoTyp'] = 'Тип груза';
$L['projects_views']='Просмотров';
$L['projects_find_info']='Можно найти карточку пользователя или нужный рейс. Пример: ID7 (для поиска пользователя по ID) или #7 (для поиска рейса по номеру).';

$L['prj_setp_title']='Назначение исполнителя';
$L['prj_setp_number']='Номер фуры';
$L['prj_setp_fio']='ФИО водителя';
$L['prj_setp_summa']='Сумма';
$L['prj_setp_dtload']='Дата загрузки';
$L['prj_setp_dtunload']='Дата выгрузки';

$L['claims_setperformed']='Отметить заказ исполненым';
$L['claims_setperformer']='Добавить исполнителя';
$L['claims_idcarrier']='ID Перевозчика';
$L['claims_setcarrier']='Назначить исполнителем';
$L['claims_factdata']='Фактические данные по перевозке';

$L['claims_empty_summ']='Фактическая сумма перевозки не задана!';
$L['claims_empty_number']='Номер фуры не задан!';
$L['claims_empty_fio']='ФИО водителя не известно!';
$L['claims_performers']='Исполнители';
$L['claims_performed']='Выполнено';
$L['claims_confirm']='Подтверждено';
$L['claims_not_confirm']='Не подтверждено водителем';

$L['claims_rating_title']='Оцените, пожалуйста, свои впечатления от работы с перевозчиком';
$L['claims_rating_notes']='По возможности опишите выбор своей оценки';
$L['claims_rating_bad']='Очень плохо';
$L['claims_rating_poor']='Плохо';
$L['claims_rating_norm']='Нейтрально';
$L['claims_rating_good']='Хорошо';
$L['claims_rating_verygood']='Очень хорошо';
$L['claims_rating_emptystars']='Пожалуйста, оцените работу перевозчика!';
$L['claims_rating_emptynotes']='Мы сожалеем, что Вы получили негативное впечатление от работы с данным перевозчиком. Пожалуйста, опишите подробности Вашего впечатления!';

$L['cargo_frt_full']='Полный';
$L['cargo_frt_coll']='Сборный';