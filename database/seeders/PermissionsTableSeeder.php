<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'recovery_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'account_create',
            ],
            [
                'id'    => 19,
                'title' => 'account_edit',
            ],
            [
                'id'    => 20,
                'title' => 'account_show',
            ],
            [
                'id'    => 21,
                'title' => 'account_delete',
            ],
            [
                'id'    => 22,
                'title' => 'account_access',
            ],
            [
                'id'    => 23,
                'title' => 'recovery_create',
            ],
            [
                'id'    => 24,
                'title' => 'recovery_edit',
            ],
            [
                'id'    => 25,
                'title' => 'recovery_show',
            ],
            [
                'id'    => 26,
                'title' => 'recovery_delete',
            ],
            [
                'id'    => 27,
                'title' => 'recovery_access',
            ],
            [
                'id'    => 28,
                'title' => 'write_off_management_access',
            ],
            [
                'id'    => 29,
                'title' => 'branch_create',
            ],
            [
                'id'    => 30,
                'title' => 'branch_edit',
            ],
            [
                'id'    => 31,
                'title' => 'branch_show',
            ],
            [
                'id'    => 32,
                'title' => 'branch_delete',
            ],
            [
                'id'    => 33,
                'title' => 'branch_access',
            ],
            [
                'id'    => 34,
                'title' => 'account_product_create',
            ],
            [
                'id'    => 35,
                'title' => 'account_product_edit',
            ],
            [
                'id'    => 36,
                'title' => 'account_product_show',
            ],
            [
                'id'    => 37,
                'title' => 'account_product_delete',
            ],
            [
                'id'    => 38,
                'title' => 'account_product_access',
            ],
            [
                'id'    => 39,
                'title' => 'account_product_type_create',
            ],
            [
                'id'    => 40,
                'title' => 'account_product_type_edit',
            ],
            [
                'id'    => 41,
                'title' => 'account_product_type_show',
            ],
            [
                'id'    => 42,
                'title' => 'account_product_type_delete',
            ],
            [
                'id'    => 43,
                'title' => 'account_product_type_access',
            ],
            [
                'id'    => 44,
                'title' => 'position_create',
            ],
            [
                'id'    => 45,
                'title' => 'position_edit',
            ],
            [
                'id'    => 46,
                'title' => 'position_show',
            ],
            [
                'id'    => 47,
                'title' => 'position_delete',
            ],
            [
                'id'    => 48,
                'title' => 'position_access',
            ],
            [
                'id'    => 49,
                'title' => 'write_off_create',
            ],
            [
                'id'    => 50,
                'title' => 'write_off_edit',
            ],
            [
                'id'    => 51,
                'title' => 'write_off_show',
            ],
            [
                'id'    => 52,
                'title' => 'write_off_delete',
            ],
            [
                'id'    => 53,
                'title' => 'write_off_access',
            ],
            [
                'id'    => 54,
                'title' => 'account_entry_show',
            ],
            [
                'id'    => 55,
                'title' => 'account_entry_access',
            ],
            [
                'id'    => 56,
                'title' => 'company_management_access',
            ],
            [
                'id'    => 57,
                'title' => 'officer_create',
            ],
            [
                'id'    => 58,
                'title' => 'officer_edit',
            ],
            [
                'id'    => 59,
                'title' => 'officer_show',
            ],
            [
                'id'    => 60,
                'title' => 'officer_delete',
            ],
            [
                'id'    => 61,
                'title' => 'officer_access',
            ],
            [
                'id'    => 62,
                'title' => 'chart_of_account_management_access',
            ],
            [
                'id'    => 63,
                'title' => 'schedule_show',
            ],
            [
                'id'    => 64,
                'title' => 'schedule_access',
            ],
            [
                'id'    => 65,
                'title' => 'loan_management_access',
            ],
            [
                'id'    => 66,
                'title' => 'customer_management_access',
            ],
            [
                'id'    => 67,
                'title' => 'collateral_create',
            ],
            [
                'id'    => 68,
                'title' => 'collateral_edit',
            ],
            [
                'id'    => 69,
                'title' => 'collateral_show',
            ],
            [
                'id'    => 70,
                'title' => 'collateral_delete',
            ],
            [
                'id'    => 71,
                'title' => 'collateral_access',
            ],
            [
                'id'    => 72,
                'title' => 'journal_show',
            ],
            [
                'id'    => 73,
                'title' => 'journal_access',
            ],
            [
                'id'    => 74,
                'title' => 'provision_create',
            ],
            [
                'id'    => 75,
                'title' => 'provision_edit',
            ],
            [
                'id'    => 76,
                'title' => 'provision_show',
            ],
            [
                'id'    => 77,
                'title' => 'provision_delete',
            ],
            [
                'id'    => 78,
                'title' => 'provision_access',
            ],
            [
                'id'    => 79,
                'title' => 'collection_setting_create',
            ],
            [
                'id'    => 80,
                'title' => 'collection_setting_edit',
            ],
            [
                'id'    => 81,
                'title' => 'collection_setting_show',
            ],
            [
                'id'    => 82,
                'title' => 'collection_setting_delete',
            ],
            [
                'id'    => 83,
                'title' => 'collection_setting_access',
            ],
            [
                'id'    => 84,
                'title' => 'customer_create',
            ],
            [
                'id'    => 85,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 86,
                'title' => 'customer_show',
            ],
            [
                'id'    => 87,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 88,
                'title' => 'customer_access',
            ],
            [
                'id'    => 89,
                'title' => 'loan_product_create',
            ],
            [
                'id'    => 90,
                'title' => 'loan_product_edit',
            ],
            [
                'id'    => 91,
                'title' => 'loan_product_show',
            ],
            [
                'id'    => 92,
                'title' => 'loan_product_delete',
            ],
            [
                'id'    => 93,
                'title' => 'loan_product_access',
            ],
            [
                'id'    => 94,
                'title' => 'loan_product_provision_create',
            ],
            [
                'id'    => 95,
                'title' => 'loan_product_provision_edit',
            ],
            [
                'id'    => 96,
                'title' => 'loan_product_provision_show',
            ],
            [
                'id'    => 97,
                'title' => 'loan_product_provision_delete',
            ],
            [
                'id'    => 98,
                'title' => 'loan_product_provision_access',
            ],
            [
                'id'    => 99,
                'title' => 'company_create',
            ],
            [
                'id'    => 100,
                'title' => 'company_edit',
            ],
            [
                'id'    => 101,
                'title' => 'company_show',
            ],
            [
                'id'    => 102,
                'title' => 'company_delete',
            ],
            [
                'id'    => 103,
                'title' => 'company_access',
            ],
            [
                'id'    => 104,
                'title' => 'contract_create',
            ],
            [
                'id'    => 105,
                'title' => 'contract_edit',
            ],
            [
                'id'    => 106,
                'title' => 'contract_show',
            ],
            [
                'id'    => 107,
                'title' => 'contract_delete',
            ],
            [
                'id'    => 108,
                'title' => 'contract_access',
            ],
            [
                'id'    => 109,
                'title' => 'chart_of_account_create',
            ],
            [
                'id'    => 110,
                'title' => 'chart_of_account_edit',
            ],
            [
                'id'    => 111,
                'title' => 'chart_of_account_show',
            ],
            [
                'id'    => 112,
                'title' => 'chart_of_account_access',
            ],
            [
                'id'    => 113,
                'title' => 'account_type_create',
            ],
            [
                'id'    => 114,
                'title' => 'account_type_edit',
            ],
            [
                'id'    => 115,
                'title' => 'account_type_show',
            ],
            [
                'id'    => 116,
                'title' => 'account_type_delete',
            ],
            [
                'id'    => 117,
                'title' => 'account_type_access',
            ],
            [
                'id'    => 118,
                'title' => 'currency_create',
            ],
            [
                'id'    => 119,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 120,
                'title' => 'currency_show',
            ],
            [
                'id'    => 121,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 122,
                'title' => 'currency_access',
            ],
            [
                'id'    => 123,
                'title' => 'application_create',
            ],
            [
                'id'    => 124,
                'title' => 'application_edit',
            ],
            [
                'id'    => 125,
                'title' => 'application_show',
            ],
            [
                'id'    => 126,
                'title' => 'application_delete',
            ],
            [
                'id'    => 127,
                'title' => 'application_access',
            ],
            [
                'id'    => 128,
                'title' => 'system_date_create',
            ],
            [
                'id'    => 129,
                'title' => 'system_date_edit',
            ],
            [
                'id'    => 130,
                'title' => 'system_date_show',
            ],
            [
                'id'    => 131,
                'title' => 'system_date_delete',
            ],
            [
                'id'    => 132,
                'title' => 'system_date_access',
            ],
            [
                'id'    => 133,
                'title' => 'system_setting_create',
            ],
            [
                'id'    => 134,
                'title' => 'system_setting_edit',
            ],
            [
                'id'    => 135,
                'title' => 'system_setting_show',
            ],
            [
                'id'    => 136,
                'title' => 'system_setting_delete',
            ],
            [
                'id'    => 137,
                'title' => 'system_setting_access',
            ],
            [
                'id'    => 138,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 139,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 140,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 141,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 142,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 143,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 144,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 145,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 146,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 147,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 148,
                'title' => 'faq_question_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
