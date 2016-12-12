<?php
/*
 * Здесь ничего менять не нужно
 */

$sp = new MySimplePayMerchant();
$sp->getMerchant()
		->process_result_request(
				$sp->process_success,
				$sp->process_fail
			);
