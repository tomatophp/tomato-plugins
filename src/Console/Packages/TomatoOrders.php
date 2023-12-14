<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use TomatoPHP\TomatoLocations\Models\Country;
use TomatoPHP\TomatoOrders\Models\Branch;
use TomatoPHP\TomatoOrders\Models\Company;
use function \Laravel\Prompts\info;
use function Laravel\Prompts\warning;

class TomatoOrders extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Orders');
        $this->description('full ordering and shipping system management with invoices templates for TomatoPHP');
        $this->package('tomatophp/tomato-orders');
        $this->command('tomato-orders:install');
    }

    public function custom(): void
    {
        $checkIfCompanyExists = Company::count();
        if($checkIfCompanyExists < 1){
            $company = Company::create([
                'country_id' => Country::first()?->id,
                'name' => "main company",
                'ceo' => "CEO",
                'address' => "Cairo, Egypt",
                'city' => "Cairo",
                'zip' => "110821",
                'email' => "info@3x1.io",
                'phone' => "+201207860084",
                'website'=> "https://docs.tomatophp.com"
            ]);
        }
        else {
            $company = Company::first();
        }


        $checkIfBranchExists = Branch::count();
        if($checkIfBranchExists < 1){
            $branch = Branch::create([
                "name" => "main branch",
                'company_id' => $company->id,
                'branch_number' => "001",
                'phone' => "+201207860084",
                'address' => "Cairo, Egypt"
            ]);
        }

        warning('add [use InteractsWithOrders;] to your Account model');
    }
}
