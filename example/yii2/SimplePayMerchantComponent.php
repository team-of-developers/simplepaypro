<?php

use Team-of-developers/MerchantProviderInterface;
use Team-of-developers/SimplePayMerchant;

/**
 * Ваш интерфейс для работы с SimplePay.
 * Здесь прописаны все основные настройки, а также определяются обработчики 
 * оповещений, получаемых от SimplePay по факту осуществления платежа, либо при 
 * отказе в его проведении.
 */

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class MySimplePayMerchantComponent extends Component implements MerchantProviderInterface
{

    protected
    /**
     * Идентификатор торговой точки в SimplePay
     * Этот параметр можно узнать по адресу: https://secure.simplepay.pro/merchant/#tab_outlets
     */
            $outlet_id = 'Ваш идентификатор торговой точки',
            /**
             * Секретный ключ торговой точки,
             * Этот параметр можно изменить по адресу: https://secure.simplepay.pro/merchant/#tab_outlets
             */
            $secret_key = 'Секретный ключ точки',
            /**
             * Секретный ключ точки для Result, используется для подписи Result-уведомлений
             * Этот параметр можно изменить по адресу: https://secure.simplepay.pro/merchant/#tab_outlets
             */
            $secret_key_result = 'Секретный ключ точки для Result',
            /**
             * Адрес Result URL на Вашем сайте.
             */
            $result_url = "http://yoursite.ru/sp/result.php",
            /*
             * Алгоритм хеширования подписей. Безопаснее использовать SHA256.
             * Этот параметр можно изменить по адресу: https://secure.simplepay.pro/merchant/#tab_outlets
             */
            $hash_algo = "MD5";
            /*
             * Этот параметр отвечает за опцию SSL Verifypeer. Отключать рекомендуется 
             * только в случае, если у Вас по какой-то причине на сервере нет корневых 
             * сертификатов.
             */
            $strong_ssl = true;

    private $merchant;

    public function init($provider = null)
    {
        parent::init();

        if (is_null($this->outlet_id)) {
            throw new \InvalidArgumentException('Please set up outlet_id param for simple pay component');
        }

        if (is_null($this->secret_key)) {
            throw new \InvalidArgumentException('Please set up secret_key param for simple pay component');
        }

        if (is_null($this->secret_key_result)) {
            throw new \InvalidArgumentException('Please set up secret_key_result param for simple pay component');
        }

        if (is_null($this->result_url)) {
            throw new \InvalidArgumentException('Please set up result_url param for simple pay component');
        }

        $this->merchant = new SimplePayMerchant([
                'outlet_id'         => $this->outlet_id,
                'secret_key'        => $this->secret_key,
                'secret_key_result' => $this->secret_key_result,
                'result_url'        => $this->result_url,
                'strong_ssl'        => $this->strong_ssl
            ]);


    }


    /**
    * @return \Team-of-developers\SimplePayMerchant
    */
    public function getPayMerchant() {
        return $this->merchant;   
    }



    

    /**
     * Ваш обработчик успешного платежа. Здесь Вы можете изменить статус заказа 
     * в своей системе, активировать услугу.
     * @param int $order_id В этот параметр будет передан номер заказа в системе магазина
     * @param array $request_params В этот параметр будет полный набор полученных
     * в уведомлении параметров.
     */
    public function process_success($order_id, $request_params) {
        // Ваш обработчик успешного зачисления платежа здесь
        // $order_id - ID заказа в Вашей системе
        // $request_params - параметры оповещения SimplePay
    }

    /**
     * Ваш обработчик в случае отказа в проведении платежа, либо при его отмене. 
     * @param int $order_id В этот параметр будет передан номер заказа в системе магазина
     * @param array $request_params В этот параметр будет полный набор полученных
     * в уведомлении параметров.
     */
    public function process_fail($order_id, $request_params) {
        // Ваш обработчик отказа в зачислении платежа
        // $order_id - ID заказа в Вашей системе
        // $request_params - параметры оповещения SimplePay
    }

}
