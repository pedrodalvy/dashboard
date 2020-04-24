<?php

/**
 * Treatment for monetary values
 *
 * @param  mixed $money
 * @return mixed
 */
function formatMoney($money)
{
    $money = str_replace('.', '', $money);
    $money = str_replace(',', '.', $money);

    return $money;
}
