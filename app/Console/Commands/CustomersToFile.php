<?php

namespace App\Console\Commands;

use Exception;
use App\Models\Customer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class CustomersToFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:customers-to-file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $columnNames = Schema::getColumnListing((new Customer())->getTable());
        $customers = Customer::all();
       
        $str = implode(',',$columnNames) . PHP_EOL;
        foreach($customers as $row) {
            $str = $str . implode(',',$row->toArray()) . PHP_EOL;
        }
        Storage::disk('local')->put('customers.csv', $str);
     
        
    }
}
