<?php

namespace Team-of-developers;
/**
 * Структура с данными иницализации платежа
 */
class SimplePay_Payment {

    /**
     *
     * @var decimal Сумма платежа
     */
    public $amount;

    /**
     *
     * @var string Имя плательщика
     */
    public $client_name;

    /**
     *
     * @var string e-mail плательщика
     */
    public $client_email;

    /**
     *
     * @var string телефон плательщика
     */
    public $client_phone;

    /**
     *
     * @var string IP плательщика (нужно передавать для прямой переадресации на страницу ПС)
     */
    public $client_ip;

    /**
     *
     * @var string Назначение платежа
     */
    public $description;

    /**
     *
     * @var int Номер заказа в системе продавца 
     */
    public $order_id;

    /**
     *
     * @var boolean  Если нужно инициализировать рекуррентный профиль - поставить true
     */
    public $recurrent_start = false;

    /**
     *
     * @var int Срок действия транзакции - сутки
     */
    public $lifetime = 86400;

    /**
     *
     * @var string Дополнительный параметр
     */
    public $user_params = NULL;

    /**
     *
     * @var string Идентификатор платежной системы в SimplePay 
     */
    public $payment_system = NULL;

    /**
     *
     * @var string Переопределить установленный в настройках точки Result URL 
     */
    public $result_url = NULL;
    
    /**
     *
     * @var string Переопределить установленный в настройках точки Success URL 
     */
    public $success_url = NULL;
    
    /**
     *
     * @var string Переопределить установленный в настройках точки Fail URL 
     */
    public $fail_url = NULL;
}
