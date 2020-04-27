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


/**
 * Treatment for date values
 *
 * @param  mixed $date
 * @return void
 */
function formatDateBr($date) 
{
    return date('d/m/Y', strtotime($date));
}

function unshapedDate($date)
{
    $date = str_replace('/','-',$date);
    
    $dt = \Carbon\Carbon::create($date);
    return $dt->format('Y-m-d');
}