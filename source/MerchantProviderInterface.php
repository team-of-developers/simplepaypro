<?php

namespace TeamOfDevelopers;


interface MerchantProviderInterface {
	/**
     * Абстрактный метод, получает ID заказа в ситеме мерчанта и массив входящих параметров
     * в случае получения уведомления с успешным статусом
     * @param int $order_id Номер заказа
     * @param array $request_params Входящие параметры запроса SimplePay
     */
    public function process_success($order_id, $request_params);

    /**
     * Абстрактный метод, получает ID заказа в ситеме мерчанта и массив входящих параметров
     * в случае получения уведомления со статусом отмена/отказ
     * @param int $order_id Номер заказа
     * @param array $request_params Входящие параметры запроса SimplePay
     */
    public function process_fail($order_id, $request_params);

    /**
    * @return \Team-of-developers\SimplePayMerchant
    */
    public function getPayMerchant();
}