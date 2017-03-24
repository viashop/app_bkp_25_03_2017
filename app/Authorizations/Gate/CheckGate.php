<?php

namespace App\Authorizations\Gate;

use Illuminate\Support\Facades\Gate;

/**
 * Class CheckGate
 * @package App\Authorizations\Gate
 */
trait CheckGate
{


    /**
     * administrator -> browser_administrator , add_administrator , read_administrator , edit_administrator , delete_administrator ,
     */

    /**
     * staff_auditor -> browser_staff_auditor , add_staff_auditor , read_staff_auditor , edit_staff_auditor , delete_staff_auditor ,
     * staff_finance -> browser_staff_finance , add_staff_finance , read_staff_finance , edit_staff_finance , delete_staff_finance ,
     * staff_commercial -> browser_staff_commercial , add_staff_commercial , read_staff_commercial , edit_staff_commercial , delete_staff_commercial ,
     * staff_support -> browser_staff_support , add_staff_support , read_staff_support , edit_staff_support , delete_staff_support ,
     * staff_sale -> browser_staff_sale , add_staff_sale , read_staff_sale , edit_staff_sale , delete_staff_sale ,
     * staff_marketing -> browser_staff_marketing , add_staff_marketing , read_staff_marketing , edit_staff_marketing , delete_staff_marketing ,
     * shop_admin -> browser_shop_admin , add_shop_admin , read_shop_admin , edit_shop_admin , delete_shop_admin ,
     * shop_editor -> browser_shop_editor , add_shop_editor , read_shop_editor , edit_shop_editor , delete_shop_editor ,
     * shop_customer -> browser_shop_customer , add_shop_customer , read_shop_customer , edit_shop_customer , delete_shop_customer ,
     * affiliate -> browser_affiliate , add_affiliate , read_affiliate , edit_affiliate , delete_affiliate ,
     */

    /**
     * Check Permission User
     * @param $permission
     */
    public function checkPermission($permission)
    {
        if ( Gate::denies($permission) ) {
            abort(403);
        }

    }

}