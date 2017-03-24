<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(LogActivityTypesTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(BanksConfigurationTableSeeder::class);
        $this->call(BannerLocalTableSeeder::class);
        $this->call(BannerPositionTableSeeder::class);
        $this->call(DeskDepartmentTableSeeder::class);
        $this->call(DeskPriorityTableSeeder::class);
        $this->call(DeskStatusDepartmentTableSeeder::class);
        $this->call(DeskStatusUserTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(PaymentInvoiceSituationTableSeeder::class);
        $this->call(SubdomainNotAllowedsTableSeeder::class);
        $this->call(ShopTypeTableSeeder::class);
        $this->call(ResourceFreeShippingTableSeeder::class);
        $this->call(PaymentPlansTableSeeder::class);
        $this->call(ConfigCorreiosTableSeeder::class);
        $this->call(ConfigPaymentsTableSeeder::class);
        $this->call(ConfigShippingsTableSeeder::class);
        $this->call(ConfigActivitiesTableSeeder::class);
        $this->call(ModelExcelProductImportTableSeeder::class);
        $this->call(ModelExcelRoadCarrierTableSeeder::class);
        $this->call(ShopGridsTableSeeder::class);
        $this->call(ShopGridVariationsTable::class);
        $this->call(ComparatorTableSeeder::class);

    }
}
