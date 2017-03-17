<?php
/**
 * yabilling plugin
 *
 * @package yabilling
 * @version 1.0
 * @author devkont (Yusupov)
 * @copyright Copyright (c) CMSWorks Team 2013
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

/**
 * Module Config
 */

$L['info_desc'] = 'Платежный плагин Яндекс.Деньги';

$L['cfg_yandex_num'] = array('Номер кошелька', '');
$L['cfg_secret_key'] = array('Секретное слово', '');
$L['cfg_rate'] = array('Соотношение суммы к валюте сайта', '');
$L['cfg_typechoise'] = array('Включить выбор способа оплаты', '');

$L['yabilling_title'] = 'Яндекс.Деньги';

$L['yabilling_paymenttype_yandex'] = 'Яндекс.Деньгами';
$L['yabilling_paymenttype_card'] = 'Банковской картой';

$L['yabilling_formtext'] = 'Сейчас вы будете перенаправлены на сайт платежной системы Яндекс.Деньги для проведения оплаты. Если этого не произошло, нажмите кнопку "Перейти к оплате".';
$L['yabilling_formtext1'] = 'После нажатия на кнопку "Перейти к оплате" вы будете перенаправлены на сайт платежной системы Яндекс.Деньги для проведения оплаты.';
$L['yabilling_formbuy'] = 'Перейти к оплате';
$L['yabilling_error_paid'] = 'Оплата прошла успешно. В ближайшее время услуга будет активирована!';
$L['yabilling_error_done'] = 'Оплата прошла успешно.';
$L['yabilling_error_incorrect'] = 'Некорректная подпись';
$L['yabilling_error_otkaz'] = 'Отказ от оплаты.';
$L['yabilling_error_title'] = 'Результат операции оплаты';
$L['yabilling_error_fail'] = 'Оплата не произведена! Пожалуйста, повторите попытку. Если ошибка повторится, обратитесь к администратору сайта';

$L['yabilling_redirect_text'] = 'Сейчас произойдет редирект на страницу оплаченной услуги. Если этого не произошло, перейдите по <a href="%1$s">ссылке</a>.';