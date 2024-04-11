<?php

namespace App\Imports;

use App\Models\Microwavelink;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MicrowavelinkImport implements ToCollection, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // logic to process and save data
            Microwavelink::create([
                'curr_lic_num' => $row['curr_lic_num'],
                'clnt_id' => $row['clnt_id'],
                'appl_id' => $row['appl_id'],
                'clnt_name' => $row['clnt_name'],
                'stn_name' => $row['stn_name'],
                'freq' => $row['freq'],
                'freq_pair' => $row['freq_pair'],
                'erp_pwr_dbm' => $row['erp_pwr_dbm'],
                'bwidth' => $row['bwidth'],
                'bhp' => $row['bhp'],
                'eq_mdl' => $row['eq_mdl'],
                'ant_mdl' => $row['ant_mdl'],
                'hgt_ant' => $row['hgt_ant'],
                'master_plzn_code' => $row['master_plzn_code'],
                'stn_addr' => $row['stn_addr'],
                'sid_long' => $row['sid_long'],
                'sid_lat' => $row['sid_lat'],
                'city' => $row['city'],
                'link_id' => $row['link_id'],
                'stasiun_lawan' => $row['stasiun_lawan'],
                'masa_laku' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['masa_laku']),
                'mon_query' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['mon_query']),
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'curr_lic_num' => 'required|unique:microwavelinks',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'curr_lic_num.required' => 'curr_lic_num harus diisi',
        ];
    }

    // Method to check if all rows have curr_lic_num filled
    public function allRowsHaveCurrLicNum($file)
    {
        $rows = \Maatwebsite\Excel\Facades\Excel::toCollection(new self(), $file)[0];
        foreach ($rows as $row) {
            if (empty($row['curr_lic_num'])) {
                return false;
            }
        }
        return true;
    }

}
