<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use TomatoPHP\TomatoBranches\Models\Branch;
use TomatoPHP\TomatoBranches\Models\Company;
use TomatoPHP\TomatoLocations\Models\Country;
use function \Laravel\Prompts\info;

class TomatoBranches extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Branches');
        $this->description('Branches/Company Management for TomatoPHP');
        $this->package('tomatophp/tomato-branches');
        $this->command('tomato-branches:install');
    }


    public function custom(): void
    {
        $checkIfCompanyExists = Company::count();
        if ($checkIfCompanyExists < 1) {
            $company = Company::create([
                'country_id' => Country::first()?->id,
                'name' => "main company",
                'ceo' => "CEO",
                'address' => "Cairo, Egypt",
                'city' => "Cairo",
                'zip' => "110821",
                'email' => "info@3x1.io",
                'phone' => "+201207860084",
                'website' => "https://docs.tomatophp.com"
            ]);
        } else {
            $company = Company::first();
        }


        $checkIfBranchExists = Branch::count();
        if ($checkIfBranchExists < 1) {
            $branch = Branch::create([
                "name" => "main branch",
                'company_id' => $company->id,
                'branch_number' => "001",
                'phone' => "+201207860084",
                'address' => "Cairo, Egypt"
            ]);
        }

    }
}
