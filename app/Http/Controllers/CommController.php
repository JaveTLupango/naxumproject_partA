<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Commi;
use DB;
use \app\sqlClass;

class CommController extends Controller
{
    //

    public function getCommission()
    {
        $sqlss = CommController::sqlString(); //sqlClass::sqlString();
         $ret = DB::select($sqlss);
        return view('comm')->with("coms", $ret);//$ret; //view('comm')->with("coms", $ret);// $ret;
    }

    public function getDistributorList()
    {
        $sqlString = CommController::sqlStringTopDistributor();
        $ret = DB::select($sqlString);
        return view('distributor')->with("distr", $ret);;
    }

    function sqlString()
    {
        return "SELECT orders.invoice_number,
        orders.order_date,
        (Select CONCAT(first_name, ', ', last_name) From users WHERE users.id = orders.purchaser_id) AS purchaser,
        (SELECT CONCAT(first_name, ', ', last_name) From users WHERE id = (Select referred_by From users WHERE users.id = orders.purchaser_id )) AS destributor,
        (Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id = orders.purchaser_id )) AS ReferredDisc,
        (SELECT (SELECT products.price From products WHERE products.id = order_items.product_id) * order_items.qantity as totalPriceOrder FROM `order_items` WHERE order_items.order_id = (SELECT orders.id From orders WHERE orders.purchaser_id = users.id LIMIT 1) LIMIT 1) AS totalOrder,
        (CASE
        WHEN (Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id = orders.purchaser_id ))> 5 THEN '5%'
        WHEN ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))<= 5) OR
         ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))>= 10) THEN '10%'
        WHEN ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))<= 11) OR
         ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))>= 20) THEN '15%'
        WHEN ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))<= 21) OR
         ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))>= 30) THEN '20%'
           ELSE '30%' END) AS percentage,
        (CASE
        WHEN (Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id = orders.purchaser_id ))> 5 THEN '.05'
        WHEN ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))<= 5) OR
         ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))>= 10) THEN '.10'
        WHEN ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))<= 11) OR
         ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))>= 20) THEN '.15'
        WHEN ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))<= 21) OR
         ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))>= 30) THEN '.20'
           ELSE '30%' END) * (SELECT (SELECT products.price From products WHERE products.id = order_items.product_id) * order_items.qantity as totalPriceOrder FROM `order_items` WHERE order_items.order_id =
           (SELECT orders.id From orders WHERE orders.purchaser_id = users.id LIMIT 1) LIMIT 1) as commission
        From orders INNER JOIN users On users.id = orders.purchaser_id LIMIT 50
        ";
    }

    function sqlStringWithDate($dtFrom, $dtEnd)
    {
        return "SELECT orders.invoice_number,
        orders.order_date,
        (Select CONCAT(first_name, ', ', last_name) From users WHERE users.id = orders.purchaser_id) AS purchaser,
        (SELECT CONCAT(first_name, ', ', last_name) From users WHERE id = (Select referred_by From users WHERE users.id = orders.purchaser_id )) AS destributor,
        (Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id = orders.purchaser_id )) AS ReferredDisc,
        (SELECT (SELECT products.price From products WHERE products.id = order_items.product_id) * order_items.qantity as totalPriceOrder FROM `order_items` WHERE order_items.order_id = (SELECT orders.id From orders WHERE orders.purchaser_id = users.id LIMIT 1) LIMIT 1) AS totalOrder,
        (CASE
        WHEN (Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id = orders.purchaser_id ))> 5 THEN '5%'
        WHEN ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))<= 5) OR
         ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))>= 10) THEN '10%'
        WHEN ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))<= 11) OR
         ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))>= 20) THEN '15%'
        WHEN ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))<= 21) OR
         ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))>= 30) THEN '20%'
           ELSE '30%' END) AS percentage,
        (CASE
        WHEN (Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id = orders.purchaser_id ))> 5 THEN '.05'
        WHEN ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))<= 5) OR
         ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))>= 10) THEN '.10'
        WHEN ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))<= 11) OR
         ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))>= 20) THEN '.15'
        WHEN ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))<= 21) OR
         ((Select Count(first_name) From users WHERE referred_by = (Select referred_by From users WHERE users.id =orders.purchaser_id ))>= 30) THEN '.20'
           ELSE '30%' END) * (SELECT (SELECT products.price From products WHERE products.id = order_items.product_id) * order_items.qantity as totalPriceOrder FROM `order_items` WHERE order_items.order_id = (SELECT orders.id From orders WHERE orders.purchaser_id = users.id LIMIT 1) LIMIT 1) as commission
        From orders INNER JOIN users On users.id = orders.purchaser_id AND orders.order_date >= Date($dtFrom) AND orders.order_date <= Date($dtEnd)";
    }

    function sqlStringTopDistributor()
    {
        return "SELECT CONCAT(first_name, ', ', last_name) as name,
        (SELECT (Select price FROM products WHERE products.id = order_items.product_id) * order_items.qantity as total FROM `order_items` Where order_items.order_id = orders.id LIMIT 1) as Total
        FROM `users` INNER JOIN user_category On user_category.user_id = users.id AND user_category.category_id = 1
        INNER JOIN orders ON orders.purchaser_id = users.id ORDER BY Total DESC";
    }
}
